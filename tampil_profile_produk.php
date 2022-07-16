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
                    <h4 class="page-head-line">Profile Produk</h4>
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
                <div><a href="input_profile_produk.php" class="btn btn-info">Tambah Data</a></div>
                <br>
                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <?php foreach ($db->select('nama_kriteria','kriteria')->get() as $kr ): ?>
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
                            <?php $no=1; foreach($db->select('DISTINCT produk.nama_produk, produk.id_produk', 'profile_produk,produk,kriteria')->where('profile_produk.id_produk=produk.id_produk AND profile_produk.id_kriteria=kriteria.id_kriteria')->get() as $data): ?>
                            <tr>
                                <td><?= $no;?></td>
                                <td><?= $data['nama_produk'] ?></td>
                                <?php foreach ($db->select('profile_produk.nilai_produk','profile_produk')->where("profile_produk.id_produk='$data[id_produk]'")->get() as $nilaiProduk ): ?>
                                <td><?= $nilaiProduk['nilai_produk'] ?></td>
                                <?php endforeach ?>
                                <td>
                                    <a class="btn btn-warning" href="edit_profile_produk.php?id=<?php echo $data[1]?>">Edit</a>
                                    <a class="btn btn-danger" onclick="return confirm('Yakin Hapus?')" href="delete_profile_produk.php?id=<?php echo $data[1]?>">Hapus</a>
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
        $("#tpa").addClass('menu-top-active');
    });
</script>
<script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
</script>