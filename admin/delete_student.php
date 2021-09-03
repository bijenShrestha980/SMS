<?php
	include('../conn.php');
	$id=$_GET['id'];
	mysqli_query($conn,"delete from students where userid='$id'");
	header('location:admin_dashboard.php');

?>