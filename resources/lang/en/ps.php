<?php

return [
    'page_title' => 'Prescription Scanner',
    'page_subtitle' => 'Upload, scan, review, correct, and confirm the prescription safely.',

    'upload_prescription' => 'Upload Prescription',
    'upload_label' => 'Upload Doctor Handwritten Prescription',
    'scan_prescription' => 'Scan Prescription',

    'ocr_warning' => 'EasyOCR scanned this prescription automatically. Please review and correct each field before confirming. Medicine name must contain only the medicine name. Type, quantity, dose/ml, and instructions must stay in their own fields.',
    'raw_ocr_text' => 'Raw OCR Text',

    'computer_prescription_table' => 'Computer Prescription Table',
    'review_before_confirm' => 'Review Before Confirm',

    'medicine_name' => 'Medicine Name',
    'type' => 'Type',
    'quantity' => 'Quantity',
    'ml_dose' => 'ML / Dose',
    'instruction' => 'Instruction',
    'original_ocr_line' => 'Original OCR Line',

    'only_medicine_name' => 'Only medicine name',
    'dose_placeholder' => '500mg / 5ml',
    'instruction_placeholder' => 'BD after food',

    'confirm_prescription' => 'Confirm Prescription',
    'confirmed_success_message' => 'Prescription confirmed successfully. Final reviewed prescription is shown below.',
    'confirmed_prescription' => 'Confirmed Prescription',

    'type_unknown' => 'Unknown',
    'type_tablet' => 'Tablet',
    'type_capsule' => 'Capsule',
    'type_syrup' => 'Syrup',
    'type_injection' => 'Injection',
    'type_drops' => 'Drops',
    'type_cream' => 'Cream',
    'type_ointment' => 'Ointment',
    'type_gel' => 'Gel',
    'type_inhaler' => 'Inhaler',






    'prescription_image_required' => 'Please upload a prescription image.',
'prescription_image_must_be_image' => 'The uploaded file must be an image.',
'prescription_image_invalid_type' => 'The prescription image must be JPG, JPEG, PNG, or WEBP.',
'prescription_image_max_size' => 'The prescription image must not be larger than 5MB.',

'uploaded_image_not_saved' => 'Uploaded image was not saved correctly.',
'python_environment_not_found_at' => 'Python environment not found at: :path',
'easyocr_script_not_found_at' => 'EasyOCR script not found at: :path',
'could_not_start_easyocr_process' => 'Could not start EasyOCR process.',
'easyocr_process_failed' => 'EasyOCR process failed: :error',
'invalid_json_response_from_easyocr' => 'Invalid JSON response from EasyOCR: :output',
'unknown_easyocr_error' => 'Unknown EasyOCR error.',
'prescription_scan_failed' => 'Prescription scan failed: :message',

'medicine_name_required' => 'Medicine name is required.',
'medicine_name_must_be_array' => 'Medicine name must be a valid list.',
'each_medicine_name_required' => 'Each medicine name is required.',
'each_medicine_name_must_be_text' => 'Each medicine name must be text.',
'each_medicine_name_max' => 'Each medicine name must not be greater than 255 characters.',

'type_must_be_array' => 'Medicine type must be a valid list.',
'each_type_must_be_text' => 'Each medicine type must be text.',
'each_type_max' => 'Each medicine type must not be greater than 255 characters.',

'quantity_required' => 'Quantity is required.',
'quantity_must_be_array' => 'Quantity must be a valid list.',
'each_quantity_required' => 'Each quantity is required.',
'each_quantity_must_be_integer' => 'Each quantity must be a whole number.',
'each_quantity_min' => 'Each quantity must be at least 1.',

'dose_or_ml_must_be_array' => 'Dose or ML must be a valid list.',
'each_dose_or_ml_must_be_text' => 'Each dose or ML value must be text.',
'each_dose_or_ml_max' => 'Each dose or ML value must not be greater than 255 characters.',

'instruction_must_be_array' => 'Instruction must be a valid list.',
'each_instruction_must_be_text' => 'Each instruction must be text.',
'each_instruction_max' => 'Each instruction must not be greater than 255 characters.',

'original_line_must_be_array' => 'Original OCR line must be a valid list.',
'each_original_line_must_be_text' => 'Each original OCR line must be text.',

'prescription_confirmed_successfully' => 'Prescription confirmed successfully.',
'print_prescription' => 'Print Prescription',
'print_date' => 'Print Date',
'print_area_not_found' => 'Prescription print area was not found.',
'print_window_blocked' => 'Please allow popups to print the prescription.',

'medicine_reference_csv_not_found_at' => 'Medicine reference CSV file not found at: :path',
'medicine_reference_csv_empty' => 'Medicine reference CSV file is empty.',
'csv_must_have_required_headers' => 'CSV must have these headers: name,ml,type',
'medicine_reference_csv_no_valid_rows' => 'Medicine reference CSV has no valid medicine rows.',
];