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
      'pelamar' => $this->PelamarModel->getPelamar($id_pelamar)
    ];

    return view('pelamar/edit_profil', $data);
  }

  public function historiLamaran()
  {
    $data = [
      'title' => 'Loma | Histori Lamaran',
    ];

    return view('pelamar/histori_lamaran', $data);
  }

}
