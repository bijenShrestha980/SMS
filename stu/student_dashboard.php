<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Dashboard</title>
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<?php
	session_start();
	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, "sms");
	?>
</head>

<body>
	<div class="row" id="header">
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
			<a href="../logout.php">Logout</a>
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
					<?php
					if (isset($_POST['show_detail'])) {
						$query = "select * from students where email = '$_SESSION[email]'";
						$query_run = mysqli_query($connection, $query);
						while ($row = mysqli_fetch_assoc($query_run)) {
					?>

							<div class="row">
								<div class="col-md-6">
									<label style="float: left;">Roll no:</label>
									<div style="height:10px;"></div>
									<input type="text" class="form-control" value="<?php echo $row['roll_no'] ?>" disabled>
								</div>
								<div class="col-md-6">
									<label style="float: left;">Class:</label>
									<div style="height:10px;"></div>
									<input type="text" class="form-control" value="<?php echo $row['class']; ?>" disabled>
								</div>
							</div>
							<div style="height:10px;"></div>
							<div class="row">
								<div class="col-md-12">
									<label style="float: left;">Name:</label>
									<div style="height:10px;"></div>
									<input type="text" class="form-control" value="<?php echo $row['name']; ?>" disabled>
								</div>
							</div>
							<div style="height:10px;"></div>
							<div class="row">
								<div class="col-md-12">
									<label style="float: left;">Guardians Name:</label>
									<div style="height:10px;"></div>
									<input type="text" class="form-control" value="<?php echo $row['guardians_name']; ?>" disabled>
								</div>
							</div>
							<div style="height:10px;"></div>
							<div class="row">
								<div class="col-md-12">
									<label style="float: left;">Mobile:</label>
									<div style="height:10px;"></div>
									<input type="text" name="mobile" class="form-control" value="<?php echo $row['mobile']; ?>" disabled>
								</div>
							</div>
							<div style="height:10px;"></div>
							<div class="row">
								<div class="col-md-12">
									<label style="float: left;">Email:</label>
									<div style="height:10px;"></div>
									<input type="text" class="form-control" value="<?php echo $row['email']; ?>" disabled>
								</div>
							</div>
							<div style="height:10px;"></div>
							<div class="row">
								<div class="col-md-12">
									<label style="float: left;">Password:</label>
									<div style="height:10px;"></div>
									<input type="password" class="form-control" value="<?php echo $row['password']; ?>" disabled>
								</div>
							</div>
							<div style="height:10px;"></div>
							<div class="row">
								<div class="col-md-12">
									<label style="float: left;">Remarks:</label>
									<div style="height:10px;"></div>
									<textarea rows="3" cols="40" placeholder="Optional" value="<?php echo $row['remark'] ?>" class="form-control" disabled></textarea>
								</div>
							</div>
					<?php
						}
					}
					?>

					<?php
					if (isset($_POST['edit_detail'])) {
						$query = "select * from students where email = '$_SESSION[email]'";
						$query_run = mysqli_query($connection, $query);
						while ($row = mysqli_fetch_assoc($query_run)) {
					?>
							<form action="edit_student.php" method="post">
								<div class="row">
									<div class="col-md-6">
										<label style="float: left;">Roll no:</label>
										<div style="height:10px;"></div>
										<input type="text" name="roll_no" class="form-control" value="<?php echo $row['roll_no'] ?>">
									</div>
									<div class="col-md-6">
										<label style="float: left;">Class:</label>
										<div style="height:10px;"></div>
										<input type="text" name="class" class="form-control" value="<?php echo $row['class']; ?>">
									</div>
								</div>
								<div style="height:10px;"></div>
								<div class="row">
									<div class="col-md-12">
										<label style="float: left;">Name:</label>
										<div style="height:10px;"></div>
										<input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
									</div>
								</div>
								<div style="height:10px;"></div>
								<div class="row">
									<div class="col-md-12">
										<label style="float: left;">Guardians Name:</label>
										<div style="height:10px;"></div>
										<input type="text" name="guardians_name" class="form-control" value="<?php echo $row['guardians_name']; ?>">
									</div>
								</div>
								<div style="height:10px;"></div>
								<div class="row">
									<div class="col-md-12">
										<label style="float: left;">Mobile:</label>
										<div style="height:10px;"></div>
										<input type="text" name="mobile" class="form-control" value="<?php echo $row['mobile']; ?>">
									</div>
								</div>
								<div style="height:10px;"></div>
								<div class="row">
									<div class="col-md-12">
										<label style="float: left;">Email:</label>
										<div style="height:10px;"></div>
										<input type="text" name="email" class="form-control" value="<?php echo $row['email']; ?>">
									</div>
								</div>
								<div style="height:10px;"></div>
								<div class="row">
									<div class="col-md-12">
										<label style="float: left;">Password:</label>
										<div style="height:10px;"></div>
										<input type="password" name="password" class="form-control" value="<?php echo $row['password']; ?>">
									</div>
								</div>
								<div style="height:10px;"></div>
								<div class="row">
									<div class="col-md-12">
										<label style="float: left;">Remarks:</label>
										<div style="height:10px;"></div>
										<textarea rows="3" cols="40" placeholder="Optional" name="remark" value="<?php echo $row['remark'] ?>" class="form-control"></textarea>
									</div>
								</div>
								<button type="submit" class="btn btn-primary" style="float: right; margin-top: 10px; margin-right: 15px;"><i class="fas fa-save"></i> Save</button>
							</form>
					<?php
						}
					}
					?>
				</div>
			</div>

		</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>