<?php

namespace App\Controllers;

use TCPDF\TCPDF;
use Ramsey\Uuid\Uuid;
use App\Models\GejalaModel;
use App\Models\PasienModel;
use App\Models\DiagnosaModel;
use App\Models\DPGejalaModel;
use App\Models\PenyakitModel;
use App\Models\PenyebabModel;
use App\Models\DPpenyebabModel;
use App\Models\DPsolusiModel;
use App\Models\SolusiModel;
use CodeIgniter\I18n\Time;
use CodeIgniter\Controller;

class DiagnosaController extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = service('session');

        
    }

    public function detail($id){
        $diagnosaModel = new DiagnosaModel();
        $diagnosa = $diagnosaModel->find($id);
        
    }
    public function diagnosis(){

        $title = "diagnosis";
        $penyakitModel = new PenyakitModel();
        $pasienModel = new PasienModel();
        $diagnosaModel = new DiagnosaModel();

        $penyakit = $penyakitModel->findAll();
        $pasien = $pasienModel->where('id_user',user_id())->first();
       
        $datadiagnosa = $diagnosaModel->where('pasien_id',$pasien['id'])->findAll();
       

        foreach ($datadiagnosa as &$data) {
            // Fetch nama_pasien for the current row
         
        
            // Fetch nama_penyakit for the current row
            $penyakitInfo = $penyakitModel->where('kode_penyakit', $data['kode_penyakit'])->findAll();
           
            $data['nama_penyakit'] = $penyakitInfo ? $penyakitInfo[0]['nama_penyakit'] : null;
        }

            
        return view('diagnosa/diagnosis',compact('title', 'datadiagnosa'));
    }

    public function index()
    {   
        
        if(session('nama')==null){
           
            $pasienModel = new PasienModel();
            $pasien = $pasienModel->where('id_user',user_id())->first();
           
        $this->session->set('id', $pasien['id']);
        $this->session->set('nama', $pasien['nama']);
        }
        $title = "Diagnosa";
        $gejalaModel = new GejalaModel();
        $datagejala = $gejalaModel->findAll();
        
        return view('diagnosa/gejala', compact('datagejala', 'title'));
    }

    public function store()
    {
        $title = "Diagnosa";
        $request = service('request');

        if (empty($request->getVar('gejala'))) {
            return redirect()->route('diagnosa/gejala')->with('warning', 'Anda Belum menentukan gejala, silahkan pilih gejala');
        }
        
        $gejala = $request->getVar('gejala');
        
        $diagnosa = $this->knowlage($gejala);
        $penyakitModel = new PenyakitModel();
        $penyakit = $penyakitModel->where('kode_penyakit', $diagnosa)->first();
       
        $DPgejalaModel = new DPgejalaModel();
        $DPgejala = $DPgejalaModel->where('kode_penyakit', $penyakit['kode_penyakit'])->findAll();
        if(!empty($DPgejala)){
        $gejalaModel = new GejalaModel();
        $kodeGejalaValues = array_column($DPgejala, 'kode_gejala');
       
        $gejala = $gejalaModel->select('nama_gejala')
            ->whereIn('kode_gejala', $gejala)
            ->findAll();
        }

        $penyebabModel = new DPpenyebabModel();
        $penyebab = $penyebabModel->where('id_penyakit', $penyakit['id'])->findAll();
        $penyebabModel = new PenyebabModel();
        if(!empty($penyebab)){
        $kodePenyebab = array_column($penyebab, 'id_penyebab');
        $penyebab = $penyebabModel->select('nama_penyebab')
            ->whereIn('id', $kodePenyebab)
            ->findAll();
        }

        $solusiModel = new DPsolusiModel();
        $solusi = $solusiModel->where('id_penyakit', $penyakit['id'])->findAll();
        
        if(!empty($solusi)){
            $solusiModel = new SolusiModel();
        $kodeSolusi = array_column($solusi, 'id_solusi');
        $penyebab = $solusiModel->select('nama_solusi')
            ->whereIn('id', $kodeSolusi)
            ->findAll();
        }


        $pasienModel = new PasienModel();
        $pasien = $pasienModel->where('id', session('id'))->first();
       
        $konsultasiModel = new DiagnosaModel();
        $konsultasi = [
            'id' => Uuid::uuid4()->getHex(),
            'pasien_id' => $pasien['id'],
            'kode_penyakit' => $penyakit['kode_penyakit'],
            'tanggal_konsultasi' => Time::now(),
        ];
        $konsultasiModel->insert($konsultasi);
        function iy($var){
            return ((empty($var))? '':$var);
        }
        $data = [
            'title' => 'diagnosa',
            'gejala'=>iy($gejala), 
            'penyakit'=>iy($penyakit),
             'pasien'=>$pasien, 
             'konsultasi'=>$konsultasi, 
             'penyebab'=>iy($penyebab), 
             'solusi'=>iy($solusi),
        ];
        $data['data']=$data;
       
        return view('diagnosa/hasildiagnosa', $data);
    }

    function knowlage($gejala)
    {
        $role = [
            'P01' => 0, 'P02' => 0, 'P03' => 0, 'P04' => 0, 'P05' => 0,
            'P06' => 0, 'P07' => 0, 'P08' => 0, 'P09' => 0, 'P10' => 0,
            'P11' => 0, 'P12' => 0, 'P13' => 0, 'P14' => 0, 'P15' => 0,
            'P16' => 0, 'P17' => 0, 'P18' => 0, 'P19' => 0, 'P20' => 0,
            'P21' => 0,
        ];

        for($i=0;$i<count($gejala); $i++) {
            //role 1 (P01)
            if($gejala[$i] == 'G01' || $gejala[$i] == 'G02' ||
            $gejala[$i] == 'G04' || $gejala[$i] == 'G03' ||
            $gejala[$i] == 'G05' || $gejala[$i] == 'G06' ){

                $role['P01'] = $role['P01'] + 1;
               
            }

              
            //role 2 (P02)
            if($gejala[$i] == 'G07' || $gejala[$i] == 'G08'
            || $gejala[$i] == 'G09' || $gejala[$i] == 'G10'
            || $gejala[$i] == 'G01' || $gejala[$i] == 'G04'){

                $role['P02'] = $role['P02'] + 1;
               
            }

            //role 3 (P03)
            if($gejala[$i] == 'G14' || $gejala[$i] == 'G15'
            || $gejala[$i] == 'G16'){

                $role['P03'] = $role['P03'] + 1;
               
            }

            //role 4 (P04)
            if($gejala[$i] == 'G11'|| $gejala[$i] == 'G12' 
            || $gejala[$i] == 'G13'){

                $role['P04'] = $role['P04'] + 1;
               
            }

            //role 5 (P05)
            if($gejala[$i] == 'G17' || $gejala[$i] == 'G18' 
            || $gejala[$i] == 'G19'){

                $role['P05'] = $role['P05'] + 1;
              
            }

            //role 6 (P06)
            if($gejala[$i] == 'G20' || $gejala[$i] == 'G21' 
            || $gejala[$i] == 'G22'){

                $role['P06'] = $role['P06'] + 1;
               
            }


            //role 7 (P07)
            if($gejala[$i] == 'G23' || $gejala[$i] == 'G24' 
            || $gejala[$i] == 'G25' ){

                $role['P07'] = $role['P07'] + 1;
               
            }


            //role 8 (P08)
            if($gejala[$i] == 'G23' || $gejala[$i] == 'G26' 
            || $gejala[$i] == 'G27' || $gejala[$i] == 'G28'){

                $role['P08'] = $role['P08'] + 1;
              
            }

            //role 9 (P09)
            if($gejala[$i] == 'G23' || $gejala[$i] == 'G25' 
            || $gejala[$i] == 'G29' || $gejala[$i] == 'G30'
            || $gejala[$i] == 'G31' || $gejala[$i] == 'G32'){

                $role['P09'] = $role['P09'] + 1;
              
            }

            //role 10 (P10)
            if($gejala[$i] == 'G33' || $gejala[$i] == 'G36' 
            || $gejala[$i] == 'G35' || $gejala[$i] == 'G34'){

                $role['P10'] = $role['P10'] + 1;
              
            }

            //role 11 (P11)
            if($gejala[$i] == 'G33' || $gejala[$i] == 'G37' 
            || $gejala[$i] == 'G38' || $gejala[$i] == 'G39'
            || $gejala[$i] == 'G35'){

                $role['P11'] = $role['P11'] + 1;
              
            }

            //role 12 (P12)
            if($gejala[$i] == 'G33' || $gejala[$i] == 'G41' 
            || $gejala[$i] == 'G38' || $gejala[$i] == 'G39'
            || $gejala[$i] == 'G40'){

                $role['P12'] = $role['P12'] + 1;
              
            }

            //role 13 (P13)
            if($gejala[$i] == 'G33' || $gejala[$i] == 'G08' 
            || $gejala[$i] == 'G43' || $gejala[$i] == 'G44'
            || $gejala[$i] == 'G42'){

                $role['P12'] = $role['P12'] + 1;
              
            }

            //role 14 (P14)
            if($gejala[$i] == 'G46' || $gejala[$i] == 'G45' 
            || $gejala[$i] == 'G48' || $gejala[$i] == 'G47'){

                $role['P14'] = $role['P14'] + 1;
              
            }

            //role 15 (P15)
            if($gejala[$i] == 'G49' || $gejala[$i] == 'G45' 
            || $gejala[$i] == 'G50' || $gejala[$i] == 'G51'
            || $gejala[$i] == 'G52' || $gejala[$i] == 'G53'
            || $gejala[$i] == 'G54' ){

                $role['P15'] = $role['P15'] + 1;
              
            }

            //role 16 (P16)
            if($gejala[$i] == 'G47' || $gejala[$i] == 'G45' 
            || $gejala[$i] == 'G50' || $gejala[$i] == 'G55'
            || $gejala[$i] == 'G54' || $gejala[$i] == 'G56'){

                $role['P16'] = $role['P16'] + 1;
              
            }

            //role 17 (P17)
            if($gejala[$i] == 'G57' || $gejala[$i] == 'G58' 
            || $gejala[$i] == 'G45' || $gejala[$i] == 'G56'
            || $gejala[$i] == 'G51' || $gejala[$i] == 'G46'
            || $gejala[$i] == 'G50' ){

                $role['P17'] = $role['P17'] + 1;
              
            }

            //role 18 (P18)
            if($gejala[$i] == 'G01' || $gejala[$i] == 'G59' 
            || $gejala[$i] == 'G60' || $gejala[$i] == 'G56'
            || $gejala[$i] == 'G61' || $gejala[$i] == 'G62'){

                $role['P18'] = $role['P18'] + 1;
              
            }

            //role 19 (P19)
            if($gejala[$i] == 'G53' || $gejala[$i] == 'G56' 
            || $gejala[$i] == 'G61' || $gejala[$i] == 'G52'
            || $gejala[$i] == 'G63' || $gejala[$i] == 'G62'){

                $role['P19'] = $role['P19'] + 1;
              
            }

            //role 20 (P20)
            if($gejala[$i] == 'G64' || $gejala[$i] == 'G56' 
            || $gejala[$i] == 'G65' || $gejala[$i] == 'G66'
            || $gejala[$i] == 'G01' || $gejala[$i] == 'G60'
            || $gejala[$i] == 'G47' ){

                $role['P20'] = $role['P20'] + 1;
              
            }

            //role 21 (P21)
            if($gejala[$i] == 'G67' || $gejala[$i] == 'G68' 
            || $gejala[$i] == 'G69' || $gejala[$i] == 'G70'
            || $gejala[$i] == 'G71' || $gejala[$i] == 'G47'){

                $role['P21'] = $role['P21'] + 1;
            }
        }

        arsort($role);

        foreach ($role as $key => $value) {
            $hasil = $key;
            break; // Get the first key (highest value)
        }

        return $hasil;
    }

    public function export()
    {
        $postData = $this->request->getPost('data');
        $data = json_decode($postData, true);
        
        // Create a new instance of TCPDF with paper size and orientation
        $pdf = new \TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
    
        // Set margins
        $pdf->SetMargins(10, 10, 10);
    
        // Remove auto page breaks
        $pdf->SetAutoPageBreak(false, 10);
    
        // Add a page to the PDF
        $pdf->AddPage();
    
        // Set headers
      
       
        $pdf->Cell(0, 10, 'ID : ' . $data['pasien']['id'], 0, 1, 'L');
        $pdf->Cell(0, 10, ' ' . $data['penyakit']['kode_penyakit'], 0, 1, 'L');
        // Generate HTML from the view
        $html = view('diagnosa/export', $data);
    
        // Write the HTML content to the PDF
        $pdf->writeHTML($html, true, false, true, false, '');
    
        // Output the PDF as a download
        $pdf->Output('hasil-diagnosa.pdf', 'D');
        return view('diagnosa/export', $data);
    }
}    