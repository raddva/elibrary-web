<?= $this->extend('admin/sidebar'); ?>

<?= $this->section('admin'); ?>

<style>
.cover {
    width: 100px;
}

.table>tbody>tr>* {
    vertical-align: middle;
}

input.transparent-input {
    background-color: transparent !important;
    border: none !important;
}
</style>
<div class="container" id="buku">
    <div class=" row">
        <div class="col">
            <h1 class="mt-2 text-white">Books</h1>
            <div class="row">

                <div class="col-sm-8">
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="text-white transparent-input form-control" placeholder="Search"
                                name="keyword">
                            <button class="btn btn-outline-secondary text-white" type="submit"
                                name="submit">Find</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-4 text-center">
                    <a href="/buku/create" class="btn text-white btn-outline-primary">Tambah Data Buku</a>
                </div>
            </div>
            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>

            <table class="table text-white">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($buku as $b) :
                        $id = $b['id_buku'];
                    ?>
                    <tr class="">
                        <th scope="row"><?= $id; ?></th>
                        <td><img src="/cover/<?= $b['gambar']; ?>" alt="" class="cover"></td>
                        <td><?= $b['judul']; ?></td>
                        <td>
                            <a href="/buku/edit/<?= $id; ?>" class="btn btn-outline-warning">Edit</a>
                            <form action="/buku/delete/<?= $id; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="buku" value="<?= htmlspecialchars(json_encode($b)); ?>">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('apakah anda yakin?');">Delete</button>
                            </form>
                            <!-- <a href="/admin" class="btn btn-outline-danger">Delete</a> -->
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>