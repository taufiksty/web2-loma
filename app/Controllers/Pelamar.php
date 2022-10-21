<?php

namespace App\Controllers;

use App\Models\PelamarModel;
use App\Models\LisAndSerModel;

class Pelamar extends BaseController
{
  protected $PelamarModel;
  protected $LisAndSerModel;
  public function __construct()
  {
    $this->PelamarModel = new PelamarModel();
    $this->LisAndSerModel = new LisAndSerModel();
  }

  public function index($id_pelamar)
  {
    $data = [
      'title' => 'Loma | Profil',
      'pelamar' => $this->PelamarModel->getPelamar($id_pelamar),
      'lis_and_ser' => $this->LisAndSerModel->getLisAndSer($id_pelamar)
    ];

    return view('pelamar/profil', $data);
  }

  public function editProfil($id_pelamar)
  {
    $data = [
      'title' => 'Loma | Edit Profil',
      'pelamar' => $this->PelamarModel->getPelamar($id_pelamar),
      'lis_and_ser' => $this->LisAndSerModel->getLisAndSer($id_pelamar),
      'validation' => \Config\Services::validation()
    ];

    return view('pelamar/edit_profil', $data);
  }

  public function simpan($id_pelamar)
  {
    if (!$this->validate([
      'fotoProfil' => [
        'rules' => 'max_size[fotoProfil,2048]|is_image[fotoProfil]|mime_in[fotoProfil,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => "Ukuran foto profil tidak boleh lebih dari 2 MB.",
          'is_image' => "Foto profil harus berupa gambar.",
          'mime_in' => "Foto profil harus memiliki salah satu ekstensi berikut: jpg, jpeg, dan png."
        ]
      ],
      'nama' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama harus diisi!'
        ]
      ],
      'no_telp' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Nomor Telepon harus diisi!'
        ]
      ],
    ])) {
      return redirect()->to('/Pelamar/editProfil/'.$id_pelamar)->withInput();
    }

    // Taking photo profile
    $fotoProfil = $this->request->getFile('fotoProfil');
    // If the photo profile not uploaded
    if ($fotoProfil->getError() == 4) {
      $nameFile = $this->request->getVar('fotoProfilOld');
    } else {
      // Take photo profile name as random
      $nameFile = $fotoProfil->getRandomName();
      // Move photo profile to public/img
      $fotoProfil->move('img/pelamar', $nameFile);
    }

    $this->PelamarModel->replace([
      'nama' => $this->request->getVar('nama'),
      'no_telp' => $this->request->getVar('no_telp'),
      'alamat' => $this->request->getVar('alamat'),
      'tl' => $this->request->getVar('tl'),
      'gender' => $this->request->getVar('gender'),
      'univ' => $this->request->getVar('univ'),
      'prodi' => $this->request->getVar('prodi'),
      'foto_profil' => $nameFile
    ]);

    session()->setFlashdata('message', 'Profil Berhasil Diubah.');

    return redirect()->to('/Pelamar/index/'.$this->request->getVar('id_pelamar'));
  }

  public function historiLamaran()
  {
    $data = [
      'title' => 'Loma | Histori Lamaran',
    ];

    return view('pelamar/histori_lamaran', $data);
  }
}
