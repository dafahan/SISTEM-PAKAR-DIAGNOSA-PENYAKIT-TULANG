<?php

namespace App\Controllers;

use App\Models\PenyebabModel;
use CodeIgniter\Controller;
use CodeIgniter\Validation\Exceptions\ValidationException;

class DataPenyebabController extends Controller
{
    public function index()
    {
        $title = "Data Penyebab";
        $model = new PenyebabModel();
        $datapenyebab = $model->findAll();

        $kode = $model->select('kode_penyebab')->orderBy('kode_penyebab', 'desc')->first();

        if ($kode != null) {
            $pecah  = explode("PE", $kode['kode_penyebab']);
            $number = intval($pecah[1]) + 1;
            if ($number < 10) {
                $kode   = "PE00" . $number;
            } else {
                $kode   = "PE0" . $number;
            }
        } else {
            $kode = "PE001";
        }

        return view('admin/page/datapenyebab', compact('title', 'datapenyebab', 'kode'));
    }

    public function create()
    {
        return view('admin/page/datapenyebab');
    }

    public function store()
    {
        $model = new PenyebabModel();

        $rules = [
            'kode_penyebab' => 'required',
            'nama_penyebab' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
        }

        $model->insert($this->request->getPost());

        return redirect()->to(base_url('admin/datapenyebab'));
    }

    public function destroy($id)
    {
        $model = new PenyebabModel();
        $model->delete($id);

        return redirect()->to(base_url('admin/datapenyebab'));
    }

    public function edit($id)
    {
        $model = new PenyebabModel();
        $datapenyebab = $model->find($id);

        return view('admin/page/datapenyebab', compact('datapenyebab'));
    }

    public function update($id)
    {
        $model = new PenyebabModel();
        $datapenyebab = $model->find($id);

        $rules = [
            'nama_penyebab' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', service('validation')->getErrors());
        }

        $model->update($id, $this->request->getPost());

        return redirect()->to(base_url('admin/datapenyebab'));
    }
}
