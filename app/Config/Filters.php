<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use App\Filters\AuthFilter;
use App\Filters\NoAuthFilter;

class Filters extends BaseConfig
{
    public $aliases = [
        'csrf'    => \CodeIgniter\Filters\CSRF::class,
        'toolbar' => \CodeIgniter\Filters\DebugToolbar::class,
        'auth'    => \App\Filters\AuthFilter::class,   
        'noauth'  => \App\Filters\NoAuthFilter::class, 
    ];

    public $globals = [
        'before' => [
            'auth' => ['except' => ['login', 'admin/login', 'admin/register', 'logout', '/','works','workdetail/*','contact','about']], 
            'noauth' => ['only' => ['login', 'admin/login', 'admin/register']], 
        ],
        'after' => [
            'toolbar',
        ],
    ];
}
