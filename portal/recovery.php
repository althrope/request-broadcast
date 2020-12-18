<?php
    session_start();
    include("config.php");
    include("parts/head.php");
    include("parts/side.php");

    if(isset($_POST['ubah'])){
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $password = md5($_POST["password"]);
        $password1 = md5($_POST["password1"]);

        $sql = "SELECT '$password' FROM user WHERE id=:id";
        $stmt = $db->prepare($sql);

        // print_r($user);
        if($user){
            if($password == $password1){
                $sql = "UPDATE `user` SET `password` = '$password' WHERE `user`.`id` = '$id'";
                $stmt = $db->prepare($sql);

                $params = array(
                    ":id"=>$id
                );
                $stmt->execute($params);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>
                <script>
                        alert("Password Recovery Berhasil");
                        window.location.href = "usrlist.php";
                </script>
            <?php
            }
            else{
            ?>
                <script>
                        alert("Password Recovery Gagal. Password tidak cocok, silahkan ulangi.");
                        window.location.href = "recovery.php";
                </script>
            <?php
            }
        }
        }
    
?>


<!-- page title area start -->
<div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Password Recovery</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Password Recovery</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/user.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?= $_SESSION['email'] ?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="logout.php">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->

            <div class="main-content-inner">
                <div class="row">
                    <div class="col-lg-12 col-ml-12">
                        <div class="row">
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Password Recovery</h4>
                                        <p class="text-muted font-14 mb-4">Pemulihan Password</p>
                                        <form action="" method="POST">
                                        
                                        <div class="form-group">
                                            <label for="judul" class="col-form-label">ID User </label>
                                            <input class="form-control" type="text" name="id" id="id">
                                        </div>

                                        <div class="form-group">
                                            <label for="judul" class="col-form-label">Password Baru</label>
                                            <input class="form-control" type="password" name="password" id="password">
                                        </div>

                                        <div class="form-group">
                                            <label for="judul" class="col-form-label">Konfirmasi Password</label>
                                            <input class="form-control" type="password" name="password1" id="password1">
                                        </div>

                                        <input class="btn btn-primary mt-4 col-2" type="submit" name="ubah" value="Ubah Password">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php
    include("parts/footer.php");
?>