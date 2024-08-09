<?= $this->extend('layout/index') ?>
<?= $this->section('content') ?>

<div class="container d-flex justify-content-between align-items-center mt-4">
 <h4>Tambah Kursus</h4>
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
    <input type="text" name="judul_kursus" class="form-control" value="<?= old('judul_kursus'); ?>">
   </div>
   <div class="col">
    <label class="col-form-label">Deskripsi </label>
    <input type="text" name="deskripsi_kursus" class="form-control" value="<?= old('deskripsi_kursus'); ?>">
   </div>
   <div class="col">
    <label class="col-form-label">Durasi(hari) </label>
    <input type="text" name="durasi_kursus" class="form-control" value="<?= old('durasi_kursus'); ?>">
   </div>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="<?= base_url('/kursus') ?>" class="btn btn-danger">Kembali</a>
 </form>
</div>

<?= $this->endSection() ?>