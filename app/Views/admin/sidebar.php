<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="<?= base_url('icon.png');?>" type="image/x-icon">

    <title>
        <?= $title; ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?= base_url('./css/sidebar.css');?>" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <!-- sidebar -->
        <aside id="sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <img src="<?= base_url('img/logoWhite.png');?>" class="" width="30" height="24">
                    <a href="/admin">E-Library Admin</a>
                </div>
                <!-- sidebar navigasi -->
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Dashboard
                    </li>
                    <li class="sidebar-item">
                        <a href="/admin" class="sidebar-link nav-link">
                            <i class="fas fa-home fe-2"></i>
                            Home
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/admin/buku" class="sidebar-link nav-link">
                            <i class="fas fa-book fe-2"></i>
                            Book
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/admin/user" class="sidebar-link nav-link">
                            <i class="fas fa-users fe-2"></i>
                            Users
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/admin/pinjambuku" class="sidebar-link nav-link">
                            <i class="fas fa-hand-holding-heart"></i>
                            Borrow List
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="/admin/logout" class="sidebar-link nav-link">
                            <i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                        d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                    <path fill-rule="evenodd"
                                        d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                </svg></i>
                            Logout</a>
                    </li>
                </ul>
                </li>
                </ul>
            </div>
        </aside>
        <!-- main componen -->

        <div class=" main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <div class="container-fluid">
                    <button class="btn" type="button" data-bs-theme="dark">
                        <i style="color:white;" class="fas fa-list fe-2"></i>
                    </button>
                    <li class="nav-item ">
                        <i class="far fa-user-circle me-auto" style="color:white; font-size:25px ;"></i>
                        <span
                            class="mr-2 d-none d-lg-inline text-light small"><?= session()->get('adminName'); ?></span>
                    </li>
                </div>
            </nav>
            <main class="content px-3 py-3">
                <?= $this->renderSection('admin'); ?>
            </main>

        </div>
    </div>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="<?= base_url('./js/sidebar.js'); ?>"></script>


</body>

</html>