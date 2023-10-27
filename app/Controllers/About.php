<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class About extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'About',
            'active' => 'about',
            'routeName' => $this->request->uri->getSegment(1),
        ];
        return view('about', $data);
    }
}
