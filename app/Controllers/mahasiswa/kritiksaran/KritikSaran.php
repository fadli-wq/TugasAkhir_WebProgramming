<?php
namespace App\Controllers\mahasiswa\kritiksaran;

use App\Models\ModelKritikSaran;
use App\Controllers\BaseController;

class KritikSaran extends BaseController
{
    public function index()
    {
        return view('mahasiswa/kritiksaran/kritik_saran_view');
    }

    public function submit()
    {
        $modelKritikSaran = new ModelKritikSaran();
        $kritik_saran = $this->request->getPost('kritikSaran') ?? '';
        $rating = $this->request->getPost('rating') ?? 0;
        $upload_foto = '';

        // Handle file upload
        $file = $this->request->getFile('uploadFoto');
        $upload_foto = '';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getName();
            if ($file->move('uploads/', $newName)) {
                $upload_foto = $newName;
            } else {
                return redirect()->back()->with('error', 'Gagal memindahkan file yang diunggah.');
            }
        }

        $data = [
            'kritik_saran' => $kritik_saran,
            'rating' => $rating,
            'upload_foto' => $upload_foto,
        ];

        if ($modelKritikSaran->insert($data)) {
            $idKritikSaran = $modelKritikSaran->insertID();
            return view('mahasiswa/kritiksaran/terima_kasih', ['id' => $idKritikSaran]);
        } else {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function cekKritik($id)
    {
        $modelKritikSaran = new ModelKritikSaran();
        $data = $modelKritikSaran->find($id);

        if (!$data) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kritik dan saran tidak ditemukan');
        }

        return view('mahasiswa/kritiksaran/lihat_kritik_saran', $data);
    }
    
}