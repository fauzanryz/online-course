<?= $this->extend('layout/index') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h4 class="mb-3">Detail Kursus</h4>
    <?php if (!empty($kursus)) : ?>
        <p class="mb-1"><strong>Judul Kursus:</strong> <?= $kursus['judul_kursus']; ?></p>
        <p class="mb-1"><strong>Deskripsi Kursus:</strong> <?= $kursus['deskripsi_kursus']; ?></p>
        <p class="mb-1"><strong>Durasi Kursus:</strong> <?= $kursus['durasi_kursus']; ?> hari</p>
    <?php else: ?>
        <p>Data kursus tidak ditemukan.</p>
    <?php endif; ?>
</div>

<div class="container mt-4">
    <div class="container d-flex justify-content-between align-items-center px-0">
        <h4>Daftar Materi</h4>
        <a href="<?= base_url('/materi/add/' . ($kursus['id_kursus'] ?? 0)); ?>" class="btn btn-primary">Tambah</a>
    </div>
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
            <?php $no = 1; ?>
            <?php foreach ($materi as $mtr) : ?>
                <tr>
                    <th><?= $no++; ?></th>
                    <td><?= $mtr['judul_materi']; ?></td>
                    <td><?= $mtr['deskripsi_materi']; ?></td>
                    <td><a href="<?= $mtr['link_materi']; ?>" target="_blank"><?= $mtr['link_materi']; ?></a></td>
                    <td>
                        <a href="<?= base_url('/materi/edit/' . $mtr['id_materi']); ?>" class="btn btn-warning btn-sm" style="color: #ffffff;">Edit</a>
                        <form action="<?= base_url('/materi/delete/' . $mtr['id_materi']); ?>" class="d-inline" method="POST">
                            <?= csrf_field(); ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
