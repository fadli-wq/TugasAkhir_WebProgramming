<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJadwalRuang extends Model
{
    protected $table = 'peminjaman_ruang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'nim', 'prodi', 'tanggal_mulai', 'tanggal_berakhir', 'ruangan', 'keterangan', 'status', 'timestamp', 'role', 'telp', 'notif_status'];

    public function getJadwal($ruangan, $dari_tanggal, $sampai_tanggal)
    {
        return $this->where('ruangan', $ruangan)
                    ->groupStart() // Memulai grup kondisi
                        ->where('tanggal_mulai >=', $dari_tanggal)
                        ->where('tanggal_mulai <=', $sampai_tanggal)
                        ->where('status', 'approved')
                    ->groupEnd()
                    ->orGroupStart()
                        ->where('tanggal_berakhir >=', $dari_tanggal)
                        ->where('tanggal_berakhir <=', $sampai_tanggal)
                        ->where('ruangan', $ruangan)
                        ->where('status', 'approved')
                    ->groupEnd()
                    ->findAll();
    }
}
