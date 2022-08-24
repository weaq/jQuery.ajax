<!DOCTYPE html>
<html lang="en">

<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		$(document).ready(function() {

			$("#form_login").submit(function(e) {
				//prevent Default functionality
				e.preventDefault();

				var username = $("#username").val().trim();
				var password = $("#password").val().trim();

				if (username == '' || password == '') {
					alert("Please fill all fields.");
					return false;
				}

				var jsonObj = JSON.stringify({
					"username": username,
					"password": password
				})

				$.ajax({
					type: "POST",
					url: "http://localhost:3333/login",
					data: jsonObj,
					contentType: "application/json; charset=utf-8",
					success: function(result) {
						alert(result.status);
					}
				});

			});
		});
	</script>
</head>

<body>
	<div class="container mt-3">
		<form id="form_login">
			<div class="mb-3 mt-3">
				<label for="username">Username:</label>
				<input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
			</div>
			<div class="mb-3">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" autocomplete="true">
			</div>
			<div class="form-check mb-3">
				<label class="form-check-label">
					<input class="form-check-input" type="checkbox" name="remember"> Remember me
				</label>
			</div>
			<button class="btn btn-primary">Submit</button>
		</form>
	</div>
</body>

</html>
