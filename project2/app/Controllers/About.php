<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class About extends BaseController
{
    public function index()
    {
        // Load view v_about.php yang sudah extend layout
        // CI4 otomatis akan gabungkan dengan layouts/template-home
        return view('v_about');
    }
}