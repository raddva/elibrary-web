<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<link href="/css/cardhis.css" rel="stylesheet">
<div class="container py-5">
    <form action="/buku/rak" method="get">
        <div class="row mb-3">
            <div class="col-sm-10">
                <select class="form-select form-select-sm-2 bg-transparent" id="select"
                    aria-label=".form-select-sm example" name="select">
                    <option value="select" selected>Select</option>
                    <option value="borrow" <?= $select == 'borrow' ? 'selected' : ''; ?>>Borrow</option>
                    <option value="history" <?= $select == 'history' ? 'selected' : ''; ?>>History</option>
                </select>
            </div>
            <div class="col-sm-2">
                <button class="btn btn-outline-secondary" type="submit">Find</button>
            </div>
        </div>
    </form>
    <?php
    $currentDate = date('Y-m-d');

    foreach ($buku as $b) :
        $dueDate = $b['tenggat'];

        if ($select == 'borrow' && $dueDate == $currentDate) {
            echo '<script>';
            echo '$(document).ready(function() {';
            echo '$("#returnButton_' . $b['id_pinjam'] . '").click();';
            echo '});';
            echo '</script>';
        }
    ?>
    <div class="card bg-transparent card-hover mb-3">
        <img src="/cover/<?= $b['gambar']; ?>" class="card-img-top" alt="...">
        <div class="card-body text-white">
            <div class="text-section">
                <h5 class="card-title"><?= $b['judul']; ?></h5>
                <?php
                    if ($select == 'borrow') {
                        echo "<p>Due : " . $b['tenggat'] . "</p>";
                    } else if ($select == 'history') {
                        echo "<p>Returned At : " . $b['tgl_kembali'] . "</p>";
                    }
                    ?>
            </div>
            <li class="nav-item">
                <div class="btn-group dropdown">
                    <a class="nav-link dropdown-toggle" href="" id="navbarScrollingDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <b><?= $b['id_buku']; ?></b>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarScrollingDropdown">
                        <?php if ($select == 'borrow') : ?>
                        <li><a class=" dropdown-item" href="<?= base_url('buku/read/'.$b['id_buku']); ?>">Read</a>
                            <?php endif; ?>
                        </li>
                        <li><a class=" dropdown-item" href="/book/detail/<?= $b['id_buku']; ?>">Details</a></li>
                    </ul>
                </div>
            </li>
        </div>
    </div>
    <?php
        if ($select == 'borrow') :
        ?>
    <div class="d-grid gap-2 col-6 mx-auto">
        <a id="returnButton_<?= $b['id_pinjam']; ?>" href="/return/<?= $select == 'borrow' ? $b['id_pinjam'] : ''; ?>"
            class="btn btn-outline-secondary" data-mdb-ripple-init data-mdb-ripple-color="dark" type="button"
            data-mdb-ripple-init>
            Return Borrowed Books
        </a>
    </div>
    <?php
        endif;
    endforeach;
    ?>
</div>
<script>
$(document).ready(function() {
    $('#select').on('change', function() {
        var selectedOption = $(this).val();
        if (selectedOption) {
            $.ajax({
                url: '/buku/rak/' + selectedOption,
                method: 'GET',
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });
});
</script>

<?= $this->endSection(); ?>