<?php

namespace App\Controllers;

use App\Models\PasienModel;
use App\Models\DiagnosaModel;
use App\Models\PenyakitModel;
use CodeIgniter\Controller;

class DataDiagnosaController extends Controller
{
    public function index()
    {
        $title = "Data Diagnosa";
        $penyakitModel = new PenyakitModel();
        $pasienModel = new PasienModel();
        $diagnosaModel = new DiagnosaModel();

        $penyakit = $penyakitModel->findAll();
        $pasien = $pasienModel->findAll();
        $datadiagnosa = $diagnosaModel->findAll();
       

        foreach ($datadiagnosa as &$data) {
            // Fetch nama_pasien for the current row
            $pasienInfo = $pasienModel->where('id', $data['pasien_id'])->findAll();
            $data['nama_pasien'] = $pasienInfo ? $pasienInfo[0]['nama'] : null;
        
            // Fetch nama_penyakit for the current row
            $penyakitInfo = $penyakitModel->where('kode_penyakit', $data['kode_penyakit'])->findAll();
           
            $data['nama_penyakit'] = $penyakitInfo ? $penyakitInfo[0]['nama_penyakit'] : null;
        }
        
           
        return view('admin/page/datadiagnosa', compact('title', 'datadiagnosa'));
    }

    public function create()
    {
        return view('admin/page/diagnosa');
    }

    public function store()
    {
        $diagnosaModel = new DiagnosaModel();
        $data = [
            // Assuming you have the correct field names in your database table
            'pasien_id' => $this->request->getPost('pasien_id'),
            'penyakit_id' => $this->request->getPost('penyakit_id'),
            // Add other fields here
        ];

        $diagnosaModel->insert($data);
        return redirect()->to(base_url('admin/datadiagnosa'));
    }

    public function destroy($id)
    {
        $diagnosaModel = new DiagnosaModel();
        $diagnosaModel->delete($id);
        return redirect()->to(base_url('admin/datadiagnosa'));
    }
}
