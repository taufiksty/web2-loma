<?= $this->extend('layout/pelamar/template_magang'); ?>

<?= $this->section('content'); ?>

<div class="flex flex-col w-full lg:flex-row my-24">
  <div class="sticky top-20 px-14 h-full card rounded-box place-items-center">
    <div class="avatar">
      <div class="w-28 rounded">
        <img src="<?= base_url(); ?>/img/rekruter/<?= $detail_magang[0]['foto_logo']; ?>" />
      </div>
    </div>
    <p class="mt-4 font-bold text-xl"><?= $detail_magang[0]['posisi']; ?></p>
    <p class="mt-4 font-semibold text-lg"><?= $detail_magang[0]['nama_perusahaan']; ?></p>
    <p class="mt-4 text-lg"><?= $detail_magang[0]['wilayah_penempatan']; ?></p>
    <p class="mt-4 text-lg">Ditayangkan pada <?= $interval; ?> hari yang lalu</p>
  </div>

  <div class="grid flex-grow h-full card rounded-box place-items-center px-14 pt-5">
    <p class="font-extrabold text-2xl"><?= $detail_magang[0]['tipe']; ?> (<?= $detail_magang[0]['lama_kegiatan']; ?> bulan)</p>

    <div class="card w-full bg-slate-100 shadow-xl mt-7">
      <div class="card-body">
        <h2 class="card-title">Kualifikasi :</h2>
        <?php foreach ($dl_kualifikasi as $dk) :; ?>
          <ul class="pl-5">
            <li class="list-disc text-lg"><?= $dk['kualifikasi']; ?></li>
          </ul>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="card w-full bg-slate-100 shadow-xl mt-7">
      <div class="card-body">
        <h2 class="card-title">Deskripsi :</h2>
        <?php foreach ($dl_deskripsi as $dd) :; ?>
          <ul class="pl-5">
            <li class="list-disc text-lg"><?= $dd['deskripsi']; ?></li>
          </ul>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="card w-full bg-slate-100 shadow-xl mt-7">
      <div class="card-body">
        <h2 class="card-title">Benefit :</h2>
        <?php foreach ($dl_benefit as $db) :; ?>
          <ul class="pl-5">
            <li class="list-disc text-lg"><?= $db['benefit']; ?></li>
          </ul>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="flex justify-end w-full mt-24">
      <p class="text-base font-normal mr-20 flex items-center">Merasa janggal dengan lowongan di atas? Laporkan <a href="" class="underline text-blue-500">di sini</a></p>
      <a href="<?= base_url(); ?>/lamar/<?= $detail_magang[0]['tipe'] ?>/<?= $detail_magang[0]['id']; ?>/<?= $pelamar['id']; ?>" class="btn btn-primary px-20 font-bold text-lg">Lamar</a>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>