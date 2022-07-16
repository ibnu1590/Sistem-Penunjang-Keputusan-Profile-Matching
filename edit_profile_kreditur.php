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
                      <form method="post" action="update_profile_kreditur.php">
                          <?php if (!empty($_GET['error_msg'])): ?>
                              <div class="alert alert-danger">
                                  <?= $_GET['error_msg']; ?>
                              </div>
                          <?php endif ?>
                            <?php  foreach ($db->select('*','kreditur')->where('id_calon_kr  ='.$_GET['id'])->get() as $data): ?> 
                            <input type="hidden" name="id" value="<?= $data['id_calon_kr']?>">
                                <div class="form-group col-md-12">
                                  <label for="nama">Nama</label>
                                  <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama']?>" readonly>
                              </div>
                              <?php foreach ($db->select('*','kriteria')->get() as $r): ?>
	                          <div class="form-group col-md-3">
	                              <label><?= $r['nama_kriteria']?></label>
                                <select required class="form-control" name="kriteria[]">
                                <?php  foreach ($db->getKeterenganValue($r['id_kriteria']) as $val): ?> 
                                <option value="<?= $val['value']?>"
                                <?php if(  $db->getnilaiprofilekreditur2($data["id_calon_kr"],$r['id_kriteria']) == $val['value']) { echo ' selected="selected"'; } ?>
                                ><?= $val['keterangan'] ?> (Nilai = <?= $val['value'] ?>)
                            
                             </option>
                                <?php endforeach ?>
                                </select>
	                          </div>
	                          <?php endforeach ?>
                          <?php endforeach ?>
                          
                          <div class="form-group col-md-12">
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
        $("#tpu").addClass('menu-top-active');
    });
</script>