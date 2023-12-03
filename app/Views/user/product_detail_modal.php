<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<?php if (isset($item)) : ?>
    <div class="card-body">
        <h2 class="dard-title text-center"><?= $dataBuku['penulis']; ?></h2>
        <div class="text-center">
            <img class="" style="width:250px " src="cover/<?= $dataBuku['gambar']; ?>" alt="">
        </div>
        <p class="card-text text-center"><?= $dataBuku['deskripsi']; ?></p>
    </div>
<?php endif; ?>

<?= $this->endSection(); ?>