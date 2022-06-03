<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="../../assets/css/auth.css">
	<link rel="icon" type="image/png" href="../../assets/img/icon.ico" sizes="16x16" />
	<script src="../../assets/js/jquery.min.js"></script>
	<title>REGiSTRATiON</title>
</head>

<body class="register" onload="register()">
	<div class="register-form">
		<div class="form-box">
			<h2>Register Now</h2>
			<form action="Back-End-Message.html" method="post">
				<div class="inputBox">
					<div class="input-rows">
						<label>Student ID: </label>
						<input onkeyup="onchangeId(this)" type="number" name="user_id" placeholder="1234567890" required>
					</div>
					<samll id="register"></samll>
					<div class="input-rows">
						<label>Name: </label>
						<input type="text" name="name" placeholder="Name" id="input_name" required>
					</div>
					<samll id="name"></samll>
					<div class="input-rows">
						<label>Email: </label>
						<input type="email" name="email" placeholder="Email" required>
					</div>
					<div class="input-rows">
						<label>Password: </label><input type="password" name="password1" placeholder="Please Insert!" required onkeyup="pswdVerify(name, value)">
					</div>
					<small id="password" class="w3-yellow"></small>
					<div class="input-rows">
						<label>Confirm Password: </label><input type="password" name="password2" placeholder="Please Confirm!" required onkeyup="pswdConform(name, value)">
					</div>
					<small id="password1" class="w3-yellow"></small>
					<div class="input-rows">
						<label>Select Team:
						</label>
						<select name="team" id="selecTeam">
						</select>
					</div>
				</div>
				<div class="inputBox">
					<h4></h4>
					<input type="submit" class="registerbtn" value="Sign Up">
				</div>
				<a href="./login.php" style="font-size: 20px;">Go to login page</a>
			</form>
		</div>
	</div>

</body>
<script>
	var user_id;
	var email = "";
	var name = "";
	var pswd1 = "";
	var pswd2 = "";
	var team = "";
	getGroupdata()

	function onchangeId(event) {
		// var id=event.val;
		console.log(event.value);
		$.get("../../server/auth_server/validation/id_validation.php?id=" + event.value, function(data) {
			data = JSON.parse(data);
			$("#register").html("<p>" + data.message + "</p>").css({
				color: data.success == "true" ? "white" : "yellow"
			})
		})
	}

	function register() {
		console.log("this is register");
		// $("input:submit").hide();
	}

	function pswdVerify(name, e) {
		if (name == "password1") {
			pswd1 = e;
		}
		if (pswd1.length <= 8) {
			$("#password").text("Password must be 9 more than characters!").css("color", 'yellow');
		} else {
			$("#password").text("")
		}
	}

	function pswdConform(name, value) {
		if (pswd1 != value) {
			$("#password1").text('no match password!').css("color", 'yellow');
		} else {
			$("#password1").text('')
		}
	}
	$("input:password").keyup(function() {
		pswdVerify();
	})
	$("#selecTeam").click(function() {
		team = this.value;
	})
	$("input:submit").click(function(e) {
		user_id = $("[name='user_id']").val();
		email = $("[name='email']").val();

		e.preventDefault();
		if (user_id > 0 && email.length > 0 && pswd1.length > 8 && team.length > 0) {
			console.log("this is register data");
			var result = {
				id: user_id,
				email: email,
				name: $("#input_name").val(),
				password: pswd1,
				group_id: $("#selecTeam").val()
			}
			$.post("../../server/auth_server/register_server.php", result, function(data) {
				console.log(data);
				data = JSON.parse(data)
				if (data.success == "true") {
					location = "login.php";
				}
			})
		} else {
			console.log("there is empty field");
		}
	})

	function getGroupdata() {
		$.get('../../server/common/get_groupdata.php', function(data) {
			data = JSON.parse(data)
			if (data.success == 'true') {
				var content = ""
				data.data.map((value, index) => {
					content += "<option value=" + value.id + ">" + value.strComment + "</option>"
				})
				$("#selecTeam").html(content)
			}
		})
	}
</script>

</html>