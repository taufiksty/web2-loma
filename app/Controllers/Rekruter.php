<?php

namespace App\Controllers;

use App\Models\RekruterModel;
use App\Models\LowonganModel;

class Rekruter extends BaseController
{
  protected $RekruterModel;

  public function __construct()
  {
    $this->RekruterModel = new RekruterModel();
    $this->LowonganModel = new LowonganModel();
  }

  public function index($id)
  {
    $data = [
      'title' => 'Loma | Rekruter',
      'rekruter' => $this->RekruterModel->getRekruter($id)
    ];

    return view('rekruter/profil', $data);
  }

  public function editProfil($id)
  {
    $data = [
      'title' => 'Loma | Edit Profil',
      'rekruter' => $this->RekruterModel->getRekruter($id),
      'validation' => \Config\Services::validation()
    ];

    return view('rekruter/edit_profil', $data);
  }

  public function simpan($id)
  {
    // Validation
    $oldRekruter = $this->RekruterModel->getRekruter($this->request->getVar('idOld'));
    if ($oldRekruter['nama_perusahaan'] == $this->request->getVar('nama_perusahaan')) {
      $nameRule = 'required';
    } else {
      $nameRule = 'required|is_unique[rekruter.nama_perusahaan]';
    }

    if (!$this->validate([
      'foto_logo' => [
        'rules' => 'max_size[foto_logo,2048]|is_image[foto_logo]|mime_in[foto_logo,image/jpg,image/jpeg,image/png]',
        'errors' => [
          'max_size' => "Ukuran foto profil tidak boleh lebih dari 2 MB.",
          'is_image' => "Foto profil harus berupa gambar.",
          'mime_in' => "Foto profil harus memiliki salah satu ekstensi berikut: jpg, jpeg, dan png."
        ]
      ],
      'nama_perusahaan' => [
        'rules' => $nameRule,
        'errors' => [
          'required' => 'Nama Perusahaan harus diisi!',
          'is_unique' => 'Nama Perusahaan sudah ada.'
        ]
      ],
      'no_telp_hr' => [
        'rules' => 'required|numeric',
        'errors' => [
          'required' => 'Nomor Telepon harus diisi!',
          'numeric' => 'Nomor Telepon harus berupa angka!'
        ]
      ],
      'alamat_perusahaan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Alamat perusahaan harus diisi!'
        ]
      ],
      'tentang' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Tuliskan tentang perusahaanmu!'
        ]
      ],
    ])) {
      return redirect()->to('/Rekruter/editProfil/' . $id)->withInput();
    }

    // Taking photo profile
    $fotoLogo = $this->request->getFile('foto_logo');
    // If the photo profile not uploaded
    if ($fotoLogo->getError() == 4) {
      $nameFile = $this->request->getVar('fotoProfilOld');
    } else {
      // Take photo profile name as random
      $nameFile = $fotoLogo->getRandomName();
      // Move photo profile to public/img
      $fotoLogo->move('img/rekruter', $nameFile);
    }

    $this->RekruterModel->save([
      'id' => $id,
      'nama_perusahaan' => $this->request->getVar('nama_perusahaan'),
      'no_telp_hr' => $this->request->getVar('no_telp_hr'),
      'alamat_perusahaan' => $this->request->getVar('alamat_perusahaan'),
      'tentang' => $this->request->getVar('tentang'),
      'foto_logo' => $nameFile
    ]);

    session()->setFlashdata('success', 'Profil Berhasil Diubah.');

    return redirect()->to('/Rekruter/index/' . $id);
  }

  public function daftarLowongan($id)
  {
    $currentPage = $this->request->getVar('page_DaftarLowongan') ? $this->request->getVar('page_DaftarLowongan') : 1;

    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $daftar_lowongan = $this->LowonganModel->searchDaftarLowongan($keyword);
    } else {
      $daftar_lowongan = $this->LowonganModel;
    }

    $data = [
      'title' => 'Loma | Daftar Lowongan',
      'daftar_lowongan' => $daftar_lowongan->getDaftarLowongan($id, 10),
      'pager' => $daftar_lowongan->pager,
      'current_page' => $currentPage
    ];

    return view('rekruter/daftar_lowongan', $data);
  }

  public function tambahLowongan($id)  
  {
    $data = [
      'title' => 'Loma | Tambah Lowongan',
      'rekruter' => $this->RekruterModel->getRekruter($id)
    ];

    return view('rekruter/tambah_lowongan', $data);
  }
}
