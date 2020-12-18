<?php
    include("config2.php");

    if(isset($_GET['iduser'])){
        $iduser = $_GET['iduser'];
        $judul = $_GET['judul'];
        $tglawal = $_GET['tglawal'];
        $tglakhir = $_GET['tglakhir'];
        

        $sql = "DELETE from uploads where iduser='$iduser' and judul='$judul' and tglawal='$tglawal' and tglakhir='$tglakhir'";
        $query = mysqli_query($db,$sql);

        if($query){
            header('Location: reqlist.php');
        } else{
            die("Gagal menghapus");
        }
    } else{
        die("x");
    }
?>