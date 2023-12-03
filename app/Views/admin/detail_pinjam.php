<?= $this->extend('admin/sidebar'); ?>

<?= $this->section('admin'); ?>
<style>
input.transparent-input {
    background-color: transparent !important;
    border: none !important;
}
</style>
<div class="container text-white">
    <div class="row">
        <div class="col-6">
            <h1 class="mt-2">Borrowed Books Details</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row ">
        <div class="col">
            <div class="row">
                <div class="col-sm-6">
                    <?php
            echo "ID Pinjam : ". $detail[0]['id_pinjam']. 
            "<br>";
            echo "ID User : ". $detail[0]['id_user']. 
            "<br>";
            echo "Tanggal Pinjam : ". $detail[0]['tgl_pinjam']. 
            "<br>";
            echo "Tanggal Kembali : ". $detail[0]['tgl_kembali']. 
            "<br>";
            echo "Tenggat : ". $detail[0]['tenggat']. 
             "<br>";
            ?>
                </div>
                <div class="col-sm-6 d-flex align-items-center justify-content-center">
                    <a href="/returnAdmin/<?= $detail[0]['id_pinjam']; ?>"
                        class="btn text-white btn-outline-danger">Ambil Buku Pinjaman</a>
                </div>
            </div>
            <table class="table text-white">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">ID Buku</th>
                        <th scope="col">Judul</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i = 1;
                    foreach($detail as $d) :?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><img src="<?= base_url('./cover/'.$d['gambar']); ?>" width="100px"></td>
                        <td><?= $d['id_user']; ?></td>
                        <td><?= $d['judul']; ?></td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>
</div>


<?= $this->endSection(); ?>