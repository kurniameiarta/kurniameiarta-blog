<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Contact extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Contact',
            'active' => 'contact',
            'routeName' => $this->request->uri->getSegment(1),
        ];
        return view('contact', $data);
    }
}
