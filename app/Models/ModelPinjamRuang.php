<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPinjamRuang extends Model
{
    protected $table = 'peminjaman_ruang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'nim', 'prodi', 'tanggal_mulai', 'tanggal_berakhir', 'ruangan','keterangan','status', 'timestamp', 'role', 'telp'];
}