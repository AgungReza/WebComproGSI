<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    protected $table      = 'settings';
    protected $primaryKey = 'id';
    protected $allowedFields = ['main_video', 'created_at', 'updated_at'];
}
