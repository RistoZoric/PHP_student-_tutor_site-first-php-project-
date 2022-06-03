</html>
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()">Close &times;</button>
  <a href="#" class="w3-bar-item w3-button">Group</a>
  <a href="#" class="w3-bar-item w3-button">Members profile</a>
  <a href="#" class="w3-bar-item w3-button">Link 3</a>
</div>

<div id="main">

<div class="w3-teal" style="display: flex;">
  <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
    <h2>Tutor page</h2>
  </div>
  <div class="w3-dropdown-hover w3-container w3-mobile">
    <button class="w3-button">Dropdown <i class="fa fa-caret-down"></i></button>
    <div class="w3-dropdown-content w3-bar-block w3-dark-grey">
      <a href="#" class="w3-bar-item w3-button w3-mobile">Link 1</a>
      <a href="#" class="w3-bar-item w3-button w3-mobile">Link 2</a>
      <a href="#" class="w3-bar-item w3-button w3-mobile">Link 3</a>
    </div>
  </div>
</div>

</div>

<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>
<script>
    start();

    function start() {
        var tutor_data = localStorage.getItem("tutor_data");
        if (tutor_data) {

        } else {
            location.href = "../page_notfound/"
        }
    }
</script>
</body>
</html>