<?php
session_start();
include"koneksi.php";
$id = session_id();
$sql = mysqli_query($kon,"update absen set latitude='".$_POST['lat']."',longitude='".$_POST['long']."' where token = '".$id."'");
if($sql){
    // session_regenerate_id();
    echo"Oke";
}else{
    echo"Gagal Insert";
}
?>
