<?= $this->extend('layout/index') ?>
<?= $this->section('content') ?>

<div class="container d-flex justify-content-between align-items-center mt-4">
 <h3>Tambah Kursus</h3>
</div>
<div class="container">
 <?php
 if (!empty(session()->getFlashdata('errors'))) : ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
   <?= session()->getFlashdata('errors'); ?>
  </div>
 <?php endif; ?>
 <form method="POST" action="<?= base_url('/kursus/save'); ?>">
  <?= csrf_field(); ?>
  <div class="form-row mb-3">
   <div class="col">
    <label class="col-form-label">Judul </label>
    <input type="text" name="judul" class="form-control" value="<?= old('judul'); ?>">
   </div>
   <div class="col">
    <label class="col-form-label">Deskripsi </label>
    <input type="text" name="deskripsi" class="form-control" value="<?= old('deskripsi'); ?>">
   </div>
   <div class="col">
    <label class="col-form-label">Durasi </label>
    <input type="text" name="durasi" class="form-control" value="<?= old('durasi'); ?>">
   </div>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="<?= base_url('/kursus') ?>" class="btn btn-danger">Kembali</a>
 </form>
</div>

<?= $this->endSection() ?>