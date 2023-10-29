<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $postModel = new \App\Models\Posts();

        $data = [
            'title' => 'Dashboard',
            'active' => 'home',
            'activeChild' => '',
            'routeName' => $this->request->getPath(),
            'totalPosts' => count($postModel->getPosts()),
            'draftPosts' => count($postModel->getDraftPosts()),
            'publishedPosts' => count($postModel->getPublishedPosts()),
        ];
        return view('dashboard/home', $data);
    }
}
