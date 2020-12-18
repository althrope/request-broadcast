<?php
    session_start();
    include("parts/head.php");
    include("parts/side.php");
?>

            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">New Request</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Form</span></li>
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
                                        <h4 class="header-title">Request Form</h4>
                                        <p class="text-muted font-14 mb-4">Silahkan isi form untuk melakukan permohonan broadcast pada Portal Intra RU-III</p>
                                        <form action="req_proses.php" method="POST" enctype="multipart/form-data">
                                        
                                        <div class="form-group">
                                            <label for="judul" class="col-form-label">Judul </label>
                                            <input class="form-control" type="text" name="judul" id="judul">
                                        </div>

                                        <div class="form-group">
                                            <label for="desc" class="col-form-label mt-3">Deskripsi </label>
                                            <div class="input-group">
                                                <textarea class="form-control" aria-label="textarea" name="deskripsi"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="attach" class="col-form-label mt-3" name="">Lampiran</label>                                        
                                                <input class="form-control" type="file" name="fileupload[]" id="file" multiple>
                                        </div>
                            
                                        <div class="form-group">
                                            <label for="date" class="col-form-label mt-3">Batas Masa Berlaku </label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                        <label for="date1" class="col-form-label">Tanggal Awal</label>
                                                            <input class="form-control" type="date"  name="awal">
                                                </div>
                                                <div class="col-sm-6">
                                                        <label for="date2" class="col-form-label">Tanggal Akhir</label>
                                                            <input class="form-control" type="date" name="akhir">
                                                </div>
                                            </div>
                                        </div>

                                        <input class="btn btn-primary mt-4 col-2" type="submit" name="upload" value="Upload">
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