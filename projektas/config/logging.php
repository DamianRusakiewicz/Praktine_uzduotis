<?php

use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\SyslogUdpHandler;
use Monolog\Processor\PsrLogMessageProcessor;

return [

    'default' => env('LOG_CHANNEL', 'stack'),

    'deprecations' => [
        'channel' => env('LOG_DEPRECATIONS_CHANNEL', 'null'),
        'trace' => false,
    ],

    'channels' => [
        'stack' => [
            'driver' => 'stack',
            'channels' => ['single'],
            'ignore_exceptions' => false,
        ],

        'single' => [
            'driver' => 'single',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'replace_placeholders' => true,
        ],

        'daily' => [
            'driver' => 'daily',
            'path' => storage_path('logs/laravel.log'),
            'level' => env('LOG_LEVEL', 'debug'),
            'days' => 14,
            'replace_placeholders' => true,
        ],

        // Custom log channel for user registration events
        'user_registration' => [
            'driver' => 'daily',
            'path' => storage_path('logs/user_registration.log'),
            'level' => env('LOG_LEVEL', 'info'),
            'days' => 14,
            'replace_placeholders' => true,
        ],

        // Custom log channel for user login events
        'user_login' => [
            'driver' => 'daily',
            'path' => storage_path('logs/user_login.log'),
            'level' => env('LOG_LEVEL', 'info'),
            'days' => 14,
            'replace_placeholders' => true,
        ],

    ],

];
