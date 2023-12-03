<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<link href="/css/card.css" rel="stylesheet">
<style>
.cut-text {
    text-overflow: ellipsis;
    overflow: hidden;
    width: 225px;
    height: 1.2em;
    white-space: nowrap;
}

.carousel-item {
    height: 100vh;
    min-height: 300px;
}

.carousel-caption {
    bottom: 220px;
    z-index: 2;
}

.carousel-caption h5 {
    font-size: 45px;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-top: 25px;
}

.carousel-caption p {
    width: 60%;
    margin: auto;
    font-size: 18px;
    line-height: 1.9;
}

.carousel-inner:before {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.7);
    z-index: 1;
}
</style>
<div id="carouselExampleCaptions" class="carousel slide " data-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/walp.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="text-white">Learn.</h5>
                <p>We can learn
                    <span class="text-danger">anything</span> from <span class="text-danger">anywhere</span>.
                </p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/wal.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="text-white">Review.</h5>
                <p>Review books that you have read to <span class="text-danger">understand more</span>.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="img/wap.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="text-white">Read.</h5>
                <p>With reading, we could achieve <span class="text-danger">anything</span> we want</p>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="container py-5">
    <h1 class="text-center text-white">BUKU TERPOPULER</h1>
    <div class="row row-cols-1 row-cols-md-3 ">
        <?php foreach ($bukupopuler as $b) :
        foreach ($penulis as $p) :
            if($b['id_penulis'] == $p['id_penulis']){
        ?>
        <div class="col">
            <div class="card border-left-warning shadow bg-transparent card-hover mb-3">
                <img src="<?= base_url('cover/' . $b['gambar']); ?>" class="card-img-top" height="500">
                <div class="card-body text-white">
                    <h5 class="card-title "><?= $b['judul']; ?></h5>
                    <?php
                        echo "<p>".$p['nama_penulis']."</p>";
                    ?>
                </div>
                <div class=" mb-5 d-flex justify-content-around">
                    <h3><i class="text-white"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                fill="currentColor" class="bi bi-suit-heart" viewBox="0 0 16 16">
                                <path
                                    d="m8 6.236-.894-1.789c-.222-.443-.607-1.08-1.152-1.595C5.418 2.345 4.776 2 4 2 2.324 2 1 3.326 1 4.92c0 1.211.554 2.066 1.868 3.37.337.334.721.695 1.146 1.093C5.122 10.423 6.5 11.717 8 13.447c1.5-1.73 2.878-3.024 3.986-4.064.425-.398.81-.76 1.146-1.093C14.446 6.986 15 6.131 15 4.92 15 3.326 13.676 2 12 2c-.777 0-1.418.345-1.954.852-.545.515-.93 1.152-1.152 1.595L8 6.236zm.392 8.292a.513.513 0 0 1-.784 0c-1.601-1.902-3.05-3.262-4.243-4.381C1.3 8.208 0 6.989 0 4.92 0 2.755 1.79 1 4 1c1.6 0 2.719 1.05 3.404 2.008.26.365.458.716.596.992a7.55 7.55 0 0 1 .596-.992C9.281 2.049 10.4 1 12 1c2.21 0 4 1.755 4 3.92 0 2.069-1.3 3.288-3.365 5.227-1.193 1.12-2.642 2.48-4.243 4.38z " />
                            </svg></i></h3>
                    <a href="/book/detail/<?= $b['id_buku']; ?>" class="btn btn-outline-light btn-pjm">Detail</a>
                </div>
            </div>
        </div>
        <?php 
            continue;
            }
        endforeach; 
        endforeach; ?>
    </div>
</div>

<div class="container py-5">
    <h1 class="text-center text-white">BUKU REKOMENDASI</h1>
    <div class="row">
        <?php foreach ($bukurekomen as $b) :
        foreach ($penulis as $p) :
            if($b['id_penulis'] == $p['id_penulis']){
        ?>
        <div class="col-md-3">
            <div class="card border-left-warning shadow h-100 py-4 bg-transparent card-hover " style="padding:20px;">
                <img class=" card-image-top" src="cover/<?= $b['gambar']; ?>" height="330" alt="<?= $b['judul']; ?>">
                <div class="card-body text-white">
                    <h3 class="card-title text-center text-white">
                        <?php
                        $maxLength = 13;
                        $j = $b['judul'];
                        $judul = (strlen($j) > $maxLength) ? substr($j, 0, $maxLength - 3) . '...' : $j;
                        echo $judul; ?>
                    </h3>
                    <p class="card-text text-center">
                        <?= $p['nama_penulis']; ?></p>
                    <div class="btn">
                        <a href="/book/detail/<?= $b['id_buku']; ?>" class="btn btn-outline-light">Detail Buku<i
                                class="font-white"><svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M256 8C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm0 110c23.196 0 42 18.804 42 42s-18.804 42-42 42-42-18.804-42-42 18.804-42 42-42zm56 254c0 6.627-5.373 12-12 12h-88c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h12v-64h-12c-6.627 0-12-5.373-12-12v-24c0-6.627 5.373-12 12-12h64c6.627 0 12 5.373 12 12v100h12c6.627 0 12 5.373 12 12v24z" />
                                </svg></i></a>
                    </div>
                </div>
            </div>
        </div>
        <?php 
        continue;
        }
        endforeach; 
        endforeach; ?>
    </div>
</div>
<script>
function addToWishlist(bookId) {
    $.ajax({
        url: '/wishlist/add/' + bookId,
        method: 'POST',
        success: function(response) {
            console.log(response);
            if (response.success) {
                $('#heartIcon_' + bookId).html(
                    '<i class="text-white bi bi-suit-heart-fill" id="heartIconInner_' + bookId +
                    '"></i>');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}
</script>
<?= $this->endSection(); ?>