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
  var x = document.getElementById("myFile").value;
  document.getElementById("demo").innerHTML = x.split("\\").pop();
}
function getFileData(myFile){
   var file = myFile.files[0];  
   var filename = file.name;
   document.getElementById("demo").innerHTML = filename;

}
</script>

</body>
</html>
