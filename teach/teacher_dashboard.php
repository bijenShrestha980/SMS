<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Dashboard</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<?php
	session_start();
	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, "sms");
	?>
</head>

<body>
	<div class="row" id="header" style="background: #FF8800">
		<div class="col-md-5">
			<h2 class="admin-dashboard-header">Student Management System</h2>
		</div>
		<div class="col-md-3">
			Email: <?php echo $_SESSION['email']; ?>
		</div>
		<div class="col-md-2">
			Name:<?php echo $_SESSION['name']; ?>
		</div>
		<div class="col-md-2">
			<a href="logout.php">Logout</a>
		</div>
	</div>

	<marquee>Note:- This portal is open till 31 March 2020...Plz edit your information, if wrong.</marquee>
	<div class="row">
		<div class="col-md-3" id="sidebar">
			<form action="" method="post">
				<!-- <h1><input type="submit" name="notice_student" value="Dashboard" class="text-center py-5" style="color: #25d366; background:none; border:none;"></h1> -->
				<h1 class="text-center py-5" style="color: #25d366;"> Dashboard</h1>
				<input type="submit" class="input-btn sidebar-items" name="edit_detail" value="Edit Detail"><br>
				<input type="submit" class="input-btn sidebar-items" name="show_detail" value="Show Detail"><br>
			</form>
		</div>

		<div class="col-md-9">
			<div id="right_side">
				<div id="demo">

				</div>
			</div>

		</div>
	</div>
</body>

</html>