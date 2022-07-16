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
                  Form Kreditur
                  </div>
                  <div class="panel-body">
                      <form method="post" action="update_kreditur.php" enctype="multipart/form-data">
                          <?php if (!empty($_GET['error_msg'])): ?>
                              <div class="alert alert-danger">
                                  <?= $_GET['error_msg']; ?>
                              </div>
                          <?php endif ?>
                          <?php foreach ($db->select('*','kreditur')->where('id_calon_kr='.$_GET['id'])->get() as $val): ?>
                              <input type="hidden" name="id_calon_kr" value="<?= $val['id_calon_kr']?>">
                              <div class="form-group">
                                  <label for="nama">NIK</label>
                                  <input type="text" class="form-control" id="nik" name="nik" value="<?= $val['NIK']?>">
                              </div>
                              <div class="form-group">
                                  <label for="nama">Nama Kreditur</label>
                                  <input type="text" class="form-control" id="nama" name="nama" value="<?= $val['nama']?>">
                              </div>
                              <div class="form-group">
                                    <label for="nama">Jenis Kelamin</label>
                                        <select required class="form-control" ID="jeniskelamin" name="jeniskelamin">
                                        <option value="">-PILIH JENIS KELAMIN-</option>
                                        <option <?php if( $val['jeniskelamin']=='Pria'){echo "selected"; } ?> value='Pria'>Pria</option>
                                        <option <?php if( $val['jeniskelamin']=='Wanita'){echo "selected"; } ?> value='Wanita'>Wanita</option>
                                        </select>
                                </div>
                              <div class="form-group">
                              <label for="nama">Alamat</label>
                              <textarea class="form-control" rows="2" name="alamat"><?= $val['alamat']?></textarea>
                             </div>
                             <div class="form-group">
                                  <label for="ttl">Telepon</label>
                                  <input type="number" class="form-control" id="telepon" name="telepon" value="<?= $val['telepon']?>">
                              </div>
                              <div class="form-group">
                                  <label for="ttl">Tanggal / Bulan / Tahun Lahir</label>
                                  <input type="date" class="form-control" id="ttl" name="ttl" value="<?= $val['ttl']?>">
                              </div>
                              <div class="form-group">
                              <label for="nama">Tempat Lahir</label>
                              <input type="text" required class="form-control" id="tempatlahir" value="<?= $val['TempatLahir']?>" name="tempatlahir">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Pendidikan Terakhir</label>
                                        <select required class="form-control" ID="pendidikan" name="pendidikan">
                                        <option <?php if( $val['PendidikanTerakhir']=='SD'){echo "selected"; } ?> value='SD'>SD</option>
                                        <option <?php if( $val['PendidikanTerakhir']=='SMA'){echo "selected"; } ?> value='SMA'>SMA</option>
                                        <option <?php if( $val['PendidikanTerakhir']=='D3'){echo "selected"; } ?> value='D3'>D3</option>
                                        <option <?php if( $val['PendidikanTerakhir']=='S1'){echo "selected"; } ?> value='S1'>S1</option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Jabatan</label>
                                    <input required type="text" class="form-control" id="jabatan" value="<?= $val['Jabatan']?>" name="jabatan">
                                </div>
                              <div class="form-group">
                                  <label for="foto">Foto</label>
                                    <input type="hidden" name="id_foto" value="<?= $val['foto']?>">
                                    <div class="controls">
                                    <a href=""><?php if($val['foto'] != ""): ?>
                                    <img src="assets/foto_calon_karyawan//<?php echo $val['foto']; ?>" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                    <?php else: ?>
                                    <img src="assets/foto_calon_karyawan/image_not_available.jpg" width="100px" height="100px" style="border:4px groove #CCCCCC; border-radius:5px;">
                                    <?php endif; ?>
                                    </a>
                                    </div>
                                  <input type="file" id="foto" name="foto" />
                              </div>
                              <div class="form-group">
                                  <label for="nama">Alasan Peminjaman</label>
                                  <textarea class="form-control" rows="8" name="alasan"><?= $val['alasan']?></textarea>
                              </div>
                              <div class="form-group">
                                  <button class="btn btn-primary">Simpan</button>
                              </div>
                          <?php endforeach ?>
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
        $("#ck").addClass('menu-top-active');
    });
</script>