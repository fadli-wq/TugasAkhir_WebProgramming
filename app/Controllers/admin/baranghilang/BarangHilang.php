<?php

namespace App\Controllers\admin\baranghilang;

use App\Controllers\BaseController;
use App\Models\ModelBarangHilang;

class BarangHilang extends BaseController
{
    private $model;
    private $rejectedModel;

    function __construct()
    {
        $this->model = new \App\Models\ModelBarangHilang();
        $this->rejectedModel = new \App\Models\ModelRejectedBarangHilang();
    }

    public function index()
    {
        $perPage = 6;
        $currentPage = $this->request->getVar('page_barang_hilang') ?: 1;
        $data = [
            'barang_hilang' => $this->model->where('status', 'disetujui')->paginate(6, 'barang_hilang'),
            'pager' => $this->model->pager,
            'currentPage' => $currentPage,
            'perPage' => $perPage,
        ];
        return view('admin/baranghilang/barang_hilang', $data);
    }

    public function cekBarang()
    {
        $perPage = 6;
        $currentPage = $this->request->getVar('page_barang_hilang') ?: 1;
        $model = new ModelBarangHilang();
        $data = [
            'barang_hilang' => $model->where('status', 'menunggu')->where('status_pengembalian', 'belum')->paginate(5, 'barang_hilang'),
            'pager' => $model->pager,
            'currentPage' => $currentPage,
            'perPage' => $perPage,
        ];
        return view('admin/baranghilang/cek_barang_hilang', $data);
    }
    public function updateStatus()
    {
        $id = $this->request->getPost('id');
        $status = $this->request->getPost('status');

        if ($id && $status) {
            $updateData = [
                'status_pengembalian' => $status
            ];

            if ($this->model->update($id, $updateData)) {
                $result = [
                    'sukses' => true,
                    'message' => 'Status pengembalian berhasil diperbarui.'
                ];
            } else {
                $result = [
                    'sukses' => false,
                    'error' => 'Gagal memperbarui status pengembalian.'
                ];
            }
        } else {
            $result = [
                'sukses' => false,
                'error' => 'ID atau status tidak valid.'
            ];
        }

        return json_encode($result);
    }
    public function approve()
    {
        $id = $this->request->getPost('id');
        $status = $this->request->getPost('status');
        $currentPage = $this->request->getPost('currentPage');

        if ($id && $status) {
            $updateData = [
                'status' => $status
            ];

            if ($this->model->update($id, $updateData)) {
                $hasil['sukses'] = "Laporan barang hilang berhasil <strong>disetujui</strong>.";
                $hasil['error'] = false;
            } else {
                $hasil['error'] = "Gagal memperbarui status laporan barang hilang.";
                $hasil['sukses'] = false;
            }
        } else {
            $hasil['error'] = "ID atau status tidak valid.";
            $hasil['sukses'] = false;
        }

        return redirect()->to('admin/barang_hilang/cek?page_barang_hilang=' . $currentPage)->with('hasil', $hasil);
    }

    public function reject()
    {
        $id = $this->request->getPost('id');
        $status = $this->request->getPost('status');
        $currentPage = $this->request->getPost('currentPage');

        if ($id && $status) {
            $barang = $this->model->find($id);

            if ($barang) {
                $this->rejectedModel->insert([
                    'nama_barang' => $barang['nama_barang'],
                    'tempat_ditemukan' => $barang['tempat_ditemukan'],
                    'contact_person' => $barang['contact_person'],
                    'nama_file' => $barang['nama_file'],
                    'status' => 'ditolak'
                ]);
                if ($this->model->delete($id)) {
                    $hasil['sukses'] = "Laporan barang hilang berhasil <strong>ditolak dan dihapus</strong>.";
                    $hasil['error'] = false;
                } else {
                    $hasil['error'] = "Gagal memperbarui status laporan barang hilang.";
                    $hasil['sukses'] = false;
                }
            } else {
                $hasil['error'] = "Data barang hilang tidak ditemukan.";
                $hasil['sukses'] = false;
            }
        } else {
            $hasil['error'] = "ID atau status tidak valid.";
            $hasil['sukses'] = false;
        }

        return redirect()->to('admin/barang_hilang/cek?page_barang_hilang=' . $currentPage)->with('hasil', $hasil);
    }
}
