<?php 

namespace App\Controllers\mahasiswa\jadwalruang;

use App\Models\ModelJadwalRuang;
use CodeIgniter\Controller;

class JadwalRuang extends Controller
{
    public function index()
    {
        return view('mahasiswa/jadwalruang/jadwal_ruang');
    }

    public function hasil()
    {
        $jadwalModel = new ModelJadwalRuang();

        $ruangan = $this->request->getPost('ruangan');
        $dari_tanggal = $this->request->getPost('dari_tanggal');
        $sampai_tanggal = $this->request->getPost('sampai_tanggal');

        $data['ruangan'] = $ruangan;
        $data['dari_tanggal'] = $dari_tanggal;
        $data['sampai_tanggal'] = $sampai_tanggal;
        $data['jadwal'] = $jadwalModel->getJadwal($ruangan, $dari_tanggal, $sampai_tanggal);

        return view('mahasiswa/jadwalruang/jadwal_hasil', $data);
    }
}
?>