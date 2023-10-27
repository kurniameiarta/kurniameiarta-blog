<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\Posts;
use Ramsey\Uuid\Uuid;
use Cocur\Slugify\Slugify;

class Post extends BaseController
{
    protected $PostModel;
    protected $uuid;
    protected $slug;
    protected $helpers = ['form'];
    public function __construct()
    {
        $this->PostModel = new Posts();
        $this->uuid = Uuid::uuid4();
        $this->slug = new Slugify();
        helper('my_helper');
    }

    public function index()
    {
        $data = [
            'title' => 'Post',
            'active' => 'post',
            'posts' => $this->PostModel->getPosts()
        ];
        return view('dashboard/post', $data);
    }

    public function view($slug)
    {
        $data = [
            'title' => 'View Post',
            'active' => 'post',
            'post' => $this->PostModel->getPostBySlug($slug)
        ];
        return view('dashboard/view_post', $data);
    }

    public function add()
    {
        $data = [
            'title' => 'Add Post',
            'active' => 'post'
        ];
        return view('dashboard/add_post', $data);
    }

    public function store()
    {
        dd($this->request->getPost());
        $validate = $this->validationForm();

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = [
            'id_post' => $this->uuid,
            'title' => $this->request->getPost('title'),
            'slug' => $this->slug->slugify($this->request->getVar('title')),
            'body' => $this->request->getPost('body'),
            'status' => 'draft',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        // dd($data);
        $this->PostModel->addPost($data);
        return redirect()->to('/admin/post')->with('success', 'Post has been added');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Edit Post',
            'active' => 'post',
            'post' => $this->PostModel->getPostBySlug($slug)
        ];
        return view('dashboard/edit_post', $data);
    }

    public function update($id)
    {
        $validate = $this->validationForm();

        if (!$validate) {
            return redirect()->back()->withInput();
        }

        $data = [
            'title' => $this->request->getPost('title'),
            'slug' => $this->slug->slugify($this->request->getVar('title')),
            'body' => $this->request->getPost('body'),
            'status' => $this->request->getPost('status'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        // dd($data, $this->request->getPost('id_post'));
        // dd($data);
        $this->PostModel->updatePost($id, $data);
        return redirect()->to('/admin/post')->with('success', 'Post has been updated');
    }

    public function updateStatus($id)
    {
        $data = [
            'status' => $this->request->getPost('status'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $this->PostModel->updatePost($id, $data);
        return redirect()->to('/admin/post')->with('success', 'Post has been updated');
    }



    public function delete($id)
    {
        $this->PostModel->deletePost($id);
        return redirect()->to('/admin/post')->with('success', 'Post has been deleted');
    }

    private function validationForm()
    {
        $validation = [
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Title is required'
                ]
            ],
            'body' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Body is required'
                ]
            ]
        ];
        return $this->validate($validation);
    }
}
