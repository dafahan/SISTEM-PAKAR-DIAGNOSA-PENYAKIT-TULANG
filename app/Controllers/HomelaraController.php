<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\Request;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Database\BaseBuilder;

class HomelaraController extends Controller
{
  
    /**
     * Show the application dashboard.
     *
     * @return string
     */
    public function index(): string
    {
        $title = "Home | Admin";

        // Get counts using the Query Builder
        $db = \Config\Database::connect();
        $statPasien = $db->table('t_datapasien')->countAll();
        $statDiagnosa = $db->table('t_diagnosa')->countAll();
        $statPenyakit = $db->table('t_penyakit')->countAll();
        $statGejala = $db->table('t_gejala')->countAll();

        // Pass data to the view
        $data = [
            'title' => 'admin',
            'statPasien' => $statPasien,
            'statDiagnosa' => $statDiagnosa,
            'statPenyakit' => $statPenyakit,
            'statGejala' => $statGejala,
        ];
        
        return view('admin/index', $data);
    }
}
