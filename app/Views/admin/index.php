<?= $this->extend('admin/sidebar'); ?>

<?= $this->section('admin'); ?>
<div class="container-fluid">
    <div class="mb-3">
        <h3>Dashboard Admin</h3>
    </div>
</div>
<div class=" row">
    <div class="col-xl-4 col-md-6 mb-4">
        <a class="card border-left-primary shadow h-100 py-2 bg-transparent card-hover " href="/admin/buku">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Books</div>
                        <div class="h5 mb-0 font-weight-bold text-light"><?= $jbuku; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-light"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <a class="card border-left-warning shadow h-100 py-2 bg-transparent card-hover" href="/admin/user">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Users</div>
                        <div class="h5 mb-0 font-weight-bold text-light"><?= $juser; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-light"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xl-4 col-md-6 mb-4">
        <a class="card border-left-success shadow h-100 py-2 bg-transparent card-hover" href="/admin/pinjambuku">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            number of books borrowed</div>
                        <div class="h5 mb-0 font-weight-bold text-light"> <?= $jpinjam; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-hand-holding-heart fa-2x text-light"></i>
                    </div>
                </div>
            </div>
        </a>
    </div>

</div>


<?= $this->endSection(); ?>