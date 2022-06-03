<!DOCTYPE html>
<html>

<head>
    <meta name="theme-color" content="#99042E" charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../../assets/css/auth.css" />
    <link rel="stylesheet" href="../../assets/css/w3.css">
    <script src="../../assets/js/jquery.min.js"></script>
</head>

<body class="login" onload="login()">
    <div class="login-form">
        <center>
            <h1 class="w3-text-white">LogIn</h1>
            <form action="Back-End-Message.html" method="post">
                <div class="inputBox">
                    <div class="loginput">
                        <label class="">Student ID: </label><input type="number" id="user_id" name="user_id" placeholder="1234567890"
                            required>
                    </div>
                    <small id="error_user_id"></small>
                    <div class="loginput">
                        <label class="">Password: </label><input type="password" id="password" name="password1" placeholder="password"
                            required>
                    </div>
                    <small id="error_password"></small>
                </div>
                <div class="inputBox">
                    <h4></h4>
                    <input type="button" class="registerbtn" onclick="login()" value="Login">
                </div>
				<a href="./register.php" style="font-size: 20px;">Go to register page</a>

            </form>
        </center>
    </div>
    <?php var_dump($_COOKIE) ; ?>
    <p id="info">©2018 Marco C. All rights reserved.<a target="_blank" href="info.html">info</a></p>
</body>
<script>
    function login() {
        var password = $("#password").val();
        var user_id = $("#user_id").val();
        var data = { password: password, user_id: user_id }

        if (password != "" && user_id !== "") {

            $.post("../../server/auth_server/login_server.php", data, function (res) {
                res=JSON.parse(res);
                if(res.data.nRole==1){
                    localStorage.setItem("tutor_data",JSON.stringify(res.data))
                    location.href="../../page/tutor/";
                }else if(res.data.nRole==0){
                    localStorage.setItem("student_data",JSON.stringify(res.data))
                    location.href="../../page/student/";
                }
            })
        }
    }
</script>

</html>