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
            <!-- add alert -->
            <?php 
            //ambil nilai variabel error
            if (isset($_GET['pesan']))
            {

            ?>
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> berhasil.
            </div>
            <?php 
                }       
            ?>

            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Profile Kreditur</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php if (!empty($_GET['error_msg'])): ?>
                      <div class="alert alert-danger">
                          <?= $_GET['error_msg']; ?>
                      </div>
                    <?php endif ?>
                </div>
            </div>  
            <div class="row">
                <div><a href="input_profile_kreditur.php" class="btn btn-info">Tambah Data</a></div>
                <br>
                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <?php foreach ($db->select('nama_kriteria','kriteria')->get()  as $kr ): ?>
                                <th>
                                    <?php
                                        $tmp = explode('_',$kr['nama_kriteria']);
                                        echo ucwords(implode(' ',$tmp));
                                    ?>
                                </th>
                                <?php endforeach ?>
                            
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach($db->select('kreditur.id_calon_kr,kreditur.nama','kreditur')->where('kreditur.id_calon_kr in (SELECT id_calon_kr from profile_kreditur)')->get() as $data): ?>
                            <tr>
                                <td><?= $no;?></td>
                                <td><?= $data['nama']?></td>
                                <?php foreach ($db->select('nama_kriteria,id_kriteria','kriteria')->get() as $k): ?>
                                <td> 
                                <?php
                                       $nilai = $db->getnilaiprofilekreditur2($data["id_calon_kr"],$k['id_kriteria']);
                                       $ket = $db->getketerangan($k['id_kriteria'],$nilai)
                                ?>

                                   <?php echo $ket ?> (nilai = <?php echo $nilai ?>)
                               
                                
                                </td>
                                <?php endforeach ?>
                                <td>
                                    <a class="btn btn-warning" href="edit_profile_kreditur.php?id=<?php echo $data[0]?>">Edit</a>
                                    <a class="btn btn-danger" onclick="return confirm('Yakin Hapus?')" href="delete_profile_kreditur.php?id=<?php echo $data[0]?>">Hapus</a>
                                </td>
                                
                            </tr>
                            <?php $no++; endforeach; ?>
                        </tbody>
                    </table>    

                </div>
            </div>
            
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->

<?php include 'footer.php'; ?>
<script type="text/javascript">
    $(function(){
        $("#tpu").addClass('menu-top-active');
    });
</script>
<script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
</script>

<!-- alert auto close -->
<script type="text/javascript">

$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(100, 0).slideUp(200, function(){
        $(this).remove(); 
    });
}, 5000);
 
});
</script>
