<?php
    require_once("config.php");

    if(isset($_POST['register'])){
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = md5($_POST["password"]);
        $fungsi = filter_input(INPUT_POST, 'fungsi', FILTER_SANITIZE_STRING);
        $bagian = filter_input(INPUT_POST, 'bagian', FILTER_SANITIZE_STRING);

        $sql = "INSERT INTO user (id, nama, email, password, fungsi, bagian, role)
                VALUES (:id, :nama, :email, :password, :fungsi, :bagian, 'user')";
                
        $stmt = $db->prepare($sql);

        $params = array(
            
            ":id" => "".$id,
            ":nama" => "".$nama,
            ":email" => $email,
            ":password" => $password,
            ":fungsi" => "".$fungsi,
            ":bagian" => "".$bagian
        );
        $saved = $stmt->execute($params);

        if($saved){
            header("Location: usrlist.php");
        } else{
            echo "<script>
                    alert('User telah terdaftar.');
                    window.location.href = 'usrlist.php';
                </script>";
        }
    }
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register - Request Broadcast Portal Intra RU-III</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- register area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="" method="POST">
                    <div class="login-form-head">
                        <div class="logo">
                            <img src="assets/images/icon/pertamina.png" alt="logo">
                        </div>
                    </div>
                    <div class="login-form-body">
                        <h4 align="center">New User Register</h4>

                        <div class="form-gp mt-5">
                            <label for="id">ID</label>
                            <input type="id" name="id" id="id">
                            <i class="ti-id-badge"></i>
                            <div class="text-danger"></div>
                        </div>

                        <div class="form-gp">
                            <label for="nama">Nama User</label>
                            <input type="nama" name="nama" id="nama">
                            <i class="ti-user"></i>
                            <div class="text-danger"></div>
                        </div>
                        
                        <div class="form-gp">
                            <label for="email">Email Address</label>
                            <input type="email" name="email">
                            <i class="ti-email"></i>
                            <div class="text-danger"></div>
                        </div>

                        <div class="form-gp">
                            <label for="password">Password</label>
                            <input type="password" name="password">
                            <i class="ti-lock"></i>
                            <div class="text-danger"></div>
                        </div>
                       
                        <div class="form-group">
                            <label for="col-form-label">Fungsi</label>
                            <select class="form-control form-control-lg" name="fungsi">
                                <option selected="selected">Pilih</option>
                                    <option value="HR">HR</option>
                                    <option value="IT">IT</option>
                                    <option value="Finance">Finance</option>
                                    <option value="HSSE">HSSE</option>
                                    <option value="OPI">OPI</option>
                                    <option value="Produksi">Produksi</option>
                                    <option value="Medical">Medical</option>
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <label class="col-form-label">Bagian</label>
                            <select class="form-control form-control-lg" name="bagian">
                                <option selected="selected">Pilih</option>
                                    <option value="HR">HR</option>
                                    <option value="IT">IT</option>
                                    <option value="Finance">Finance</option>
                                    <option value="HSSE">HSSE</option>
                                    <option value="OPI">OPI</option>
                                    <option value="Produksi">Produksi</option>
                                    <option value="Medical">Medical</option>
                            </select>
                        </div>

                        <!-- <div class="form-group mt-3">
                            <label class="col-form-label">Foto</label>
                            <input class="form-control" type="file" name="photo" id="photo" multiple>
                        </div> -->

                        <div class="submit-btn-area mt-4">
                            <button name="register" type="submit" value="register">Register<i class="ti-arrow-right"></i></button>
                        </div>

                        <a class='btn btn-danger mb-4 col-12 mt-4' href="usrlist.php"><i class="ti-arrow-left"> KEMBALI</i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>