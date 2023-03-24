<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use App\Models\BidangModel;
use App\Models\StatusModel;

class Pegawai extends BaseController
{
    protected $pegawaiModel;
    protected $bidangModel;
    protected $statusModel;

    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
    }

    public function index()
    {       
        $data = [
            'title' => 'Halaman Pegawai',
            'pegawai' => $this->pegawaiModel->getPegawai()
        ];

        return view ('pegawai/index', $data);

    }

    public function create()
    {
        $this->bidangModel = new BidangModel();
        $this->statusModel = new StatusModel();

        $data = [
            'title' => 'Halaman Tambah Pegawai',
            'bidang' => $this->bidangModel->findAll(),
            'status' => $this->statusModel->findAll(),
            'validation' => \Config\Services::validation()
        ];

        return view('pegawai/create', $data);
    }

    public function save()
    {
        if(!$this->validate([
            'nip' => 'required',
            'nama' => 'required|is_unique[pegawai.nama]',
            'jk' => 'required',
            'alamat' => 'required',
            'email' => 'required|valid_email',
            'no_telepon'=> 'required',
            'gaji' => 'required',
            'tmk' => 'required',
            'foto_diri' => 'max_size[foto_diri,1024]|is_image[foto_diri]|mime_in[foto_diri,image/png,image/jpeg,image/jpg]'
        ])){
            return redirect()->to('/pegawai/create')->withInput();
        }

        $fileFoto = $this->request->getFile('foto_diri');

        if($fileFoto->getError() == 4){
            $namaFoto = 'default.png';
        }else{
            $namaFoto = $fileFoto->getRandomName();

            $fileFoto->move('img/pegawai', $namaFoto);

            $slug = url_title($this->request->getVar('nama'), '-', true);

            $this->pegawaiModel->save([
                'id_bidang' => $this->request->getVar('id_bidang'),
                'id_status' => $this->request->getVar('id_status'),
                'nip' => $this->request->getVar('nip'),
                'nama' => $this->request->getVar('nama'),
                'slug' => $slug,
                'nama' => $this->request->getVar('nama'),
                'jk' => $this->request->getVar('jk'),
                'alamat' => $this->request->getVar('alamat'),
                'email' => $this->request->getVar('email'),
                'no_telepon' => $this->request->getVar('no_telepon'),
                'gaji' => $this->request->getVar('gaji'),
                'tmk' => $this->request->getVar('tmk'),
                'foto_diri' => $namaFoto
            ]);

            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

            return redirect()->to('/pegawai');
        }
    }
}
