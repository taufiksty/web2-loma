<?php

namespace App\Controllers;

use App\Models\LowonganModel;

class Magang extends BaseController
{
  protected $LowonganModel;

  public function __construct()
  {
    $this->LowonganModel = new LowonganModel();
  }

  public function index()
  {
    $currentPage = $this->request->getVar('page_magang') ? $this->request->getVar('page_magang') : 1;

    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $magang = $this->LowonganModel->search($keyword);
    } else {
      $magang = $this->LowonganModel;
    }

    $data = [
      'title' => 'Loma | Magang',
      // 'magang' => $this->MagangModel->getLowongan('Magang'),
      // 'magang' => $this->MagangModel->getLowongan('Magang')
      'magang' => $magang->getMagang('Magang', 10),
      'pager' => $magang->pager,
      'current_page' => $currentPage
    ];

    // dd($data['magang']);
    return view('magang/index', $data);
  }
  
  public function detailLowongan()
  {
    $data = [
      'title' => 'Loma | Magang',
    ];

    return view('magang/detail_lowongan', $data);
  }
}
