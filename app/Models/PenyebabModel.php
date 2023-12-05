<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyebabModel extends Model
{
    protected $table = 't_penyebab';
    protected $primaryKey = 'id'; // Assuming your table has an 'id' column as the primary key

    protected $allowedFields = [
        'kode_penyebab',
        'nama_penyebab',
    ];

     

    protected $useTimestamps = false; // Set it to true if your table has 'created_at' and 'updated_at' columns
    protected $useSoftDeletes = false; // Set it to true if you want to use soft deletes
}
