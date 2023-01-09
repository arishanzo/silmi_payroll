<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="../css/style.css">

</head>

<style>

</style>

<body style="background-image: url(../img/bg-01.png);   background-repeat: no-repeat;
    background-size: cover;">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="background-image: url(../img/bg-1.png);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <?php
                            require_once "../config/config.php";
                            if (isset($_POST['login'])) {
                                $user = trim(mysqli_real_escape_string($con, $_POST['username']));
                                $pass = md5(mysqli_real_escape_string($con, $_POST['password']));
                                $sql_login = mysqli_query($con, "SELECT * FROM user WHERE username ='$user' AND password = '$pass'") or die(mysqli_error($con));
                                if ($row = mysqli_fetch_array($sql_login)) {
                                    $_SESSION['id_user'] = $row['id_user'];
                                    $_SESSION['nama'] = $row['nama_user'];
                                    $_SESSION['username'] = $user;
                                    $_SESSION['jabatan'] = $row['jabatan_user'];

                                    echo "<script>window.location='" . base_url('/dashboard/index.php') . "';</script>";
                                } else { ?>
                                    <div class="mt-3">
                                        <div class="alert alert-danger alert-dismissable" role="alert">
                                            <center>
                                                <strong>Login Gagal</strong> <br>
                                                Username Dan Password salah, Silahkan Masukan Lagi
                                            </center>
                                        </div>
                                    </div>

                            <?php
                                }
                            }

                            ?>
                            <div class="d-flex">

                                <div class="w-100">
                                    <h5 class="mb-4 text-center">Payroll ( Aplikasi Gaji Karyawan )</h4>
                                </div>
                            </div>
                            <form method="POST" action="#" class="needs-validation signin-form" novalidate="">

                                <div class="form-group mt-3">
                                    <input type="text" name="username" class="form-control" required>
                                    <label class="form-control-placeholder" name for="username">Username</label>
                                </div>
                                <div class="form-group mt-6">
                                    <input id="password-field" name="password" type="password" class="form-control" required>
                                    <label class="form-control-placeholder" for="password">Password</label>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>

                                <div class="form-group">
                                    <button type="submit" name="login" class="form-control btn btn-primary rounded px-3">Masuk</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Ingatkan Saya
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <?php
                                    $date = date('Y');
                                    ?>
                                    <div class="w-50 text-md-right">
                                        Copyright &copy; <a href="#"><?= $date ?></a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
    </section>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>

</body>

</html>