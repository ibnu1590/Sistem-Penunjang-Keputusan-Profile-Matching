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
                      <form method="post" action="lap_hasiltpa.php" enctype="multipart/form-data">
                          <?php if (!empty($_GET['error_msg'])): ?>
                              <div class="alert alert-danger">
                                  <?= $_GET['error_msg']; ?>
                              </div>
                          <?php endif ?>
                          <div class="form-group">
                              <label for="startdate">Tanggal Mulai</label>
                              <input type="date" required class="form-control" id="startdate" name="startdate">
                          </div>
                          <div class="form-group">
                              <label for="enddate">Tanggal Akhir</label>
                              <input type="date" required class="form-control" id="enddate" name="enddate">
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

