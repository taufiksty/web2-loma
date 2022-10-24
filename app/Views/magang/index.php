<?= $this->extend('layout/pelamar/template_magang'); ?>

<?= $this->section('content'); ?>

<div class="form-control mt-36 mx-32">
  <div class="input-group">
    <input type="text" placeholder="Cari…" class="input input-bordered w-1/3" />
    <button class="btn btn-square">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
      </svg>
    </button>
  </div>
</div>

<div class="overflow-x-auto mx-32 mt-10 mb-32">
  <table class="table w-full text-center">
    <!-- head -->
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Perusahaan/<br>Lembaga</th>
        <th>Posisi</th>
        <th>Deadline</th>
        <th>Detail</th>
      </tr>
    </thead>
    
    <?php $no = 1; ?>
    <?php foreach ($magang as $m) : ?>
    <tbody>
      <tr class="hover">
        <td><?= $no++; ?></td>
        <th><?= $m['id_rekruter']; ?></th>
        <td><?= $m['posisi']; ?></td>
        <td><?= $m['deadline']; ?></td>
        <td><a class="btn btn-active btn-primary">Detail</a></td>
      </tr>
    </tbody>
    <?php endforeach; ?>
  </table>
</div>

<?= $this->endSection(); ?>