<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PostModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class PostAdmin extends BaseController
{
    public function index()
    {
        $post = new PostModel();
        $data['posts'] = $post->findAll();
        echo view('admin/admin_post_list', $data);
    }

    //--------------------------------------------------------------

    public function preview($id)
    {
        $post = new PostModel();
        $data['post'] = $post->where('id', $id)->first();

        if(!$data['post']){
            throw PageNotFoundException::forPageNotFound();
        }
        echo view('post_detail', $data);
    }

    //--------------------------------------------------------------

    public function create()
    {
        // perform validation
        $validation =  \Config\Services::validation();
        $validation->setRules(['title' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        // if data is valid, save to database
        if($isDataValid){
            $post = new PostModel();
            $post->insert([
                "title" => $this->request->getPost('title'),
                "content" => $this->request->getPost('content'),
                "status" => $this->request->getPost('status'),
                "slug" => url_title($this->request->getPost('title'), '-', TRUE)
            ]);
            return redirect('admin/post');
        }

        // display create form
        echo view('admin/admin_post_create');
    }

    //--------------------------------------------------------------

    public function edit($id)
    {
        // get the article to edit
        $post = new PostModel();
        $data['post'] = $post->where('id', $id)->first();

        // validate the article data
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'title' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();

        // if data is valid, save to database
        if($isDataValid){
            $post->update($id, [
                "title" => $this->request->getPost('title'),
                "content" => $this->request->getPost('content'),
                "status" => $this->request->getPost('status')
            ]);
            return redirect('admin/post');
        }

        // display edit form
        echo view('admin/admin_post_update', $data);
    }

    //--------------------------------------------------------------

    public function delete($id)
    {
        $post = new PostModel();
        $post->delete($id);
        return redirect('admin/post');
    }
}