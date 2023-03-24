<?php

namespace App\Controllers;

use App\Models\BidangModel;

class Bidang extends BaseController
{
    protected $bidangModel;

    public function __construct(){
        $this->bidangModel = new BidangModel();
    }

    public function index()
    {    
        $data = [
            'title' => 'Halaman Bidang',
            'bidang' => $this->bidangModel->findAll()

        ];

        return view ('bidang/index', $data);

    }


    public function save()
    {
        // validasi input
        if(!$this->validate([
            // buat  rus, 
            // 'judul' => 'required|is_unique[komik.judul]'
            'nama_bidang' =>  'required'
        ])){

            return redirect()->to('/bidang')->withInput();
        }


        $this->bidangModel->save([
            'nama_bidang' => $this->request->getVar('nama_bidang')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->to('/bidang');
    }

    public function delete($id_bidang)
    {
        $this->bidangModel->delete($id_bidang);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/bidang');
    }

    public function update($id_bidang)
    {
        // validasi input
        if(!$this->validate([
            // buat  rus, 
            // 'judul' => 'required|is_unique[komik.judul]'
            'nama_bidang' =>  'required'
        ])){

            return redirect()->to('/bidang')->withInput();
        }


        $this->bidangModel->save([
            'id_bidang' => $id_bidang,
            'nama_bidang' => $this->request->getVar('nama_bidang')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diedit');

        return redirect()->to('/bidang');
    }
}
