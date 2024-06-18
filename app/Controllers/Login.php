<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $err = '';
        $ModelUser = new \App\Models\ModelUser();
        $login = $this->request->getPost('login');

        if ($login) {
            $nim = $this->request->getPost('nim');
            $password = $this->request->getPost('password');

            if ($nim == '' or $password == '') {
                $err = "NIM atau Password Kosong";
            }

            if (empty($err)) {
                $dataUser = $ModelUser->where("nim", $nim)->first();

                if (!$dataUser) {
                    $err = "Nim tidak ditemukan";
                } elseif ($dataUser['password'] != $password) {
                    $err = "Password salah";
                }
            }

            // If there are no errors, set session data and redirect based on role
            if (empty($err)) {
                $dataSesi = [
                    'id' => $dataUser['id'],
                    'nim' => $dataUser['nim'],
                    'password' => $dataUser['password'],
                    'role' => $dataUser['role'],
                ];
                session()->set($dataSesi);
                if ($dataUser['role'] == 'admin') {
                    return redirect()->to('admin/dashboard');
                } elseif ($dataUser['role'] == 'mahasiswa') {
                    return redirect()->to('mahasiswa/dashboard');
                }
            }

            // If there's an error, set flash data and redirect to the login page
            if ($err) {
                session()->setFlashdata('nim', $nim);
                session()->setFlashdata('error', $err);
                return redirect()->to("login");
            }
        }

        return view('login');
    }
}
?>