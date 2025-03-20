<?php

namespace App\Controllers;

use App\Models\GalleryModel;
use App\Models\TeamModel;
use App\Models\SettingsModel; 
use CodeIgniter\Controller;

class AdminController extends Controller
{
    protected $galleryModel;
    protected $teamModel;
    protected $settingsModel;

    public function __construct()
    {
        $this->galleryModel = new GalleryModel();
        $this->teamModel = new TeamModel();
        $this->settingsModel = new SettingsModel(); 
    }

    // Method untuk menampilkan halaman admin
    public function index()
    {
        $data['gallery'] = $this->galleryModel->findAll();
        $data['team'] = $this->teamModel->findAll();
        $data['settings'] = $this->settingsModel->first(); 
        return view('admin/homeadmin', $data);
    }

    // Method untuk upload gambar ke galeri
    public function uploadGallery()
    {
        $file = $this->request->getFile('image');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/gallery', $newName);

            $this->galleryModel->save(['image' => $newName]);
            return redirect()->to('/admin/dashboard')->with('success', 'Image uploaded successfully.');
        }

        return redirect()->to('/admin/dashboard')->with('error', 'Failed to upload image.');
    }

    // Method untuk menghapus gambar dari galeri
public function deleteGallery($id)
{
    $gallery = $this->galleryModel->find($id);
    if ($gallery) {
        // Hapus gambar dari server
        if (file_exists('uploads/gallery/' . $gallery['image'])) {
            unlink('uploads/gallery/' . $gallery['image']);
        }
        // Hapus gambar dari database
        $this->galleryModel->delete($id);
        return redirect()->to('/admin/dashboard')->with('success', 'Image deleted successfully.');
    }

    return redirect()->to('/admin/dashboard')->with('error', 'Image not found.');
}

    // Method untuk upload anggota tim
    public function uploadTeam()
    {
        $file = $this->request->getFile('photo');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/team', $newName);

            $this->teamModel->save([
                'name' => $this->request->getPost('name'),
                'position' => $this->request->getPost('position'),
                'bio' => $this->request->getPost('bio'),
                'photo' => $newName,
            ]);
            return redirect()->to('/admin/dashboard')->with('success', 'Team member added successfully.');
        }

        return redirect()->to('/admin/dashboard')->with('error', 'Failed to add team member.');
    }

    // Method untuk menghapus anggota tim
public function deleteTeam($id)
{
    // Temukan anggota tim berdasarkan ID
    $team = $this->teamModel->find($id);
    
    if ($team) {
        // Hapus foto anggota tim dari server
        if (file_exists('uploads/team/' . $team['photo'])) {
            unlink('uploads/team/' . $team['photo']);
        }
        
        // Hapus anggota tim dari database
        $this->teamModel->delete($id);
        
        // Redirect dengan pesan sukses
        return redirect()->to('/admin/dashboard')->with('success', 'Team member deleted successfully.');
    }

    // Redirect dengan pesan error jika anggota tim tidak ditemukan
    return redirect()->to('/admin/dashboard')->with('error', 'Team member not found.');
}
    // Method untuk update video
    public function updateVideo()
    {
        log_message('debug', 'Update video function called. Method: ' . $this->request->getMethod());

        if ($this->request->getMethod(true) === 'POST') {
            log_message('debug', 'Processing video update...');

            // Ambil link video dari input
            $inputVideo = $this->request->getPost('main_video');

            if (empty($inputVideo)) {
                return redirect()->to('/admin/dashboard')->with('error', 'Video URL is required.');
            }

            // Konversi URL ke format embed
            $embedVideo = $this->convertToEmbedUrl($inputVideo);

            if (!$embedVideo) {
                return redirect()->to('/admin/dashboard')->with('error', 'Invalid YouTube URL.');
            }

            // Ambil data lama dari database
            $existingData = $this->settingsModel->first();

            $data = ['main_video' => $embedVideo, 'updated_at' => date('Y-m-d H:i:s')];

            if ($existingData) {
                // Jika sudah ada data, lakukan update
                $this->settingsModel->update($existingData['id'], $data);
                log_message('debug', 'Video updated: ' . $embedVideo);
            } else {
                // Jika belum ada, buat data baru
                $this->settingsModel->insert($data);
                log_message('debug', 'New video inserted: ' . $embedVideo);
            }

            // Redirect ke halaman yang diinginkan setelah pembaruan
            return redirect()->to('/admin/dashboard')->with('success', 'Video updated successfully!');
        } else {
            log_message('error', 'Invalid request method: ' . $this->request->getMethod());
            return redirect()->to('/admin/dashboard')->with('error', 'Invalid request method.');
        }
    }

    // Method untuk mengonversi URL ke format embed
    private function convertToEmbedUrl($url)
    {
        $videoId = "";

        // Jika URL dalam format normal (https://www.youtube.com/watch?v=VIDEO_ID)
        if (strpos($url, "youtube.com/watch?v=") !== false) {
            parse_str(parse_url($url, PHP_URL_QUERY), $queryParams);
            $videoId = $queryParams['v'] ?? "";
        } 
        // Jika URL dalam format share (https://youtu.be/VIDEO_ID)
        else if (strpos($url, "youtu.be/") !== false) {
            $videoId = basename(parse_url($url, PHP_URL_PATH));
        }

        // Jika videoId ditemukan, kembalikan URL embed
        return $videoId ? "https://www.youtube.com/embed/" . $videoId : null;
    }
}