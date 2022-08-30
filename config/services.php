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
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'github' => [
        'client_id' => '24fbd0edd46019058da7', //Github API
        'client_secret' => '4500e6ab7a9bb70608600fbdee37969276bb0685', //Github Secret
        'redirect' => 'https://localhost:8000/login/github/callback',
     ],
     'google' => [
        'client_id' => '405637323426-hkk2blln15c95nj4g4j48s5ms07op8om.apps.googleusercontent.com', //Google API
        'client_secret' => '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', //Google Secret
        'redirect' => 'https://tmdt.net/login/google/callback',
     ],
     'facebook' => [
        'client_id' => '1994325760751305', //Facebook API
        'client_secret' => '0b86eb3edb678e69999274bd69517b8e', //Facebook Secret
        'redirect' => 'https://tmdt.net/login/facebook/callback',
     ],

];
