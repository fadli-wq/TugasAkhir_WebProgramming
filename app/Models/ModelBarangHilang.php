<?php
namespace App\Models;

use CodeIgniter\Model;

class ModelBarangHilang extends Model
{
    protected $table = 'barang_hilang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_barang', 'tempat_ditemukan', 'contact_person', 'nama_file', 'status_pengembalian'];
    public function getAll()
    {
        return $this->findAll();
    }
}
?>