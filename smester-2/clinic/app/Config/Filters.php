<?php

namespace Config;

use App\Filters\AuthFilter;
use App\Filters\AdminFilter;
use App\Filters\OperatorFilter;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'     => CSRF::class,
        'toolbar'  => DebugToolbar::class,
        'honeypot' => Honeypot::class,
        'authfilter' => AuthFilter::class,
        'adminfilter' => AdminFilter::class,
        'operatorfilter' => OperatorFilter::class,
    ];
    // public $aliases = [
    //     'csrf'     => \CodeIgniter\Filters\CSRF::class,
    //     'toolbar'  => \CodeIgniter\Filters\DebugToolbar::class,
    //     'honeypot' => \CodeIgniter\Filters\Honeypot::class,
    //     'authfilter' => \App\Filters\AuthFilter::class
    // ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    // public $globals = [
    //     'before' => [
    //         'csrf',
    //         'authfilter' => [
    //             'except' => [
    //                 'login/*',
    //                 'logout/*'
    //             ]
    //         ]
    //     ],
    //     'after'  => [
    //         'toolbar',
    //         //'honeypot'
    //     ],
    // ];
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [];
}
