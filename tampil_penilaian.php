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
                          <!-- <div class="form-group">
                              <label for="nama">Minggu</label>
                              <select required class="form-control" ID="minggu" name="minggu">
                                <?php  foreach ($db->select('DISTINCT minggu','hasil_akhir')->get() as $val): ?> 
                                  <option value="<?= $val['minggu']?>"><?= $val['minggu'] ?></option>
                                <?php endforeach ?>
                                </select>
                          </div> -->
                          <!-- <div class="form-group">
                              <label for="nama">Bulan</label>
                              <select required class="form-control" ID="bulan" name="bulan">
                                <?php  foreach ($db->select('DISTINCT bulan','hasil_akhir')->get() as $val): ?> 
                                  <option value="<?= $val['bulan']?>"><?= $val['bulan'] ?></option>
                                <?php endforeach ?>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option> -->
                                </select>
                            <!-- </div> --> 
                            <div class="form-group">
                              <label for="nama">Pilih Tanggal Laporan</label>
                              <select required class="form-control" ID="tanggal_lap" name="tanggal_lap">
                                <!-- <option value="">Semua Minggu</option> -->
                                <?php  foreach ($db->select('DISTINCT tanggal_lap','hasil_akhir')->get() as $val): ?> 
                                  <option value="<?= $val['tanggal_lap']?>"><?= $val['tanggal_lap'] ?></option>
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

