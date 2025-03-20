<?php

namespace App\Models;

use CodeIgniter\Model;

class PageModel extends Model
{
    protected $table      = 'works';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title', 'video', 'location', 'institution', 'event_date', 'description', 'image', 'created_at'
    ];
    
}
