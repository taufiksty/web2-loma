<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\LamaranModel;
use App\Models\PelamarModel;
use App\Models\RekruterModel;
use App\Models\LowonganModel;
use App\Models\LisAndSerModel;
use App\Models\DLKualifikasiModel;
use App\Models\DLDeskripsiModel;
use App\Models\DLBenefitdllModel;

use CodeIgniter\I18n\Time;

class Admin extends BaseController
{
  protected $AdminModel;
  protected $PelamarModel;
  protected $RekruterModel;
  protected $LowonganModel;
  protected $LamaranModel;
  protected $LisAndSerModel;
  protected $DLKualifikasiModel;
  protected $DLDeskripsiModel;
  protected $DLBenefitModel;

  public function __construct()
  {
    $this->AdminModel = new AdminModel();
    $this->PelamarModel = new PelamarModel();
    $this->RekruterModel = new RekruterModel();
    $this->LowonganModel = new LowonganModel();
    $this->LamaranModel = new LamaranModel();
    $this->LisAndSerModel = new LisAndSerModel();
    $this->DLKualifikasiModel = new DLKualifikasiModel();
    $this->DLDeskripsiModel = new DLDeskripsiModel();
    $this->DLBenefitModel = new DLBenefitdllModel();
  }

  /**
   * Dashboard Index Admin
   */
  public function index($id)
  {
    $countPelamar = count($this->PelamarModel->getAllPelamar());
    $countRekruter = count($this->RekruterModel->getAllRekruter());

    $data = [
      'admin' => $this->AdminModel->getAdmin($id),
      'pelamar' => $countPelamar,
      'rekruter' => $countRekruter,
      'lowongan' => count($this->LowonganModel->findAll()),
      'count_admin' => $this->AdminModel->getCountAdmin(),
      'count_user' => $countPelamar + $countRekruter,
      'lamaran' => count($this->LamaranModel->getAllLamaran())
    ];

    return view('admin/index', $data);
  }


  /**
   * Kelola Data Pelamar
   */
  public function dataPelamar($id)
  {
    $data = [
      'admin' => $this->AdminModel->getAdmin($id),
      'pelamar' => $this->PelamarModel->getAllPelamar()
    ];

    return view('admin/table_pelamar', $data);
  }

  public function editPelamar($id_admin, $id_pelamar)
  {
    $data = [
      'admin' => $this->AdminModel->getAdmin($id_admin),
      'pelamar' => $this->PelamarModel->getPelamar($id_pelamar),
      'lis_and_ser' => $this->LisAndSerModel->getLisAndSer($id_pelamar),
      'validation' => \Config\Services::validation()
    ];

    return view('admin/edit_pelamar', $data);
  }

  public function hapusLisensiSertifikasi($id_lis_ser, $id_admin, $id_pelamar)
  {
    $this->LisAndSerModel->delete($id_lis_ser);

    return redirect()->to('/Admin/editPelamar/' . $id_admin . '/' . $id_pelamar)->withInput();
  }

