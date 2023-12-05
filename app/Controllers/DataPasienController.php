<?php

namespace App\Controllers;

use Ramsey\Uuid\Uuid;
use CodeIgniter\Controller;
use App\Models\PasienModel;

class DatapasienController extends Controller
{
    public function index()
    {
        $title = "Data Pasien";
        $PasienModel = new PasienModel();
        $datapasien = $PasienModel->findAll();
        
        return view('admin/page/datapasien', compact('title', 'datapasien'));
    }

    public function create()
    {
        return view('admin/page/datapasien');
    }

    public function store()
    {
        $request = service('request');
        $PasienModel = new PasienModel();
        $data = $request->getPost();
        $data['id'] = Uuid::uuid4()->getHex();
        dd($data);
        $PasienModel->insert($data);

        return redirect()->to(base_url('admin/datapasien'));
    }

    public function destroy($id)
    {
        $PasienModel = new PasienModel();
        $PasienModel->delete($id);

        return redirect()->to(base_url('admin/datapasien'));
    }

    public function edit($id)
    {   
        $PasienModel = new PasienModel();
        $datapasien = $PasienModel->find($id);

        return view('admin/page/penyakit', compact('datapasien'));
    }

    public function update($id)
    {   
        $request = service('request');
        $PasienModel = new PasienModel();
        $PasienModel->update($id, $request->getPost());

        return redirect()->to(base_url('admin/datapasien'));
    }
}
