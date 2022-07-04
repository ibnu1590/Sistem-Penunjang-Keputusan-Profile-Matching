<?php
    session_start();
    error_reporting(0);
    if(empty($_SESSION['id'])){
        header('location:login.php?error_login=1');
    }
?>
<?php include 'header.php';?>
<?php include 'menu.php';?>
<div class="content-wrapper">
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <br/>  
              <div class="panel panel-default">
                  <div class="panel-heading">
                  Laporan Penilaian
                  </div>
                  <div class="panel-body">
                      <form method="post" action="lap_nilai.php" enctype="multipart/form-data">
                          <?php if (!empty($_GET['error_msg'])): ?>
                              <div class="alert alert-danger">
                                  <?= $_GET['error_msg']; ?>
                              </div>
                          <?php endif ?>
                          <div class="form-group">
                              <label for="nama">Minggu</label>
                              <select required class="form-control" ID="minggu" name="minggu">
                                <!-- <option value="">Semua Minggu</option> -->
                                <?php  foreach ($db->select('DISTINCT minggu','hasil_akhir')->get() as $val): ?> 
                                  <option value="<?= $val['minggu']?>"><?= $val['minggu'] ?></option>
                                <?php endforeach ?>
                                </select>
                          </div>
                          <!-- <div class="form-group">
                              <label for="nama">Bulan</label>
                            <select class="form-control" name="bulan">
                            <?php
                            $bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                            for($a=1;$a<=12;$a++){
                            if($a==date("m"))
                            { 
                            $pilih="selected";
                            }
                            else 
                            {
                            $pilih="";
                            }
                            echo("<option value=\"$a\" $pilih>$bulan[$a]</option>"."\n");
                            }
                            ?>
                            </select></div> -->
                            <div class="form-group">
                              <label for="nama">Bulan</label>
                              <select required class="form-control" ID="bulan" name="bulan">
                                <!-- <option value="">Semua Minggu</option> -->
                                <?php  foreach ($db->select('DISTINCT bulan','hasil_akhir')->get() as $val): ?> 
                                  <option value="<?= $val['bulan']?>"><?= $val['bulan'] ?></option>
                                <?php endforeach ?>
                                <!-- <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option> -->
                                </select>
                            </div>
                            <div class="form-group">
                              <label for="nama">Tahun</label>
                              <select required class="form-control" ID="tahun" name="tahun">
                                <!-- <option value="">Semua Minggu</option> -->
                                <?php  foreach ($db->select('DISTINCT tahun','hasil_akhir')->get() as $val): ?> 
                                  <option value="<?= $val['tahun']?>"><?= $val['tahun'] ?></option>
                                <?php endforeach ?>
                                </select>
                          </div>
                          <div class="form-group">
                              <button class="btn btn-primary">Cetak</button>
                          </div>
                      </form>
                  </div>
              </div>
            </div>
        </div>
        </div>
    </div>
</div>
</div>
<?php include 'footer.php';?>

