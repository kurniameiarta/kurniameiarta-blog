<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;

class Post extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Post',
            'active' => 'post'
        ];
        return view('dashboard/post', $data);
    }
}
