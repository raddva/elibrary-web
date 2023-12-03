<?= $this->extend('admin/sidebar'); ?>

<?= $this->section('admin'); ?>
<?php //var_dump($buku[0]['id_buku']); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3 text-white">Edit Buku</h2>
            <form action="/buku/update/<?= $buku[0]['id_buku']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="slug" value="<?= $buku[0]['slug']; ?>">
                <input type="hidden" name="oldcover" value="<?= $buku[0]['gambar']; ?>">
                <input type="hidden" name="oldfile" value="<?= $buku[0]['file']; ?>">
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label text-white">Judul</label>
                    <div class="col-sm-7">
                        <input type="text"
                            class="form-control <?= (session()->getFlashdata('judul')) ? 'is-invalid' : ''; ?>"
                            id="judul" name="judul" autofocus
                            value="<?= old('judul') ? old('judul') : $buku[0]['judul']; ?>">
                        <div class="invalid-feedback">
                            <?= session()->getFlashdata('judul'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="id_penulis" class="col-sm-2 col-form-label text-white">Penulis</label>
                    <div class="col-sm-7">
                        <select class="form-select <?= (session()->getFlashdata('id_penulis')) ? 'is-invalid' : ''; ?>"
                            name="id_penulis" id="id_penulis" required aria-label=".form-select-sm example">
                            <option disabled selected>Penulis</option>
                            <?php 
                            if(old('id_penulis')){
                                $id_penulis = old('id_penulis');
                            } else {
                                $id_penulis = $buku[0]['id_penulis'];
                            }
                            ?>
                            <option value="1" <?= $id_penulis == 1 ? 'selected' : ''; ?>>Akiyoshi Rikako</option>
                            <option value="2" <?= $id_penulis == 2 ? 'selected' : ''; ?>>Minato Kanae</option>
                            <option value="3" <?= $id_penulis == 3 ? 'selected' : ''; ?>>Makoto Shinkai</option>
                            <option value="4" <?= $id_penulis == 4 ? 'selected' : ''; ?>>Sumino Yoru</option>
                            <option value="5" <?= $id_penulis == 5 ? 'selected' : ''; ?>>Ichikawa Takuji</option>
                            <option value="6" <?= $id_penulis == 6 ? 'selected' : ''; ?>>Yonezawa Honobu</option>
                            <option value="7" <?= $id_penulis == 7 ? 'selected' : ''; ?>>Chinen Mikito</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= session()->getFlashdata('id_penulis'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="id_penerbit" class="col-sm-2 col-form-label text-white">Penerbit</label>
                    <div class="col-sm-7">
                        <select class="form-select <?= (session()->getFlashdata('id_penerbit')) ? 'is-invalid' : ''; ?>"
                            name="id_penerbit" id="id_penerbit" aria-label=".form-select-sm example" required>
                            <option disabled selected>Penerbit</option>
                            <?php 
                            if(old('id_penerbit')){
                                $id_penerbit = old('id_penerbit');
                            } else {
                                $id_penerbit = $buku[0]['id_penerbit'];
                            }
                            ?>
                            <option value="1" <?= $id_penerbit == 1 ? 'selected' : ''; ?>>Gramedia Pustaka Utama
                            </option>
                            <option value="2" <?= $id_penerbit == 2 ? 'selected' : ''; ?>>Deepublish</option>
                            <option value="3" <?= $id_penerbit == 3 ? 'selected' : ''; ?>>Bukunesia</option>
                            <option value="4" <?= $id_penerbit == 4 ? 'selected' : ''; ?>>Penerbit Haru</option>
                            <option value="5" <?= $id_penerbit == 5 ? 'selected' : ''; ?>>Inari</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= session()->getFlashdata('id_penerbit'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="kategori" class="col-sm-2 col-form-label text-white">Kategori</label>
                    <div class="col-sm-7">
                        <select
                            class="form-select form-select-sm-2 <?= (session()->getFlashdata('kategori')) ? 'is-invalid' : ''; ?>"
                            name="kategori" id="kategori" aria-label=".form-select-sm example" required>
                            <option disabled selected>Kategori</option>
                            <?php 
                            if(old('kategori')){
                                $kategori = old('kategori');
                            } else {
                                $kategori = $buku[0]['kategori'];
                            }
                            ?>
                            <option value="Buku" <?= $kategori == 'Buku' ? 'selected' : ''; ?>>Buku</option>
                            <option value="Komik" <?= $kategori == 'Komik' ? 'selected' : ''; ?>>Komik</option>
                            <option value="Novel" <?= $kategori == 'Novel' ? 'selected' : ''; ?>>Novel</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="genre" class="col-sm-2 col-form-label text-white">Genre</label>
                    <div class="col-sm-7">
                        <input type="text"
                            class="form-control <?= (session()->getFlashdata('genre')) ? 'is-invalid' : ''; ?>"
                            id="genre" name="genre" value="<?= old('genre') ? old('genre') : $buku[0]['genre']; ?>">
                        <div class="invalid-feedback">
                            <?= session()->getFlashdata('genre'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label for="gambar" class="col-sm-2 col-form-label text-white">Cover</label>
                    <div class="col-sm-2">
                        <img src="/cover/<?= $buku[0]['gambar']; ?>" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-5">
                        <div class="input-group">
                            <label class="input-group-text btn btn-outline-secondary text-white" for="gambar">Choose
                                File</label>
                            <label class="form-control custom-img-label" for="gambar"><?= $buku[0]['gambar']; ?></label>
                        </div>
                        <input class="form-control invisible" type="file" id="gambar" name="gambar"
                            value="<?= old('gambar') ? old('gambar') : $buku[0]['gambar']; ?>" onchange="previewImg()">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="stok" class="col-sm-2 col-form-label text-white">Stock</label>
                    <div class="col-sm-7">
                        <input type="text"
                            class="form-control <?= (session()->getFlashdata('stok')) ? 'is-invalid' : ''; ?>" id="stok"
                            name="stok" value="<?= old('stok') ? old('stok') : $buku[0]['stok']; ?>">
                        <div class="invalid-feedback">
                            <?= session()->getFlashdata('stok'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="deskripsi" class="col-sm-2 col-form-label text-white">Deskripsi</label>
                    <div class="col-sm-7">
                        <input type="text"
                            class="form-control <?= (session()->getFlashdata('deskripsi')) ? 'is-invalid' : ''; ?>"
                            id="deskripsi" name="deskripsi"
                            value="<?= old('deskripsi') ? old('deskripsi') : $buku[0]['deskripsi']; ?>">
                        <div class="invalid-feedback">
                            <?= session()->getFlashdata('deskripsi'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label for="file" class="col-sm-2 col-form-label text-white">File</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <label class="input-group-text btn btn-outline-secondary text-white" for="file">Pilih
                                File</label>
                            <label class="form-control custom-file-label" for="file"><?= $buku[0]['file']; ?></label>
                        </div>
                        <input class="form-control invisible" type="file" id="file" name="file"
                            value="<?= old('file') ? old('file') : $buku[0]['file']; ?>" onchange="previewFile()">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary">Edit Data</button>
            </form>
        </div>
    </div>
</div>
<script>
function previewImg() {
    const gambar = document.querySelector('#gambar');
    const imgPreview = document.querySelector('.img-preview');
    const gambarLabel = document.querySelector('.custom-img-label');
    gambarLabel.textContent = gambar.files[0].name;
    const filegambar = new FileReader();
    filegambar.readAsDataURL(gambar.files[0]);
    filegambar.onload = function(e) {
        imgPreview.src = e.target.result;
    }
}

function previewFile() {
    const file = document.querySelector('#file');
    const fileLabel = document.querySelector('.custom-file-label');
    fileLabel.textContent = file.files[0].name;
    const fileSampul = new FileReader();
    fileSampul.readAsDataURL(file.files[0]);
}
</script>
<?= $this->endSection(); ?>