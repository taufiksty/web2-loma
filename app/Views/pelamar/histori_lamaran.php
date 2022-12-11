<!-- Call a template -->
<?= $this->extend('layout/pelamar/template_histori_lamaran'); ?>

<!-- Section of content -->
<?= $this->section('content'); ?>

<!-- Container at all or main section -->
<div class="container mt-24 ml-10">

  <!-- Make a grid layout for splicing view to three side -->
  <div class="grid w-auto" style="grid-template-columns: 18% 5% 70%;">

    <!-- Left side contains option of profile and application history -->
    <div class="h-full place-items-start">
      <ul class="menu card rounded-box bg-base-300 md:w-56 fixed">
        <li><a href="<?= base_url(); ?>/Pelamar/index/<?= $pelamar['id']; ?>">Profil</a></li>
        <li><a href="#" class="active">Histori</a></li>
      </ul>
    </div>

    <!-- Center side contains vertical line which dividing into two side (left & right) -->
    <div class="divider divider-horizontal"></div>

    <!-- Right side contains the application history of applicant -->
    <div class="grid grid-cols-3 gap-x-2 gap-y-5 place-items-center mb-14">

      <?php foreach ($lamaran as $l) : ?>
        <!-- Card items of application history -->
        <div class="card card-compact w-80 bg-base-100 shadow-xl px-8 min-h-full">

          <!-- Image logo of recruiter's company -->
          <img src="<?= base_url(); ?>/img/rekruter/<?= $l['foto_logo']; ?>" class="h-40 w-40 ml-12 mt-10" alt="Logo Perusahaan"/>

          <!-- Fill in the vacancies that have been applied for -->
          <div class="card-body">
            <p class="text-2xl font-semibold mt-2"><?= $l['nama_perusahaan']; ?></p>
            <div class="mt-2">
              <p class="text-xl font-semibold"><?= $l['tipe']; ?></p>
              <p><?= $l['posisi']; ?></p>
            </div>
            <div class="mt-2">
              <p class="text-xl font-semibold">Tanggal Kirim</p>
              <p><?= date('j F Y', strtotime($l['updated_at'])); ?></p>
            </div>
            <div class="mt-2">
              <p class="text-xl font-semibold">Deadline Lowongan</p>
              <p><?= date('j F Y', strtotime($l['deadline'])); ?></p>
            </div>

            <!-- Button for the details -->
            <div class="card-actions justify-center my-5">
              <a href="<?= base_url(); ?>/<?= $l['tipe']; ?>/detailLowongan/<?= $l['id_lowongan']; ?>/<?= $l['id_pelamar']; ?>" class="btn btn-primary px-10">Detail</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
  </div>
</div>

<!-- End of section content -->
<?= $this->endSection(); ?>