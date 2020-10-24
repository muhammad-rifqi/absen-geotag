
<?php
session_start();
include"koneksi.php";
$name = date("YmdHis");
$id = session_id();
$get = file_get_contents("php://input");
$data =  explode(',',$get);
$decode = base64_decode($data[1],true);
$im = imageCreateFromString($decode);
if($im){
header('Content-Type: image/jpeg');
imagejpeg($im,"foto/".$name.".jpg");
imagedestroy($im);
$tgl = date("Y-m-d H:i:s");
$url_foto = $base_url.'foto/'.$name.'.jpg';
$sql = mysqli_query($kon,"insert into absen(foto, latitude, longitude, userlogin, tanggal, token)values('".$url_foto."','null','null','1','".$tgl."','".$id."')");
        if($sql){
            echo"Oke";
        }else{
            echo"Gagal Insert";
        }
}else{
echo"Gagal";
}
?>
