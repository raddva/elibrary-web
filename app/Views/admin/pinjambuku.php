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
            <h1 class="mt-2">Borrow Books</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="text-white transparent-input form-control" placeholder="Search"
                        name="keyword">
                    <button class="btn btn-outline-secondary text-white" type="submit" name="submit">Find</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row ">
        <div class="col">
            <table class="table text-white">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">ID Pinjam</th>
                        <th scope="col" class="text-center">ID User</th>
                        <th scope="col" class="text-center">Tanggal Pinjam</th>
                        <th scope="col" class="text-center">Tanggal Kembali</th>
                        <th scope="col" class="text-center">Tenggat</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach($pinjam as $p) :?>
                    <tr>
                        <th scope="row" class="text-center"><?= $p['id_pinjam']; ?></th>
                        <td class="text-center"><?= $p['id_user']; ?></td>
                        <td class="text-center"><?= $p['tgl_pinjam']; ?></td>
                        <td class="text-center"><?= $p['tgl_kembali'] == null ? '-': $p['tgl_kembali'] ; ?></td>
                        <td class="text-center"><?= $p['tenggat']; ?></td>
                        <td class="text-center">
                            <div class="badge <?= $p['tgl_kembali'] == null ? 'bg-warning': 'bg-success' ; ?> text-wrap"
                                style="width: 6rem;">
                                <?= $p['tgl_kembali'] == null ? 'Dipinjam': 'Dikembalikan' ; ?>
                            </div>
                        </td>
                        <td class="text-center">
                            <a href="/borrow/detail/<?= $p['id_pinjam']; ?>">Detail</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>
</div>


<?= $this->endSection(); ?>