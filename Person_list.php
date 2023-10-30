<?php
//buat array scalar judul kolom
$ar_judul = ['NO', 'NAMA', 'GENDER', 'TEMPAT LAHIR', 'TGL LAHIR', 'NOMOR HP', 'EMAIL', 'MEDIA SOSIAL', 'AGAMA', 'PRODI', 'UNIVERSITAS', 'MENTOR', 'FOTO', 'ACTION'];
//ciptakan object dari class Produk
$obj_person = new Person();
//panggil fungsionalitas terkait
//----------proses pencarian dan filter-----------
//tangkap id di url dari link sidebar untuk filter produk berdasarkan jenis
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : null;

// Process search and filter
if (!empty($keyword)) {
    $rs = $obj_person->cari($keyword); // If there's a search query
} elseif (!empty($id)) {
    $rs = $obj_person->filter($id); // If there's a filter from the sidebar
} else {
    $rs = $obj_person->index(); // If there's neither search nor filter
}
//print_r($rs); die();
?>

<section class="py-5">
                <div class="container px-12">
                    <!-- Contact form-->
                    <div class="bg-light rounded-4 py-5 px-4 px-md-9">
                        <div class="mb-5">
                            <!-- <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div> -->
                            <h1 class="fw-bolder"><span class="text-gradient d-inline">Tabel Mahasiswa</span></h1>
                            <div class="card shadow border-0 rounded-4 mb-5">
                            <div class="card-body p-3">
                            <div class="row gx-5 justify-content-center">
                            <div class="col-lg-11 col-xl-9 col-xxl-8">

                            <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="search-menu mb-3">
                                <form class="d-flex" role="search" method="GET">
                                    <input class="form-control me-2" type="text" name="keyword" placeholder="Search..." id="search-input" aria-label="Search">
                                    <button class="btn btn-primary" type="submit" id="search-button">Search</button>
                                    <input type="hidden" name="hal" value="Person_list" />
                                </form>
                            </div>
                            <div class="mb-3">
                            <?php
                                if (isset($_SESSION['MEMBER'])) {
                                    ?>
                                <a href="index.php?hal=Person_form" class="btn btn-info">Tambah</a>
                                <?php
                                    }
                                    ?>
                            </div>
                        </div>
                        </div>
                                <div class="row align-items-center gx-5">
                                    <div class="col-lg-12">
                                        <div style="max-width: 200%; overflow-x: auto;">
                                        <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <?php
                                            foreach ($ar_judul as $jdl) {
                                                echo '<th>' . $jdl . '</th>';
                                            }
                                            ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                foreach ($rs as $person) {
                                                    ?>
                                                <tr>
                                                    <td><?=$no?></td>
                                                    <td><?=$person['nama']?></td>
                                                    <td><?=$person['gender']?></td>
                                                    <td><?=$person['tempat_lahir']?></td>
                                                    <td><?=$person['tgl_lahir']?></td>
                                                    <td><?=$person['no_hp']?></td>
                                                    <td><?=$person['email']?></td>
                                                    <td><?=$person['media_sosial']?></td>
                                                    <td><?=$person['Agama']?></td>
                                                    <td><?=$person['prodi']?></td>
                                                    <td><?=$person['kampus']?></td>
                                                    <td><?=$person['mentor']?></td>
                                                    <td width="15%">
                                                    <?php
                                                    if (!empty($person['foto'])) {
                                                            ?>
                                                            <img src="person/<?=$person['foto']?>" class="card-img-top" width="10%" />
                                                        <?php
                                                        } else {
                                                                ?>
                                                            <img src="person/user.png" class="card-img-top" />
                                                        <?php
                                                            }
                                                                ?>
                                                </td>
                                                    <td>
                                                <form method="POST" action="Person_controller.php">
                                                <a href="index.php?hal=Person_detail&id=<?=$person['id']?>"
                                                title="Detail Produk" class="btn btn-info btn-sm">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <br>
                                                <br>
                                                <?php
                                                        if (isset($_SESSION['MEMBER'])) {
                                                                ?>
                                                <a href="index.php?hal=Person_form&id=<?=$person['id']?>"
                                                title="Ubah Produk" class="btn btn-warning btn-sm">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                    <?php
                                                    if ($_SESSION['MEMBER']['role'] != 'staff') {
                                                                ?>
                                                    <br>
                                                <br>
                                                    <button type="submit" title="Hapus Produk" class="btn btn-danger btn-sm"
                                                        name="proses" value="hapus" onclick="return confirm('Anda Yakin diHapus?')">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                    <?php
}
        ?>
                                                <input type="hidden" name="id" value="<?=$person['id']?>" />
                                                <?php
}
    ?>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
$no++;
}
?>
                                </tbody>
                            </table>