<?php

namespace App\Models;

use CodeIgniter\Model;

class MateriModel extends Model
{
    protected $table            = 'materi';
    protected $primaryKey       = 'id_materi';
    protected $allowedFields    = [
        'link',
        'id_kursus'
    ];
    public function getMateri($id = false)
    {
        if ($id == false) {
            return $this->join('kursus', 'kursus.id_kursus = materi.id_kursus')->findAll();
        }
        return $this->where(['id_materi' => $id])->join('kursus', 'kursus.id_kursus = materi.id_kursus')->first();
    }
}
