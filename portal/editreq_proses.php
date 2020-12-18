<?php
    include ("config2.php");
    session_start();
	if (isset($_POST["edit"])) {
        $deskripsiTemp = $_POST['deskripsiTemp'];
        $fileTemp = $_POST['fileTemp'];
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $tglawal = $_POST['awal'];
        $tglakhir = $_POST['akhir'];

        if(strcmp($_SESSION['role'],'admin') == 0){
            $status = $_POST['status'];
        }

        $jumlah = 0;
        foreach($_FILES['fileupload']['name'] as $f){
            if($f != null){
                $jumlah++;
            }
        }
        // echo "$jumlah";
        // print_r($_FILES['fileupload']['name']);
        // echo "$jumlah"; echo "<br>";

        if($jumlah != 0){
            if($jumlah > 0){
                for ($i=0; $i < $jumlah; $i++) { 
                    $file_name = $_FILES['fileupload']['name'][$i];
                    $tmp_name = $_FILES['fileupload']['tmp_name'][$i];
                    $size = 104857600;
    
                    $total_size = 0;
                    // print_r($_FILES['fileupload']['size']);
                    foreach($_FILES['fileupload']['size'] as $s){
                        $total_size += $s;
                    } 
    
                    if($total_size !=0){
                        if($total_size <= $size){			
                            move_uploaded_file($tmp_name, "uploaded/".$file_name);
                            if(strcmp($_SESSION['role'],'admin') == 0){
                                $sql = "UPDATE `uploads` SET `judul`= '$judul',`deskripsi`='$deskripsi',`tglawal`='$tglawal',`tglakhir`='$tglakhir', `fileup`='$file_name', `status`='$status' WHERE deskripsi = '$deskripsiTemp'";
                            } else{
                                $sql = "UPDATE `uploads` SET `judul`= '$judul',`deskripsi`='$deskripsi',`tglawal`='$tglawal',`tglakhir`='$tglakhir', `fileup`='$file_name', `status`='Pending' WHERE deskripsi = '$deskripsiTemp'";
                            }
                                // echo "$sql"; echo"<br>";
                            $query = mysqli_query($db,$sql);
                            // echo "$query";
                            header("Location: reqlist.php");
                        }else{
                            echo "<script>alert('File melebihi batas'); window.location = ".json_encode('form_req.php').";</script>";
                        }
                    }		
                }
            }
        } else{
            if(strcmp($_SESSION['role'],'admin') == 0){
                $sql = "UPDATE `uploads` SET `judul`= '$judul',`deskripsi`='$deskripsi',`tglawal`='$tglawal',`tglakhir`='$tglakhir', `fileup`='$fileTemp', `status`='$status' WHERE deskripsi = '$deskripsiTemp'";
            } else{
                $sql = "UPDATE `uploads` SET `judul`= '$judul',`deskripsi`='$deskripsi',`tglawal`='$tglawal',`tglakhir`='$tglakhir', `fileup`='$fileTemp', `status`='Pending' WHERE deskripsi = '$deskripsiTemp'";
            }
                $query = mysqli_query($db,$sql);
                header("Location: reqlist.php"); 
        }	
    } else {
        die("Akses dilarang");
    }
?>