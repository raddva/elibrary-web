<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= base_url('./css/style.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('./css/card.css'); ?>">
</head>
<style>
.card-img-top {
    border-radius: 50px;
    padding: 20px;
}
</style>

<body>
    <div class="container mt-5 mb-5">
        <div class="card border-left-warning shadow bg-transparent card-hover mb-3 text-white">
            <div class=" row g-0">
                <?php foreach ($buku as $b) : ?>
                <div class="col-md-6 border-end">
                    <div class="d-flex flex-column justify-content-center">
                        <div class="main_image card-img-top">
                            <img src="<?= base_url('./cover/'.$b['gambar']); ?>" id="main_product_image" height="370">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="p-3 right-side">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="text-white"><?= $b['judul']; ?></h3>
                            <span class="heart text-dark">
                                <i class='bx bx-heart'></i>
                            </span>
                        </div>
                        <h6><?php foreach ($penulis as $p) :
                            if($b['id_penulis'] == $p['id_penulis']){
                        echo "<p>".$p['nama_penulis']."</p>";
                        continue;
                            }
                            endforeach; ?></h6>
                        <div class="mt-2 pr-3 content mb-2">
                            <span><b><?= $b['stok']; ?></b> copies Available</span>
                        </div>
                        <div class="mt-2">
                            <span>Publisher : <b><?php foreach ($penerbit as $r) :
                            if($b['id_penerbit'] == $r['id_penerbit']){
                        echo "<p>".$r['nama_penerbit']."</p>";
                         continue;
                            }
                            endforeach; ?></b></span>
                        </div>
                        <div class="mt-2">
                            <span>Category : <b><?= $b['kategori']; ?></b></span>
                        </div>
                        <div class="mt-2">
                            <span>Description :</span>
                        </div>
                        <div class="ratings d-flex flex-row align-items-center">
                            <div class="d-flex flex-row">
                                <span><?= $b['deskripsi']; ?></span>
                            </div>
                        </div>
                        <div class="buttons d-flex flex-row mt-5 gap-3">
                            <a href="/buku" class="btn btn-outline-dark">Go Back</a>
                            <?php
                            $isBorrowed = false;
                            foreach ($pinjam as $p) {
                                if ($b['stok'] != 0) {
                                    if ($b['id_buku'] == $p['id_buku']) {
                                        $isBorrowed = true;
                                        break;
                                    }
                                }
                            }
                            if (!$isBorrowed) {
                            ?>
                            <a href="/borrow/<?= $b['id_buku']; ?>" class="btn btn-dark">Borrow</a>
                            <?php
                            } else {
                            ?>
                            <a href="<?= base_url('buku/read/'.$b['id_buku']); ?>" class="btn btn-dark">Read</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>

</html>