<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="d-flex justify-content-center">
    <div class="card bg-transparent" style="width: 25rem;margin-top: 80px; margin-bottom: 220px;">
        <div class="card-body text-dark">
            <p class="card-text text-center mt-3" width="100" height="100"><i><svg style="fill: #fff;" xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 448 512">
                        <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                    </svg></i></p>
            <h5 class=" card-title text-center text-white"><?= $user['name']; ?></h5>
            <p class="card-text text-white"><i class="fa fa-at"></i> <?= $user['username']; ?></p>
            <p class="card-text text-white"><i class="fa fa-envelope"></i> <?= $user['email']; ?></p>
            <div class="d-grid col-sm-12">
                <a href="/user/edit" class="btn btn-sm btn-outline-primary text-white btn-block">Edit</a>
            </div>
        </div>
    </div>
</div>
<!-- 
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h1 class="modal-title fs-5" id="detailModalLabel">Edit Profil</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mx-3">
                <form action="/" method="POST">
                    <div class="md-form mb-3">
                        <i class="fa fa-at prefix grey-text"></i> Username
                        <input type="text" id="defaultForm-email" class="form-control validate" placeholder="Username" name="user">
                    </div>
                    <div class="md-form mb-3">
                        <i class="fa fa-user prefix grey-text"></i> Name
                        <input type="text" id="defaultForm-email" class="form-control validate" placeholder="Username" name="user">
                    </div>
                    <div class="md-form mb-3">
                        <i class="fa fa-envelope prefix grey-text"></i> E-Mail
                        <input type="text" id="defaultForm-email" class="form-control validate" placeholder="Username" name="user">
                    </div>
                    <div class="md-form mb-3">
                        <i class="fa fa-lock prefix grey-text"></i> Password
                        <input type="password" id="defaultForm-pass" class="form-control validate" placeholder="Password" name="pass">
                    </div>
            </div>
            <div class="modal-footer d-flex justify-content-end">
                <button class="btn btn-outline-primary" type="submit">Save Changes</button>
            </div>
            </form>
        </div>
    </div>
</div> -->
<?= $this->endSection(); ?>