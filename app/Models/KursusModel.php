<?php

namespace App\Models;

use CodeIgniter\Model;

class KursusModel extends Model
{
    protected $table            = 'kursus';
    protected $primaryKey       = 'id_kursus';
    protected $allowedFields    = [
        'judul',
        'deskripsi',
        'durasi'
    ];

    public function getKursus($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_kursus' => $id])->first();
    }
}
