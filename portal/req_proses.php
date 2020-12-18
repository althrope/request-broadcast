<?php
    include ("config2.php");
    session_start();
	if (isset($_POST["upload"])) {
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $tglawal = $_POST['awal'];
        $tglakhir = $_POST['akhir'];
        $jumlah = count($_FILES['fileupload']['name']);

        if ($jumlah > 0) {
			for ($i=0; $i < $jumlah; $i++) { 
				$file_name = $_FILES['fileupload']['name'][$i];
                $tmp_name = $_FILES['fileupload']['tmp_name'][$i];
                $size = 104857600;
                // echo $_SESSION["id"];
                $id = $_SESSION["id"];
                $bagian = $_SESSION["bagian"];

                $total_size = 0;
                foreach($_FILES['fileupload']['size'] as $s){
                    $total_size += $s;
                }
                // echo $total_size;
                if($total_size <= $size){			
                    move_uploaded_file($tmp_name, "uploaded/".$file_name);
                    mysqli_query($db,"INSERT INTO uploads VALUES(null,'$judul','$deskripsi','$tglawal','$tglakhir','$file_name','$id', '$bagian', 'Pending')");	
                    header("Location: reqlist.php");
                }else{
                    echo "<script>alert('File melebihi batas'); window.location = ".json_encode('form_req.php').";</script>";
                }		
			}
        }

		
    } else {
        die("Akses dilarang");
    }
?>