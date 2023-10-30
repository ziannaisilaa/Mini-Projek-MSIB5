<?php
$id = $_REQUEST['id']; // tangkap request produk id di URL
$model = new Person(); // ciptakan obj dari class Produk
$rs  = $model->getPerson($id); // panggil fungsi u/ mendetailkan produk
?>
<style>
    .info-item {
            padding-left: 20px;
        }

</style>
  <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Detail Mahasiswa</span></h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
                        <!-- Experience Section-->
                        <section>
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h2 class="text-primary fw-bolder mb-0"></h2>
                                <!-- Download resume button-->
                                <!-- Note: Set the link href target to a PDF file within your project-->
                                <a class="btn btn-primary px-4 py-3" href="index.php?hal=Person_list">
                                    <!-- <div class="d-inline-block bi bi-download me-2"></div> -->
                                    Kembali
                                </a>
                            </div>
                            <!-- Experience Card 1-->
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                            <div class="bg-light p-4 rounded-4">
                                                <div class="text-primary fw-bolder mb-3"><?= $rs['nama'] ?></div>
                                                <div class="small fw-bolder">
                                                <?php
                                                 if (!empty($rs['foto'])) {
                                                ?>
                                                    <img src="person/<?= $rs['foto'] ?>" class="card-img-top" />
                                                <?php
                                                }
                                                else{
                                                ?>
                                                    <img src="person/user.png" class="card-img-top" />
                                                <?php
                                                }
                                                ?>
                                            </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-8"><div>
                                        <div>
                                        <div>
                                            <div class="info-item">
                                                <strong>Gender:</strong> <?= $rs['gender'] ?>
                                            </div>
                                            <div class="info-item">
                                                <strong>Tempat Lahir:</strong> <?= $rs['tempat_lahir'] ?>
                                            </div>
                                            <div class="info-item">
                                                <strong>Tanggal Lahir:</strong> <?= $rs['tgl_lahir'] ?>
                                            </div>
                                            <div class="info-item">
                                                <strong>Contact:</strong> <?= $rs['no_hp'] ?>
                                            </div>
                                            <div class="info-item">
                                                <strong>Email:</strong> <?= $rs['email'] ?>
                                            </div>
                                            <div class="info-item">
                                                <strong>Agama:</strong> <?= $rs['Agama'] ?>
                                            </div>
                                            <div class="info-item">
                                                <strong>Program Studi:</strong> <?= $rs['prodi'] ?>
                                            </div>
                                            <div class="info-item">
                                                <strong>Universitas:</strong> <?= $rs['kampus'] ?>
                                            </div>
                                            <br><br><br>
                                            <div class="info-item">
                                                <strong>Mentor:</strong> <?= $rs['mentor'] ?>
                                            </div>
                                        </div>

                                        </div>

                                        </div></div>
                                    </div>
                                </div>
                            </div>