<?php
//buat array scalar judul kolom
$ar_judul = ['FULLNAME','EMAIL','USERNAME','PASSWORD','ROLE','FOTO'];
//ciptakan object dari class Jenis
$obj_memeber = new Member();
//panggil fungsionalitas terkait
$rs = $obj_member->index();
//print_r($rs); die();
//-----------hak akses--------------
if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'admin'){
?>
<section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                        <div class="mb-5">
                            <!-- <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">TABEL MAHASISWA</h1> -->
                            <div class="card shadow border-0 rounded-4 mb-5">
                            <div class="card-body p-4">
                                <!-- Add the search menu above the table -->
                                <div class="search-menu mb-3">
                                </div>

                                <div class="row align-items-center gx-5">
                                    <div class="col-lg-12">
                                        <div style="max-width: 150%; overflow-x: auto;">
                            <table class="table">
                            <thead>
                                <tr>
                                    <?php
                                        foreach($ar_judul as $jdl){
                                            echo '<th>'.$jdl.'</th>';
                                        }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach($rs as $member){
                                ?>    
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $member['fullname'] ?></td>
                                        <td><?= $member['email'] ?></td>
                                        <td><?= $member['username'] ?></td>
                                        <td><?= $member['password'] ?></td>
                                        <td><?= $member['role'] ?></td>
                                        <td><?= $member['foto'] ?></td>
                                    </tr>
                                <?php    
                                $no++;
                                }	
                                ?>
                            </tbody>
                        </table>
                        <?php 
                        }
                        else {
                            include_once 'access_denied.php';
                        }
                        ?>
                                            </div>
                                            </div>
                                            </div>
                                            </div>