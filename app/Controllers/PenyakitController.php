<?php

namespace App\Controllers;

use App\Models\GejalaModel;
use App\Models\PenyakitModel;
use CodeIgniter\Controller;

class PenyakitController extends Controller
{
    public function index()
    {
        $title = "Data Penyakit";
        $gejalaModel = new GejalaModel();
        $penyakitModel = new PenyakitModel();
        
        $gejala = $gejalaModel->findAll();
        $penyakitModel = new PenyakitModel();
        $datapenyakit = $penyakitModel->findAll();
        
          $kode = $penyakitModel->select('kode_penyakit')->orderBy('kode_penyakit', 'desc')->first();

        if ($kode != null) {
            $pecah = explode("P", $kode['kode_penyakit']);
            $number = intval($pecah[1]) + 1;
            $kode = ($number < 10) ? "P0$number" : "P$number";
        } else {
            $kode = "P01";
        }
        
        return view('admin/page/penyakit', compact(['title', 'datapenyakit', 'gejala','kode']));
    }

    public function create()
    {
        return view('admin.page.penyakit');
    }

    public function store()
    {
        $request = service('request');
        $gejalaIds = $request->getPost('id_gejala') ?? [];

        $validation = \Config\Services::validation();
        $validation->setRules([
            'kode_penyakit' => 'required|is_unique[t_penyakit.kode_penyakit]',
            'nama_penyakit' => 'required',
            'deskripsi' => 'required',
        ]);

        if ($validation->withRequest($this->request)->run()) {
            $penyakitModel = new PenyakitModel();
            $penyakit = $penyakitModel->save([
                'kode_penyakit' => $request->getPost('kode_penyakit'),
                'nama_penyakit' => $request->getPost('nama_penyakit'),
                'deskripsi' => $request->getPost('deskripsi'),
            ]);

            if ($penyakit) {
                $penyakitModel->find($penyakit)->gejala()->sync($gejalaIds);
                return redirect()->to('datapenyakit');
            }
        }

        return redirect()->to(base_url('admin/datapenyakit'))->withInput()->with('validation', $validation);
    }

    public function destroy($id)
    {
        $penyakitModel = new PenyakitModel();
        $penyakitModel->delete($id);
        return redirect()->to(base_url('admin/datapenyakit'));
    }

    public function edit($id)
    {
        $penyakitModel = new PenyakitModel();
        $namapenyakit = $penyakitModel->find($id);
        return view('admin.page.penyakit', compact(['namapenyakit']));
    }

    public function update($id)
{
    $request = service('request');
    $gejalaIds = $request->getPost('id_gejala') ?? [];

    $validation = \Config\Services::validation();
    $validation->setRules([
        'kode_penyakit' => 'required|is_unique[t_penyakit.kode_penyakit,id_penyakit,{id}]',
        'nama_penyakit' => 'required',
        'deskripsi' => 'required',
    ]);

    if ($validation->withRequest($this->request)->run()) {
        $penyakitModel = new PenyakitModel();
        $data = [
            'kode_penyakit' => $request->getPost('kode_penyakit'),
            'nama_penyakit' => $request->getPost('nama_penyakit'),
            'deskripsi' => $request->getPost('deskripsi'),
        ];
        
        $updated = $penyakitModel->update($id, $data);

        if ($updated) {
            $penyakitModel = new PenyakitModel();
            $penyakitModel->find($id)->gejala()->sync($gejalaIds);
            return redirect()->to(base_url('admin/datapenyakit'));
        }
    }

    return redirect()->to(base_url('admin/datapenyakit'))->withInput()->with('validation', $validation);
    }

}
