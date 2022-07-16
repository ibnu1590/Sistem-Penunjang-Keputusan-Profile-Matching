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
                    Form Profile Kreditur
                  </div>
                  <div class="panel-body">
                      <form method="post" action="insert_profile_kreditur.php" enctype="multipart/form-data">
                          <?php if (!empty($_GET['error_msg'])): ?>
                              <div class="alert alert-danger">
                                  <?= $_GET['error_msg']; ?>
                              </div>
                          <?php endif ?>
                          <div class="form-group col-md-12">
                              <div class="alert alert-info">
                                  <i class="fa fa-info-circle"></i> Nama Yang Ditampilkan adalah Nama Kreditur yang belum dinilai...
                              </div>
                              <label for="nama">Nama Kreditur</label>
                                  <select required class="form-control" name="id_kreditur">
                                  <?php  foreach ($db->select('*','kreditur')->get() as $val): ?> 
                                  <option value="<?= $val['id_calon_kr']?>"><?= $val['nama'] ?></option>
                                  <?php endforeach ?>
                                  </select>
                          </div>
                          
                          <?php 
                            session_start();
                            $tmpIdKriteria = array();
                            foreach ($db->select('id_kriteria,nama_kriteria','kriteria')->get() as $r): 
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
                              
                              <input type="hidden" name="id_kriteria[]" value="<?= $r['id_kriteria']; ?>">

                            
                              <select required class="form-control" name="place[]">
                                    <?php if ($r['nama_kriteria'] == "gaji") { ?>
                                    
                                        <option value="1">2.500.000 – 3.499.000 (nilai = 1)</option>
                                        <option value="2">3.500.000 – 5.499.000 (nilai = 2)</option>
                                        <option value="3">5.500.000 – 7.999.000 (nilai = 3)</option>
                                        <option value="4">8.000.000 – 15.000.000 (nilai = 4)</option>
                                        <option value="5">15.000.000 – 50.000.000 (nilai = 5)</option>

                                    <?php } else if ($r['nama_kriteria'] == "usia") { ?>
                                    
                                        <option value="1">17 – 23 (nilai = 1)</option>
                                        <option value="2">46 – 55 (nilai = 2)</option>
                                        <option value="3">24 – 26 (nilai = 3)</option>
                                        <option value="4">36 – 45 (nilai = 4)</option>
                                        <option value="5">27 – 35 (nilai = 5)</option>

                                    <?php } else if ($r['nama_kriteria'] == "status_tempat_tinggal") { ?>
                                    
                                        <option value="1">Kost (nilai = 1)</option>
                                        <option value="2">Kontrak (nilai = 2)</option>
                                        <option value="3">Milik Keluarga (nilai = 3)</option>
                                        <option value="4">Milik Sendiri (nilai = 4)</option>
                                        <option value="5">Milik Orang Tua (nilai = 5)</option>

                                    <?php } else if ($r['nama_kriteria'] == "umur_motor") { ?>

                                        <option value="1">7 Tahun (nilai = 1)</option>
                                        <option value="2">6 Tahun (nilai = 2)</option>
                                        <option value="3">4 – 5 Tahun (nilai = 3)</option>
                                        <option value="4">2 – 3 Tahun (nilai = 4)</option>
                                        <option value="5">1 Tahun (nilai = 5)</option>

                                    <?php } else if ($r['nama_kriteria'] == "pekerjaan") {?>

                                        <option value="1">Pensiunan (nilai = 1)</option>
                                        <option value="2">Profesional (nilai = 2)</option>
                                        <option value="3">Wiraswasta (nilai = 3)</option>
                                        <option value="4">Karyawan Swasta (nilai = 4)</option>
                                        <option value="5">PNS (nilai = 5)</option>

                                    <?php } ?>
                                </select>
                          </div>
                          <?php endforeach ?>
                        
                          <?php 
                        //   session_start();
                        //   $tmpIdArr = array();
                        //   foreach ($r['id_kriteria'] as $tmpId) :
                        //   $_SESSION['id_kriteria'] = $r['id_kriteria'];  
                            // $_SESSION['id_kriteria'] += $tmpId;
                        //     array_push($tmpIdArr,$tmpId);
                        //   endforeach;
                        //   $_SESSION['id_kriteria'] = $tmpIdArr;
                          ?>

                          <div class="form-group col-md-12">
                              <button class="btn btn-primary">Simpan</button>
                          </div>
                      </form>
                        <?php 
                          echo $test->test1("isi test"); 
                        ?>
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