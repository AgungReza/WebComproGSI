<?php

namespace App\Controllers;

use App\Models\GalleryModel;
use App\Models\SettingsModel;
use App\Models\TeamModel;
use CodeIgniter\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $galleryModel = new GalleryModel();
        $settingsModel = new SettingsModel();
        $teamModel = new TeamModel();

        // Ambil data dari database
        $data['gallery'] = $galleryModel->findAll();
        $data['video'] = $settingsModel->first(); 
        $data['team'] = $teamModel->findAll();

        return view('user/home', $data); 
    }
    public function contact()
    {
        return view('user/contactus');
    }
    public function about()
    {
        return view('user/abaut');
    }
}
