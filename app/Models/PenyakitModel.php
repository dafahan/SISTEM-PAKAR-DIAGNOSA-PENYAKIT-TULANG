<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\PenyakitEntity; 

class PenyakitModel extends Model
{
    protected $table = 't_penyakit';
    protected $primaryKey = 'id'; 

    protected $allowedFields = [
        'kode_penyakit',
        'nama_penyakit',
        'deskripsi',
    ];

    
    protected $useSoftDeletes = false; 

    public function dpPenyebab()
    {
        return $this->belongsToMany(PenyebabModel::class, 't_dppenyebab', 'id_penyakit', 'id_penyebab');
    }

    public function dpSolusi()
    {
        return $this->belongsToMany(SolusiModel::class, 't_dpsolusi', 'id_penyakit', 'id_solusi');
    }

    public function gejala()
    {
        return $this->belongsToMany(GejalaModel::class, 't_dpgejala', 'kode_penyakit', 'kode_gejala');
    }
}
