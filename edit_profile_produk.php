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
                    Form Edit Penilaian
                  </div>
                  <div class="panel-body">
                      <form method="post" action="update_profile_produk.php">
                            <?php if (!empty($_GET['error_msg'])): ?>
                                <div class="alert alert-danger">
                                    <?= $_GET['error_msg']; ?>
                                </div>
                            <?php endif ?>
                            <?php foreach ($db->select('DISTINCT produk.nama_produk, produk.id_produk','produk,profile_produk')->where("produk.id_produk=".$_GET['id'])->get() as $data): ?>
                          	  <input type="hidden" name="id_produk" value="<?= $data['id_produk']?>">
                                <div class="form-group col-md-12">
                                  <label for="nama">Nama</label>
                                  <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama_produk']?>" readonly>
                                </div>
                            <?php endforeach ?>
                            <?php 
                            session_start();
                            $tmpIdKriteria = array();
                            foreach ($db->select('produk.nama_produk,kriteria.id_kriteria,kriteria.nama_kriteria,profile_produk.nilai_produk','profile_produk,produk,kriteria')->where("profile_produk.id_produk=produk.id_produk AND profile_produk.id_kriteria=kriteria.id_kriteria")->get() as $r): 
                                array_push($tmpIdKriteria,$r['id_kriteria']);
                                $_SESSION['id_kriteria'] = $tmpIdKriteria;
                            ?>
                                <div class="form-group col-md-3">
                                    <label>
                                            <?php
                                                $tmp = explode('_',$r['nama_kriteria']);
                                                echo ucwords(implode(' ',$tmp));
                                            ?>
                                    </label>
                                <!-- <input type="number" name="place[]" class="form-control"> -->
                                    <select required class="form-control" name="place[]">
                                        <?php if ($r['nama_kriteria'] == "gaji") { ?>
                                                
                                            <option <?php if($r['nilai_produk'] == 1) {echo "selected"; } ?> value="1">2.500.000 – 3.499.000 (nilai = 1)</option>
                                            <option <?php if($r['nilai_produk'] == 2) {echo "selected"; } ?> value="2">3.500.000 – 5.499.000 (nilai = 2)</option>
                                            <option <?php if($r['nilai_produk'] == 3) {echo "selected"; } ?> value="3">5.500.000 – 7.999.000 (nilai = 3)</option>
                                            <option <?php if($r['nilai_produk'] == 4) {echo "selected"; } ?> value="4">8.000.000 – 15.000.000 (nilai = 4)</option>
                                            <option <?php if($r['nilai_produk'] == 5) {echo "selected"; } ?> value="5">15.000.000 – 50.000.000 (nilai = 5)</option>

                                        <?php } else if ($r['nama_kriteria'] == "usia") { ?>

                                            <option <?php if($r['nilai_produk'] == 1) {echo "selected"; } ?> value="1">17 – 23 (nilai = 1)</option>
                                            <option <?php if($r['nilai_produk'] == 2) {echo "selected"; } ?> value="2">46 – 55 (nilai = 2)</option>
                                            <option <?php if($r['nilai_produk'] == 3) {echo "selected"; } ?> value="3">24 – 26 (nilai = 3)</option>
                                            <option <?php if($r['nilai_produk'] == 4) {echo "selected"; } ?> value="4">36 – 45 (nilai = 4)</option>
                                            <option <?php if($r['nilai_produk'] == 5) {echo "selected"; } ?> value="5">27 – 35 (nilai = 5)</option>

                                        <?php } else if ($r['nama_kriteria'] == "status_tempat_tinggal") { ?>
                                            
                                            <option <?php if($r['nilai_produk'] == 1) {echo "selected"; } ?> value="1">Kost (nilai = 1)</option>
                                            <option <?php if($r['nilai_produk'] == 2) {echo "selected"; } ?> value="2">Kontrak (nilai = 2)</option>
                                            <option <?php if($r['nilai_produk'] == 3) {echo "selected"; } ?> value="3">Milik Keluarga (nilai = 3)</option>
                                            <option <?php if($r['nilai_produk'] == 4) {echo "selected"; } ?> value="4">Milik Sendiri (nilai = 4)</option>
                                            <option <?php if($r['nilai_produk'] == 5) {echo "selected"; } ?> value="5">Milik Orang Tua (nilai = 5)</option>

                                        <?php } else if ($r['nama_kriteria'] == "umur_motor") { ?>
                                            
                                            <option <?php if($r['nilai_produk'] == 1) {echo "selected"; } ?> value="1">7 Tahun (nilai = 1)</option>
                                            <option <?php if($r['nilai_produk'] == 2) {echo "selected"; } ?> value="2">6 Tahun (nilai = 2)</option>
                                            <option <?php if($r['nilai_produk'] == 3) {echo "selected"; } ?> value="3">4 – 5 Tahun (nilai = 3)</option>
                                            <option <?php if($r['nilai_produk'] == 4) {echo "selected"; } ?> value="4">2 – 3 Tahun (nilai = 4)</option>
                                            <option <?php if($r['nilai_produk'] == 5) {echo "selected"; } ?> value="5">1 Tahun (nilai = 5)</option>

                                        <?php } else if ($r['nama_kriteria'] == "pekerjaan") {?>
                                            
                                            <option <?php if($r['nilai_produk'] == 1) {echo "selected"; } ?> value="1">Pensiunan (nilai = 1)</option>
                                            <option <?php if($r['nilai_produk'] == 2) {echo "selected"; } ?> value="2">Profesional (nilai = 2)</option>
                                            <option <?php if($r['nilai_produk'] == 3) {echo "selected"; } ?> value="3">Wiraswasta (nilai = 3)</option>
                                            <option <?php if($r['nilai_produk'] == 4) {echo "selected"; } ?> value="4">Karyawan Swasta (nilai = 4)</option>
                                            <option <?php if($r['nilai_produk'] == 5) {echo "selected"; } ?> value="5">PNS (nilai = 5)</option>

                                        <?php } ?>
                                    </select>
                                </div>
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
        $("#tpa").addClass('menu-top-active');
    });
</script>