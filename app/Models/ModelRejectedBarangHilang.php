<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRejectedBarangHilang extends Model
{
    protected $table = 'rejected_barang_hilang';
    protected $allowedFields = ['nama_barang', 'tempat_ditemukan', 'contact_person', 'nama_file', 'status'];
}
