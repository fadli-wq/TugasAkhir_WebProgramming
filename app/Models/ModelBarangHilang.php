<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBarangHilang extends Model
{
    protected $table = 'barang_hilang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_barang', 'tempat_ditemukan', 'contact_person', 'nama_file', 'status_pengembalian', 'status'];
    public function getAll()
    {
        return $this->findAll();
    }
    public function getMenunggu()
    {
        return $this->where('status', 'menunggu')->where('status_pengembalian', 'belum')->findAll();
    }
}
