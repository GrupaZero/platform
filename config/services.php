<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key'    => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => 'App\User',
        'secret' => '',
    ],

    'google' => [
        'client_id'     => env('OAUTH_GOOGLE_CLIENT_ID'),
        'client_secret' => env('OAUTH_GOOGLE_CLIENT_SECRET'),
    ],

    'facebook' => [
        'client_id'     => env('OAUTH_FB_CLIENT_ID'),
        'client_secret' => env('OAUTH_FB_CLIENT_SECRET'),
    ],

    'twitter' => [
        'client_id'     => env('OAUTH_TWITTER_CLIENT_ID'),
        'client_secret' => env('OAUTH_TWITTER_CLIENT_SECRET'),
    ],

];
