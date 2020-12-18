<?php
    session_start();
    include("config2.php");
    include("parts/head.php");
    include("parts/side.php");
?>

            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">User List</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>User List</span></li>
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

            
            <div class="card mt-5">
                    <div class="card-body">
                        <h4 class="header-title">User List</h4>
                        <a class='btn btn-primary mb-4' href="register.php">Add New User +</a>
                        <div class="data-tables datatable-primary text-nowrap">
                            <table id="dataTable3" class="table table-bordered">
                                <thead class="text-capitalize text-center">
                                    <tr class="heading-td text-center">
                                        <td> Id User </td>
                                        <td>Nama User</td>
                                        <td>Email Address</td>
                                        <td>Fungsi</td>
                                        <td>Bagian</td>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $sql = "SELECT * from user";
                                        $query = mysqli_query($db,$sql);
                                    
                                    while($a = mysqli_fetch_array($query)){
                                    ?>                                    
                                        <tr>
                                        <td><?= $a['id']?></td>
                                        <td><?= $a['nama']?></td>
                                        <td><?= $a['email']?></td>
                                        <td><?=$a['fungsi']?></td>
                                        <td><?= $a['bagian']?></td>
                                    <?php
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!-- main content area end -->

<?php
    include("parts/footer.php");
?>
