<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'paypal' => [
        'client' => env('PAYPAL_CLIENT'),
        'secret' => env('PAYPAL_SECRET'),
        'mode' => env('PAYPAL_MODE'),
        'currency' => env('PAYPAL_CURRENCY'),
        'client_prod' => env('PAYPAL_CLIENT_PROD'),
        'secret_prod' => env('PAYPAL_SECRET_PROD'),
        'mode_prod' => env('PAYPAL_MODE_PROD'),
    ],

];
