<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Would you like the install button to appear on all pages?
      Set true/false
    |--------------------------------------------------------------------------
    */

    'install-button' => false,

    /*
    |--------------------------------------------------------------------------
    | PWA Manifest Configuration
    |--------------------------------------------------------------------------
    |  php artisan erag=>pwa-update-manifest
    */

    'manifest' => [
        "name" => "Pemdes Wonoyoso",
        "short_name" => "Pemdes Wonoyoso",
        "theme_color" => "#0023D2",
        "background_color" => "#0023D2",
        "display" => "fullScreen",
        "orientation" => "portrait",
        "scope" => "/",
        "start_url" => "/",
        "icons" => [
            [
                "src" => "images/icons/icon-72x72.png",
                "sizes" => "72x72",
                "type" => "image/png"
            ],
            [
                "src" => "images/icons/icon-96x96.png",
                "sizes" => "96x96",
                "type" => "image/png"
            ],
            [
                "src" => "images/icons/icon-128x128.png",
                "sizes" => "128x128",
                "type" => "image/png"
            ],


            [
                "src" => "images/icons/icon-512x512.png",
                "sizes" => "512x512",
                "type" => "image/png"
            ]
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Debug Configuration
    |--------------------------------------------------------------------------
    | Toggles the application's debug mode based on the environment variable
    */

    'debug' => env('APP_DEBUG', false),

];
