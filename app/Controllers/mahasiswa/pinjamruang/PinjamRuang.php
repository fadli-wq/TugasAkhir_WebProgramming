<?php

namespace App\Controllers\mahasiswa\pinjamruang;

use App\Models\ModelPinjamRuang;
use CodeIgniter\Controller;

class Pinjamruang extends Controller
{
    public function index()
    {
        return view('mahasiswa/pinjamruang/pinjam_ruang_view');
    }

    public function submit()
    {
        // Ambil data dari form
        $nama = $this->request->getPost('nama');
        $nim = $this->request->getPost('nim');
        $ruangan = $this->request->getPost('ruangan');
        $tanggalMulai = $this->request->getPost('tanggal_mulai');
        $tanggalBerakhir = $this->request->getPost('tanggal_berakhir');

        // Cek apakah ruangan sudah dipinjam pada tanggal yang dimasukkan
        $model = new ModelPinjamRuang();
        $existingBooking = $model->where('ruangan', $ruangan)
            ->where('tanggal_berakhir >=', $tanggalMulai)
            ->where('tanggal_mulai <=', $tanggalBerakhir)
            ->whereIn('status', ['Approved'])
            ->first();

        if ($existingBooking) {
            return view('mahasiswa/pinjamruang/pengajuan_ditolak_ruang', [
                'nama' => $nama,
                'nim' => $nim,
                'ruangan' => $ruangan,
                'tanggalMulai' => $tanggalMulai,
                'tanggalBerakhir' => $tanggalBerakhir,
            ]);
        }

        // Cek apakah mahasiswa sudah memiliki peminjaman yang aktif
        $existingLoan = $model->where('nama', $nama)
            ->where('nim', $nim)
            ->where('status', 'Pending')
            ->first();

        if ($existingLoan) {
            return view('mahasiswa/pinjamruang/pengajuan_ditolak_nama', [
                'nama' => $nama,
                'nim' => $nim,
            ]);
        }
        // Jika tidak ada peminjaman yang aktif, lanjutkan penyimpanan data ke database
        $validationRules = [
            'nama' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
            'telp' => 'required',
            'ruangan' => 'required',
            'role' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_berakhir' => 'required',
            'keterangan' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('errors', $this->validator->getErrors());
            return redirect()->back()->withInput();
        }

        $timestamp = date('Y-m-d H:i:s');

        $data = [
            'nama' => $nama,
            'nim' => $nim,
            'prodi' => $this->request->getPost('prodi'),
            'telp' => $this->request->getPost('telp'),
            'ruangan' => $this->request->getPost('ruangan'),
            'role' => $this->request->getPost('role'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'tanggal_berakhir' => $this->request->getPost('tanggal_berakhir'),
            'keterangan' => $this->request->getPost('keterangan'),
            'status' => 'Pending',
            'timestamp' => $timestamp,
        ];

        if ($model->save($data)) {
            $id = $model->insertID();
            return redirect()->to("mahasiswa/pinjamruang/view_pengajuan/$id");
        } else {
            $errors = $model->errors();
            log_message('error', 'Database save error: ' . print_r($errors, true));
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function viewPengajuan($id)
    {
        $model = new ModelPinjamRuang();
        $data = $model->find($id);

        if (!$data) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Pengajuan tidak tersedia');
        }

        return view('mahasiswa/pinjamruang/view_pengajuan', ['data' => $data]);
    }

    public function cekStatusPeminjaman()
    {
        $nama = $this->request->getGet('nama');
        $nim = $this->request->getGet('nim');

        $model = new ModelPinjamRuang();
        $loan = $model->where('nama', $nama)
            ->where('nim', $nim)
            ->whereIn('status', ['Approved', 'Pending'])
            ->orderBy('tanggal_mulai', 'desc')
            ->first();

        if (!$loan) {
            return view('mahasiswa/pinjamruang/status_tidak_ditemukan', ['nama' => $nama, 'nim' => $nim]);
        }

        return view('mahasiswa/pinjamruang/status_pinjam', ['loan' => $loan]);
    }
}
