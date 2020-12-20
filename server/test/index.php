<!DOCTYPE html>
<html>
<body>

Select a file to upload:
<input type="file" name="filename" id="myFile">
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> <!-- load jquery via CDN -->

<p>Click the button to display the value of the name attribute of the input element.</p>

<button onclick="myFunction()">Try it</button>

<p id="demo"></p>

<script>
function myFunction() {
  var x = $('#myFile').val().split("\\").pop();
  document.getElementById("demo").innerHTML = "../../resource/img_profile/"+ x;
}
function getFileData(myFile){
   var file = myFile.files[0];  
   var filename = file.name;
   document.getElementById("demo").innerHTML = filename;

}
</script>

</body>
</html>
