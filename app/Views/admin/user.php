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
            <h1 class="mt-2">Users</h1>
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
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($user as $u) : ?>
                    <tr>
                        <th scope="row"><?= $u['id_user']; ?></th>
                        <td><?= $u['name']; ?></td>
                        <td>@<?= $u['username']; ?></td>
                        <td><?= $u['email']; ?></td>
                        <td>
                            <form action="/user/delete/<?= $u['id_user']; ?>" method="post" class="d-inline">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-outline-danger"
                                    onclick="return confirm('apakah anda yakin?');">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>


<?= $this->endSection(); ?>