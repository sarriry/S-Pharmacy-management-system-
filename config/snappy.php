<?php

return [

    'pdf' => [
        'enabled' => true,

        'binary'  => env('WKHTML_PDF_BINARY'),

        'timeout' => false,

        'options' => [
            'enable-local-file-access' => true,

            // Ignore CDN/network loading errors
            'load-error-handling' => 'ignore',
            'load-media-error-handling' => 'ignore',

            // PDF layout
            'margin-top' => '10mm',
            'margin-bottom' => '10mm',
            'margin-left' => '0',
            'margin-right' => '0',

            // Encoding
            'encoding' => 'UTF-8',

            // Optional
            'no-outline' => true,
            'lowquality' => true,
        ],

        'env' => [],
    ],

    'image' => [
        'enabled' => true,

        'binary'  => env('WKHTML_IMG_BINARY'),

        'timeout' => false,

        'options' => [
            'enable-local-file-access' => true,
            'load-error-handling' => 'ignore',
            'load-media-error-handling' => 'ignore',
            'encoding' => 'UTF-8',
        ],

        'env' => [],
    ],

];