<?php
	include('../conn.php');
	
	$roll_no=$_POST['roll_no'];
	$name=$_POST['name'];
	$class=$_POST['class'];
	$guardians_name = $_POST['guardians_name'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$remark = $_POST['remark'];
	
	mysqli_query($conn,"insert into students (roll_no, name, class, guardians_name, mobile, email, password, remark) values ('$roll_no', '$name', '$class', '$guardians_name', '$mobile', '$email', '$password', '$remark')");
	header('location:admin_dashboard.php');

?>