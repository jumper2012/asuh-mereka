<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '1757327450950761',
        'client_secret' => 'a1c01aeac3a0a0716c45c169054470ff',
        'redirect' => 'http://localhost:3030/callback/facebook',
    ],
    'twitter' => [
        'client_id' => 'TCGt042BKOE3h78438Ur8JydR',
        'client_secret' => 'o6fjP6quTerH5zIBe7LnqQsO1LG6QdxBfIymhu3rqyQXmtFBo3',
        'redirect' => 'http://localhost:3030/callback/twitter',
    ],
    'google' => [
        'client_id' => '739655426473-4jurtbhk0itmv8q6klnrm9bk1u0ls0sv.apps.googleusercontent.com',
        'client_secret' => 'OKKbH8J5Nc3UajpiVoaKZGQG',
        'redirect' => 'http://localhost:3030/callback/google',
    ],
];
