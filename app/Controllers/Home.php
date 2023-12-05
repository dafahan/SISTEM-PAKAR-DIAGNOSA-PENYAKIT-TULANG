<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {   
        return view('home' , [
            "title" => "Home" ,
            "judul" => "System Pakar Diagnosa" ,
            "judul1" => "Penyakit Tulang" ,
            "tagline" => "Solusi Konsultasi Cepat" ,
            "deskrip" => "System yang khusus dibangun untuk diagnosa Penyakit Tulang" , 
            "deskrip1" => "secara cepat dan dapat dilakukan dimana saja" 
        ]);
    

    }
}
