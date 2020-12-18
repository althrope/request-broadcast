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
                            <h4 class="page-title pull-left">Requests List</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Requests List</span></li>
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

                <div class="card col-12 mt-5">
                    <div class="card-body">
                        <h4 class="header-title">Requests List</h4>
                        <br>
                        <a class='btn btn-primary mb-4' href="form_req.php">Add Request +</a>
                        <div class="data-tables datatable-dark text-nowrap">
                            <table id="dataTable3" class="table table-bordered">
                                <thead class="text-capitalize text-center">
                                    <tr>
                                        <td> Id User </td>
                                        <td>Judul Request</td>
                                        <td>Deskripsi</td>
                                        <td>Attachment</td>
                                        <td>Bagian</td>
                                        <td>Masa Berlaku Permintaan</td>
                                        <td>Status</td>
                                        <td>Aksi</td>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php
                                    if(strcmp($_SESSION['role'],'admin') == 0){
                                        // echo $_SESSION['role'];
                                        $sql = "SELECT * FROM uploads";
                                    }else{
                                        // echo "user"; 
                                        $id = $_SESSION['id'];
                                        $sql = "SELECT * FROM uploads where iduser='$id'";
                                    }
                                    
                                    $query = mysqli_query($db, $sql);

                                    $i = 0;
                                    $judul = [];
                                    $deskripsi = [];
                                    $array_up = [];
                                    $file_up = [];

                                    while($upload = mysqli_fetch_array($query)){                                        // $sql2 = "SELECT fileup FROM uploads where iduser='$id'";
                                        // $query2 = mysqli_query($db, $sql2);

                                        if(in_array($upload['judul'], $judul) && in_array($upload['deskripsi'], $deskripsi)){
                                            $temp = $file_up[$upload['deskripsi']];
                                            array_push($temp, $upload['fileup']);
                                            $file_up[$upload['deskripsi']] = $temp;
                                        }else{
                                            $judul[$i] = $upload['judul'];
                                            $deskripsi[$i] = $upload['deskripsi'];
                                            $array_up[$i] = $upload;
                                            $file_up[$upload['deskripsi']] = [$upload['fileup']];
                                            $i++;
                                        }
                                    }

                                    foreach($array_up as $a){
                                    ?>
                                        <tr>
                                        <td><?= $a['iduser']?></td>
                                        <td><?= $a['judul']?></td>
                                        <td><?= $a['deskripsi']?></td>
                                        <td><?php
                                                $n = count($file_up[$a['deskripsi']]);
                                                $j = 1;
                                                foreach($file_up[$a['deskripsi']] as $li){
                                            ?>
                                                <a href="uploaded/<?=$li;?>" target="_blank"><?=$li?></a>
                                            <?php
                                                    if($j != $n){
                                                        echo ", ";
                                                        $j++;
                                                    }
                                                }
                                            ?>
                                        </td>
                                        <td><?=$a['bagian']?></td>
                                        <td><?= $a['tglawal']?> s.d. <?=$a['tglakhir']?></td>
                                        <?php
                                            echo "<td>";
                                            if(strcmp($a['status'],'Complete') == 0){
                                            echo "<span class='mt-2 status-p bg-success'>".$a['status']."</span>";
                                            } else{
                                            echo "<span class='mt-2 status-p bg-warning'>".$a['status']."</span>";
                                            }
                                            echo "</td>";
                                        ?>
                                        <td>
                                            <ul class="d-flex justify-content-center mt-2">
                                        <?php
                                            echo "<li class='mr-3'><a href='req_edit.php?deskripsi=".$a['deskripsi']."' class='text-primary'><i class='fa fa-edit'></i></a></li>";

                                        if(strcmp($_SESSION['role'],'admin') == 0){
                                            echo "<li> <a href='delete.php?iduser=".$a['iduser']."&judul=".$a['judul']."&tglawal=".$a['tglawal']."&tglakhir=".$a['tglakhir']."' class='text-danger'><i class='ti-trash'></i></a></li>
                                            </ul>
                                            </td>";
                                        }
                                        
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
