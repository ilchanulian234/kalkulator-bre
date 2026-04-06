<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TaskModel; // Pastikan memanggil Model di sini

class TaskController extends BaseController
{
    public function index()
    {
        // 1. Inisialisasi Model
        $model = new TaskModel();

        // 2. Ambil semua data dari tabel 'tasks'
        $data['semua_tugas'] = $model->findAll();

        // 3. Kirim data ke file View bernama 'task_view'
        return view('task_view', $data);
    }
}
