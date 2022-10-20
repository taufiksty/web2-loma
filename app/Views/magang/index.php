<?= $this->extend('layout/pelamar/template_magang'); ?>

<?= $this->section('content'); ?>

<div class="overflow-x-auto mx-32 mt-44 mb-32">
  <table class="table w-full text-center">
    <!-- head -->
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Perusahaan/<br>Lembaga</th>
        <th>Jenis<br>Lowongan</th>
        <th>Deadline</th>
        <th>Detail<th>
      </tr>
    </thead>
    <tbody>
      <tr class="hover">
        <td>1</td>       
        <th>PT Sampoerna</th>
        <td>Sosial Media<br>Strategist</td>
        <td>15 Mei 2021</td>
        <td><a class="btn btn-active btn-primary">Detail</a></td>
      </tr>
      <tr class="hover">
        <td></td>       
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr class="hover">
        <td></td>       
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </tbody>
  </table>
</div>

<?= $this->endSection(); ?>