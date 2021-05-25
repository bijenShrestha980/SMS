<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"sms");
	$query = "update teachers set t_id='$_POST[t_id]',name='$_POST[name]',mobile='$_POST[mobile]',courses='$_POST[courses]',email='$_POST[email]',password='$_POST[password]'where t_id = $_POST[t_id]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Details edited successfully.");
	window.location.href = "teacher_dashboard.php";
</script>