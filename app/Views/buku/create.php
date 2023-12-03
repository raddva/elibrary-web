<?= $this->extend('admin/sidebar'); ?>

<?= $this->section('admin'); ?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3 text-white">Tambah Data Buku</h2>
            <form action="/buku/save" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label text-white">Judul</label>
                    <div class="col-sm-7">
                        <input type="text"
                            class="form-control <?= (session()->getFlashdata('judul')) ? 'is-invalid' : ''; ?>"
                            id="judul" name="judul" autofocus value="<?= old('judul'); ?>">
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
                            <option value="1" <?= old('penulis') == 1 ? 'selected' : ''; ?>>Akiyoshi Rikako</option>
                            <option value="2" <?= old('penulis') == 2 ? 'selected' : ''; ?>>Minato Kanae</option>
                            <option value="3" <?= old('penulis') == 3 ? 'selected' : ''; ?>>Makoto Shinkai</option>
                            <option value="4" <?= old('penulis') == 4 ? 'selected' : ''; ?>>Sumino Yoru</option>
                            <option value="5" <?= old('penulis') == 5 ? 'selected' : ''; ?>>Ichikawa Takuji</option>
                            <option value="6" <?= old('penulis') == 6 ? 'selected' : ''; ?>>Yonezawa Honobu</option>
                            <option value="7" <?= old('penulis') == 7 ? 'selected' : ''; ?>>Chinen Mikito</option>
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
                            <option value="1" <?= old('penerbit') == 1 ? 'selected' : ''; ?>>Gramedia Pustaka Utama
                            </option>
                            <option value="2" <?= old('penerbit') == 2 ? 'selected' : ''; ?>>Deepublish</option>
                            <option value="3" <?= old('penerbit') == 3 ? 'selected' : ''; ?>>Bukunesia</option>
                            <option value="4" <?= old('penerbit') == 4 ? 'selected' : ''; ?>>Penerbit Haru</option>
                            <option value="5" <?= old('penerbit') == 5 ? 'selected' : ''; ?>>Inari</option>
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
                            <option value="buku" <?= old('kategori') == 'buku' ? 'selected' : ''; ?>>Buku</option>
                            <option value="komik" <?= old('kategori') == 'komik' ? 'selected' : ''; ?>>Komik</option>
                            <option value="novel" <?= old('kategori') == 'novel' ? 'selected' : ''; ?>>Novel</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= session()->getFlashdata('kategori'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="genre" class="col-sm-2 col-form-label text-white">Genre</label>
                    <div class="col-sm-7">
                        <input type="text"
                            class="form-control <?= (session()->getFlashdata('genre')) ? 'is-invalid' : ''; ?>"
                            id="genre" name="genre" value="<?= old('genre'); ?>">
                        <div class="invalid-feedback">
                            <?= session()->getFlashdata('genre'); ?>
                        </div>
                    </div>
                </div>
                <div class="form-group row my-3">
                    <label for="gambar" class="col-sm-2 col-form-label text-white">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/img/default.png" class="img-thumbnail img-preview">
                    </div>
                    <div class="col-sm-5">
                        <div class="input-group">
                            <label class="input-group-text btn btn-outline-secondary text-white" for="gambar">Pilih
                                File</label>
                            <label class="form-control custom-img-label" for="gambar">Nama File</label>
                        </div>
                        <input class="form-control invisible" type="file" id="gambar" name="gambar"
                            value="<?= old('gambar'); ?>" onchange="previewImg()">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="stok" class="col-sm-2 col-form-label text-white">Stok</label>
                    <div class="col-sm-7">
                        <input type="text"
                            class="form-control <?= (session()->getFlashdata('stok')) ? 'is-invalid' : ''; ?>" id="stok"
                            name="stok" value="<?= old('stok'); ?>">
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
                            id="deskripsi" name="deskripsi" value="<?= old('deskripsi'); ?>">
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
                            <label class="form-control custom-file-label" for="file">Nama File</label>
                        </div>
                        <input class="form-control invisible" type="file" id="file" name="file"
                            value="<?= old('file'); ?>" onchange="previewFile()">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary">Tambah Data</button>
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