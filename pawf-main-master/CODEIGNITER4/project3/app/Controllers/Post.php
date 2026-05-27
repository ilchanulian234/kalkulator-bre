<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PostModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Post extends BaseController
{
    protected $postModel;

    public function __construct()
    {
        // Memanggil model sekali di sini agar bisa dipakai di semua fungsi
        $this->postModel = new PostModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Artikel',
            'posts' => $this->postModel->where('status', 'published')->orderBy('created_at', 'DESC')->findAll()
        ];

        return view('post', $data);
    }

    public function viewPost($slug)
    {
        $data['post'] = $this->postModel->where([
            'slug'   => $slug,
            'status' => 'published'
        ])->first();

        // Jika data tidak ditemukan, lempar ke halaman 404
        if (!$data['post']) {
            throw PageNotFoundException::forPageNotFound("Artikel dengan judul $slug tidak ditemukan.");
        }

        return view('post_detail', $data);
    }
}
