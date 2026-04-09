<?php
namespace App\Controllers;
use App\Controllers\BaseController;

class Resume extends BaseController
{
    public function index()
    {
        return view('v_resume'); // Pastikan file v_resume.php sudah ada
    }
}