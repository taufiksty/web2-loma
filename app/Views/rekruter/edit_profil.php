<?= $this->extend('layout/rekruter/template_profil'); ?>

<?= $this->section('content'); ?>

<div class="mx-72">


  <form action="/Rekruter/simpan/<?= $rekruter['id']; ?>" method="POST" enctype="multipart/form-data">
    <?= csrf_field(); ?>

    <input type="hidden" name="idOld" value="<?= $rekruter['id']; ?>">
    <input type="hidden" name="fotoProfilOld" value="<?= $rekruter['foto_logo']; ?>">

    <div class="h-fit card rounded-box place-items-center w-full pb-5 overflow-y-auto">

      <div class="avatar mb-11 mt-20 flex flex-row gap-x-7">
        <div class="w-48 rounded basis-1/2">
          <img src="/img/rekruter/<?= $rekruter['foto_logo']; ?>" class="img-thumbnail img-preview" />
        </div>
        <div class="foto-profil-input basis-1/2 pt-20">
          <label class="block">
            <span class="sr-only">Choose profile photo</span>
            <input type="file" name="foto_logo" id="fotoLogo" onchange="previewImg()" class="block w-full text-sm text-slate-500
              file:mr-4 file:py-2 file:px-4
              file:rounded-full file:border-0
              file:text-sm file:font-semibold
              file:bg-violet-50 file:text-violet-700
              hover:file:bg-violet-100 <?= ($validation->hasError('foto_logo')) ? 'is-invalid' : ''; ?>
            " />
          </label>
          <label class="label w-full invalid:block">
            <span class="label-text-alt text-red-500"><?= $validation->getError('foto_logo'); ?></span>
          </label>
        </div>
      </div>

      <label class="input-group input-group-vertical">
        <span>Nama Perusahaan</span>
        <input type="text" class="input input-bordered input-display <?= ($validation->hasError('nama_perusahaan')) ? 'is-invalid' : ''; ?>" id="namaPerusahaan" name="nama_perusahaan" value="<?= (old('nama_perusahaan')) ? old('nama_perusahaan') : $rekruter['nama_perusahaan']; ?>" placeholder="nama perusahaan" />
      </label>
      <label class="label w-full invalid:block">
        <span class="label-text-alt text-red-500"><?= $validation->getError('nama_perusahaan'); ?></span>
      </label>

      <label class="input-group input-group-vertical mt-5">
        <span>Username</span>
        <input type="text" class="input input-bordered input-display" id="username" name="username" value="<?= $rekruter['username']; ?>" placeholder="username" disabled />
      </label><br>

      <label class="input-group input-group-vertical mt-5">
        <span>Email</span>
        <input type="email" class="input input-bordered input-display" id="email" name="email" value="<?= $rekruter['email']; ?>" placeholder="email" disabled />
      </label><br>

      <label class="input-group input-group-vertical mt-5">
        <span>Nomor Telepon HR</span>
        <input type="text" class="input input-bordered input-display <?= ($validation->hasError('no_telp_hr')) ? 'is-invalid' : ''; ?>" id="noTelpHR" name="no_telp_hr" value="<?= (old('no_telp_hr')) ? old('no_telp_hr') : $rekruter['no_telp_hr']; ?>" placeholder="cth. 08979320117" />
      </label>
      <label class="label w-full invalid:block">
        <span class="label-text-alt text-red-500"><?= $validation->getError('no_telp_hr'); ?></span>
      </label>

      <label class="input-group input-group-vertical mt-5">
        <span>Alamat Perusahaan</span>
        <input type="text" class="input input-bordered input-display <?= ($validation->hasError('alamat_perusahaan')) ? 'is-invalid' : ''; ?>" id="alamatPerusahaan" name="alamat_perusahaan" value="<?= (old('alamat_perusahaan')) ? old('alamat_perusahaan') : $rekruter['alamat_perusahaan']; ?>" placeholder="cth. Jl. Wahid Khasim No.38, Limo, Depok, Jawa Barat" />
      </label>
      <label class="label w-full invalid:block">
        <span class="label-text-alt text-red-500"><?= $validation->getError('alamat_perusahaan'); ?></span>
      </label>

      <label class="input-group input-group-vertical mt-5">
        <span>Tentang Perusahaan</span>
        <textarea type="text" class="input input-bordered input-display <?= ($validation->hasError('tentang')) ? 'is-invalid' : ''; ?>" id="tentangPerusahaan" name="tentang" value="<?= (old('tentang')) ? old('tentang') : $rekruter['tentang']; ?>"><?= (old('tentang')) ? old('tentang') : $rekruter['tentang']; ?></textarea>
      </label>
      <label class="label w-full invalid:block">
        <span class="label-text-alt text-red-500"><?= $validation->getError('tentang'); ?></span>
      </label>

      <button type="submit" class="btn btn-accent my-12 px-12">Simpan</button>
    </div>
  </form>
</div>

<?= $this->endSection(); ?>