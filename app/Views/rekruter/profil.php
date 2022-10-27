<?= $this->extend('layout/rekruter/template_profil'); ?>

<?= $this->section('content'); ?>



<div class="h-fit card rounded-box place-items-center w-full pb-5 overflow-y-auto">
  <?php if (!empty(session()->getFlashdata('message'))) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <?php echo session()->getFlashdata('message'); ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <?php endif; ?>
    <div class="avatar my-11">
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
      <span>Usename</span>
      <div class="rounded-box border-2 p-3"><?= $rekruter['username']; ?></div>
    </label>
    <label class="input-group input-group-vertical mt-5">
      <span>Email</span>
      <div class="rounded-box border-2 p-3"><?= $rekruter['email']; ?></div>
    </label>
    <label class="input-group input-group-vertical mt-5">
      <span>Nomor Telepon</span>
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
  <a href="<?= base_url(); ?>/Rekruter/editProfil/<?= $rekruter['id_rekruter']; ?>" class="btn btn-secondary my-12">Edit Profil</a>
</div>


<?= $this->endSection(); ?>