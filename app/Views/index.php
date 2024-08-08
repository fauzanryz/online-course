<?= $this->extend('layout/index') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Selamat Datang</h3>
    <p>Di kursus online kami, Anda dapat menemukan berbagai kursus yang dirancang untuk meningkatkan keterampilan di berbagai bidang. Dari pemrograman hingga desain, kursus kami menawarkan materi yang komprehensif dan dipandu oleh instruktur berpengalaman. Kami berkomitmen untuk menyediakan pengalaman belajar yang fleksibel dan berkualitas tinggi, sehingga Anda dapat belajar kapan saja dan di mana saja sesuai dengan kenyamanan Anda.</p>
    <a href="<?= base_url('/kursus') ?>" class="btn btn-primary">Ayo Kursus Sekarang!</a>
</div>

<?= $this->endSection() ?>
