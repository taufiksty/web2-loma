<?php

namespace App\Controllers;

use App\Models\RekruterModel;
use App\Models\LowonganModel;
use App\Models\DLKualifikasiModel;
use App\Models\DLDeskripsiModel;
use App\Models\DLBenefitdllModel;
use CodeIgniter\I18n\Time;

class Rekruter extends BaseController
{
  protected $RekruterModel;

  public function __construct()
  {
    $this->RekruterModel = new RekruterModel();
    $this->LowonganModel = new LowonganModel();
    $this->DLKualifikasiModel = new DLKualifikasiModel();
    $this->DLDeskripsiModel = new DLDeskripsiModel();
    $this->DLBenefitdllModel = new DLBenefitdllModel();
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
      'rekruter' => $this->RekruterModel->getRekruter($id),
      'daftar_lowongan' => $daftar_lowongan->getDaftarLowongan($id, 5),
      'pager' => $daftar_lowongan->pager,
      'current_page' => $currentPage
    ];

    return view('rekruter/daftar_lowongan', $data);
  }

  public function tambahLowongan($id)
  {
    $data = [
      'title' => 'Loma | Tambah Lowongan',
      'rekruter' => $this->RekruterModel->getRekruter($id),
      'validation' => \Config\Services::validation()
    ];

    return view('rekruter/tambah_lowongan', $data);
  }

  public function simpanLowongan($id)
  {
    if (!$this->validate([
      'jenis_lowongan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Jenis lowongan harus dipilih.'
        ]
      ],
      'lama_kegiatan' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Lama kegiatan harus diisi.'
        ]
      ],
      'posisi' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Posisi harus diisi.'
        ]
      ],
      'wilayah_penempatan' => [
        'rules' => 'required',
        'errors' => 'Wilayah penem[atan harus diisi.'
      ],
      'deadline' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Deadline harus diisi.'
        ]
      ],
    ])) {
      return redirect()->to('/Rekruter/tambahLowongan/' . $id)->withInput();
    }

    $this->LowonganModel->save([
      'id_rekruter' => $id,
      'tipe' => $this->request->getVar('jenis_lowongan'),
      'posisi' => $this->request->getVar('posisi'),
      'wilayah_penempatan' => $this->request->getVar('wilayah_penempatan'),
      'lama_kegiatan' => $this->request->getVar('lama_kegiatan'),
      'deadline' => $this->request->getVar('deadline'),
      'created_at' => Time::now()
    ]);
    
    $kualifikasi = $this->request->getVar('kualifikasi');
    $deskripsi_pekerjaan = $this->request->getVar('deskripsi_pekerjaan');
    $benefit_dll = $this->request->getVar('benefit_dll');
    $id_lowongan = $this->LowonganModel->getLowonganId();

    for ($i = 0; $i < count($kualifikasi); $i++) {
      $this->DLKualifikasiModel->save([
        'id_lowongan' => $id_lowongan[0],
        'kualifikasi' => $kualifikasi[$i]
      ]);
    }

    for ($i = 0; $i < count($deskripsi_pekerjaan); $i++) {
      $this->DLDeskripsiModel->save([
        'id_lowongan' => $id_lowongan[0],
        'deskripsi' => $deskripsi_pekerjaan[$i]
      ]);
    }

    for ($i = 0; $i < count($benefit_dll); $i++) {
      $this->DLBenefitdllModel->save([
        'id_lowongan' => $id_lowongan[0],
        'benefit' => $benefit_dll[$i]
      ]);
    }

    session()->setFlashdata('success', 'Lowongan berhasil ditambahkan.');

    return redirect()->to('/Rekruter/daftarLowongan/' . $id);
    
  }
}
