<?php

namespace App\Models;

use CodeIgniter\Model;

class DiagnosaModel extends Model
{
   

    protected $table = 't_diagnosa';
    protected $primaryKey = 'id'; // Assuming your table has an 'id' column as the primary key

    protected $allowedFields = [
        'id',
        'pasien_id',
        'kode_penyakit',
        'tanggal_konsultasi',
    ];

    protected $useTimestamps = true; // Adjust based on your table structure
    protected $useSoftDeletes = true;

    protected $returnType = 'object'; // You can change it to 'array' if you prefer arrays

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    // Define the relationships
    public function pasien()
    {
        return $this->belongsTo(PasienModel::class, 'pasien_id', 'id');
    }

    public function penyakit()
    {
        return $this->belongsTo(PenyakitModel::class, 'kode_penyakit', 'kode_penyakit');
    }
}
