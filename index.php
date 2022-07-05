<?php
    session_start();
    error_reporting(0);
    if(empty($_SESSION['id'])){
        header('location:login.php');
    }
?>
<?php include 'header.php';?>
<?php include 'menu.php';?>

<div class="content-wrapper">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Dashboard</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
                        Selamat Datang <?php echo $_SESSION['role'] ?>!
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-group fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $db->totaladmin() ?></div>
                            <div>Total Admin</div>
                        </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                        <span class="pull-left"><a href="tampil_admin.php" id="AD">View Details</a></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $db->totalkriteria() ?></div>
                            <div>Total Kriteria</div>
                        </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                        <span class="pull-left"><a href="tampil_kriteria.php" id="ds">View Details</a></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $db->totalsubkriteria() ?></div>
                            <div>Total Sub Kriteria</div>
                        </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                        <span class="pull-left"><a href="tampil_subkriteria.php" id="sk">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-group fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge"><?php echo $db->totalkaryawan() ?></div>
                            <div>Total Kreditur</div>
                        </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                        <span class="pull-left"><a href="tampil_kreditur.php" id="ck">View Details</a></span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                        </div>
                    </a>
                    </div>
                </div>
                </div>
                <!-- /.row -->

                <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Riwayat Penilaian</h4>
                </div>
                <div><a class="btn btn-danger" onclick="return confirm('Yakin Hapus?')" href="delete_riwayat_penilaian.php">Hapus Riwayat Penilaian</a></div>
                <br>
                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nilai</th>
                                <th>Keterangan</th>
                                <th>Tanggal Penilaian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $x=1;
                                // foreach($db->select('DISTINCT *','hasil_akhir')->order_by('hasil_akhir.nilai','desc')->get() as $data):
                                foreach($db->select('*','hasil_akhir')->get() as $data):
                                    
                            ?>
                                <tr>
                                    <td><?= $x++  ?></td>
                                    <td><?= $data['nama']?></td>
                                    <td><?= $data['nilai']  ?></td>
                                    <td><?= $data['keterangan']  ?></td>
                                    <td><?= $data['tanggal_lap']  ?></td>
                                </tr>
                            <?php
                                endforeach;
                            ?>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
        
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
</div>
<?php include 'footer.php'; ?>
<script type="text/javascript">
    $(function(){
        $("#home").addClass('menu-top-active');
    });
</script>
<script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
</script>
