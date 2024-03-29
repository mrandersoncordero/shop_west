<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been set up for each driver as an example of the required values.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        'download_datainfo' => [
            'driver' => 'local',
            'root' => storage_path('app/public/download_datainfo'),
            'url' => env('APP_URL') . '/download_datainfo',
            'visibility' => 'public',
        ],

        'products' => [
            'driver' => 'local',
            'root' => storage_path('app/public/products'),
            'url' => env('APP_URL') . '/product',
            'visibility' => 'public',
        ],

        'palette_color' => [
            'driver' => 'local',
            'root' => storage_path('app/public/palette_color'),
            'url' => env('APP_URL') . '/palette_color',
            'visibility' => 'public',
        ],

        'proof_of_payment' => [
            'driver' => 'local',
            'root' => storage_path('app/public/proof_of_payment'),
            'url' => env('APP_URL').'/proof_of_payment',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        # public_path('storage') => storage_path('app/public'),
        public_path('download_datainfo') => storage_path('app/public/download_datainfo'),
        public_path('product') => storage_path('app/public/products'),
        public_path('proof_of_payment') => storage_path('app/public/proof_of_payment'),
        public_path('palette_color') => storage_path('app/public/palette_color'),
    ],

];
