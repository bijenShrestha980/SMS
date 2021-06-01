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

	<marquee>Note:- This portal is open till 31 March 2022...Plz edit your information, if wrong.</marquee>
	<div class="row">
		<div class="col-md-3" id="sidebar">
			<form action="" method="post">
				<!-- <h1><input type="submit" name="notice_student" value="Dashboard" class="text-center py-5" style="color: #25d366; background:none; border:none;"></h1> -->
				<h1 class="text-center py-5" style="color: #25d366;"> Dashboard</h1>
				<input type="submit" class="input-btn sidebar-items" name="edit_detail" value="Edit Detail"><br>
				<input type="submit" class="input-btn sidebar-items" name="show_detail" value="Show Detail"><br>
				<input type="submit" class="input-btn sidebar-items" name="result" value="Results"><br>
			</form>
		</div>

		<div class="col-md-9">
			<div id="right_side">
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

				<!-- #Code for Result--Start-->
				<?php
				if (isset($_POST['result'])) {
				?>
					<center>
						<h2><b>Student's Result</b></h2><br><br>
					</center>
					<form action="" method="post">
						<div class="search" style="float: right; position: relative; top: -35px;">
							<b>Enter Roll No:</b> <input type="text" name="roll_no" placeholder="Search" style="border-radius: 40px; padding: 0 10px; height: 35px; width: 300px;">
							<input type="submit" name="search_by_roll_no_for_search" value="Search" class="btn btn-secondary">
						</div>
					</form>


					<?php
					$query = "select * from students";
					$query_run = mysqli_query($connection, $query);
					?>
					<table class="table">
						<thead>
							<tr>
								<th scope="col" class="text-center">Roll no.</th>
								<th scope="col" class="text-center">Name</th>
								<th scope="col" class="text-center">Class</th>
								<th scope="col" class="text-center" style="color: red;">.Net</th>
								<th scope="col" class="text-center" style="color: red;">WebTech</th>
								<th scope="col" class="text-center" style="color: red;">Probality & Statistics</th>
								<th scope="col" class="text-center" style="color: red;">Numerical Method</th>
							</tr>
						</thead>
						<?php
						include('../conn.php');
						$query = mysqli_query($conn, "select * from `students`");
						while ($row = mysqli_fetch_array($query)) {
						?> <tbody>
								<tr>
									<td class="text-center"><?php echo $row['roll_no'] ?></th>
									<td class="text-center"><?php echo $row['name'] ?></td>
									<td class="text-center"><?php echo $row['class'] ?></td>
									<td class="text-center" style="color: blue;"><?php echo $row['net'] ?></td>
									<td class="text-center" style="color: blue;"><?php echo $row['webtech'] ?></td>
									<td class="text-center" style="color: blue;"><?php echo $row['statistics'] ?></td>
									<td class="text-center" style="color: blue;"><?php echo $row['numerical'] ?></td>
								</tr>
							</tbody>
						<?php
						}
						?>
					</table>


					<?php
				}
				if (isset($_POST['search_by_roll_no_for_search'])) {
					$query = "select * from students where roll_no = '$_POST[roll_no]'";
					$query_run = mysqli_query($connection, $query);
					while ($row = mysqli_fetch_assoc($query_run)) {
					?>
						<center>
							<h1><?php echo $row['name'] ?></h1>
						</center>
						<div class="row">
							<!-- <input type="hidden" name="update_s_no" value="<?php echo $row['s_no'] ?>" class="form-control" disabled> -->
							<div class="col-md-6">
								<label> Roll No: </label>
								<input type="text" name="roll_no" disabled value="<?php echo $row['roll_no'] ?>" class="form-control">
							</div>
							<div class="col-md-6">
								<label> Class: </label>
								<input type="text" name="class" disabled value="<?php echo $row['class'] ?>" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<label> Name: </label>
								<input type="text" name="name" disabled value="<?php echo $row['name'] ?>" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label> .Net: </label>
								<input type="text" name="net" disabled value="<?php echo $row['net'] ?>" class="form-control">
							</div>
							<div class="col-md-6">
								<label> WebTech: </label>
								<input type="text" name="webtech" disabled value="<?php echo $row['webtech'] ?>" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label> Probality & Statistics: </label>
								<input type="text" name="statistics" disabled value="<?php echo $row['statistics'] ?>" class="form-control">
							</div>
							<div class="col-md-6">
								<label> Numerical Method: </label>
								<input type="text" name="numerical" disabled value="<?php echo $row['numerical'] ?>" class="form-control">
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<label> Remarks: </label>
								<textarea rows="3" cols="40" placeholder="" name="remark" class="form-control" disabled><?php echo $row['remark'] ?></textarea>
							</div>
						</div>
			</div>
	<?php
					}
				}
	?>
		</div>

	</div>
	</div>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>