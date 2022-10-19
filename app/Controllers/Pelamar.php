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
      'validation' => \Config\Services::validation()
    ];

    return view('pelamar/edit_profil', $data);
  }

  public function simpan()
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
      return redirect()->to('/pelamar/edit_profil')->withInput();
    }
  }

  public function historiLamaran()
  {
    $data = [
      'title' => 'Loma | Histori Lamaran',
    ];

    return view('pelamar/histori_lamaran', $data);
  }
}
