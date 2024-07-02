<?php

namespace App\Controllers\admin\kritiksaran;

use App\Models\ModelKritikSaran;
use App\Controllers\BaseController;

class KritikSaran extends BaseController
{
    public function index()
    {
        $model = new ModelKritikSaran();
        $data['kritik_saran'] = $model->findAll();
        
        echo view('admin/kritiksaran/kritik_saran', $data);
    }
}
