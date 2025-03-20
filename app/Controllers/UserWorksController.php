<?php

namespace App\Controllers;

use App\Models\PageModel;
use CodeIgniter\Controller;

class UserWorksController extends Controller
{
    protected $pageModel;

    public function __construct()
    {
        $this->pageModel = new PageModel();
    }

    public function index()
    {
        $sortOrder = $this->request->getGet('sort') ?? 'DESC'; // Default: DESC
        $searchQuery = $this->request->getGet('search');

        $query = $this->pageModel->orderBy('event_date', $sortOrder);

        if (!empty($searchQuery)) {
            $query->groupStart()
                ->like('title', $searchQuery)
                ->orLike('location', $searchQuery)
                ->orLike('institution', $searchQuery)
            ->groupEnd();
        }

        $data = [
            'works'       => $query->findAll(),
            'sortOrder'   => $sortOrder,
            'searchQuery' => $searchQuery
        ];

        return view('user/works', $data); 
    }

    public function showContent($id)
    {
        if (!is_numeric($id)) {
            return redirect()->to('/works')->with('error', 'Invalid event ID.');
        }

        $data['work'] = $this->pageModel->find($id);

        if (!$data['work']) {
            return redirect()->to('/works')->with('error', 'Event not found.');
        }

        return view('user/workdetail', $data);
    }
}
