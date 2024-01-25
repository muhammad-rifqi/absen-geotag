<?php 
    include"koneksi.php";
?>
    
<!doctype html>
<html lang="en">
<head>
    <title>My Map </title>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body style="background-color: #ccc">

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2 text-center p-5" style="border:1px solid #000; background-color: #fff">
        <?php
            $sql = mysqli_query($kon,"select * from absen"); 
            while($data = mysqli_fetch_array($sql)){
                echo '<iframe src="https://maps.google.com/maps?q='.$data['latitude'].','.$data['longitude'].'&hl=en&z=14&amp;output=embed" width="100%" height="450" allowfullscreen=""></iframe>';
            }
        ?>
        </div>
    </div>
<div>
    
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>

