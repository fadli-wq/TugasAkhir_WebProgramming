<?php

namespace App\Controllers\admin\pinjamruang;

use App\Controllers\BaseController;

use App\Models\ModelPinjamRuang;

class PinjamRuang extends BaseController
{
    public function index()
    {
        $model = new ModelPinjamRuang();
        $currentPage = $this->request->getVar('page_peminjaman') ?: 1;
        $data = [
            'peminjaman' => $model->paginate(7, 'peminjaman'),
            'pager' => $model->pager,
            'currentPage' => $currentPage
        ];

        return view('admin/pinjamruang/pinjam_ruang_view', $data);
    }

    public function update()
    {
        $model = new ModelPinjamRuang();
        $id = $this->request->getPost('id');
        $nama = $this->request->getPost('nama');
        $nim = $this->request->getPost('nim');
        $ruangan = $this->request->getPost('ruangan');
        $status = $this->request->getPost('status');
        $timestamp = $this->request->getPost('timestamp');
        $currentPage = $this->request->getPost('currentPage');

        // Validation rules
        $validationRules = [
            'id' => 'required',
            'nama' => 'required',
            'nim' => 'required',
            'ruangan' => 'required',
            'status' => 'required',
            'timestamp' => 'required',
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('error', 'Semua field harus diisi.');
            return redirect()->to(base_url('admin/pinjam_ruang'))->withInput();
        }

        // Menentukan kriteria yang spesifik
        $existingData = $model->find($id);

        if (empty($existingData)) {
            session()->setFlashdata('error', "Data dengan nama $nama dan NIM $nim tidak ditemukan.");
            return redirect()->to(base_url('admin/pinjam_ruang'));
        }

        if ($existingData['status'] != $status) {
            $updateData = ['status' => $status];

            if ($model->update($existingData['id'], $updateData)) {
                session()->setFlashdata('notification', "Status Peminjaman untuk $nama dengan NIM $nim berhasil diperbarui.");
            } else {
                session()->setFlashdata('error', 'Terjadi kesalahan saat memperbarui data.');
            }
        } else {
            session()->setFlashdata('notification', "Status Peminjaman untuk $nama dengan NIM $nim sudah terupdate.");
        }

        return redirect()->to(base_url('admin/pinjam_ruang?page_peminjaman=' . $currentPage));
    }
}
