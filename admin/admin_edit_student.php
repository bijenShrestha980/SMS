<?php
	include('../conn.php');
	
	$id=$_GET['id'];
	
	$roll_no=$_POST['roll_no'];
	$name=$_POST['name'];
	$class=$_POST['class'];
	$guardians_name = $_POST['guardians_name'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$remark = $_POST['remark'];

	
	mysqli_query($conn,"update students set roll_no='$roll_no', name='$name', class='$class', guardians_name='$guardians_name', mobile='$mobile', email='$email', password='$password', remark='$remark' where userid='$id'");
	header('location:admin_dashboard.php.');

?>