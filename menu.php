<?php
    session_start();
    error_reporting(0);
    
    if(empty($_SESSION['id'])){
        header('location:login.php?error_login=1');
    }
?>
<!-- LOGO HEADER END-->
 <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="index.php" id="home">Dashboard</a></li>
                            <li>
                                <a href="" data-toggle="dropdown" > Master</a>
                                <ul class="dropdown-menu">
                                    <li><a href="tampil_admin.php" id="AD">Data Admin</a></li>
                                    <li><a href="tampil_kreditur.php" id="ck">Data Kreditur</a></li>
                                    <li><a href="tampil_kriteria.php" id="ds">Data Kriteria</a></li>
                                    <li><a href="tampil_subkriteria.php" id="sk">Data Sub Kriteria</a></li>
                                </ul>
                            </li>
                            <?php 
                                if ($_SESSION['role'] == 'cmo') {
                            ?>
                            <li><a href="tampil_tpa.php" id="tpa">Penilaian Kreditur</a></li>
                            <li><a href="proses_spk.php" id="proses">Proses SPK</a></li> 
                            <?php
                                }
                            ?>
                            <li><a href="ubah_password.php" id="proses">Ubah Password</a></li>                                                               
                            <li>
                                <a href="" data-toggle="dropdown" > Laporan</a>
                                <ul class="dropdown-menu">
                                    <li><a href="lap_admin.php" id="ck">Lap Admin</a></li>
                                    <li><a href="lap_kreditur.php" id="ck">Lap Kreditur</a></li>
                                    <li><a href="lap_kriteria.php" id="ds">Lap Kriteria</a></li>
                                    <li><a href="lap_subkriteria.php" id="sk">Lap Sub Kriteria</a></li>
                                    <li><a href="tampil_penilaian.php" id="sk">Lap Penilaian</a></li>
                                </ul>
                            </li>
                            <li><a href="logout.php" id="ds">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <!--First Commit-->