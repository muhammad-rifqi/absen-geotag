<div>
    <video autoplay="true" id="video-webcam">
        Browsermu tidak mendukung bro, upgrade donk!
    </video>
</div>
<p> <button onclick="takeSnapshot()">Ambil Gambar</button> </p>
<script type="text/javascript">
var video = document.querySelector("#video-webcam");
navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;
    if (navigator.getUserMedia) {
        navigator.getUserMedia({ video: true }, handleVideo, videoError);
    }

function handleVideo(stream) {
    video.srcObject = stream;
}

function videoError(e) {
    alert("Izinkan menggunakan webcam")
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
    hr.open("POST", "proses.php", true);
    hr.onreadystatechange = function() {
        if(hr.readyState == 4 && hr.status == 200) {
                console.log(hr.responseText);
                getLocation();
        }
    }
hr.send(imgData); 
}

function getLocation() {
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
    ajax.open("POST", "update.php", true);
    ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajax.onreadystatechange = function() {
	if(ajax.readyState == 4 && ajax.status == 200) {
        console.log(ajax.responseText);
        window.location='hasil.php';
	}
    }
    ajax.send(vars);
}
</script>
