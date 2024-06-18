<?php

namespace App\Controllers\admin\dashboard;

use App\Controllers\BaseController;

class AdminDashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('nim') || session()->get('role') != 'admin') {
            return redirect()->to('login');
        }
        
        return view('admin/dashboard/dashboard');
    }
}
