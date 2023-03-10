<?php
require_once "../../config/config.php";



if (isset($_SESSION['username'])) {
    include_once('header.php');
    // 
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data User</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $SqlQuery = mysqli_query($con, "select * from user");
                            $no = 1;
                            if (mysqli_num_rows($SqlQuery) > 0) {
                                while ($row = mysqli_fetch_array($SqlQuery)) {
                            ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['nama_user'] ?></td>
                                        <td><?= $row['username'] ?></td>
                                        <td><?= $row['jabatan_user'] ?></td>
                                        <td>
                                            <center>
                                                <button class="btn btn-primary btn-action btn-xs mr-1" data-toggle="modal" data-target="#exampleModal" data-toggle="tooltip" title="Tambah Data"><span>Ubah Password</span></button>
                                        </td>
                                        </center>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "<tr><td colspan=\"4\" align=\"center\">data tidak ada</td></tr>";
                            }
                            ?>
                        </tbody>

                        <!-- MODAL -->

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST">


                                            <div class="form-group">
                                                <div class="section-title mt-0">Password Baru</div>
                                                <div class="input-group mb-2">
                                                    <input type="password" class="form-control" autocomplete="current-password" required="" name="pw_baru" required>

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="section-title mt-0">Komfirmasi Password</div>
                                                <div class="input-group mb-2">
                                                    <input type="password" class="form-control" name="komfirmasi_pw" required>
                                                </div>
                                            </div>


                                            <div class="modal-footer">
                                                <button class="btn btn-primary mr-1" type="submit" name="submit">Simpan</button>

                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                            </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div>



                <?php
                if (isset($_POST['submit'])) {
                    $pw = $_POST['pw_baru'];
                    $komfirmasi_pw = $_POST['komfirmasi_pw'];
                    $pass_enskripsi = md5($pw);


                    if ($pw == '' && $komfirmasi_pw == '') {
                        echo "<script type='text/javascript'>
                                setTimeout(function () { 
                                    swal({ 
                                        title: 'warning', 
                                        text: 'Kolom Password Kosong Mohon Di Isi Kembali', 
                                        type: 'warning',
                                        icon: 'warning',
                                         timer: 3000,
                                          buttons: false });
                                },10);  
                                window.setTimeout(function(){ 
                                  window.location.replace('index.php');
                                } ,3000); 
                                </script>";
                    } else {
                        if ($pw == $komfirmasi_pw) {
                            $update1 = mysqli_query($con, "UPDATE user set password = '$pass_enskripsi' WHERE id_user = '7'") or die(mysqli_error($con));
                            echo "<script type='text/javascript'>
                    setTimeout(function () { 
                        swal({ 
                            title: 'success', 
                            text: 'Password Berhasil Di Update', 
                            type: 'success',
                            icon: 'success',
                             timer: 3000,
                              buttons: false });
                    },10);  
                    window.setTimeout(function(){ 
                      window.location.replace('index.php');
                    } ,3000); 
                    </script>";
                        } else {
                            echo "<script type='text/javascript'>
                        setTimeout(function () { 
                            swal({ 
                                title: 'warning', 
                                text: 'Password Tidak Sama, Mohon Isi Kembali', 
                                type: 'warning',
                                icon: 'warning',
                                 timer: 3000,
                                  buttons: false });
                        },10);  
                        window.setTimeout(function(){ 
                          window.location.replace('index.php');
                        } ,3000); 
                        </script>";
                        }
                    }
                }
                ?>

                </section>
            </div>

        </div>
    </div>

    </table>


    </div>
    </div>
    </div>

    </div>
    <!-- /.container-fluid -->

    </div>

    <script>
        // swall
        $('.delete-data').on('click', function(e) {
            e.preventDefault();
            var getLink = $(this).attr('href');

            Swal.fire({
                title: 'Apa Anda Yakin?',
                text: "Data akan dihapus permanen",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.value) {
                    window.location.href = getLink;
                }
            })
        });
    </script>
<?php

    include_once('footer.php');
} else {
    echo "<script>window.location='" . base_url('auth/login.php') . "';</script>";
}


// 
?>

</div>

</div>
</div>

</div>
</div>
</div>
</section>