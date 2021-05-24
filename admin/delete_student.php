<!-- <script type="text/javascript">
	if(confirm("Are you sure want to delete ?"))
	{
		document.write("<?php 
		// $connection = mysqli_connect("localhost","root","");
		// $db = mysqli_select_db($connection,"sms");
		// $query = "delete from students where roll_no = $_POST[roll_no]";
		// $myvalue = $_GET['id'];
		//echo $myvalue;
		// $query = "delete from students where s_no = '$myvalue'";
		// $query_run = mysqli_query($connection,$query);
		?>");
        window.location.href = "admin_dashboard.php";
	}
	else
	{
		window.location.href = "admin_dashboard.php";
	}
</script> -->
<?php
	include('../conn.php');
	$id=$_GET['id'];
	mysqli_query($conn,"delete from students where userid='$id'");
	header('location:admin_dashboard.php');

?>