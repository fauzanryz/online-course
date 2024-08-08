<?= $this->extend('layout/index') ?>
<?= $this->section('content') ?>

<div class="container d-flex justify-content-between align-items-center mt-4">
 <h3>Daftar Materi</h3>
 <a href="/materi/add" class="btn btn-primary">Tambah</a>
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
    <th scope="col">Link</th>
    <th scope="col">Aksi</th>
   </tr>
  </thead>
  <tbody>
   <?php $no = 1 ?>
   <?php foreach ($materi as $mtr) : ?>
    <tr>
     <th><?= $no++; ?></th>
     <td><?= $mtr['judul']; ?></td>
     <td><?= $mtr['deskripsi']; ?></td>
     <td><?= $mtr['link']; ?></td>
     <td>
      <?php ?>
      <a href="<?= base_url('/materi/edit/' . $mtr['id_materi']); ?>" class="btn btn-warning btn-sm" style="color: #ffffff;">
       Edit
      </a>

      <form action="<?= base_url('/materi/delete/' . $mtr['id_materi']); ?>" class="d-inline" method="POST">
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