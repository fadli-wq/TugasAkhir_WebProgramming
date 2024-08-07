<?php

namespace App\Controllers\mahasiswa\baranghilang;

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
        $data = [
            'barang_hilang' => $this->model->where('status_pengembalian', 'Belum')->where('status', 'disetujui')->paginate(6, 'barang_hilang'),
            'pager' => $this->model->pager
        ];
        return view('mahasiswa/baranghilang/barang_hilang', $data);
    }

    public function form()
    {
        return view('mahasiswa/baranghilang/form_barang_hilang');
    }

    public function simpan()
    {
        $validasi = \Config\Services::validation();
        $aturan = [
            'nama' => [
                'label' => 'Nama Barang',
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 1 karakter'
                ]
            ],
            'tempat' => [
                'label' => 'Tempat Ditemukan',
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 1 karakter'
                ]
            ],
            'contact' => [
                'label' => 'Contact Person',
                'rules' => 'required|min_length[1]',
                'errors' => [
                    'required' => '{field} wajib diisi',
                    'min_length' => '{field} minimal 1 karakter'
                ]
            ],
            'fupload' => [
                'label' => 'Foto Barang',
                'rules' => 'uploaded[fupload]|max_size[fupload,10240]|mime_in[fupload,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih foto barang terlebih dahulu',
                    'max_size' => 'Ukuran foto barang maksimal 10MB',
                    'mime_in' => 'Format foto barang harus JPEG atau PNG'
                ]
            ],
        ];

        $validasi->setRules($aturan);
        if ($validasi->withRequest($this->request)->run()) {
            $nama = $this->request->getPost('nama');
            $tempat = $this->request->getPost('tempat');
            $contact = $this->request->getPost('contact');

            $file = $this->request->getFile('fupload');
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move('uploads', $newName);
                // Simpan data ke database
                $data = [
                    'nama_barang' => $nama,
                    'tempat_ditemukan' => $tempat,
                    'contact_person' => $contact,
                    'nama_file' => $newName,
                    'status_pengembalian' => 'Belum',
                    'status' => 'Menunggu'
                ];
                if ($this->model->insert($data)) {
                    $hasil['sukses'] = "Berhasil melaporkan barang hilang";
                    $hasil['error'] = false;
                } else {
                    $hasil['error'] = "Gagal menyimpan data ke database";
                    $hasil['sukses'] = false;
                }
            } else {
                $hasil['error'] = "Gagal mengunggah foto";
                $hasil['sukses'] = false;
            }
        } else {
            $hasil['error'] = $validasi->listErrors();
            $hasil['sukses'] = false;
        }

        return redirect()->back()->with('hasil', $hasil);
    }
}
