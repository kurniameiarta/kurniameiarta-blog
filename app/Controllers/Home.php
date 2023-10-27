<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $postModel = new \App\Models\Posts();
        // humanize

        $data = [
            'title' => 'Home',
            'active' => 'home',
            'routeName' => $this->request->getPath(),
            'posts' => $postModel->getLastPosts()
        ];
        return view('home', $data);
    }

    public function detail($slug)
    {
        helper('my_helper');
        $postModel = new \App\Models\Posts();
        $data = [
            'title' => 'Detail Post',
            'active' => 'post',
            'post' => $postModel->getPostBySlug($slug)
        ];
        return view('detail_post', $data);
    }
}