  public function simpanDataPelamar($id_admin, $id_pelamar)
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
      'univ' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Universitas harus diisi!'
        ]
      ],
      'prodi' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'Program Studi harus diisi!'
        ]
      ],
    ])) {
      return redirect()->to('/Admin/editPelamar/' . $id_admin . '/' . $id_pelamar)->withInput();
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

    $this->PelamarModel->save([
      'id' => $id_pelamar,
      'nama' => $this->request->getVar('nama'),
      'username' => $this->request->getVar('username'),
      'email' => $this->request->getVar('email'),
      'no_telp' => $this->request->getVar('no_telp'),
      'alamat' => $this->request->getVar('alamat'),
      'tl' => $this->request->getVar('tl'),
      'gender' => $this->request->getVar('gender'),
      'univ' => $this->request->getVar('univ'),
      'prodi' => $this->request->getVar('prodi'),
      'foto_profil' => $nameFile,
    ]);

    $id_ls = $this->request->getVar('id');
    $ls = $this->request->getVar('ls');
    $id_kred = $this->request->getVar('id_kred');

    for ($i = 0; $i < count($id_ls); $i++) {

      if ($this->LisAndSerModel->getLisAndSerId($id_ls[$i]) == null) {
        $this->LisAndSerModel->save([
          'id_pelamar' => $id_pelamar,
          'ls' => $ls[$i],
          'id_kred' => $id_kred[$i]
        ]);
      } else {
        $this->LisAndSerModel->save([
          'id' => $id_ls[$i],
          'id_pelamar' => $id_pelamar,
          'ls' => $ls[$i],
          'id_kred' => $id_kred[$i]
        ]);
      }
    }

    session()->setFlashdata('message', 'Data Pelamar Berhasil Diubah.');

    return redirect()->to('/Admin/dataPelamar/' . $id_admin);
  }

  public function hapusPelamar($id_admin, $id_pelamar)
  {
    $arrayLisAndSer = $this->LisAndSerModel->getLisAndSer($id_pelamar);
    if ($arrayLisAndSer == null) {
      $this->PelamarModel->delete($id_pelamar);
    } else {
      foreach ($arrayLisAndSer as $aLAS) {
        $this->LisAndSerModel->delete($aLAS['id']);
      }
      $this->PelamarModel->delete($id_pelamar);
    }

    session()->setFlashdata('message', 'Data Pelamar Berhasil Dihapus.');

    return redirect()->to('/Admin/dataPelamar/' . $id_admin);
  }


  /**
   * Kelola Data Rekruter
   */
  public function dataRekruter($id)
  {
    $data = [
      'admin' => $this->AdminModel->getAdmin($id),
      'rekruter' => $this->RekruterModel->getAllRekruter()
    ];

    return view('admin/table_rekruter', $data);
  }

  public function editRekruter($id_admin, $id_rekruter)
  {
    $data = [
      'admin' => $this->AdminModel->getAdmin($id_admin),
      'rekruter' => $this->RekruterModel->getRekruter($id_rekruter),
      'validation' => \Config\Services::validation()
    ];

    return view('admin/edit_rekruter', $data);
  }

  public function simpanDataRekruter($id_admin, $id_rekruter)
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
      return redirect()->to('/Admin/editRekruter/' . $id_admin . '/' . $id_rekruter)->withInput();
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
      'id' => $id_rekruter,
      'nama_perusahaan' => $this->request->getVar('nama_perusahaan'),
      'no_telp_hr' => $this->request->getVar('no_telp_hr'),
      'alamat_perusahaan' => $this->request->getVar('alamat_perusahaan'),
      'tentang' => $this->request->getVar('tentang'),
      'foto_logo' => $nameFile
    ]);

    session()->setFlashdata('message', 'Data Rekruter Berhasil Diubah.');

    return redirect()->to('/Admin/dataRekruter/' . $id_admin);
  }

  public function hapusRekruter($id_admin, $id_rekruter)
  {
    $arrayLowongan = $this->LowonganModel->where(['id_rekruter' => $id_rekruter])->findAll();

    foreach ($arrayLowongan as $aL) {
      if ($this->DLKualifikasiModel->getDLKualifikasi($aL['id']) == null && $this->DLDeskripsiModel->getDLDeskripsi($aL['id']) == null && $this->DLBenefitModel->getDLBenefitdll($aL['id']) == null) {
        $this->LowonganModel->delete($aL['id']);
      } else {
        foreach ($this->DLKualifikasiModel->getDLKualifikasi($aL['id']) as $aK) {
          $this->DLKualifikasiModel->delete($aK['id']);
        }
        foreach ($this->DLDeskripsiModel->getDLDeskripsi($aL['id']) as $aD) {
          $this->DLDeskripsiModel->delete($aD['id']);
        }
        foreach ($this->DLBenefitModel->getDLBenefitdll($aL['id']) as $aB) {
          $this->DLBenefitModel->delete($aB['id']);
        }
        $this->LowonganModel->delete($aL['id']);
      }
    }

    $this->RekruterModel->delete($id_rekruter);

    session()->setFlashdata('message', 'Data Rekruter Berhasil Dihapus.');

    return redirect()->to('Admin/dataRekruter/' . $id_admin);
  }


  /**
   * Kelola Data Lowongan
   */
  public function dataLowongan($id)
  {
    $data = [
      'admin' => $this->AdminModel->getAdmin($id),
      'lowongan' => $this->LowonganModel->select('lowongan.id, lowongan.id_rekruter, lowongan.tipe, lowongan.posisi, lowongan.wilayah_penempatan, lowongan.lama_kegiatan, lowongan.deadline, lowongan.updated_at, rekruter.nama_perusahaan, rekruter.foto_logo, rekruter.tentang')->join('rekruter', 'rekruter.id=lowongan.id_rekruter')->findAll()
    ];

    return view('admin/table_lowongan', $data);
  }

  public function hapusLowongan($id_admin, $id_lowongan)
  {
    $lowongan = $this->LowonganModel->where(['id' => $id_lowongan])->first();

    if ($this->DLKualifikasiModel->getDLKualifikasi($lowongan['id']) == null && $this->DLDeskripsiModel->getDLDeskripsi($lowongan['id']) == null && $this->DLBenefitModel->getDLBenefitdll($lowongan['id']) == null) {
      $this->LowonganModel->delete($lowongan['id']);
    } else {
      foreach ($this->DLKualifikasiModel->getDLKualifikasi($lowongan['id']) as $k) {
        $this->DLKualifikasiModel->delete($k['id']);
      }
      foreach ($this->DLDeskripsiModel->getDLDeskripsi($lowongan['id']) as $d) {
        $this->DLDeskripsiModel->delete($d['id']);
      }
      foreach ($this->DLBenefitModel->getDLBenefitdll($lowongan['id']) as $b) {
        $this->DLBenefitModel->delete($b['id']);
      }
      $this->LowonganModel->delete($lowongan['id']);
    }

    session()->setFlashdata('message', 'Data Lowongan Berhasil Dihapus.');

    return redirect()->to('Admin/dataLowongan/' . $id_admin);
  }


  /**
   * Kelola Profile Admin
   */
  public function profile($id)
  {
    $data = [
      'admin' => $this->AdminModel->getAdmin($id)
    ];

    return view('admin/profile', $data);
  }

  public function editAdmin($id)
  {
    $data = [
      'admin' => $this->AdminModel->getAdmin($id)
    ];

    return view('admin/edit_profile', $data);
  }

  public function simpanProfile($id)
  {
    $this->AdminModel->save([
      'id' => $id,
      'email' => $this->request->getVar('email'),
      'nama' => $this->request->getVar('nama'),
      'no_telp' => $this->request->getVar('no_telp'),
      'location' => $this->request->getVar('location'),
      'facebook' => $this->request->getVar('facebook'),
      'twitter' => $this->request->getVar('twitter'),
      'instagram' => $this->request->getVar('instagram'),
      'updated_at' => Time::now()
    ]);

    session()->setFlashdata('message', 'Profil Anda Berhasil Diubah.');

    // return redirect()->to('Admin/profile/'.$id);
  }
}
