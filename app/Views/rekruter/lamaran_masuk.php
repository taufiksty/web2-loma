<?= $this->extend('layout/rekruter/template_daftar_lowongan'); ?>

<?= $this->section('content'); ?>

<div class="flex flex-col w-full lg:flex-row my-24">
  <div class="sticky top-20 px-14 h-full card rounded-box place-items-center">
    <div class="avatar">
      <div class="w-28 rounded">
        <img src="<?= base_url(); ?>/img/rekruter/<?= $detail_lowongan[0]['foto_logo']; ?>" />
      </div>
    </div>
    <p class="mt-3 font-bold text-xl"><?= $detail_lowongan[0]['posisi']; ?></p>
    <p class="mt-3 font-semibold text-lg"><?= $detail_lowongan[0]['nama_perusahaan']; ?></p>
    <p class="mt-3 text-lg"><?= $detail_lowongan[0]['wilayah_penempatan']; ?></p>
    <p class="mt-3 text-lg text-center">Ditayangkan pada <?= $interval; ?> hari yang lalu</p>
  </div>

  <div class="grid flex-grow h-full card rounded-box place-items-start px-7 pt-5">
    <div class="grid grid-cols-3 gap-4">
      <div class="text-center bg-accent rounded-2xl py-1 px-4">
        <p class="text-sm">Jumlah Lowongan Masuk</p>
        <p class="text-base font-bold"><?= count($lamaran); ?></p>
      </div>
      <div class="col-span-2 py-1">
        <form action="">
          <div class="form-control ">
            <div class="input-group">
              <input type="text" placeholder="Cari Pelamar..." class="input input-bordered w-full" name="keyword" value="<?= (old('keyword')) ? old('keyword') : '' ?>" />
              <button class="btn btn-square bg-slate-900" type="submit" name="submit">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="overflow-x-auto w-full mt-9 pr-10">
      <table class="table w-full">
        <!-- head -->
        <thead>
          <tr>
            <th>Nama</th>
            <th>Pendidikan</th>
            <th>Email</th>
            <th>No Telp</th>
            <th>SK</th>
            <th>CV</th>
          </tr>
        </thead>
        <tbody>
          <!-- row data -->
          <?php foreach ($lamaran as $l) : ?>
            <tr>
              <td>
                <div class="flex items-center space-x-3">
                  <div class="avatar">
                    <div class="mask mask-squircle w-12 h-12">
                      <img src="<?= base_url(); ?>/img/pelamar/<?= $l['foto_profil']; ?>" alt="foto profil pelamar" />
                    </div>
                  </div>
                  <div>
                    <div class="font-bold"><?= $l['nama']; ?></div>
                    <div class="text-sm opacity-50"><?= $l['gender']; ?></div>
                  </div>
                </div>
              </td>
              <td>
                <?= $l['prodi']; ?>
                <br />
                <span class="badge badge-ghost badge-sm"><?= $l['univ']; ?></span>
              </td>
              <td><?= $l['email']; ?></td>
              <td><?= $l['no_telp']; ?></td>
              <td>
                <a href="<?= base_url(); ?>/file/sk_mahasiswa_aktif/<?= $l['sk_mahasiswa_aktif']; ?>" class="btn btn-ghost btn-xs bg-slate-100" target="_blank">SK</a>
              </td>
              <td>
                <a href="<?= base_url(); ?>/file/cv/<?= $l['cv']; ?>" class="btn btn-ghost btn-xs bg-slate-100" target="_blank">CV</a>
              </td>

            </tr>
          <?php endforeach; ?>

        </tbody>

      </table>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>