<?= $this->extend('layout/index') ?>
<?= $this->section('content') ?>

<div class="container d-flex justify-content-between align-items-center mt-4">
 <h3>Edit Materi</h3>
</div>
<div class="container">
 <?php
 if (!empty(session()->getFlashdata('errors'))) : ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
   <?= session()->getFlashdata('errors'); ?>
  </div>
 <?php endif; ?>
 <form method="POST" action="<?= base_url('/materi/update/' . $materi['id_materi']); ?>">
  <?= csrf_field(); ?>
  <div class="form-row mb-1">
   <div class="col">
    <label class="col-form-label">Link </label>
    <input type="text" name="link" class="form-control" value="<?= $materi['link']; ?>">
   </div>
  </div>
  <div class="form-group mb-3">
   <label for="id_kursus">Kursus</label>
   <select class="form-control" id="id_kursus" name="id_kursus" required>
    <option value="" disabled>--Pilih Kursus--</option>
    <?php foreach ($kursus as $krs): ?>
     <option value="<?= esc($krs['id_kursus']); ?>" <?= ($krs['id_kursus'] == $materi['id_kursus']) ? 'selected' : ''; ?>>
      <?= esc($krs['judul']); ?>
     </option>
    <?php endforeach; ?>
   </select>
  </div>
  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="<?= base_url('/materi') ?>" class="btn btn-danger">Kembali</a>
 </form>
</div>

<?= $this->endSection() ?>