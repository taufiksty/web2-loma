<?php

namespace App\Controllers;

use App\Models\LamaranModel;
use App\Models\PelamarModel;
use App\Models\LisAndSerModel;
use App\Models\LowonganModel;

use CodeIgniter\I18n\Time;
use DateTime;

class Pelamar extends BaseController
{
  protected $PelamarModel;
  protected $LisAndSerModel;
  public function __construct()
  {
    $this->PelamarModel = new PelamarModel();
    $this->LisAndSerModel = new LisAndSerModel();
    $this->LowonganModel = new LowonganModel();
    $this->LamaranModel = new LamaranModel();
  }

  public function index($id)
  {
    $data = [
      'title' => 'Loma | Profil',
      'pelamar' => $this->PelamarModel->getPelamar($id),
      'lis_and_ser' => $this->LisAndSerModel->getLisAndSer($id)
    ];

    return view('pelamar/profil', $data);
  }

  public function editProfil($id)
  {
    $data = [
      'title' => 'Loma | Edit Profil',
      'pelamar' => $this->PelamarModel->getPelamar($id),
      'lis_and_ser' => $this->LisAndSerModel->getLisAndSer($id),
      'validation' => \Config\Services::validation()
    ];

    return view('pelamar/edit_profil', $data);
  }

  public function simpan($id)
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
      return redirect()->to('/Pelamar/editProfil/' . $id)->withInput();
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
      'id' => $id,
      'nama' => $this->request->getVar('nama'),
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
          'id_pelamar' => $id,
          'ls' => $ls[$i],
          'id_kred' => $id_kred[$i]
        ]);
      } else {
        $this->LisAndSerModel->save([
          'id' => $id_ls[$i],
          'id_pelamar' => $id,
          'ls' => $ls[$i],
          'id_kred' => $id_kred[$i]
        ]);
      }
    }

    session()->setFlashdata('success', 'Profil Berhasil Diubah.');

    return redirect()->to('/Pelamar/index/' . $id);
  }


  /**
   * Controller to histori lamaran of pelamar
   */
  public function historiLamaran($id_pelamar)
  {
    $data = [
      'title' => 'Loma | Histori Lamaran',
      'lamaran' => $this->LamaranModel->getLamaran($id_pelamar)
    ];

    return view('pelamar/histori_lamaran', $data);
  }

  public function lamar($tipe, $id_lowongan)
  {
    $detail_lowongan = $this->LowonganModel->getDetailLowongan($tipe, $id_lowongan);

    $tgl_update = new DateTime($detail_lowongan[0]['updated_at']);
    $tgl_now = Time::now();
    $interval = $tgl_now->diff($tgl_update);

    $data = [
      'title' => 'Loma | Lamar Lowongan',
      'detail_lowongan' => $detail_lowongan,
      'interval' => $interval->format('%D'),
      'pelamar' => $this->PelamarModel->getPelamar(19211101),
      'lamaran' => $this->LamaranModel,
      'validation' => \Config\Services::validation()
    ];

    return view('pelamar/lamar', $data);
  }

  public function simpanLamaran()
  {
    // // Validation input
    // if (!$this->validate([
    //   'sk_mahasiswa_aktif' => [
    //     'rules' => 'required|max_size[sk_mahasiswa_aktif,2048]',
    //     'errors' => [
    //       'required' => "Surat keterangan mahasiswa aktif terbaru harus diisi!",
    //       'max_size' => "Ukuran maksimal file 2 MB.",
    //       // 'mime_in' => "File harus dalam format PDF!"
    //     ]
    //   ],
    //   'cv' => [
    //     'rules' => 'required|max_size[cv,2048]',
    //     'errors' => [
    //       'required' => "CV terbaru harus diisi!",
    //       'max_size' => "Ukuran maksimal file 2 MB.",
    //       // 'mime_in' => "File harus dalam format PDF!"
    //     ]
    //   ],
    // ])) {
    //   return redirect()->to('/Pelamar/lamar/'.$this->request->getVar('tipe').'/'.$this->request->getVar('id_lowongan'))->withInput();
    // }

    // Taking file
    $skMahasiswaAktif = $this->request->getFile('sk_mahasiswa_aktif');
    $cv = $this->request->getFile('cv');
    
    // Take file name as random
    $nameSkMahasiswaAktif = $skMahasiswaAktif->getRandomName();
    $nameCv = $cv->getRandomName();

    // Move file to public/img
    $skMahasiswaAktif->move('file/sk_mahasiswa_aktif', $nameSkMahasiswaAktif);
    $cv->move('file/cv', $nameCv);

    // Save to database lamaran's table
    $this->LamaranModel->save([
      'id_lowongan' => $this->request->getVar('id_lowongan'),
      'id_pelamar' => $this->request->getVar('id_pelamar'),
      'sk_mahasiswa_aktif' => $nameSkMahasiswaAktif,
      'cv' => $nameCv,
      'created_at' => Time::now()
    ]);

    session()->setFlashdata('success', 'Lamaran berhasil dikirim.');

    return redirect()->to('/Pelamar/index/'.$this->request->getVar('id_pelamar'));
  }
}
