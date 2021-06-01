<?php
	include('../conn.php');
	
	$id=$_GET['id'];
	
	$net=$_POST['net'];
	$webtech=$_POST['webtech'];
	$statistics=$_POST['statistics'];
	$numerical = $_POST['numerical'];

	
	mysqli_query($conn,"update students set net='$net', webtech='$webtech', statistics='$statistics', numerical='$numerical' where userid='$id'");
	header('location:teacher_dashboard.php.');

?>