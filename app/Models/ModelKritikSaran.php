<?php
// Ini modelnya
namespace App\Models;

use CodeIgniter\Model;

class ModelKritikSaran extends Model
{
    protected $table = 'kritik_saran';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kritik_saran', 'rating', 'upload_foto'];
}