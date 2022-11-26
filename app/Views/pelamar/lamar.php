<!-- Call a template -->
<?= $this->extend('layout/pelamar/template_' . strtolower($detail_lowongan[0]['tipe'])); ?>

<!-- Section of content -->
<?= $this->section('content'); ?>

<div class="flex flex-col w-full lg:flex-row my-24">
  <div class="sticky top-20 px-14 h-full card rounded-box place-items-center">
    <div class="avatar">
      <div class="w-28 rounded">
        <img src="<?= base_url(); ?>/img/rekruter/<?= $detail_lowongan[0]['foto_logo']; ?>" />
      </div>
    </div>
    <p class="mt-4 font-bold text-xl"><?= $detail_lowongan[0]['posisi']; ?></p>
    <p class="mt-4 font-semibold text-lg"><?= $detail_lowongan[0]['nama_perusahaan']; ?></p>
    <p class="mt-4 text-lg"><?= $detail_lowongan[0]['wilayah_penempatan']; ?></p>
    <p class="mt-4 text-lg">Ditayangkan pada <?= $interval; ?> hari yang lalu</p>
  </div>

  <div class="divider divider-horizontal"></div>

  <div class="grid flex-grow h-full card rounded-box place-items-center px-14 pt-5">
    <p class="font-extrabold text-2xl">Bersiap Lamar Lowongan</p>
    <p class="mt-10 font-normal text-base">Perhatikan apakah profilmu sudah lengkap?</p>
    <p class="font-normal text-base mt-2">Jika belum harap dilengkapi agar lamaranmu bisa diproses oleh rekruter</p>

    <form action="/Pelamar/simpanLamaran" method="POST" enctype="multipart/form-data">
      <?= csrf_field(); ?>

      <input type="hidden" name="id_lowongan" id="idLowongan" value="<?= $detail_lowongan[0]['id']; ?>">
      <input type="hidden" name="id_pelamar" id="idPelamar" value="<?= $pelamar['id']; ?>">
      <input type="hidden" name="tipe" id="tipe" value="<?= $detail_lowongan[0]['tipe']; ?>">

      <div class="min-w-full">
        <div class="form-control mt-10 w-full">
          <label class="label">
            <span class="label-text text-lg font-medium">Surat Keterangan Mahasiswa Aktif Terbaru</span>
          </label>
          <label class="input-group input-group-vertical">
            <span>(Minimal ukuran file 2 MB dengan format PDF)</span>
            <input type="file" name="sk_mahasiswa_aktif" class="file-input file-input-bordered file-input-md file-input-primary w-full max-w-md p-4
            file:mr-4 file:py-2 file:px-4
            file:rounded-full file:border-0
            file:text-sm file:font-semibold
          file:bg-violet-50 file:text-violet-700
          hover:file:bg-violet-100 " />
          </label>
          <label class="label w-full invalid:block">
            <span class="label-text-alt text-red-500"></span>
          </label>
        </div>

        <div class=" form-control mt-10 w-full">
          <label class="label">
            <span class="label-text text-lg font-medium">Curriculum Vitae (CV) Terbaru</span>
          </label>
          <label class="input-group input-group-vertical">
            <span>(Minimal ukuran file 2 MB dengan format PDF)</span>
            <input type="file" name="cv" class="file-input file-input-bordered file-input-md file-input-primary w-full max-w-md p-4
            file:mr-4 file:py-2 file:px-4
            file:rounded-full file:border-0
            file:text-sm file:font-semibold
          file:bg-violet-50 file:text-violet-700
          hover:file:bg-violet-100 " />
          </label>
          <label class="label w-full invalid:block">
            <span class="label-text-alt text-red-500"></span>
          </label>
        </div>

        <div class="form-control w-full mt-10">
          <label class="label cursor-pointer">
            <span class="label-text text-base font-normal">Saya menyatakan kebenaran atas file di atas</span>
            <input type="checkbox" name="remember" class="checkbox checkbox-primary" required />
          </label>
        </div>

        <div class="flex justify-end w-full mt-16">
          <button type="submit" class="btn btn-outline btn-accent px-4 font-semibold text-base">Kirim Lamaran</button>
        </div>
      </div>
    </form>
  </div>

</div>



<?= $this->endSection(); ?>