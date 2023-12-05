<?php

namespace App\Models;
use App\Models\Penyakit;
use CodeIgniter\Model;


class DPpenyebabModel extends Model
{
    protected $table = 't_dppenyebab';
    protected $primaryKey = 'id'; // Assuming your table has an 'id' column as the primary key

    protected $allowedFields = [
        'id_penyakit',
        'id_penyebab',
    ];

  
    protected $useSoftDeletes = false; // Adjust based on your table structure


    public function penyakit()
    {
        return $this->belongsTo(PenyakitModel::class, 'id_penyakit', 'id');
    }

    public function penyebab()
    {
        return $this->belongsTo(PenyebabModel::class, 'id_penyebab', 'id');
    }
}
