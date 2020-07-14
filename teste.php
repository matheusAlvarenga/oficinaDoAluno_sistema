<!DOCTYPE html>
<html>
<head>
	<title></title>
<script type="text/javascript" src="webcamjs/webcam.js"></script>
</head>
<body>
<!-- CSS -->
<style>
#my_camera{
 width: 500px;
 height: 500px;
 border: 1px solid black;
}
</style>

<!-- -->
 <div id="my_camera"></div>
 <input type="button" value="Configure" onClick="configure()">
 <input type="button" value="Take Snapshot" onClick="take_snapshot()">
 <input type="button" value="Save Snapshot" onClick="saveSnap()">
 <input type="text" id="id_aluno" name="id_aluno">
 
 <div id="results" ></div>
 
 <!-- Script -->
 <script type="text/javascript" src="webcamjs/webcam.min.js"></script>

 <!-- Code to handle taking the snapshot and displaying it locally -->
 <script language="JavaScript">
 
 // Configure a few settings and attach camera
 function configure(){
  Webcam.set({
   width: 500,
   height: 500,
   image_format: 'jpeg',
   jpeg_quality: 90
  });
  Webcam.attach( '#my_camera' );
 }
 // A button for taking snaps

 function take_snapshot() {
  // take snapshot and get image data
  Webcam.snap( function(data_uri) {
  // display results in page
  document.getElementById('results').innerHTML = 
   '<img id="imageprev" src="'+data_uri+'"/>';
  } );

  Webcam.reset();
 }

function saveSnap(){
 // Get base64 value from <img id='imageprev'> source
 var base64image = document.getElementById("imageprev").src;
 var id = document.getElementById('id_aluno').value;
 var url = 'myscript.php?id_aluno=' + id;
 Webcam.upload( base64image, 'upload.php', function() {
  console.log('Save successfully');
  //console.log(text);
 });

}
</script>
</body>
</html>