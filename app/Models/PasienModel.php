<?php

namespace App\Models;

use CodeIgniter\Model;

use CodeIgniter\I18n\Time;

class PasienModel extends Model
{

    protected $table = 't_datapasien';
    protected $primaryKey = 'id'; 

    protected $allowedFields = [
        'id_user',
        'id',
        'nama',
        'tanggal_lahir',
        'email',
        'no_telp',
        'jenis_kelamin',
      
    ];

    protected $useTimestamps = true;
    protected $useSoftDeletes = false;

    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';


    protected $dateFormat = 'datetime';

    // If you want to disable automatic incrementing of the primary key
    // protected $useAutoIncrement = false;

    // If you have custom date format, you can specify it here
    // protected $dateFormat = 'datetime';

    // If you have a custom DateTime class, you can specify it here
    // protected $returnType = 'App\Entities\YourEntity';

    // If you want to skip automatic casting for certain fields
    // protected $skipAutoTimestamp = true;

    // If you want to cast some fields to a specific type
    // protected $casts = [
    //     'tanggal_lahir' => 'date',
    // ];

    public function __construct()
    {
        parent::__construct();
    }
}
