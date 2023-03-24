<?php

namespace App\Controllers;

use App\Models\StatusModel;

class Status extends BaseController
{
    protected $statusModel;

    public function __construct()
    {
        $this->statusModel = new StatusModel();
    }

    public function index()
    {       
        $data = [
            'title' => 'Halaman Status',
            'status' => $this->statusModel->findAll()
        ];

        return view ('status/index', $data);

    }

    public function save()
    {
        if(!$this->validate([

            'nama_status' => 'required'
        ])){
            return redirect()->to('/status')->withInput();
        }

        $this->statusModel->save([
            'nama_status' => $this->request->getVar('nama_status')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->to('/status');
    }

    public function delete($id_status)
    {
        $this->statusModel->delete($id_status);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');

        return redirect()->to('/status');
    }

    public function update($id_status)
    {
        if(!$this->validate([
            'nama_status' => 'required'
        ])){
            return redirect()->to('/status')->withInput();
        }

        $this->statusModel->save([
            'id_status' => $id_status,
            'nama_status' => $this->request->getVar('nama_status')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diedit');

        return redirect()->to('/status');
    }
}


