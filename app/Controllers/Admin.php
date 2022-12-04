<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\LamaranModel;
use App\Models\PelamarModel;
use App\Models\RekruterModel;
use App\Models\LowonganModel;
use App\Models\LisAndSerModel;

class Admin extends BaseController
{
  protected $AdminModel;

  public function __construct()
  {
    $this->AdminModel = new AdminModel();
    $this->PelamarModel = new PelamarModel();
    $this->RekruterModel = new RekruterModel();
    $this->LowonganModel = new LowonganModel();
    $this->LamaranModel = new LamaranModel();
    $this->LisAndSerModel = new LisAndSerModel();
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
  public function simpanDataPelamar($id_pelamar)
  {
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

  public function dataLowongan($id)
  {
    $data = [
      'admin' => $this->AdminModel->getAdmin($id),
      'lowongan' => $this->LowonganModel->select('lowongan.id, lowongan.id_rekruter, lowongan.tipe, lowongan.posisi, lowongan.wilayah_penempatan, lowongan.lama_kegiatan, lowongan.deadline, lowongan.updated_at, rekruter.nama_perusahaan, rekruter.foto_logo, rekruter.tentang')->join('rekruter', 'rekruter.id=lowongan.id_rekruter')->findAll()
    ];

    return view('admin/table_lowongan', $data);
  }

  public function profile($id)
  {
    $data = [
      'admin' => $this->AdminModel->getAdmin($id)
    ];

    return view('admin/profile', $data);
  }
}
