<?php

namespace App\Controllers\mahasiswa\dashboard;
use App\Controllers\BaseController;

class MahasiswaDashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('nim') || session()->get('role') != 'mahasiswa') {
            return redirect()->to('login');
        }
        
        return view('mahasiswa/dashboard/dashboard');
    }
}
