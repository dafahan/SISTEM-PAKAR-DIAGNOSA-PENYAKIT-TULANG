<?php

namespace App\Models;

use CodeIgniter\Model;

class GejalaModel extends Model
{
    protected $table = "t_gejala";
    protected $primaryKey = 'kode_gejala';
    protected $allowedFields = ['kode_gejala', 'nama_gejala'];

    public function penyakit()
    {
        return $this->belongsToMany(PenyakitModel::class, 't_dpgejala', 'kode_gejala', 'kode_penyakit');
    }
}
