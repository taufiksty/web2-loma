<?= $this->extend('layout/rekruter/template_daftar_lowongan'); ?>

<?= $this->section('content'); ?>

<form action="<?= base_url(); ?>/Rekruter/simpanLowongan/<?= $rekruter['id']; ?>" method="POST" enctype="multipart/form-data">
  <?= csrf_field(); ?>

  <div class="h-fit card place-items-center mt-28 px-72 w-full pb-5 overflow-y-auto">

    <p class="mb-10 font-bold text-2xl">Form Edit Lowongan</p>

    <label class="input-group input-group-vertical">
      <span>Jenis Lowongan</span>
      <select class="select select-bordered w-full rounded-none rounded-b-lg <?= ($validation->hasError('jenis_lowongan')) ? 'is-invalid' : ''; ?>" name="jenis_lowongan" id="jenisLowongan" required>
        <option disabled selected>Pilih jenis lowongan?</option>
        <option value="Magang">Magang</option>
        <option value="Parttime">Parttime</option>
        <option value="Volunteer">Volunteer</option>
      </select>
    </label>
    <label class="label w-full invalid:block">
      <span class="label-text-alt text-red-500"><?= $validation->getError('jenis_lowongan'); ?></span>
    </label>

    <label class="input-group input-group-vertical">
      <span>Lama Kegiatan</span>
      <label class="input-group rounded-none w-full">
        <div class="w-full">
          <input type="number" placeholder="cth. 3" class="input input-bordered w-full <?= ($validation->hasError('lama_kegiatan')) ? 'is-invalid' : ''; ?>" name="lama_kegiatan" id="lamaKegiatan" value="<?= (old('lama_kegiatan')) ? old('lama_kegiatan') : $lowongan['lama_kegiatan']; ?>" />
        </div>
        <span class="px-16 rounded-none">Bulan</span>
      </label>
    </label>
    <label class="label w-full invalid:block">
      <small class="text-red-500"><?= $validation->getError('lama_kegiatan'); ?></small>
    </label>

    <label class="input-group input-group-vertical mt-5">
      <span>Posisi</span>
      <input type="text" class="input input-bordered input-display <?= ($validation->hasError('posisi')) ? 'is-invalid' : ''; ?>" id="posisi" name="posisi" value="" placeholder="cth. Web Designer" value="<?= (old('posisi')) ? old('posisi') : $lowongan['posisi']; ?>" />
    </label>
    <label class="label w-full invalid:block">
      <span class="label-text-alt text-red-500"><?= $validation->getError('posisi'); ?></span>
    </label>

    <label class="input-group input-group-vertical mt-5">
      <span>Wilayah Penempatan</span>
      <input type="text" class="input input-bordered input-display <?= ($validation->hasError('wilayah_penempatan')) ? 'is-invalid' : ''; ?>" id="wilayahPenempatan" name="wilayah_penempatan" value="" placeholder="cth. Jakarta Selatan" value="<?= (old('wilayah_penempatan')) ? old('wilayah_penempatan') : $lowongan['wilayah_penempatan']; ?>" />
    </label>
    <label class="label w-full invalid:block">
      <span class="label-text-alt text-red-500"><?= $validation->getError('wilayah_penempatan'); ?></span>
    </label>

    <label class="input-group input-group-vertical mt-5">
      <span>Dealine</span>
      <input type="date" class="input input-bordered input-display tm <?= ($validation->hasError('deadline')) ? 'is-invalid' : ''; ?>" id="deadline" name="deadline" value="" placeholder="dd/mm/yyyy" value="<?= (old('deadline')) ? old('deadline') : $lowongan['deadline']; ?>" />
    </label>
    <label class="label w-full invalid:block">
      <span class="label-text-alt text-red-500"><?= $validation->getError('deadline'); ?></span>
    </label>

    <label id="inputKualifikasi" class="input-group input-group-vertical mt-14">
      <span>Kualifikasi</span>
      <?php foreach ($dk as $k) : ?>
      <input type="text" class="input input-bordered input-display" id="kualifikasi1" name="kualifikasi[]" value="" placeholder="Masukkan kualifikasi" />
      <?php endforeach; ?>
    </label>
    <label class="label w-full invalid:block">
      <span class="label-text-alt text-red-500"></span>
    </label>
    <div class="flex justify-center mt-3 w-full gap-10">
      <button type="button" class="btn btn-outline btn-info basis-5/12" id="tambahKualifikasi">+ Tambah</button>
      <button type="button" class="btn btn-outline btn-error basis-5/12" id="hapusKualifikasi">- Hapus</button>
    </div>

    <label id="inputDeskripsi" class="input-group input-group-vertical mt-14">
      <span>Deskripsi Pekerjaan</span>
      <input type="text" class="input input-bordered input-display" id="deskripsiPekerjaan1" name="deskripsi_pekerjaan[]" value="" placeholder="Masukkan deskripsi pekerjaan" />
      <input type="text" class="input input-bordered input-display" id="deskripsiPekerjaan2" name="deskripsi_pekerjaan[]" value="" placeholder="Masukkan deskripsi pekerjaan" />
    </label>
    <label class="label w-full invalid:block">
      <span class="label-text-alt text-red-500"></span>
    </label>
    <div class="flex justify-center mt-3 w-full gap-10">
      <button type="button" class="btn btn-outline btn-info basis-5/12" id="tambahDeskripsi">+ Tambah</button>
      <button type="button" class="btn btn-outline btn-error basis-5/12" id="hapusDeskripsi">- Hapus</button>
    </div>

    <label id="inputBenefit" class="input-group input-group-vertical mt-14">
      <span>Benefit dll</span>
      <input type="text" class="input input-bordered input-display" id="benefitDll1" name="benefit_dll[]" value="" placeholder="Masukkan benefit dll" />
      <input type="text" class="input input-bordered input-display" id="benefitDll2" name="benefit_dll[]" value="" placeholder="Masukkan benefit dll" />
    </label>
    <label class="label w-full invalid:block">
      <span class="label-text-alt text-red-500"></span>
    </label>
    <div class="flex justify-center mt-3 w-full gap-10">
      <button type="button" class="btn btn-outline btn-info basis-5/12" id="tambahBenefit">+ Tambah</button>
      <button type="button" class="btn btn-outline btn-error basis-5/12" id="hapusBenefit">- Hapus</button>
    </div>

    <button type="submit" class="btn btn-accent my-12 px-12">Simpan</button>
  </div>
  </div>

</form>

<?= $this->endSection(); ?>