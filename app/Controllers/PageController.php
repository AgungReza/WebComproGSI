<?php

namespace App\Controllers;
use App\Models\PageModel;
use CodeIgniter\Controller;

class PageController extends Controller
{
    protected $pageModel;

    public function __construct()
    {
        $this->pageModel = new PageModel();
    }

    public function index()
    {
        $sortOrder = $this->request->getGet('sort') ?? 'DESC';
        $searchQuery = $this->request->getGet('search');

        $query = $this->pageModel->orderBy('event_date', $sortOrder);

        if (!empty($searchQuery)) {
            $query->like('title', $searchQuery)
                  ->orLike('location', $searchQuery)
                  ->orLike('institution', $searchQuery);
        }

        $data['works'] = $query->findAll();
        $data['sortOrder'] = $sortOrder;
        $data['searchQuery'] = $searchQuery;
        $data['success'] = session()->getFlashdata('success');
        $data['error'] = session()->getFlashdata('error');

        return view('admin/pageadmin', $data);
    }

    public function create()
    {
        log_message('debug', 'Create function called. Method: ' . $this->request->getMethod());

        if ($this->request->getMethod(true) === 'POST') { 
            log_message('debug', 'Request is POST. Processing data...');

            // Handle File Upload
            $imageFile = $this->request->getFile('image');
            $imagePath = null;

            if ($imageFile && $imageFile->isValid() && !$imageFile->hasMoved()) {
                $newName = $imageFile->getRandomName();
                $imageFile->move('uploads/', $newName);
                $imagePath = 'uploads/' . $newName;
            }

            // Konversi link video YouTube menjadi embedded link
            $videoUrl = $this->request->getPost('video');
            $embeddedVideoUrl = $this->convertToEmbedUrl($videoUrl);

            $data = [
                'title'       => $this->request->getPost('title'),
                'video'       => $embeddedVideoUrl,  // Simpan link yang sudah dikonversi
                'location'    => $this->request->getPost('location'),
                'institution' => $this->request->getPost('institution'),
                'event_date'  => $this->request->getPost('event_date'),
                'description' => $this->request->getPost('description'),
                'image'       => $imagePath,
                'created_at'  => date('Y-m-d H:i:s')
            ];

            if ($this->pageModel->insert($data)) {
                log_message('debug', 'Data successfully inserted.');
                return redirect()->to('/admin/works')->with('success', 'Event added successfully!');
            } else {
                log_message('error', 'Failed to insert data.');
                return redirect()->to('/admin/works')->with('error', 'Failed to add event.');
            }
        } else {
            log_message('error', 'Invalid request method: ' . $this->request->getMethod());
            return redirect()->to('/admin/works')->with('error', 'Invalid request method.');
        }
    }

    public function edit($id)
    {
        $data['work'] = $this->pageModel->find($id);
        return view('admin/editpage', $data);
    }

    public function update($id)
    {
        if ($this->request->getMethod() === 'POST') {
            // Konversi link video YouTube menjadi embedded link
            $videoUrl = $this->request->getPost('video');
            $embeddedVideoUrl = $this->convertToEmbedUrl($videoUrl);

            $data = [
                'title'       => $this->request->getPost('title'),
                'video'       => $embeddedVideoUrl,  // Simpan link yang sudah dikonversi
                'location'    => $this->request->getPost('location'),
                'institution' => $this->request->getPost('institution'),
                'event_date'  => $this->request->getPost('event_date'),
                'description' => $this->request->getPost('description'),
            ];

            $this->pageModel->update($id, $data);

            return redirect()->to('/admin/works')->with('success', 'Event updated successfully!');
        }
    }

    public function delete($id)
    {
        if ($this->pageModel->delete($id)) {
            return redirect()->to('/admin/works')->with('success', 'Event deleted successfully!');
        } else {
            return redirect()->to('/admin/works')->with('error', 'Failed to delete event.');
        }
    }

    public function showContent($id)
    {
        $data['work'] = $this->pageModel->find($id);

        if (!$data['work']) {
            return redirect()->to('/admin/works')->with('error', 'Event not found.');
        }

        return view('user/pagecontent', $data);
    }

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
