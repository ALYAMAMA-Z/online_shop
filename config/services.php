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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
    'mollie' => [
    'key' => env('MOLLIE_API_KEY'), // ← أو MOLLIE_KEY حسب ما في ملف .env
],

'paypal' => [
        'client_id' => env('PAYPAL_CLIENT_ID'),
        'secret' => env('PAYPAL_SECRET'),
        'sandbox' => env('PAYPAL_MODE') === 'sandbox',  // إذا كنت في بيئة Sandbox
        'currency' => env('PAYPAL_CURRENCY', 'USD'),
        'payment_action' => 'Sale', // أو 'Authorization' حسب الحاجة
        'notify_url' => '', // رابط الاستماع للإشعارات من PayPal
        'cancel_url' => '',  // رابط الإلغاء
        'return_url' => '',  // رابط العودة بعد الدفع
    ],


];
