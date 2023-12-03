<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->

<head>
    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>E-Library Landing Page</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link href="css/landing_page.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-white bg-blur">
        <div class="container">
            <img src="img/logo.png" class="" width="30" height="24">
            <a class="navbar-brand" href="#"><span class="" style="color:#6eb1d6;">E-</span>Library</a>
            <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler" data-bs-target="#navbarSupportedContent" data-bs-toggle="collapse"
                type="button"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#categories">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" href="/user/login">Get Started</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="carousel slide" data-bs-ride="carousel" id="carouselExampleIndicators">
        <div class="carousel-indicators">
            <button aria-label="Slide 1" class="active" data-bs-slide-to="0" data-bs-target="#carouselExampleIndicators"
                type="button"></button>
            <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleIndicators"
                type="button"></button>
            <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleIndicators"
                type="button"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img alt="..." class="d-block w-100" src="img/walp.jpg">
                <div class="carousel-caption">
                    <h5>Learn.</h5>
                    <p>We can learn
                        <span class="text-danger">anything</span> from <span class="text-danger">anywhere</span>.
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <img alt="..." class="d-block w-100" src="img/wal.jpg">
                <div class="carousel-caption">
                    <h5>Review.</h5>
                    <p>Review books that you have read to <span class="text-danger">understand more</span>.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img alt="..." class="d-block w-100" src="img/wap.jpg">
                <div class="carousel-caption">
                    <h5>Read.</h5>
                    <p>With reading, we could achieve <span class="text-danger">anything</span> we want</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleIndicators"
            type="button">
            <span aria-hidden="true" class="carousel-control-prev-icon"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselExampleIndicators"
            type="button">
            <span aria-hidden="true" class="carousel-control-next-icon"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <section class="about section-padding" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="about-img"><img alt="" class="img-fluid" src="img/add1.png"></div>
                </div>
                <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                    <div class="about-text">
                        <h2>Perpustakaan Online<br>
                            E-Library</h2>
                        <p>
                            Merupakan sebuah website untuk meminjam dan membaca buku secara online, <br>
                            dengan waktu (maksimal) 7 hari peminjaman, di mana pengembalian dilakukan <br>
                            secara otomatis atau dapat juga secara manual oleh pengguna.
                        </p>
                        <a class="btn btn-start" href="/user/login">
                            Get Started
                            <i class="bi bi-box-arrow-in-up-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="categories section-padding" id="categories">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h2>Book Categories.</h2>
                        <p>Berikut beberapa buku<br>
                            yang tersedia di website kami.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-white text-center bg-dark pb-2">
                        <div class="card-body">
                            <i class="bi bi-book"></i>
                            <h3 class="card-title">Novel</h3>
                            <p class="lead">Novel-novel karya para penulis terkenal
                                seperti Agatha Christie ada disini.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-white text-center bg-dark pb-2">
                        <div class="card-body">
                            <i class="bi bi-journal"></i>
                            <h3 class="card-title">Komik</h3>
                            <p class="lead">Berbagai komik terjemahan dari seluruh
                                penjuru dunia disediakan disini.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-white text-center bg-dark pb-2">
                        <div class="card-body">
                            <i class="bi bi-journals"></i>
                            <h3 class="card-title">Buku</h3>
                            <p class="lead">Buku lainnya, seperti buku pendidikan,
                                cerita anak, dan jurnal.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="team section-padding" id="team">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h2>Our Team.</h2>
                        <p>Berikut merupakan anggota tim kami yang telah
                            <span class="text-danger">berkontribusi penuh</span><br>
                            dalam proses pembangunan website ini.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img alt="" class="img-fluid rounded-circle" src="img/tsa.jpg">
                            <h3 class="card-title py-2">Saras Mutia</h3>
                            <p class="card-text fw-bold">
                                Front-End & Website
                            </p>
                            <p class="card-text">
                                Siswi SMK PGRI 3 Malang, Jurusan Rekayasa Perangkat Lunak
                            </p>
                            <p class="socials">
                                <a href="https://wa.me/628819791601" class="text-decoration-none">
                                    <i class="bi bi-whatsapp text-dark mx-1"> </i>
                                </a>
                                <a href="mailto: sarasmutia163@gmail.com" class="text-decoration-none">
                                    <i class="bi bi-envelope-fill text-dark mx-1"></i>
                                </a>
                                <a href="https://instagram.com/sarasmutiaaf" class="text-decoration-none">
                                    <i class="bi bi-instagram text-dark mx-1"> </i>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img alt="" class="img-fluid rounded-circle" src="img/nadya.jpg">
                            <h3 class="card-title py-2">Nadya Auradiva</h3>
                            <p class="fw-bold card-text">
                                Back-End & Mobile
                            </p>
                            <p class="card-text">
                                Siswi SMK PGRI 3 Malang, Jurusan Rekayasa Perangkat Lunak
                            </p>
                            <p class="socials">
                                <a href="https://wa.me/6285815917574" class="text-decoration-none">
                                    <i class="bi bi-whatsapp text-dark mx-1"> </i>
                                </a>
                                <a href="mailto: areraraas@gmail.com" class="text-decoration-none">
                                    <i class="bi bi-envelope-fill text-dark mx-1"></i>
                                </a>
                                <a href="https://instagram.com/raddva" class="text-decoration-none">
                                    <i class="bi bi-instagram text-dark mx-1"> </i>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-dark p-2 text-center">
        <div class="container">
            <p class="text-white">
                &copy; 2023, E-Library.
            </p>
        </div>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
    $(window).scroll(function() {
        $('nav').toggleClass('scrolled', $(this).scrollTop() > 100);
    })
    </script>
</body>