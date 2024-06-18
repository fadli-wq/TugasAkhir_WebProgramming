<?php

namespace App\Controllers\admin\baranghilang;
use App\Controllers\BaseController;

class BarangHilang extends BaseController
{
    private $model;

    function __construct()
    {
        $this->model = new \App\Models\ModelBarangHilang();
    }

    public function index()
    {
        $data['barang_hilang'] = $this->model->findAll();
        return view('admin/baranghilang/barang_hilang', $data);
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
}
