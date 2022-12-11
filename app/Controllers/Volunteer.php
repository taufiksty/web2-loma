<?php

namespace App\Controllers;

use App\Models\LowonganModel;
use App\Models\PelamarModel;
use App\Models\RekruterModel;
use App\Models\DLKualifikasiModel;
use App\Models\DLDeskripsiModel;
use App\Models\DLBenefitdllModel;

use CodeIgniter\I18n\Time;
use DateTime;

class Volunteer extends BaseController
{
  protected $LowonganModel;
  protected $PelamarModel;
  protected $RekruterModel;
  protected $DLKualifikasiModel;
  protected $DLDeskripsiModel;
  protected $DLBenefitdllModel;

  public function __construct()
  {
    $this->LowonganModel = new LowonganModel();
    $this->PelamarModel = new PelamarModel();
    $this->RekruterModel = new RekruterModel();
    $this->DLKualifikasiModel = new DLKualifikasiModel();
    $this->DLDeskripsiModel = new DLDeskripsiModel();
    $this->DLBenefitdllModel = new DLBenefitdllModel();
  }

  public function index($id_pelamar)
  {
    $currentPage = $this->request->getVar('page_Volunteer') ? $this->request->getVar('page_Volunteer') : 1;

    $keyword = $this->request->getVar('keyword');
    if ($keyword) {
      $volunteer = $this->LowonganModel->search($keyword);
    } else {
      $volunteer = $this->LowonganModel;
    }

    $data = [
      'title' => 'Loma | Volunteer',
      'pelamar' => $this->PelamarModel->getPelamar($id_pelamar),
      'volunteer' => $volunteer->getLowongan('Volunteer', 10),
      'pager' => $volunteer->pager,
      'current_page' => $currentPage
    ];

    // dd($data['magang']);
    return view('volunteer/index', $data);
  }

  public function detailLowongan($id, $id_pelamar)
  {
    $detail_volunteer = $this->LowonganModel->getDetailLowongan('Volunteer', $id);

    $tgl_update = new DateTime($detail_volunteer[0]['updated_at']);
    $tgl_now = Time::now();
    $interval = $tgl_now->diff($tgl_update);

    $data = [
      'title' => 'Loma | Detail Lowongan',
      'detail_volunteer' => $detail_volunteer,
      'interval' => $interval->days,
      'dl_kualifikasi' => $this->DLKualifikasiModel->getDLKualifikasi($id),
      'dl_deskripsi' => $this->DLDeskripsiModel->getDLDeskripsi($id),
      'dl_benefit' => $this->DLBenefitdllModel->getDLBenefitdll($id),
      'pelamar' => $this->PelamarModel->getPelamar($id_pelamar),
    ];

    // dd($data['detail_volunteer']);
    return view('volunteer/detail_lowongan', $data);
  }

  public function detailDaftarLowongan($id, $id_rekruter)
  {
    $detail_volunteer = $this->LowonganModel->getDetailLowongan('Volunteer', $id);

    $tgl_update = new DateTime($detail_volunteer[0]['updated_at']);
    $tgl_now = Time::now();
    $interval = $tgl_now->diff($tgl_update);

    $data = [
      'rekruter' => $this->RekruterModel->getRekruter($id_rekruter),
      'title' => 'Loma | Detail Lowongan',
      'detail_volunteer' => $detail_volunteer,
      'interval' => $interval->days,
      'dl_kualifikasi' => $this->DLKualifikasiModel->getDLKualifikasi($id),
      'dl_deskripsi' => $this->DLDeskripsiModel->getDLDeskripsi($id),
      'dl_benefit' => $this->DLBenefitdllModel->getDLBenefitdll($id),
    ];

    // dd($data['detail_volunteer']);
    return view('volunteer/detail_daftar_lowongan', $data);
  }

  public function hapusLowongan($id, $id_rekruter)
  {
    $this->LowonganModel->delete($id);

    session()->setFlashdata('success', 'Lowongan berhasil dihapus.');

    return redirect()->to('/Rekruter/daftarLowongan/' . $id_rekruter);
  }
}
