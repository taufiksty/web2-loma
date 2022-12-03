<?php 

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\LamaranModel;
use App\Models\PelamarModel;
use App\Models\RekruterModel;
use App\Models\LowonganModel;

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
      // 'lowongan' => count($this->LowonganModel->getAllLowongan()),
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

  public function editPelamar($id_pelamar)
  {
    $data = [
      'title' => 'Loma | Edit Data Pelamar',
      'pelamar' => $this->PelamarModel->getPelamar($id_pelamar)
    ];

    return view('admin/editPelamar', $data);
  }
  
  public function simpanDataPelamar($id_pelamar)
  {

  }


  /**
   * Kelola Data Rrkruter
   */
  public function dataRekruter($id)
  {
    $data = [
      'admin' => $this->AdminModel->getAdmin($id),
      'rekruter' => $this->RekruterModel->getAllRekruter()
    ];

    return view('admin/table_rekruter', $data);
  }

  public function dataLowongan()
  {
    return view('admin/table_lowongan');
  }

  public function profile($id)
  {
    $data = [
      'admin' => $this->AdminModel->getAdmin($id)
    ];

    return view('admin/profile', $data);
  }
}