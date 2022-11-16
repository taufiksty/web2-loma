<?= $this->extend('layout/rekruter/template_profil'); ?>

<?= $this->section('content'); ?>

<div class="h-fit card rounded-box place-items-center w-full pb-5 overflow-y-auto">

  <?php if (session()->getFlashdata('success')) { ?>
    <div class="mt-0 mb-3 w-auto z-10 fixed">
      <div class="alert alert-success shadow-lg" role="alert">
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span><?php echo session()->getFlashdata('success'); ?></span>
      </div>
    </div>
  <?php }; ?>

  <div class="avatar mb-11 mt-20">
    <div class="w-48 rounded">
      <img src="<?= base_url(); ?>/img/rekruter/<?= $rekruter['foto_logo']; ?>" alt="<?= $rekruter['foto_logo']; ?>" />
    </div>
  </div>

  <div class="mx-72">
    <label class="input-group input-group-vertical">
      <span>Nama Perusahaan</span>
      <div class="rounded-box border-2 p-3"><?= $rekruter['nama_perusahaan']; ?></div>
    </label>
    <label class="input-group input-group-vertical mt-5">
      <span>Username</span>
      <div class="rounded-box border-2 p-3"><?= $rekruter['username']; ?></div>
    </label>
    <label class="input-group input-group-vertical mt-5">
      <span>Email</span>
      <div class="rounded-box border-2 p-3"><?= $rekruter['email']; ?></div>
    </label>
    <label class="input-group input-group-vertical mt-5">
      <span>Nomor Telepon HR</span>
      <div class="rounded-box border-2 p-3"><?= $rekruter['no_telp_hr']; ?></div>
    </label>
    <label class="input-group input-group-vertical mt-5">
      <span>Alamat Perusahaan</span>
      <div class="rounded-box border-2 p-3"><?= $rekruter['alamat_perusahaan']; ?></div>
    </label>
    <label class="input-group input-group-vertical mt-5">
      <span>Tentang</span>
      <div class="rounded-box border-2 p-3"><?= $rekruter['tentang']; ?></div>
    </label>
    <br><br>
  </div>
  <a href="<?= base_url(); ?>/Rekruter/editProfil/<?= $rekruter['id']; ?>" class="btn btn-secondary my-12">Edit Profil</a>
</div>


<?= $this->endSection(); ?>