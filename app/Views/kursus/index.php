<?= $this->extend('layout/index') ?>
<?= $this->section('content') ?>

<div class="container d-flex justify-content-between align-items-center mt-4">
 <h3>Daftar Kursus</h3>
 <a href="/kursus/add" class="btn btn-primary">Tambah</a>
</div>
<div class="container">
 <?php if (session()->getFlashdata('pesan')) : ?>
  <div class="alert alert-success" role="alert">
   <?= session()->getFlashdata('pesan'); ?>
  </div>
 <?php endif ?>
 <table class="table table-striped">
  <thead>
   <tr>
    <th scope="col">No</th>
    <th scope="col">Judul</th>
    <th scope="col">Deskripsi</th>
    <th scope="col">Durasi</th>
    <th scope="col">Aksi</th>
   </tr>
  </thead>
  <tbody>
   <?php $no = 1 ?>
   <?php foreach ($kursus as $krs) : ?>
    <tr>
     <th><?= $no++; ?></th>
     <td><?= $krs['judul']; ?></td>
     <td><?= $krs['deskripsi']; ?></td>
     <td><?= $krs['durasi']; ?></td>
     <td>
      <?php ?>
      <a href="<?= base_url('/kursus/edit/' . $krs['id_kursus']); ?>" class="btn btn-warning btn-sm" style="color: #ffffff;">
       Edit
      </a>

      <form action="<?= base_url('/kursus/delete/' . $krs['id_kursus']); ?>" class="d-inline" method="POST">
       <?= csrf_field(); ?>
       <input type="hidden" name="_method" value="DELETE">
       <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
        Hapus
       </button>
      </form>
      <?php ?>


     </td>
    </tr>
   <?php endforeach; ?>
  </tbody>
 </table>
</div>

<?= $this->endSection() ?>