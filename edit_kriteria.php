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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <br/>  
              <div class="panel panel-default">
                  <div class="panel-heading">
                    Form Kriteria
                  </div>
                  <div class="panel-body">
                      <form method="post" action="update_kriteria.php" enctype="multipart/form-data">
                          <?php if (!empty($_GET['error_msg'])): ?>
                              <div class="alert alert-danger">
                                  <?= $_GET['error_msg']; ?>
                              </div>
                          <?php endif ?>
                          <?php foreach ($db->select('*','kriteria')->where('id_kriteria='.$_GET['id'])->get() as $data): ?>
                              <input type="hidden" name="id" value="<?= $data[0]?>">
                              <div class="form-group">
                                  <label for="nama">Nama Kriteria</label>
                                  <input type="text" class="form-control" id="kriteria" name="kriteria" value="<?php
                                        $tmp = explode('_',$data['nama_kriteria']);
                                        echo ucwords(implode(' ',$tmp));
                                    ?>">
                              </div>
                              <div class="form-group">
                                  <label>Bobot</label>
                                  <input type="number" name="bobot" class="form-control bobot" value="<?= $data['bobot']?>" pattern="^[0-9\.\-\/]+$">
                              </div>
                              <div class="form-group">
                                    <label for="nama">Type</label>
                                        <select required class="form-control" ID="type" name="type">
                                        <option value="">-Pilih Tipe Kriteria-</option>
                                        <option <?php if( $data['status']=='Core Factor'){echo "selected"; } ?> value='Core Factor'>Core Factor</option>
                                        <option <?php if( $data['status']=='Secondary Factor'){echo "selected"; } ?> value='Secondary Factor'>Secondary Factor</option>
                                        </select>
                                </div> 
                          <?php endforeach ?>
                          
                          <div class="form-group">
                              <button class="btn btn-primary">Simpan</button>
                          </div>
                      </form>
                  </div>
              </div>
            </div>
        </div>
        </div>
    </div>
</div>
<?php include 'footer.php';?>
<script type="text/javascript">
    $(function(){
        $("#ds").addClass('menu-top-active');
    });
</script>