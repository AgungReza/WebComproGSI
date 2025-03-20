<?php

namespace App\Controllers;

class HomeAdmin extends BaseController
{
    public function homeadmin(): string
    {
        return view('admin/homeadmin.php');
    }
    public function pageadmin(): string
    {
        return view('admin/pageadmin.php');
    }
}