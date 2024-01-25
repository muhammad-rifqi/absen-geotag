<?php 
    include"koneksi.php";
?>
    
<!doctype html>
<html lang="en">
<head>
    <title>Absen Geo Tagging</title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body style="background-color: #ccc">

<div class="container">
    <h3 class="text-center">Data Absensi</h3>
    <hr>
    <div class="row">
        <div class="col-lg-12" style="border:1px solid #000; background-color: #fff">
        <div class="table-responsive">
        <table class="table">
            <caption>List of Pengguna</caption>
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Photo</th>
                <th scope="col">Latitude</th>
                <th scope="col">langitude</th>
                <th scope="col">User Login</th>
                <th scope="col">Tanggal Masuk</th>
                <th scope="col">Token</th>
                <th scope="col">Maps </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = mysqli_query($kon,"select * from absen"); 
                    while($data = mysqli_fetch_array($sql)){
                    ?>
                     <tr>
                        <th scope="row"><?php echo $data['id']; ?></th>
                        <td><img src="<?php echo $data['foto'];?>" width="300"/></td>
                        <td><?php echo $data['latitude'];?></td>
                        <td><?php echo $data['longitude'];?></td>
                        <td><?php echo $data['userlogin'];?></td>
                        <td><?php echo $data['tanggal'];?></td>
                        <td><?php echo $data['token'];?></td>
                        <td><iframe src="https://maps.google.com/maps?q=<?php echo $data['latitude'];?>,<?php echo $data['longitude'];?>&hl=en&z=14&amp;output=embed" width="300" height="250" allowfullscreen=""></iframe></td>
                    </tr>
                    <?php
                    }
                ?>
            </tbody>
            </table>
            </div>
        </div>
    </div>
<div>
    
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>

