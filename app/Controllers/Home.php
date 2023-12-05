<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {   
        $db = \Config\Database::connect();
        $statPasien = $db->table('t_datapasien')->countAll();
        $statDiagnosa = $db->table('t_diagnosa')->countAll();
        $statPenyakit = $db->table('t_penyakit')->countAll();
        

        return view('home' , [
            'statPasien' => $statPasien,
            'statDiagnosa' => $statDiagnosa,
            'statPenyakit' => $statPenyakit,
            "title" => "Home" ,
            "judul" => "System Pakar Diagnosa" ,
            "judul1" => "Penyakit Tulang" ,
            "tagline" => "Solusi Konsultasi Cepat" ,
            "deskrip" => "System yang khusus dibangun untuk diagnosa Penyakit Tulang" , 
            "deskrip1" => "secara cepat dan dapat dilakukan dimana saja" 
        ]);
    

    }
}
