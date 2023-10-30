<?php
$obj_agama = new Agama(); //ciptakan object dari class Jenis
$rs = $obj_agama->index(); //panggil fungsi index untuk mendapatkan data jenis produk
$ar_gender = ['Laki-laki','perempuan'];
$ar_mentor = ['Nasrul','Fathan Mubin'];
 //buat array kondisi produk
//------------proses edit data----------------
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id']; // Capture the "id" parameter from the URL
    $obj_person = new Person(); // Create an object from the Person class

    // Call the function to display the existing data to be edited in the form
    $row = $obj_person->getPerson($id); // In edit mode, the form will be populated with existing data for editing
} else {
    $row = []; // In input mode for new data, the form will remain empty
}

// //----------hak akses----------
if(isset($_SESSION['MEMBER'])){
?>
<div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Form Mahasiswa</span></h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
                        <!-- Experience Section-->
                        <section>
                            <!-- Experience Card 1-->
                            <div class="card shadow border-0 rounded-4 mb-5">
                                <div class="card-body p-5">
                                    <div class="row align-items-center gx-5">
                                        <div class="col-lg-12"><div>
                                <form id="contactForm" method="POST" action="Person_controller.php">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="nama" value="<?= isset($row['nama']) ? $row['nama'] : '' ?>"  id="nama" type="text" placeholder="Nama Mahasiswa" data-sb-validations="required" />
                                        <label for="nama">Nama</label>
                                        <div class="invalid-feedback" data-sb-feedback="nama:required">Nama Mahasiswa is required.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label d-block">Gender</label>
                                        <?php
                                    $ar_gender = ['Laki-laki', 'perempuan'];
                                    foreach ($ar_gender as $gender) {
                                        $cek = (isset($row['gender']) && $row['gender'] === $gender) ? "checked" : "";
                                        ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" value="<?= $gender ?>" data-sb-validations="required" <?= $cek ?> />
                                            <label class="form-check-label"><?= $gender ?></label>
                                        </div>
                                        <?php } ?>
                                        <div class="invalid-feedback" data-sb-feedback="gender:required">One option is required.</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="tempat_lahir" value="<?= isset($row['tempat_lahir']) ? $row['tempat_lahir'] : '' ?>" id="tempatLahir" type="text" placeholder="tempat lahir" data-sb-validations="required" />
                                        <label for="tempatLahir">Tempat Lahir</label>
                                        <div class="invalid-feedback" data-sb-feedback="tempatLahir:required">Tempat Lahir is required.</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="tgl_lahir" value="<?= isset($row['tgl_lahir']) ? $row['tgl_lahir'] : '' ?>" id="tanggalLahir" type="date" placeholder="Tanggal Lahir" data-sb-validations="required" />
                                        <label for="tanggalLahir">Tanggal Lahir</label>
                                        <div class="invalid-feedback" data-sb-feedback="tanggalLahir:required">Tanggal Lahir is required.</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="no_hp" value="<?= isset($row['no_hp']) ? $row['no_hp'] : '' ?>" id="nomorHP" type="text" placeholder="masukan nomor hp" data-sb-validations="required" />
                                        <label for="nomorHP">Nomor HP</label>
                                        <div class="invalid-feedback" data-sb-feedback="nomorHP:required">Nomor HP is required.</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="email" value="<?= isset($row['email']) ? $row['email'] : '' ?>" id="email" type="text" placeholder="Masukan Email" data-sb-validations="required" />
                                        <label for="email">Email</label>
                                        <div class="invalid-feedback" data-sb-feedback="email:required">Email is required.</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="media_sosial" value="<?= isset($row['media_sosial']) ? $row['media_sosial'] : '' ?>" id="mediaSosial" type="text" placeholder="Masukan Media Sosial" data-sb-validations="required" />
                                        <label for="mediaSosial">Media Sosial</label>
                                        <div class="invalid-feedback" data-sb-feedback="mediaSosial:required">Media Sosial is required.</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select class="form-select" name="idagama" id="Agama" aria-label="Agama">
                                            <option value="-- Pilih Agama --">-- Pilih Agama --</option>
                                            <?php
                                            foreach($rs as $agama){
                                                //--------proses edit jenis produk-------
                                                $sel = ($agama['id'] == $row['idagama']) ? "selected" : "" ;
                                            ?>    
                                                <option value="<?= $agama['id'] ?>" <?= $sel ?>><?= $agama['nama_agama'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="agama">Agama</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="prodi" value="<?= isset($row['prodi']) ? $row['prodi'] : '' ?>" id="kampus" type="text" placeholder="Masukan Media Sosial" data-sb-validations="required" />
                                        <label for="prodi">Program Studi</label>
                                        <div class="invalid-feedback" data-sb-feedback="prodi:required">Universitas is required.</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="kampus" value="<?= isset($row['kampus']) ? $row['kampus'] : '' ?>" id="kampus" type="text" placeholder="Masukan Media Sosial" data-sb-validations="required" />
                                        <label for="universitas">Nama Kampus</label>
                                        <div class="invalid-feedback" data-sb-feedback="kampus:required">Universitas is required.</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label d-block">Mentor</label>
                                        <?php
                                        $ar_mentor = ['Nasrul', 'Fathan Mubin'];
                                        foreach ($ar_mentor as $mentor) {
                                            $cek = (isset($row['mentor']) && $row['mentor'] === $mentor) ? "checked" : "";
                                            ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="mentor" value="<?= $mentor ?>" data-sb-validations="required" <?= $cek ?> />
                                            <label class="form-check-label"><?= $mentor ?></label>
                                        </div>
                                        <?php } ?>
                                        <div class="invalid-feedback" data-sb-feedback="mentor:required">One option is required.</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="foto" value="<?= isset($row['foto']) ? $row['foto'] : '' ?>" id="foto" type="text" placeholder="Masukan foto" data-sb-validations="required" />
                                        <label for="foto">Foto Mahasiswa</label>
                                        <div class="invalid-feedback" data-sb-feedback="foto:required">Foto is required.</div>
                                    </div>     
                                    <div class="text-center">
                                    <?php
                                    if(empty($id)){ //-----mode input data baru form kosong & tombol simpan--------
                                    ?>
                                        <button class="btn btn-primary" name="proses" type="submit" value="simpan">Simpan</button>
                                    <?php
                                    }
                                    else{ //-----mode edit data lama form terisi data lama & tombol ubah--------
                                    ?>
                                        <button class="btn btn-success" name="proses" type="submit" value="ubah">Ubah</button>
                                        <input type="hidden" name="idx" value="<?= $id ?>" />
                                    <?php } ?>
                                        <a href="index.php?hal=Person_list" class="btn btn-info" name="unproses">Kembali</a>
                                    </div>
                                </form>
                            </div>
                            <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
                            <?php
                            }
                            else{
                                include_once 'access_denied.php';
                            }
                            ?>
                                                       </div></div>
                                    </div>
                                </div>
                            </div>
                                        </section>