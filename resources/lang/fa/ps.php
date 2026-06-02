<?php

return [
    'page_title' => 'د نسخې سکینر',
    'page_subtitle' => 'نسخه پورته کړئ، سکین یې کړئ، بیا یې وګورئ، اصلاح یې کړئ او په خوندي ډول یې تایید کړئ.',

    'upload_prescription' => 'نسخه پورته کول',
    'upload_label' => 'د ډاکټر په لاس لیکل شوې نسخه پورته کړئ',
    'scan_prescription' => 'نسخه سکین کړئ',

    'ocr_warning' => 'EasyOCR دا نسخه په اوتومات ډول سکین کړې ده. مهرباني وکړئ د تایید څخه مخکې هره برخه وګورئ او اصلاح یې کړئ. د درمل نوم باید یوازې د درمل نوم ولري. ډول، مقدار، دوز/اېم اېل، او لارښوونې باید په خپلو جلا برخو کې پاتې شي.',
    'raw_ocr_text' => 'خام OCR متن',

    'computer_prescription_table' => 'د کمپیوټر د نسخې جدول',
    'review_before_confirm' => 'د تایید څخه مخکې یې وګورئ',
    'print_prescription' => 'نسخه چاپ کړئ',
'print_date' => 'د چاپ نېټه',
'print_area_not_found' => 'د نسخې د چاپ برخه ونه موندل شوه.',
'print_window_blocked' => 'مهرباني وکړئ د نسخې د چاپ لپاره پاپ اپ اجازه کړئ.',

    'medicine_name' => 'د درمل نوم',
    'type' => 'ډول',
    'quantity' => 'مقدار',
    'ml_dose' => 'اېم اېل / دوز',
    'instruction' => 'لارښوونه',
    'original_ocr_line' => 'اصلي OCR کرښه',

    'only_medicine_name' => 'یوازې د درمل نوم',
    'dose_placeholder' => '500mg / 5ml',
    'instruction_placeholder' => 'د خوړو وروسته دوه ځله',

    'confirm_prescription' => 'نسخه تایید کړئ',
    'confirmed_success_message' => 'نسخه په بریالیتوب سره تایید شوه. وروستۍ کتل شوې نسخه لاندې ښودل شوې ده.',
    'confirmed_prescription' => 'تایید شوې نسخه',

    'type_unknown' => 'نامعلوم',
    'type_tablet' => 'ګولۍ',
    'type_capsule' => 'کپسول',
    'type_syrup' => 'شربت',
    'type_injection' => 'پیچکاري',
    'type_drops' => 'څاڅکي',
    'type_cream' => 'کریم',
    'type_ointment' => 'مرهم',
    'type_gel' => 'جېل',
    'type_inhaler' => 'ساه اخیستونکی درمل',






    'prescription_image_required' => 'مهرباني وکړئ د نسخې عکس پورته کړئ.',
'prescription_image_must_be_image' => 'پورته شوی فایل باید عکس وي.',
'prescription_image_invalid_type' => 'د نسخې عکس باید JPG، JPEG، PNG یا WEBP وي.',
'prescription_image_max_size' => 'د نسخې عکس باید له ۵MB څخه لوی نه وي.',

'uploaded_image_not_saved' => 'پورته شوی عکس په سم ډول ذخیره نه شو.',
'python_environment_not_found_at' => 'د Python چاپېریال په دې ځای کې ونه موندل شو: :path',
'easyocr_script_not_found_at' => 'د EasyOCR سکریپټ په دې ځای کې ونه موندل شو: :path',
'could_not_start_easyocr_process' => 'د EasyOCR پروسه پیل نه شوه.',
'easyocr_process_failed' => 'د EasyOCR پروسه ناکامه شوه: :error',
'invalid_json_response_from_easyocr' => 'له EasyOCR څخه ناسم JSON ځواب راغی: :output',
'unknown_easyocr_error' => 'نامعلومه EasyOCR ستونزه.',
'prescription_scan_failed' => 'د نسخې سکین ناکام شو: :message',

'medicine_name_required' => 'د درمل نوم اړین دی.',
'medicine_name_must_be_array' => 'د درمل نوم باید د لېست په بڼه وي.',
'each_medicine_name_required' => 'د هر درمل نوم اړین دی.',
'each_medicine_name_must_be_text' => 'د هر درمل نوم باید متن وي.',
'each_medicine_name_max' => 'د هر درمل نوم باید له ۲۵۵ تورو زیات نه وي.',

'type_must_be_array' => 'د درمل ډول باید د لېست په بڼه وي.',
'each_type_must_be_text' => 'د هر درمل ډول باید متن وي.',
'each_type_max' => 'د هر درمل ډول باید له ۲۵۵ تورو زیات نه وي.',

'quantity_required' => 'مقدار اړین دی.',
'quantity_must_be_array' => 'مقدار باید د لېست په بڼه وي.',
'each_quantity_required' => 'د هر درمل مقدار اړین دی.',
'each_quantity_must_be_integer' => 'د هر درمل مقدار باید پوره عدد وي.',
'each_quantity_min' => 'د هر درمل مقدار باید لږ تر لږه ۱ وي.',

'dose_or_ml_must_be_array' => 'دوز یا اېم اېل باید د لېست په بڼه وي.',
'each_dose_or_ml_must_be_text' => 'هر دوز یا اېم اېل باید متن وي.',
'each_dose_or_ml_max' => 'هر دوز یا اېم اېل باید له ۲۵۵ تورو زیات نه وي.',

'instruction_must_be_array' => 'لارښوونه باید د لېست په بڼه وي.',
'each_instruction_must_be_text' => 'هره لارښوونه باید متن وي.',
'each_instruction_max' => 'هره لارښوونه باید له ۲۵۵ تورو زیات نه وي.',

'original_line_must_be_array' => 'اصلي OCR کرښه باید د لېست په بڼه وي.',
'each_original_line_must_be_text' => 'هره اصلي OCR کرښه باید متن وي.',

'prescription_confirmed_successfully' => 'نسخه په بریالیتوب سره تایید شوه.',

'medicine_reference_csv_not_found_at' => 'د درملو د مرجع CSV فایل په دې ځای کې ونه موندل شو: :path',
'medicine_reference_csv_empty' => 'د درملو د مرجع CSV فایل خالي دی.',
'csv_must_have_required_headers' => 'CSV باید دا سرلیکونه ولري: name,ml,type',
'medicine_reference_csv_no_valid_rows' => 'د درملو د مرجع CSV فایل کې معتبر درمل نشته.',
];