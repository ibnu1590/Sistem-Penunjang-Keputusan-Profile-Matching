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
                    Form Edit Produk
                  </div>
                  <div class="panel-body">
                      <form method="post" action="update_produk.php" enctype="multipart/form-data">
                          <?php if (!empty($_GET['error_msg'])): ?>
                              <div class="alert alert-danger">
                                  <?= $_GET['error_msg']; ?>
                              </div>
                          <?php endif ?>
                          <?php foreach ($db->select('*','produk')->where('id_produk='.$_GET['id'])->get() as $data): ?>
                              <input type="hidden" name="id" value="<?= $data[0]?>">
                              <div class="form-group">
                                  <label for="nama">Nama Produk</label>
                                  <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?php
                                        $tmp = explode('_',$data['nama_produk']);
                                        echo ucwords(implode(' ',$tmp));
                                    ?>">
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