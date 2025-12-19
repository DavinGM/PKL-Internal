<?php

return [

    'default' => env('FILESYSTEM_DISK', 'local'),

    /**
     * disk = lemari 
     * folder = rak
     * file = barang
     */




    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app/private'), //File di simpan ke storage/app/private
            'serve' => true,
            'throw' => false,
            'report' => false,
        ],

        // Kursial
        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'), //FIle di simpan ke storage/app/public
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
            'report' => false,
            /**
             * ✔ avatar
             * ✔ foto profile  
             * ✔ gambar produk
             */
        ],

        // Bisa ada Bisa enggak buat di Server besar kaya AWS ( Amazon Web Services )
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
            'report' => false,
        ],

    ],

 

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
