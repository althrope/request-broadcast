<?php require_once("parts/auth.php"); ?>

<?php
    include("config2.php");
    include("parts/head.php");
    include("parts/side.php");
?>

            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Dashboard</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/user.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?= $_SESSION['email'] ?><i class="fa fa-angle-down"></i></h4>
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
                                    
                                        <h2 class="header-title mb-5" align="center">Request Broadcast Portal Intra RU-3</h2>
                                        
                                        <p>Site ini merupakan web yang user-friendly untuk membuat pengajuan permohonan broadcast pengumuman
                                            pada portal Intra RU-III serta sebagai arsip baik bagi pihak administrator untuk mengetahui daftar permohonan
                                            yang sudah dikerjakan maupun yang belum dikerjakan.
                                        </p>
                                        <br><br>
                                        <p>
                                            Web ini dapat menerima permintaan broadcast melalui portal Intra RU-III tanpa melalui surat elektronik (email).<br>
                                            Web ini hanya dapat dipakai oleh intra RU-III.
                                        </p>
                                        <br> <br>
                                        <h6 align="center">Panduan Umum</h6><br>
                                        <p>- Pada website ini terdapat dashboard sebagai halaman utama.</p>
                                        <p>- Terdapat menu requests list untuk melihat request yang telah dikirimkan oleh user.</p>
                                        <p>- Untuk menambahkan request baru dapat menekan tombol add request pada bagian atas tabel requests list pada halaman requests list.</p>
                                        <p>- Size maximum untuk file yang dapat diupload adalah sebesar 100 mb.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- main content area end -->

<?php
    include("parts/footer.php");
?>
