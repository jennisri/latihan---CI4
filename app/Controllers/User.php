<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }


    public function index()
    {       
        $data = [
            'title' => 'Halaman User',
            'user' => $this->userModel->getUser()
        ];

        return view ('user/index', $data);

    }

    public function save()
    {
        if(!$this->validate([
            'nama' => 'required|is_unique[user.nama]',
            'alamat' => 'required',
            'handphone' => 'required',
            'foto' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/png,image/jpeg,image/jpg]'
        ])){
            return redirect()->to('/user')->withInput();
        }

        // ambil gambar
        $fileFoto = $this->request->getFile('foto');

        // jika tidak ada foto yang diupload, upload gambar default
        if($fileFoto->getError() == 4){
            $namaFoto = 'default.png';
        }else{
            // generate nama sampul jika ada
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan file ke folder img
            $fileFoto->move('img',$namaFoto);        }

            $slug = url_title($this->request->getVar('nama'), '-', true);

            $this->userModel->save([
                'nama' => $this->request->getVar('nama'),
                'alamat' => $this->request->getVar('alamat'),
                'handphone' => $this->request->getVar('handphone'),
                'slug' => $slug,
                'foto' => $namaFoto
            ]);

            session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

            return redirect()->to('/user');
        }

        public function delete($id_user)
        {
             //cari gambar berdasarkan id
            $user = $this->userModel->find($id_user);

            // cek jika file gambarnya bukan default maka hapus gambar
            if($user['foto'] != 'default.png'){
                // hapus gambar
                unlink('img/'. $user['foto']);
            }

            $this->userModel->delete($id_user);
            session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
            return redirect()->to('/user');

        }

        public function update($id_user)
        {
            // cek nama terlebih dahulu
            $userLama = $this->userModel->getUser($this->request->getVar('slug'));
            // jika nama didalam tabel sama dengan nama yang diinputkan
            if($userLama['nama'] == $this->request->getVar('nama')){
                // validasi nama diganti jadi required aja
                $rule_nama = 'required';
            }else{
                $rule_nama = 'required|is_unique[user.nama]';
            }

            // validasi input
            if(!$this->validate([
                'nama' => $rule_nama,
                'alamat' => 'required',
                'handphone' => 'required',
                'foto' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/png,image/jpeg,image/jpg]'
            ])){
                return redirect()->to('/user/'.$this->request->getVar('slug'))->withInput();
            }

            $fileFoto = $this->request->getFile('foto');

            // cek gambar apakah tetap gambar lama
            if($fileFoto->getError() == 4){
                $namaFoto = $this->request->getVar('fotoLama');
            }else{
                $namaFoto = $fileFoto->getRandomName();
                $fileFoto->move('img', $namaFoto);
                unlink('img/'.$this->request->getVar('fotoLama'));
            }

            $slug = url_title($this->request->getVar('nama'), '-', true);
            $this->userModel->save([
                'id_user' => $id_user,
                'nama' => $this->request->getVar('nama'),
                'alamat' => $this->request->getVar('alamat'),
                'handphone' => $this->request->getVar('handphone'),
                'slug' => $slug,
                'foto' => $namaFoto
            ]);


            session()->setFlashdata('pesan', 'Data Berhasil Diedit');

            return redirect()->to('/user');
        }
    }
