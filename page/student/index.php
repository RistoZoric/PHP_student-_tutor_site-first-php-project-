</html>
<!DOCTYPE html>
<html>
<title>student page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../assets/css/w3.css">

<body>

  <div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button>
    <a href="./index.php" class="w3-bar-item w3-button">Dashboard</a>
    <a href="./mypage.php" class="w3-bar-item w3-button">My page</a>
    <a href="./members.php" class="w3-bar-item w3-button">Members profile</a>
    <a href="./assess.php" class="w3-bar-item w3-button">Assess profile</a>
  </div>

  <div id="main">

    <div class="w3-teal" style="display: flex; ">
      <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
      <div class="w3-dropdown-hover w3-container w3-mobile">
        <h2>Student page</h2>
      </div>
    </div>
    <div id="content">
    <div class="w3-container">
                <h2>Dashboard</h2>
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

    start();

    function start() {
      var student_data = localStorage.getItem("student_data");
      if (student_data) {

      } else {
        location.href = "../page_notfound/"
      }

    }
  </script>
</body>

</html>