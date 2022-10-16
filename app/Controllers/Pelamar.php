<?php

namespace App\Controllers;

use App\Models\PelamarModel;

class Pelamar extends BaseController
{
  protected $PelamarModel;
  public function __construct()
  {
    $this->PelamarModel = new PelamarModel();
  }

  public function index($id_pelamar)
  {
    $data = [
      'title' => 'Loma | Profil',
      'pelamar' => $this->PelamarModel->getPelamar($id_pelamar)
    ];

    return view('pelamar/profil', $data);
  }
}
