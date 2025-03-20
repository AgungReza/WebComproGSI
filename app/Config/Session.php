<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Session extends BaseConfig
{
    public $driver = 'CodeIgniter\Session\Handlers\FileHandler';
    public string $cookieName = 'ci_session';
    public int $expiration = 7200; // Waktu sesi (2 jam)
    public string $savePath = WRITEPATH . 'session';
    public bool $matchIP = false;
    public int $timeToUpdate = 300;
    public bool $regenerateDestroy = false; 
    public $sessionSavePath = WRITEPATH . 'session'; 
}
