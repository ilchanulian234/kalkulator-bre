<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Portofolio extends BaseController
{
    public function index()
    {
        // Load view v_portofolio.php (sesuai nama file view kamu)
        return view('v_portofolio');
    }
}