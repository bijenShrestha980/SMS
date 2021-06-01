<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php
    session_start();
    $name = "";
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, "sms");
    ?>
</head>

<body>
    <!-- <center> -->
    <div class="row" id="header" style="background: #25d366;">
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
    <!-- </center> -->
    <marquee>Note:- This portal is open till 31 May 2022...Plz edit your information, if wrong.</marquee>
    <div class="row">
        <div class="col-md-3" id="sidebar">
            <form action="" method="post">
                <!-- <h1><input type="submit" name="notice_student" value="Dashboard" class="text-center py-5" style="color: #25d366; background:none; border:none;"></h1> -->
                <h1 class="text-center py-5" style="color: #25d366;"> Dashboard</h1>
                <input type="submit" class="input-btn sidebar-items" name="search_student" value="Search Student"><br>
                <input type="submit" class="input-btn sidebar-items" name="add_new_student" value="Add New Student"><br>
                <input type="submit" class="input-btn sidebar-items" name="result" value="Results"><br>
                <input type="submit" class="input-btn sidebar-items" name="show teacher" value="Show Teachers"><br>
            </form>
        </div>

        <div class="col-md-9">
            <div id="right_side">

                <!-- #Code for search student---Start-->
                <?php
                if (isset($_POST['search_student'])) {
                ?>
                    <center>
                        <h2><b>Student's details</b></h2><br><br>
                    </center>
                    <a href="#addnew" data-toggle="modal" class="btn btn-primary"><i class="fas fa-plus"></i> Add New</a></span>
                    <?php include('add_modal.php'); ?>
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
                                <th scope="col" class="text-center">Phone no.</th>
                                <th scope="col" class="text-center">Edit</th>
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
                                    <td class="text-center"><?php echo $row['mobile'] ?></td>
                                    <td class="text-center">
                                        <a href="#edit<?php echo $row['userid']; ?>" data-toggle="modal" class="btn btn-success"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="#del<?php echo $row['userid']; ?>" data-toggle="modal" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Delete</a>
                                        <?php include('button.php'); ?>
                                    </td>
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
                            <div class="col-md-8">
                                <label> Guardian's Name: </label>
                                <input type="text" name="guardians_name" disabled value="<?php echo $row['guardians_name'] ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <label> Mobile: </label>
                                <input type="text" name="mobile" disabled value="<?php echo $row['mobile'] ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <label> Email: </label>
                                <input type="text" name="email" disabled value="<?php echo $row['email'] ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <label> Password: </label>
                                <input type="password" name="password" disabled value="<?php echo $row['password'] ?>" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label> Remarks: </label>
                                <textarea rows="3" cols="40" placeholder="Optional" name="remark" class="form-control" disabled><?php echo $row['remark'] ?></textarea>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
                <!-- Code For Add New Stuent -->
                <?php
                if (isset($_POST['add_new_student'])) {
                ?>
                    <center>
                        <h4>Fill the given details</h4>
                    </center>
                    <form action="add_student.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" name="update_s_no" class="form-control">
                                <label> Roll No: </label>
                                <input type="text" name="roll_no" required class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label> Class: </label>
                                <input type="text" name="class" required class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label> Name: </label>
                                <input type="text" name="name" required class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label> Guardian's Name: </label>
                                <input type="text" name="guardians_name" required class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label> Mobile: </label>
                                <input type="text" name="mobile" required class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label> Email: </label>
                                <input type="text" name="email" required class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label> Password: </label>
                                <input type="password" name="password" required class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label> Remarks: </label>
                                <textarea rows="3" cols="40" placeholder="Optional" name="remark" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-md-12">
                                <input type="submit" name="add" value="Add Student" class="btn btn-primary">
                            </div>
                        </div>
                    </form>

            <!-- Code for Show Teachers -->
                <?php
                }
                ?>
                <?php
                if (isset($_POST['show_teacher'])) {
                    $query = "select * from teachers";
                    $query_run = mysqli_query($connection, $query);
                ?>
                    <center>
                        <h2><b>Teacher's details</b></h2><br><br>
                    </center>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Course</th>
                                <th scope="col">View Detail</th>
                            </tr>
                        </thead>
                        <?php
                        if ($query_run) {
                            foreach ($query_run as $row) {
                        ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['t_id'] ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['mobile'] ?></td>
                                        <td><?php echo $row['courses'] ?></td>
                                        <td><a href="#">View</a></td>
                                    </tr>
                                </tbody>
                    <?php
                            }
                        }
                    }
                    ?>
                    </table>

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
							<input type="submit" name="search_by_roll_no_for_search_result" value="Search" class="btn btn-secondary">
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
				if (isset($_POST['search_by_roll_no_for_search_result'])) {
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>