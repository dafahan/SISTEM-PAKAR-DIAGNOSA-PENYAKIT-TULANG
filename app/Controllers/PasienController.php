<?php

namespace App\Controllers;
use CodeIgniter\Session\Session;
use App\Models\Gejala;
use App\Models\PasienModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Faker\Provider\pt_PT\PhoneNumber;
use Ramsey\Uuid\Uuid;
use CodeIgniter\I18n\Time;

class PasienController extends BaseController
{
    protected $session;
    public function __construct()
    {
        $this->session = service('session');

        
    }
    public $isoCode = 'ID'; //isocode indonesia


    public function index()
    {
        $title = "Diagnosa";
        return view('diagnosa/datadiri', compact('title'));
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $input = $this->request->getPost();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama'            => 'required',
            'tanggal_lahir'   => 'required',
            'email'           => 'required',
            'no_telp'         => 'required',
            'jenis_kelamin'   => 'required'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->with('warning', implode("\n", $validation->getErrors()));
        }

        $pasienModel = new PasienModel();

        $data = [
            'id'             => Uuid::uuid4()->getHex(),
            'nama'           => $input['nama'],
            'tanggal_lahir'  => $input['tanggal_lahir'],
            'email'          => $input['email'],
            'no_telp'        => $input['no_telp'],
            'jenis_kelamin'  => $input['jenis_kelamin'],
            'created_at'     => Time::now(),
            'updated_at'     => Time::now(),
        ];
        
        $pasienModel->insert($data);

        $this->session->set('id', $data['id']);
        
        $this->session->set('nama', $data['nama']);

        return redirect()->to(base_url('diagnosa'))->with('success', 'Berhasil Registrasi');
    }
}
