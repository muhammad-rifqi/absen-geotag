<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absen Geo Tagging</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="background-color: #ccc">

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2 text-center p-5" style="border:1px solid #000; background-color: #fff">
        <video autoplay="true" id="video-webcam" style="width:100%; border:1px solid #000;">
            Browsermu tidak mendukung!!
        </video>
        <span id="pesan"></span>
        <hr />
            <p class="text-center"> 
                <button onclick="takeSnapshot()" class="btn btn-primary">Ambil Gambar</button> 
            </p>
        </hr>
            <p>
                <button onclick="absenMasuk()" class="btn btn-primary">Absen Masuk</button> 
                <button onclick="absenKeluar()" class="btn btn-primary">Absen Keluar</button> 
            </p>
            <p>
                <button onclick="stopCam()" class="btn btn-primary">Matikan Camera & Microphone </button> 
                <button onclick="startCam()" class="btn btn-primary">Nyalakan Camera & Microphone </button> 
            </p>
            <p>
                <button onclick="frontCam()" class="btn btn-primary">Camera Depan </button> 
                <button onclick="backCam()" class="btn btn-primary">Camera Belakang </button> 
            </p>
        </div>
    </div>
<div>

</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>


<script type="text/javascript">
var video = document.querySelector("#video-webcam");

navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

function frontCam(){
    stopCam();
    if (navigator.getUserMedia) {
        navigator.getUserMedia({ video: { facingMode: {exact : "user"} }}, handleVideo, videoError);
    }
}

function startCam(){
    if (navigator.getUserMedia) {
        navigator.getUserMedia({ video: { facingMode: "environment" }}, handleVideo, videoError);
    }
}

function stopCam(stream){
    video.srcObject.getTracks().forEach(track => track.stop())
}

function handleVideo(stream) {
    video.srcObject = stream;
}

function videoError(e) {
    alert(e)
}


function takeSnapshot() {
    var img = document.createElement('img');
    var context;
    var width = video.offsetWidth
            , height = video.offsetHeight;
    canvas = document.createElement('canvas');
    canvas.width = width;
    canvas.height = height;
    context = canvas.getContext('2d');
    context.drawImage(video, 0, 0, width, height);
    img.src = canvas.toDataURL('image/jpeg');
    var hr = new XMLHttpRequest();
    var imgData = img.src;
    hr.open("POST", "kamera.php", true);
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
            console.log(hr?.responseText??"");
                if(hr?.responseText??"" == 'Oke'){
                    document.getElementById('video-webcam').style='display:none';
                    document.getElementById("pesan").innerHTML="Berhasil Ambil Gambar";
                }else{
                    alert("Gagal Ambil Photo");
                    return false;
                }
        }
    }
hr.send(imgData); 
}

function absenMasuk(){
    
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
       console.log("Geolocation is not supported by this browser.");
    }
}

function showPosition(position) {

    var latitude = position.coords.latitude ;
    var longitude =  position.coords.longitude;
    var vars = "lat="+latitude+"&long="+longitude;
    var ajax = new XMLHttpRequest();
    ajax.open("POST", "masuk.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function() {
	if(ajax.readyState == 4 && ajax.status == 200) {
            console.log(ajax.responseText);
             window.location='data.php';
            //window.location.reload();
        }
    }
    ajax.send(vars);
}


function absenKeluar(){
    window.location='data.php';
}
</script>
