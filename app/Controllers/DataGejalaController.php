<?php

namespace App\Controllers;

use App\Models\GejalaModel;
use CodeIgniter\Controller;

class DatagejalaController extends Controller
{
    public function index()
    {
        $title = "Data Gejala";
        $gejalaModel = new GejalaModel();
        $datagejala = $gejalaModel->findAll();
        $kode = $gejalaModel->select('kode_gejala')->orderBy('kode_gejala', 'desc')->first();

        if ($kode != null) {
            $pecah = explode("G", $kode['kode_gejala']);
            $number = intval($pecah[1]) + 1;
            $kode = ($number < 10) ? "G0$number" : "G$number";
        } else {
            $kode = "G01";
        }

        return view('admin/page/datagejala', compact(['title', 'datagejala', 'kode']));
    }

    public function create()
    {
        return view('admin/page/gejala');
    }

    public function store()
    {
        $request = service('request');

        $validation = \Config\Services::validation();
        $validation->setRules([
            'kode_gejala' => 'required|is_unique[t_gejala.kode_gejala]',
            'nama_gejala' => 'required',
        ]);
       
        if ($validation->withRequest($this->request)->run()) {
            $gejalaModel = new GejalaModel();
            $gejalaModel->save([
                'kode_gejala' => $request->getPost('kode_gejala'),
                'nama_gejala' => $request->getPost('nama_gejala'),
            ]);
            
            return redirect()->to(base_url('admin/datagejala'));
        
        }
        
        return redirect()->to(base_url('admin/datagejala'))->withInput()->with('validation', $validation);
    }

    public function destroy($id)
    {
        $gejalaModel = new GejalaModel();
        $gejalaModel->delete($id);
        return redirect()->to(base_url('admin/datagejala'));
    }

    public function edit($id)
    {
        $gejalaModel = new GejalaModel();
        $gejala = $gejalaModel->find($id);
        return view('admin/page/datagejala', compact(['gejala']));
    }

    public function update($id)
    {
        $request = service('request');

        $validation = \Config\Services::validation();
        $validation->setRules([
            'kode_gejala' => "required|is_unique[t_gejala.kode_gejala,id,{$id}]",
            'nama_gejala' => 'required',
        ]);

        if ($validation->withRequest($this->request)->run()) {
            $gejalaModel = new GejalaModel();
            $data = [
                'kode_gejala' => $request->getPost('kode_gejala'),
                'nama_gejala' => $request->getPost('nama_gejala'),
            ];

            $gejalaModel->update($id, $data);

            return redirect()->to(base_url('admin/datagejala'));
        }
        
        return redirect()->to(base_url('admin/datagejala'))->withInput()->with('validation', $validation);
    }
}
