<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrescriptionScannerController extends Controller
{
    public function index()
    {
        return view('prescription_scanner.index');
    }

    public function scan(Request $request)
    {
        $request->validate([
            'prescription_image' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ], [
            'prescription_image.required' => __('ps.prescription_image_required'),
            'prescription_image.image' => __('ps.prescription_image_must_be_image'),
            'prescription_image.mimes' => __('ps.prescription_image_invalid_type'),
            'prescription_image.max' => __('ps.prescription_image_max_size'),
        ]);

        try {
            /*
             * 1. Save uploaded prescription image.
             */
            $uploadDir = storage_path('app' . DIRECTORY_SEPARATOR . 'prescription_scans');

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0775, true);
            }

            $file = $request->file('prescription_image');

            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $file->move($uploadDir, $fileName);

            $imagePath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;

            if (!file_exists($imagePath)) {
                throw new \Exception(__('ps.uploaded_image_not_saved'));
            }

            /*
             * 2. Python executable path from virtual environment.
             */
            $pythonPath = base_path('ocr_env' . DIRECTORY_SEPARATOR . 'Scripts' . DIRECTORY_SEPARATOR . 'python.exe');

            if (!file_exists($pythonPath)) {
                throw new \Exception(__('ps.python_environment_not_found_at', ['path' => $pythonPath]));
            }

            /*
             * 3. EasyOCR Python script path.
             */
            $scriptPath = storage_path('app' . DIRECTORY_SEPARATOR . 'ocr' . DIRECTORY_SEPARATOR . 'easyocr_prescription.py');

            if (!file_exists($scriptPath)) {
                throw new \Exception(__('ps.easyocr_script_not_found_at', ['path' => $scriptPath]));
            }

            /*
             * 4. Run EasyOCR script.
             */
            $command = '"' . $pythonPath . '" "' . $scriptPath . '" "' . $imagePath . '"';

            $descriptors = [
                0 => ['pipe', 'r'],
                1 => ['pipe', 'w'],
                2 => ['pipe', 'w'],
            ];

            $process = proc_open($command, $descriptors, $pipes, base_path());

            if (!is_resource($process)) {
                throw new \Exception(__('ps.could_not_start_easyocr_process'));
            }

            fclose($pipes[0]);

            $output = stream_get_contents($pipes[1]);
            $errorOutput = stream_get_contents($pipes[2]);

            fclose($pipes[1]);
            fclose($pipes[2]);

            $exitCode = proc_close($process);

            if ($exitCode !== 0) {
                throw new \Exception(__('ps.easyocr_process_failed', ['error' => $errorOutput]));
            }

            /*
             * 5. Decode EasyOCR JSON response.
             */
            $output = trim($output);

            /*
             * Safety fix:
             * If Python prints any extra text before JSON, remove it.
             */
            $jsonStart = strpos($output, '{');

            if ($jsonStart !== false) {
                $output = substr($output, $jsonStart);
            }

            $ocrData = json_decode($output, true);

            if (!$ocrData) {
                throw new \Exception(__('ps.invalid_json_response_from_easyocr', ['output' => $output]));
            }

            if (!isset($ocrData['success']) || $ocrData['success'] !== true) {
                $errorMessage = $ocrData['error'] ?? __('ps.unknown_easyocr_error');
                throw new \Exception($errorMessage);
            }

            $rawText = $ocrData['raw_text'] ?? '';

            /*
             * 6. Load trusted medicine reference from CSV.
             * CSV columns:
             * name,ml,type
             */
            $medicineReferenceList = $this->loadMedicineReferenceCsv();

            /*
             * 7. Convert OCR text to prescription table using CSV.
             */
            $items = $this->parsePrescriptionText($rawText, $medicineReferenceList);

            return back()->with([
                'raw_text' => $rawText,
                'prescription_items' => $items,
                'ocr_lines' => $ocrData['lines'] ?? [],
            ]);

        } catch (\Throwable $e) {
            return back()->with('error', __('ps.prescription_scan_failed', ['message' => $e->getMessage()]));
        }
    }

    public function confirm(Request $request)
    {
        $request->validate([
            'medicine_id' => ['nullable', 'array'],
            'medicine_id.*' => ['nullable'],

            'medicine_name' => ['required', 'array'],
            'medicine_name.*' => ['required', 'string', 'max:255'],

            'type' => ['nullable', 'array'],
            'type.*' => ['nullable', 'string', 'max:255'],

            'quantity' => ['required', 'array'],
            'quantity.*' => ['required', 'integer', 'min:1'],

            'dose_or_ml' => ['nullable', 'array'],
            'dose_or_ml.*' => ['nullable', 'string', 'max:255'],

            'instruction' => ['nullable', 'array'],
            'instruction.*' => ['nullable', 'string', 'max:255'],

            'original_line' => ['nullable', 'array'],
            'original_line.*' => ['nullable', 'string'],
        ], [
            'medicine_name.required' => __('ps.medicine_name_required'),
            'medicine_name.array' => __('ps.medicine_name_must_be_array'),
            'medicine_name.*.required' => __('ps.each_medicine_name_required'),
            'medicine_name.*.string' => __('ps.each_medicine_name_must_be_text'),
            'medicine_name.*.max' => __('ps.each_medicine_name_max'),

            'type.array' => __('ps.type_must_be_array'),
            'type.*.string' => __('ps.each_type_must_be_text'),
            'type.*.max' => __('ps.each_type_max'),

            'quantity.required' => __('ps.quantity_required'),
            'quantity.array' => __('ps.quantity_must_be_array'),
            'quantity.*.required' => __('ps.each_quantity_required'),
            'quantity.*.integer' => __('ps.each_quantity_must_be_integer'),
            'quantity.*.min' => __('ps.each_quantity_min'),

            'dose_or_ml.array' => __('ps.dose_or_ml_must_be_array'),
            'dose_or_ml.*.string' => __('ps.each_dose_or_ml_must_be_text'),
            'dose_or_ml.*.max' => __('ps.each_dose_or_ml_max'),

            'instruction.array' => __('ps.instruction_must_be_array'),
            'instruction.*.string' => __('ps.each_instruction_must_be_text'),
            'instruction.*.max' => __('ps.each_instruction_max'),

            'original_line.array' => __('ps.original_line_must_be_array'),
            'original_line.*.string' => __('ps.each_original_line_must_be_text'),
        ]);

        $items = [];

        foreach ($request->medicine_name as $index => $medicineName) {
            $items[] = [
                'medicine_id' => $request->medicine_id[$index] ?? null,
                'medicine_name' => trim($medicineName),
                'type' => $request->type[$index] ?? '',
                'quantity' => (int) ($request->quantity[$index] ?? 1),
                'dose_or_ml' => $request->dose_or_ml[$index] ?? '',
                'instruction' => $request->instruction[$index] ?? '',
                'original_line' => $request->original_line[$index] ?? '',
            ];
        }

        return back()->with([
            'success' => __('ps.prescription_confirmed_successfully'),
            'confirmed_prescription_items' => $items,
        ]);
    }

    private function parsePrescriptionText($rawText, $medicineReferenceList)
    {
        $lines = preg_split('/\r\n|\r|\n/', $rawText);

        $cleanLines = [];

        foreach ($lines as $line) {
            $line = trim($line);

            if ($line !== '') {
                $line = preg_replace('/\s+/', ' ', $line);
                $cleanLines[] = $line;
            }
        }

        $items = [];

        /*
         * Build medicine blocks.
         */
        $blocks = [];
        $currentBlock = [];
        $pendingPrefixLines = [];

        foreach ($cleanLines as $line) {
            $matchedMedicineInLine = $this->findMedicineFromCsvList($line, $medicineReferenceList);

            if ($matchedMedicineInLine) {
                if (!empty($currentBlock)) {
                    $blocks[] = $currentBlock;
                }

                $currentBlock = array_merge($pendingPrefixLines, [$line]);
                $pendingPrefixLines = [];
            } else {
                if (!empty($currentBlock)) {
                    $currentBlock[] = $line;
                } else {
                    $pendingPrefixLines[] = $line;

                    if (count($pendingPrefixLines) > 2) {
                        array_shift($pendingPrefixLines);
                    }
                }
            }
        }

        if (!empty($currentBlock)) {
            $blocks[] = $currentBlock;
        }

        /*
         * If no medicine matched from CSV, show raw lines for manual review.
         */
        if (empty($blocks)) {
            foreach ($cleanLines as $line) {
                $items[] = [
                    'medicine_id' => null,
                    'medicine_name' => '',
                    'type' => '',
                    'quantity' => $this->detectQuantity($line),
                    'dose_or_ml' => '',
                    'instruction' => $this->detectInstruction($line),
                    'original_line' => $line,
                ];
            }

            return $items;
        }

        foreach ($blocks as $blockLines) {
            $blockText = implode(' ', $blockLines);

            $blockText = preg_replace('/^\s*(rx|r\/x|℞)\s*[:\-]?\s*/i', '', $blockText);
            $blockText = preg_replace('/^\s*\d+\s*[\.\-\)]\s*/', '', $blockText);
            $blockText = preg_replace('/\s+/', ' ', $blockText);
            $blockText = trim($blockText);

            $matchedMedicine = $this->findMedicineFromCsvList($blockText, $medicineReferenceList);

            if ($matchedMedicine) {
                $medicineName = $matchedMedicine['name'];
                $doseOrMl = $matchedMedicine['dose_or_ml'];
                $type = $matchedMedicine['type'];
            } else {
                $medicineName = '';
                $doseOrMl = '';
                $type = '';
            }

            $items[] = [
                'medicine_id' => null,
                'medicine_name' => $medicineName,
                'type' => $type,
                'quantity' => $this->detectQuantity($blockText),
                'dose_or_ml' => $doseOrMl,
                'instruction' => $this->detectInstruction($blockText),
                'original_line' => $blockText,
            ];
        }

        return $items;
    }

    private function loadMedicineReferenceCsv()
    {
        $path = storage_path('app' . DIRECTORY_SEPARATOR . 'ocr' . DIRECTORY_SEPARATOR . 'medicine_reference.csv');

        if (!file_exists($path)) {
            throw new \Exception(__('ps.medicine_reference_csv_not_found_at', ['path' => $path]));
        }

        $rows = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if (!$rows || count($rows) < 2) {
            throw new \Exception(__('ps.medicine_reference_csv_empty'));
        }

        $csvRows = array_map('str_getcsv', $rows);

        $header = array_map(function ($value) {
            $value = preg_replace('/^\xEF\xBB\xBF/', '', $value);
            return strtolower(trim($value));
        }, $csvRows[0]);

        $nameIndex = array_search('name', $header);

        /*
         * Supports both headers:
         * name,ml,type
         * name,dose_or_ml,type
         */
        $doseIndex = array_search('ml', $header);

        if ($doseIndex === false) {
            $doseIndex = array_search('dose_or_ml', $header);
        }

        $typeIndex = array_search('type', $header);

        if ($nameIndex === false || $doseIndex === false || $typeIndex === false) {
            throw new \Exception(__('ps.csv_must_have_required_headers'));
        }

        $medicineReferenceList = [];

        foreach (array_slice($csvRows, 1) as $row) {
            $name = trim($row[$nameIndex] ?? '');
            $doseOrMl = trim($row[$doseIndex] ?? '');
            $type = trim($row[$typeIndex] ?? '');

            if ($name === '') {
                continue;
            }

            $medicineReferenceList[] = [
                'name' => $name,
                'dose_or_ml' => $doseOrMl,
                'type' => $type,
                'normalized_name' => $this->normalizeForMedicineMatch($name),
                'normalized_dose' => $this->normalizeDoseForMatch($doseOrMl),
                'normalized_type' => $this->normalizeForMedicineMatch($type),
            ];
        }

        if (count($medicineReferenceList) === 0) {
            throw new \Exception(__('ps.medicine_reference_csv_no_valid_rows'));
        }

        return $medicineReferenceList;
    }

    private function findMedicineFromCsvList($line, $medicineReferenceList)
    {
        $tokens = $this->extractMedicineSearchTokens($line);
        $ocrDose = $this->normalizeDoseForMatch($this->detectDoseOrMlFromOcr($line));
        $ocrType = $this->normalizeForMedicineMatch($this->detectMedicineTypeFromOcr($line));

        if (count($tokens) === 0) {
            return null;
        }

        $bestMedicine = null;
        $bestScore = 0;

        foreach ($medicineReferenceList as $medicine) {
            $medicineNorm = $medicine['normalized_name'] ?? '';

            if (strlen($medicineNorm) < 3) {
                continue;
            }

            $medicinePrefix = substr($medicineNorm, 0, 3);

            foreach ($tokens as $token) {
                if (strlen($token) < 3) {
                    continue;
                }

                $tokenPrefix = substr($token, 0, 3);

                if ($tokenPrefix !== $medicinePrefix) {
                    continue;
                }

                similar_text($token, $medicineNorm, $percent);

                $commonPrefixLength = $this->commonPrefixLength($token, $medicineNorm);

                $score = $percent + ($commonPrefixLength * 10);

                if ($this->startsWith($medicineNorm, $token)) {
                    $score += 40;
                }

                if ($token === $medicineNorm) {
                    $score += 100;
                }

                if ($ocrDose !== '' && $ocrDose === ($medicine['normalized_dose'] ?? '')) {
                    $score += 100;
                }

                if ($ocrType !== '' && $ocrType !== 'unknown' && $ocrType === ($medicine['normalized_type'] ?? '')) {
                    $score += 50;
                }

                if ($score > $bestScore) {
                    $bestScore = $score;
                    $bestMedicine = $medicine;
                }
            }
        }

        if ($bestScore < 45) {
            return null;
        }

        return $bestMedicine;
    }

    private function extractMedicineSearchTokens($line)
    {
        $text = strtolower($line);

        $text = preg_replace('/\b\d+(\.\d+)?\s*(mg|ml|mcg|g|gm|iu|units|unit|%)\s*\/\s*\d+(\.\d+)?\s*(mg|ml|mcg|g|gm|iu|units|unit|%)\b/i', ' ', $text);
        $text = preg_replace('/\b\d+(\.\d+)?\s*(mg|ml|mcg|g|gm|iu|units|unit|%)\b/i', ' ', $text);

        $text = preg_replace('/\b\d+(\.\d+)?\s*m\s*g\b/i', ' ', $text);
        $text = preg_replace('/\b\d+(\.\d+)?\s*m\s*l\b/i', ' ', $text);

        $text = preg_replace('/\b(qty|quantity|qnty|no|number|x)\s*[:\-]?\s*\d+\b/i', ' ', $text);
        $text = preg_replace('/\b\d+\s*(tab|tabs|tablet|tablets|cap|caps|capsule|capsules|bottle|bottles|strip|strips|vial|vials|amp|ampoule|drops|pcs|pieces)\b/i', ' ', $text);

        $stopWords = [
            'rx', 'tab', 'tabs', 'tablet', 'tablets',
            'cap', 'caps', 'capsule', 'capsules',
            'syr', 'syp', 'syrup', 'susp', 'suspension',
            'inj', 'injection', 'amp', 'ampoule', 'vial',
            'drop', 'drops', 'cream', 'ointment', 'gel',
            'inhaler', 'inh',
            'mg', 'ml', 'mcg', 'g', 'gm', 'iu', 'unit', 'units',
            'od', 'bd', 'tds', 'qid', 'hs', 'stat', 'sos', 'prn',
            'daily', 'once', 'twice', 'three', 'four', 'times',
            'morning', 'evening', 'night',
            'before', 'after', 'food', 'meal', 'meals',
            'with', 'for', 'day', 'days', 'week', 'weeks',
            'month', 'months', 'take', 'use', 'apply', 'drink',
            'qty', 'quantity', 'qnty', 'number'
        ];

        $text = preg_replace('/[^a-zA-Z0-9]+/', ' ', $text);

        $words = preg_split('/\s+/', trim($text));

        $tokens = [];

        foreach ($words as $word) {
            $word = $this->normalizeForMedicineMatch($word);

            if (strlen($word) < 3) {
                continue;
            }

            if (in_array($word, $stopWords)) {
                continue;
            }

            if (is_numeric($word)) {
                continue;
            }

            $tokens[] = $word;
        }

        return array_values(array_unique($tokens));
    }

    private function detectDoseOrMlFromOcr($line)
    {
        $line = preg_replace('/\s+/', ' ', $line);
        $line = trim($line);

        $matches = [];

        if (preg_match_all('/\b\d+(\.\d+)?\s*(mg|ml|mcg|g|gm|iu|units|unit|%)\s*\/\s*\d+(\.\d+)?\s*(mg|ml|mcg|g|gm|iu|units|unit|%)\b/i', $line, $combinedMatches)) {
            foreach ($combinedMatches[0] as $match) {
                $matches[] = trim($match);
            }
        }

        if (preg_match_all('/\b\d+(\.\d+)?\s*(mg|ml|mcg|g|gm|iu|units|unit|%)\b/i', $line, $singleMatches)) {
            foreach ($singleMatches[0] as $match) {
                $matches[] = trim($match);
            }
        }

        if (preg_match_all('/\b\d+(\.\d+)?\s*m\s*g\b/i', $line, $mgSplitMatches)) {
            foreach ($mgSplitMatches[0] as $match) {
                $matches[] = preg_replace('/\s+/', '', $match);
            }
        }

        if (preg_match_all('/\b\d+(\.\d+)?\s*m\s*l\b/i', $line, $mlSplitMatches)) {
            foreach ($mlSplitMatches[0] as $match) {
                $matches[] = preg_replace('/\s+/', '', $match);
            }
        }

        $matches = array_values(array_unique($matches));

        return implode(', ', $matches);
    }

    private function detectQuantity($line)
    {
        if (preg_match('/\b(qty|quantity|qnty|no|number|x)\s*[:\-]?\s*(\d+)\b/i', $line, $match)) {
            return (int) $match[2];
        }

        if (preg_match('/\b(\d+)\s*(tab|tabs|tablet|tablets|cap|caps|capsule|capsules|bottle|bottles|strip|strips|vial|vials|amp|ampoule|drops|pcs|pieces)\b/i', $line, $match)) {
            return (int) $match[1];
        }

        return 1;
    }

    private function detectMedicineTypeFromOcr($line)
    {
        $typePatterns = [
            'Tablet' => '/\b(tab|tabs|tablet|tablets)\b/i',
            'Capsule' => '/\b(cap|caps|capsule|capsules)\b/i',
            'Syrup' => '/\b(syr|syp|syrup|susp|suspension)\b/i',
            'Injection' => '/\b(inj|injection|amp|ampoule|vial)\b/i',
            'Drops' => '/\b(drop|drops|eye drop|ear drop)\b/i',
            'Cream' => '/\b(cream|crm)\b/i',
            'Ointment' => '/\b(ointment|oint)\b/i',
            'Gel' => '/\b(gel)\b/i',
            'Inhaler' => '/\b(inhaler|inh)\b/i',
        ];

        foreach ($typePatterns as $type => $pattern) {
            if (preg_match($pattern, $line)) {
                return $type;
            }
        }

        return 'Unknown';
    }

    private function detectInstruction($line)
    {
        $instructionParts = [];

        if (preg_match('/\b(od|bd|tds|qid|hs|stat|sos|prn)\b/i', $line, $m)) {
            $instructionParts[] = strtoupper($m[1]);
        }

        if (preg_match('/\b(once|twice|three times|four times)\s*(daily|a day|per day)?\b/i', $line, $m)) {
            $instructionParts[] = trim($m[0]);
        }

        if (preg_match('/\b(morning|evening|night|before food|after food|before meal|after meal|with food)\b/i', $line, $m)) {
            $instructionParts[] = trim($m[0]);
        }

        if (preg_match('/\bfor\s+\d+\s*(day|days|week|weeks|month|months)\b/i', $line, $m)) {
            $instructionParts[] = trim($m[0]);
        }

        return implode(', ', array_unique($instructionParts));
    }

    private function normalizeForMedicineMatch($text)
    {
        $text = strtolower($text);
        $text = preg_replace('/[^a-z0-9]/', '', $text);

        return trim($text);
    }

    private function normalizeDoseForMatch($dose)
    {
        $dose = strtolower($dose);
        $dose = str_replace(' ', '', $dose);
        $dose = str_replace('gm', 'g', $dose);
        $dose = str_replace('grams', 'g', $dose);
        $dose = str_replace('gram', 'g', $dose);
        $dose = str_replace('units', 'unit', $dose);

        return trim($dose);
    }

    private function startsWith($text, $prefix)
    {
        return substr($text, 0, strlen($prefix)) === $prefix;
    }

    private function commonPrefixLength($a, $b)
    {
        $length = min(strlen($a), strlen($b));
        $count = 0;

        for ($i = 0; $i < $length; $i++) {
            if ($a[$i] !== $b[$i]) {
                break;
            }

            $count++;
        }

        return $count;
    }
}