<?php

namespace App\Controllers;

use App\Models\SolusiModel;
use CodeIgniter\Controller;
use CodeIgniter\Validation\Exceptions\ValidationException;

class DataSolusiController extends BaseController
{
    public function index()
    {
        $title = "Data Solusi";
        $solusiModel = new SolusiModel();
        $datasolusi = $solusiModel->findAll();
        $kode = $solusiModel->select('kode_solusi')->orderBy('kode_solusi', 'desc')->first();

        if ($kode != null) {
            $pecah = explode("S", $kode['kode_solusi']);
            $number = intval($pecah[1]) + 1;
            $kode = ($number < 10) ? "S00$number" : "S0$number";
        } else {
            $kode = "S001";
        }

        return view('admin/page/datasolusi', compact('title', 'datasolusi','kode'));
    }

    public function create()
    {
        return view('admin/page/solusi');
    }

    public function store()
    {
        $request = service('request');

        try {
            $rules = [
                'kode_solusi' => 'required|is_unique[t_solusi.kode_solusi]',
                'nama_solusi' => 'required',
            ];

            $this->validate($rules);

            $solusiModel = new SolusiModel();
            $solusiModel->save([
                'kode_solusi' => $request->getPost('kode_solusi'),
                'nama_solusi' => $request->getPost('nama_solusi'),
            ]);

            return redirect()->to(base_url('admin/datasolusi'));
        } catch (ValidationException $e) {
            return redirect()->back()->withInput()->with('validation', $e->getErrors());
        }
    }

    public function destroy($id)
    {
        $solusiModel = new SolusiModel();
        $solusiModel->delete($id);
        return redirect()->to(base_url('admin/datasolusi'));
    }

    public function edit($id)
    {
        $solusiModel = new SolusiModel();
        $solusi = $solusiModel->find($id);
        return view('admin/page/datasolusi', compact('solusi'));
    }

    public function update($id)
    {
        $request = service('request');
        $solusiModel = new SolusiModel();
        $solusiModel->update($id, $request->getPost());
        return redirect()->to(base_url('admin/datasolusi'));
    }
}
