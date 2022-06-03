</html>
<!DOCTYPE html>
<html>
<title>Members</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../../assets/css/w3.css">
<script src="../../assets/js/jquery.min.js"></script>

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
                <h2>Assess</h2>
            </div>
        </div>
        <div id="content">
            <link rel="stylesheet" href="../../assets/css/w3.css">
            <div class="w3-container">
                <h2>Members</h2>

                <table class="w3-table-all">
                    <tr>
                        <th>Member name</th>
                        <th>Status</th>
                        <th>Assess</th>
                    </tr>
                    <tbody id="tbody"></tbody>
                </table>
            </div>
        </div>
    </div>
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4">
            <header class="w3-container w3-teal">
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
                <h3>Rating for <span id="name" style="color:red"></span></h3>
            </header>
            <div class="w3-container">
                <div style="margin-top: 30px;">
                    <label>Mark</label>
                    <input type="number" class="w3-input" id="mark" placeholder="Marks" max=10 min=0>
                </div>
                <div style="margin-top: 30px;">
                    <label>Description</label>
                    <textarea id="w3review" class="w3-input" name="w3review">
                    </textarea>
                </div>
                <div class="w3-center">
                    <button class="w3-btn w3-blue" id="accessbtn" style="margin: 30px;">ASSESS</button>
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

        start();

        function mypage() {
            location.href = "./mypage.php"
            w3_close()
        }

        function start() {
            var student_data = localStorage.getItem("student_data");
            if (student_data) {

            } else {
                location.href = "../page_notfound/"
            }
            student_data = JSON.parse(student_data)
            $.get('../../server/common/get_assess.php?id=' + student_data.id + "&group_id=" + student_data.nGroup_id, function(res) {
                res = JSON.parse(res);
                var content = ""
                if (res.success == 'true') {
                    res.data.map((value, index) => {
                        if (value.nMarks != null) {
                            content += "<tr>" + "<td>" + value.strName + "</td>" + "<td>deactive</td>" + "<td></td>" + "</tr>"
                        } else {
                            content += "<tr>" + "<td>" + value.strName + "</td>" + "<td>avtive</td>" + "<td><button class='w3-btn w3-red' onclick='edit(" + JSON.stringify(value) + ")'>access</button></td>" + "</tr>"
                        }
                    })
                    $("#tbody").html(content)
                }
            })
        }
        var result;

        function edit(value) {
            result = {
                id: value.id,
            }
            document.getElementById('id01').style.display = 'block';
        }
        $("#accessbtn").click(function() {
            $("#name").text(value.strName)
            result = {
                name: $("#name").val(),
                desc: $("#w3review").val()
            }
            if ($("#name").val() == "" || $("#w3review").val() == "" || $("#name").val()>10 ||$("#name").val()<0) {} else {
                $.post("../../server/student_server/rate_server", result, function(data) {
                    console.log(data);
                })
            }
        })
    </script>
</body>

</html>