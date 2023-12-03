<nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container">
        <img src="<?= base_url('img/logoWhite.png') ?>" class="" width="30" height="24">
        <a class="navbar-brand fs-4 text-white" href="/user">E-Library</a>

        <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="navbarSupportedContent" aria-controls="#offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- sidebar -->
        <div class="sidebar offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <!-- sidebar header -->
            <div class="offcanvas-header text-black border-bottom">
                <img src="<?= base_url('img/logo.png'); ?>" class="" width="30" height="24">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">E-Library</h5>
                <button type="button" class="btn-close btn-close-black shadow-none" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <!-- sidebar body -->
            <div class="offcanvas-body d-flex flex-column flex-lg-row p-4 p-lg-0 ">
                <ul class="navbar-nav justify-content-center align-items-center fs-5 flex-grow-1 pe-3">
                    <li class="nav-item mx-2">
                        <a class="nav-link active text-white" aria-current="page" href="/user">Home</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" href="/buku">Books</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" href="/buku/wishlist">Wishlist</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" href="/buku/rak">Bookshelf</a>
                    </li>
                </ul>
                <div class="btn-group dropdown">
                    <a class="nav-link dropdown-toggle text-white nav-item mx-2" href="javascript:void(0)"
                        id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-user-circle"></i><b> <?= session()->get('userName'); ?></b>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarScrollingDropdown">
                        <li><a class='dropdown-item' href='/user/profile'>Kelola Akun</a></li>
                        <li><a class='dropdown-item' href='/user/logout'>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>