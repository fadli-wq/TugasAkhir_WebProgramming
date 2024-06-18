<?php

namespace App\Controllers\admin\dashboard;

use App\Controllers\BaseController;
use App\Models\ModelPinjamRuang;
use App\Models\ModelBarangHilang;
use App\Models\ModelKritikSaran;

class AdminDashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('nim') || session()->get('role') != 'admin') {
            return redirect()->to('login');
        }

        $modelPinjamRuang = new ModelPinjamRuang();
        $modelBarangHilang = new ModelBarangHilang();
        $modelKritikSaran = new ModelKritikSaran();

        $data = [
            'peminjaman_ruangan' => $modelPinjamRuang->countAllResults(),
            'barang_hilang' => $modelBarangHilang->countAllResults(),
            'kritik_saran' => $modelKritikSaran->countAllResults()
        ];

        return view('admin/dashboard/dashboard', $data);
    }
}
