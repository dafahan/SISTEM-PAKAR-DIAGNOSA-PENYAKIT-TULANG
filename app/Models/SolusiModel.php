<?php

namespace App\Models;

use CodeIgniter\Model;

class SolusiModel extends Model
{
    protected $table = 't_solusi';
    protected $primaryKey = 'id'; // Assuming your table has an 'id' column as the primary key

    protected $allowedFields = [
        'kode_solusi',
        'nama_solusi',
    ];

   

    protected $useTimestamps = false; // Set it to true if your table has 'created_at' and 'updated_at' columns
    protected $useSoftDeletes = false; // Set it to true if you want to use soft deletes
}
