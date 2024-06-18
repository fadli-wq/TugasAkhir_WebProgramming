<?php

namespace App\Controllers\admin\pinjamruang;

use App\Controllers\BaseController;

use App\Models\ModelPinjamRuang;

class PinjamRuang extends BaseController
{
    public function index()
    {
        $model = new ModelPinjamRuang();
        $data['peminjaman'] = $model->findAll();

        return view('admin/pinjamruang/pinjam_ruang_view', $data);
    }

    public function update()
    {
        $model = new ModelPinjamRuang();
        $nama = $this->request->getPost('nama');
        $nim = $this->request->getPost('nim');
        $ruangan = $this->request->getPost('ruangan');
        $status = $this->request->getPost('status');

        // Log input data for debugging
        error_log("Nama: $nama, NIM: $nim, Ruangan: $ruangan, Status: $status");

        if (empty($nama) || empty($nim) || empty($ruangan) || empty($status)) {
            session()->setFlashdata('error', 'Semua field harus diisi.');
            return redirect()->to(base_url('admin/pinjam_ruang'));
        }

        // Menentukan kriteria yang spesifik
        $existingData = $model->where('nama', $nama)
            ->where('nim', $nim)
            ->where('ruangan', $ruangan)
            ->orderBy('timestamp', 'DESC')
            ->findAll();

        // Log retrieved data for debugging
        error_log("Existing Data: " . print_r($existingData, true));

        if (empty($existingData)) {
            session()->setFlashdata('error', "Data dengan nama $nama dan NIM $nim tidak ditemukan.");
            return redirect()->to(base_url('admin/pinjam_ruang'));
        }

        $updatedCount = 0;
        foreach ($existingData as $data) {
            if ($data['status'] != $status) {
                $updateData = ['status' => $status];

                // Log update data for debugging
                error_log("Updating ID: {$data['id']} with Data: " . print_r($updateData, true));

                $model->update($data['id'], $updateData);
                $updatedCount++;
            }
        }

        if ($updatedCount > 0) {
            session()->setFlashdata('notification', "Anda telah berhasil memperbarui $updatedCount Status Peminjaman untuk $nama dengan NIM $nim.");
        } else {
            session()->setFlashdata('notification', "Semua Status Peminjaman untuk $nama dengan NIM $nim sudah terupdate.");
        }

        return redirect()->to(base_url('admin/pinjam_ruang'));
    }
}
