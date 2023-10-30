<nav class="navbar navbar-expand-lg navbar-light bg-white py-3">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.php?hal=header"><span class="fw-bolder text-primary">EVzi's SITE</span></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 small fw-bolder">
                            <li class="nav-item"><a class="nav-link" href="index.php?hal=home">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?hal=resume">Resume</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?hal=projects">Projects</a></li>
                            <li class="nav-item"><a class="nav-link" href="index.php?hal=contact">Contact</a></li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Master Data
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                if(isset($_SESSION['MEMBER']) && $_SESSION['MEMBER']['role'] != 'staff'){
                                ?>
                                <li><a class="dropdown-item" href="index.php?hal=Agama_list">Agama</a></li>
                                <?php }?>
                                <li><a class="dropdown-item" href="index.php?hal=Person_list">Mahasiswa</a></li>
                            </ul>
                            </li>
                            <?php
                            if(!isset($_SESSION['MEMBER'])){ //----belum login------
                            ?>
                            <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                            </li>
                            <?php
                            }
                            else{ //---------user sudah login dan terotentikasi---------------
                            ?>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['MEMBER']['username'].' - '.$_SESSION['MEMBER']['role'] ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <?php
                                if($_SESSION['MEMBER']['role'] == 'admin'){
                                ?>
                                <li><a class="dropdown-item" href="#">Kelola User</a></li>
                                <?php } ?>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                            </li>
                            <?php } ?>
                        </ul>  
                        </div>
                    </div>
                    </nav>
                            <!----------- akhir menu ---------------->
                        </div>
                    </div>