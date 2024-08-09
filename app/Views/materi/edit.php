<?= $this->extend('layout/index') ?>
<?= $this->section('content') ?>

<div class="container d-flex justify-content-between align-items-center mt-4">
 <h4>Edit Materi</h4>
</div>
<div class="container">
 <?php
 if (!empty(session()->getFlashdata('errors'))) : ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
   <?= session()->getFlashdata('errors'); ?>
  </div>
 <?php endif; ?>
 <form method="POST" action="<?= base_url('/materi/update/' . ($materi['id_materi']  ?? "")); ?>">
  <?= csrf_field(); ?>
  <div class="form-row mb-3">
   <input type="hidden" name="id_kursus" value="<?= $materi['id_kursus']; ?>">
   <div class="col">
    <label class="col-form-label">Judul </label>
    <input type="text" name="judul_materi" class="form-control" value="<?= $materi['judul_materi']; ?>">
   </div>
   <div class="col">
    <label class="col-form-label">Deskripsi </label>
    <input type="text" name="deskripsi_materi" class="form-control" value="<?= $materi['deskripsi_materi']; ?>">
   </div>
   <div class="col">
    <label class="col-form-label">Link </label>
    <input type="text" name="link_materi" class="form-control" value="<?= $materi['link_materi']; ?>">
   </div>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="<?= base_url('/materi/' . $materi['id_kursus']); ?>" class="btn btn-danger">Kembali</a>
 </form>
</div>

<?= $this->endSection() ?>