<?php include '../includes/header.php';?>

<body>
	<div class="container">
        <a href="../index.php" class="home-btn" style="color: #25d366"><i class="fas fa-home"></i></a>
		<center style="margin-top: 8rem;">
			<h1 class="admin-header">Admin Login Page</h1>
			<div class="form-group-admin">
				<form action="" method="post">
					<div class="form-email-admin">
						Email :<input type="text" name="email" required id="form_email_admin"><br><br>
					</div>
					<div class="form-pass-admin">
						Password: <input type="password" name="password" required id="form_pass_admin"><br><br>
					</div>
					<input type="submit" name="submit" id="form_submit_admin">
				</form>
			</div>
	</div>
	<?php 
	session_start();

	if (isset($_POST['submit'])) {
		$connection = mysqli_connect("localhost", "root", "");
		$db = mysqli_select_db($connection, "sms");
		$query = "select * from login where email = '$_POST[email]'";
		$query_run = mysqli_query($connection, $query);
		while ($row = mysqli_fetch_assoc($query_run)) {
			if ($row['email'] == $_POST['email']) {
				if ($row['password'] == $_POST['password']) {
					$_SESSION['name'] =  $row['name'];
					$_SESSION['email'] =  $row['email'];
					header("Location: admin_dashboard.php");
				} else {
	?>
					<span class="error-msg">Wrong Password !!</span>
				<?php
				}
			} else {
				?>
				<span class="error-msg">Wrong UserName !!</span>
	<?php
			}
		}
	}
	?>

	</center>
</body>

</html>