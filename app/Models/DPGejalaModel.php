<?php

namespace App\Models;

use CodeIgniter\Model;

class DPGejalaModel extends Model
{
    protected $table = 't_dpgejala';
    protected $primaryKey = 'id'; // Assuming your table has an 'id' column as the primary key

    protected $allowedFields = [
        'kode_penyakit',
        'kode_gejala',
    ];

    
    protected $useTimestamps = false; // Set it to true if your table has 'created_at' and 'updated_at' columns
    protected $useSoftDeletes = false; // Set it to true if you want to use soft deletes

    // Define the relationships
    public function gejala()
    {
        return $this->belongsTo(GejalaModel::class, 'kode_gejala', 'kode_gejala');
    }

    public function penyakit()
    {
        return $this->belongsTo(PenyakitModel::class, 'kode_penyakit', 'kode_penyakit');
    }
}
