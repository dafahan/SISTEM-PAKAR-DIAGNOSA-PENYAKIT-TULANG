<?php

namespace App\Models;

use CodeIgniter\Model;


class DPsolusiModel extends Model
{
    protected $table = 't_dpsolusi';
    protected $primaryKey = 'id'; // Assuming your table has an 'id' column as the primary key

    protected $allowedFields = [
        'id_penyakit',
        'id_solusi',
    ];

    
    protected $useSoftDeletes = false; // Adjust based on your table structure

    // Define the relationships
    public function penyakit()
    {
        return $this->belongsTo(PenyakitModel::class, 'id_penyakit', 'id');
    }

    public function solusi()
    {
        return $this->belongsTo(SolusiModel::class, 'id_solusi', 'id');
    }
}
