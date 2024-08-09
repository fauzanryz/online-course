<?= $this->extend('layout/index') ?>
<?= $this->section('content') ?>

<div class="container d-flex justify-content-between align-items-center mt-4">
 <h4>Tambah Materi</h4>
</div>
<div class="container">
 <?php
 if (!empty(session()->getFlashdata('errors'))) : ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
   <?= session()->getFlashdata('errors'); ?>
  </div>
 <?php endif; ?>
 <form method="POST" action="<?= base_url('/materi/save/'. $kursus['id_kursus']); ?>">
  <?= csrf_field(); ?>
  <div class="form-row mb-3">
   <div class="col">
    <label class="col-form-label">Judul </label>
    <input type="text" name="judul_materi" class="form-control" value="<?= old('judul_materi'); ?>">
   </div>
   <div class="col">
    <label class="col-form-label">Deskripsi </label>
    <input type="text" name="deskripsi_materi" class="form-control" value="<?= old('deskripsi_materi'); ?>">
   </div>
   <div class="col">
    <label class="col-form-label">Link </label>
    <input type="text" name="link_materi" class="form-control" value="<?= old('link_materi'); ?>">
   </div>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="<?= base_url('/kursus/detail/'. $kursus['id_kursus']); ?>" class="btn btn-danger">Kembali</a>
 </form>
</div>

<?= $this->endSection() ?>