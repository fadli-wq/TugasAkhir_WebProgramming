<?php

namespace App\Controllers\admin\kritiksaran;

use App\Models\ModelKritikSaran;
use App\Controllers\BaseController;

class KritikSaran extends BaseController
{
    public function index()
    {
        $perPage = 5;
        $currentPage = $this->request->getVar('page_kritik_saran') ?: 1;
        $model = new ModelKritikSaran();
        $data = [
            'kritik_saran' => $model->paginate(5, 'kritik_saran'),
            'pager' => $model->pager,
            'currentPage' => $currentPage,
            'perPage' => $perPage,
        ];
        return view('admin/kritiksaran/kritik_saran', $data);
    }
}
