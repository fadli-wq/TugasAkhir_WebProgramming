<?php
namespace App\Controllers\mahasiswa\pinjamruang;
use App\Controllers\BaseController;
use App\Models\ModelPinjamRuang;

class PinjamRuang2 extends BaseController
{
    public function cekStatusPeminjaman2()
    {
        $model = new ModelPinjamRuang();
        $data['peminjaman'] = $model->findAll();

        return view('mahasiswa/pinjamruang/status_pinjam_2', $data);
    }
}