<?php

namespace App\Controllers;

class Logout extends BaseController
{
    public function logout()
    {
        session()->destroy();
        return redirect()->to('login');
    }
}