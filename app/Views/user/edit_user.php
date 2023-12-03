<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<style>
    input[type=""] {
        color: white;
    }
</style>
<div class="container d-flex justify-content-center align-items-center py-2 col-md-4">
    <div class="row border rounded-5 p-3 bg-transparent shadow box-area">
        <div class="col-md-12 right-box">
            <div class="row align-items-center">
                <div class="header-text mb-1 text-center">
                    <h2 class="text-white">Edit Profile</h2>
                    <p class="text-white">Please input your new data here.</p>
                </div>
                <form action="/user/update/<?= $user['id_user']; ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="id" class="form-control form-control-lg fs-6 bg-transparent text-white" value="<?= $user['id_user']; ?>" readonly>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control form-control-lg fs-6 bg-transparent text-white" placeholder="Name" value="<?= $user['name']; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control form-control-lg fs-6 bg-transparent text-white" placeholder="Username" value="<?= $user['username']; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control form-control-lg fs-6 bg-transparent text-white" placeholder="Email" value="<?= $user['email']; ?>">
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" id="pass" class="form-control form-control-lg bg-transparent fs-6 text-white" placeholder="Password">
                    </div>
                    <!-- <div class="input-group mb-3">
                    <input type="password" name="conf" class="form-control form-control-lg bg-transparent fs-6 text-white" placeholder="Confirm Password">
                </div> -->
                    <!-- <div class="form-check form-switch">
                    <label class="form-check-label" for="show">Show Password</label>
                    <input class="form-check-input" type="checkbox" id="show" onclick="pwVisibility()">
                </div> -->
                    <div class="row">

                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <a href="/user/profile" class="btn btn-lg btn-outline-warning fs-6">Go Back</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <button class="btn btn-lg btn-outline-primary fs-6 text-white" type="submit">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- <script>
    function pwVisibility() {
        var x = document.getElementById("pass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script> -->
<?= $this->endSection(); ?>