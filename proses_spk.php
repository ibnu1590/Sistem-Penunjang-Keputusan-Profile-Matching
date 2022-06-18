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
                    <h4 class="page-head-line">Proses SPK</h4>
                </div>
            </div>
            <div class="row">
                <h3>Tabel Hasil TPA</h3>
                <div class="table-responsive">
                    <table id="example0" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nama </th>
                                <?php foreach ($db->select('kriteria','kriteria')->get() as $k): ?>
                                <th>
                                    <?php
                                        $tmp = explode('_',$k['kriteria']);
                                        echo ucwords(implode(' ',$tmp));
                                    ?>
                                </th>
                                <?php endforeach ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($db->select('karyawan.nama,hasil_tpa.*','karyawan,hasil_tpa')->where('karyawan.id_calon_kr=hasil_tpa.id_calon_kr')->get() as $data):
                            ?>
                                <tr>
                                    <td><?= $data['nama']?></td>
                                    <?php foreach ($db->select('kriteria','kriteria')->get() as $td): ?>
                                    <td><?= $db->getnilaisubkriteria($data[$td['kriteria']])?></td>
                                    <?php endforeach ?>
                                </tr>
                            <?php
                                endforeach;
                                $db->delete('hasil_akhir')->count() == 1;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <button class="btn btn-lg" onclick="tpl()">Proses</button>
                </div>
            </div>
            <div id="proses_spk" style="display: none;">
                <div class="row">
                    <h3>Hitung Nilai GAP</h3>
                    <div class="table-responsive">
                        <table id="example1" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nama </th>
                                    <?php foreach ($db->select('kriteria','kriteria')->get() as $k): ?>
                                    <th>
                                        <?php
                                            $tmp = explode('_',$k['kriteria']);
                                            echo ucwords(implode(' ',$tmp));
                                        ?>
                                    </th>
                                    <?php endforeach ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($db->select('karyawan.nama,hasil_tpa.*','karyawan,hasil_tpa')->where('karyawan.id_calon_kr=hasil_tpa.id_calon_kr')->get() as $data):
                                ?>
                                    <tr>
                                        <td><?= $data['nama']?></td>
                                        <?php foreach ($db->select('kriteria','kriteria')->get() as $td): ?>
                                        <td><?=  $db->getnilaisubkriteria($data[$td['kriteria']]) - 3?></td>
                                        <?php endforeach ?>
                                    </tr>
                                <?php
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <h3>Konversi Nilai GAP</h3>
                    <div class="table-responsive">
                        <table id="example1" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nama </th>
                                    <?php foreach ($db->select('kriteria','kriteria')->get() as $k): ?>
                                    <th>
                                        <?php
                                            $tmp = explode('_',$k['kriteria']);
                                            echo ucwords(implode(' ',$tmp));
                                        ?>
                                    </th>
                                    <?php endforeach ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($db->select('karyawan.nama,hasil_tpa.*','karyawan,hasil_tpa')->where('karyawan.id_calon_kr=hasil_tpa.id_calon_kr')->get() as $data):
                                ?>
                                    <tr>
                                        <td><?= $data['nama']?></td>
                                        <?php foreach ($db->select('kriteria','kriteria')->get() as $td): 
                                            $nilaiGAP = $db->getnilaisubkriteria($data[$td['kriteria']]) - 3;
                                            if ($nilaiGAP == 0){
                                                $nilaiGAP = 5;
                                            } else if ($nilaiGAP == 1){
                                                $nilaiGAP = 4.5;
                                            } else if ($nilaiGAP == -1){
                                                $nilaiGAP = 4;
                                            } elseif ($nilaiGAP == 2) {
                                                $nilaiGAP = 3.5;
                                            } elseif ($nilaiGAP == -2) {
                                                $nilaiGAP = 3;
                                            } elseif ($nilaiGAP == 3) {
                                                $nilaiGAP = 2.5;
                                            } elseif ($nilaiGAP == -3) {
                                                $nilaiGAP = 2;
                                            } elseif ($nilaiGAP == 4) {
                                                $nilaiGAP = 1.5;
                                            } elseif ($nilaiGAP == -4) {
                                                $nilaiGAP = 1;
                                            }
                                        ?>
                                        <td><?=  $nilaiGAP ?></td>
                                        <?php endforeach ?>
                                    </tr>
                                <?php
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <h3>Hitung Core Factor dan Secondary Factor</h3>
                    <div class="table-responsive">
                        <table id="example1" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nama </th>
                                    <th>Core Factor</th>
                                    <th>Secondary Factor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($db->select('karyawan.nama,hasil_tpa.*','karyawan,hasil_tpa')->where('karyawan.id_calon_kr=hasil_tpa.id_calon_kr')->get() as $data):
                                ?>
                                    <tr>
                                        <td><?= $data['nama']?></td>
                                        <?php 
                                        $w=0;
                                        $x=0;
                                        foreach ($db->select('type,kriteria', 'kriteria')->get() as $td):
                                            $nilaiGAP = $db->getnilaisubkriteria($data[$td['kriteria']]) - 3;
                                            if ($nilaiGAP == 0){
                                                $nilaiGAP = 5;
                                            } else if ($nilaiGAP == 1){
                                                $nilaiGAP = 4.5;
                                            } else if ($nilaiGAP == -1){
                                                $nilaiGAP = 4;
                                            } elseif ($nilaiGAP == 2) {
                                                $nilaiGAP = 3.5;
                                            } elseif ($nilaiGAP == -2) {
                                                $nilaiGAP = 3;
                                            } elseif ($nilaiGAP == 3) {
                                                $nilaiGAP = 2.5;
                                            } elseif ($nilaiGAP == -3) {
                                                $nilaiGAP = 2;
                                            } elseif ($nilaiGAP == 4) {
                                                $nilaiGAP = 1.5;
                                            } elseif ($nilaiGAP == -4) {
                                                $nilaiGAP = 1;
                                            }
                                            $tmpExp = explode('_',$td['type']);
                                            $tmpImp = implode(' ',$tmpExp);
                                            $nilaiGab = $tmpImp."=".$nilaiGAP;
                                            if (strpos($nilaiGab, 'Secondary')  !== false) {
                                                $tampung += $nilaiGAP;
                                                $w++;
                                            }
                                            elseif (strpos($nilaiGab, 'Core') !== false) {
                                                $tampungCore += $nilaiGAP;
                                                $x++;
                                            }
                                            endforeach;
                                            $nilaiCore = $tampungCore/$x;
                                            $tampungCore = 0;

                                            $nilaiSecondary = $tampung/$w;
                                            $tampung = 0;

                                            $nilaiCFSF = $nilaiCore." ".$nilaiSecondary;
                                        ?>
                                        <td><?= $nilaiCore  ?></td>
                                        <td><?= $nilaiSecondary  ?></td>
                                    </tr>
                                <?php
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <h3>Hasil Nilai Total</h3>
                    <div class="table-responsive">
                        <table id="example1" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nama </th>
                                    <th>Nilai Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $q=0;
                                    foreach ($db->select('karyawan.nama,hasil_tpa.*','karyawan,hasil_tpa')->where('karyawan.id_calon_kr=hasil_tpa.id_calon_kr')->get() as $data):
                                ?>
                                    <tr>
                                        <td><?= $data['nama']?></td>
                                        <?php 
                                        $w=0;
                                        $x=0;
                                        
                                        foreach ($db->select('type,kriteria', 'kriteria')->get() as $td):
                                            $nilaiGAP = $db->getnilaisubkriteria($data[$td['kriteria']]) - 3;
                                            if ($nilaiGAP == 0){
                                                $nilaiGAP = 5;
                                            } else if ($nilaiGAP == 1){
                                                $nilaiGAP = 4.5;
                                            } else if ($nilaiGAP == -1){
                                                $nilaiGAP = 4;
                                            } elseif ($nilaiGAP == 2) {
                                                $nilaiGAP = 3.5;
                                            } elseif ($nilaiGAP == -2) {
                                                $nilaiGAP = 3;
                                            } elseif ($nilaiGAP == 3) {
                                                $nilaiGAP = 2.5;
                                            } elseif ($nilaiGAP == -3) {
                                                $nilaiGAP = 2;
                                            } elseif ($nilaiGAP == 4) {
                                                $nilaiGAP = 1.5;
                                            } elseif ($nilaiGAP == -4) {
                                                $nilaiGAP = 1;
                                            }
                                            $tmpExp = explode('_',$td['type']);
                                            $tmpImp = implode(' ',$tmpExp);
                                            $nilaiGab = $tmpImp."=".$nilaiGAP;
                                            if (strpos($nilaiGab, 'Secondary')  !== false) {
                                                $tampung += $nilaiGAP;
                                                $w++;
                                            }
                                            elseif (strpos($nilaiGab, 'Core') !== false) {
                                                $tampungCore += $nilaiGAP;
                                                $x++;
                                            }
                                            endforeach;
                                            $nilaiCore = $tampungCore/$x;
                                            $tampungCore = 0;

                                            $nilaiSecondary = $tampung/$w;
                                            $tampung = 0;

                                            $nilaiFinal = 0.6*$nilaiCore + 0.4*$nilaiSecondary;
                                            $ranking = $db->ranking($data['id_calon_kr'],$data['nama'],$nilaiFinal);
                                        ?>
                                        <td><?= $nilaiFinal  ?></td>
                                    </tr>
                                <?php
                                    endforeach;  
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <h3>Hasil Nilai Rank</h3>
                    <div class="table-responsive">
                        <table id="example99" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nama </th>
                                    <th>Nilai Total</th>
                                    <th>Rank</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $x=1;
                                    foreach($db->select('DISTINCT *','hasil_akhir')->order_by('hasil_akhir.nilai','desc')->get() as $data):
                                        
                                ?>
                                    <tr>
                                        <td><?= $data['nama']?></td>
                                        <td><?= $data['nilai']  ?></td>
                                        <td><?= $x++  ?></td>
                                    </tr>
                                <?php
                                    endforeach;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-12 text-center">
                    <button class="btn btn-lg" onclick="tpl()">PROSES</button>
                </div>
            </div> -->
            <br>
    </div>
</div>
    <!-- CONTENT-WRAPPER SECTION END-->
<?php include 'footer.php'; ?>
<script type="text/javascript">
    $(function(){
        $("#proses").addClass('menu-top-active');
        // $.ajax({
        //     url:'truncate_tpa.php',
        //     success:function(data){
        //         //alert(data);
                    
        //     }
        // });
    });
    function tpl(){
        $("#proses_spk").show();    
    }
</script>
<script type="text/javascript">
    $(function() {
        $('#example99').dataTable();
    });
</script>