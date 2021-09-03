<?php include '../includes/header.php';?>

<body>
    <div class="container">
        <a href="../index.php" class="home-btn" style="color: #FF8800"><i class="fas fa-home"></i></a>
        <center style="margin-top: 8rem;">
            <h1 class="teacher-header">Teacher Login Page</h1>
            <div class="form-group-teacher">
                <form action="" method="post">
                    <div class="form-email-teacher">
                        Email :<input type="text" name="email" required id="form_email_teacher"><br><br>
                    </div>
                    <div class="form-pass-teacher">
                        Password: <input type="password" name="password" required id="form_pass_teacher"><br><br>
                    </div>
                    <input type="submit" name="submit" id="form_submit_teacher">
                </form>
            </div>
    </div>
    <?php
			session_start();
			if(isset($_POST['submit']))
			{
				$connection = mysqli_connect("localhost","root","");
				$db = mysqli_select_db($connection,"sms");
				$query = "select * from teachers where email = '$_POST[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					if($row['email'] == $_POST['email'])
					{
						if($row['password'] == $_POST['password'])
						{
							$_SESSION['name'] =  $row['name'];
							$_SESSION['email'] =  $row['email'];
							header("Location: teacher_dashboard.php");
						}
						else{
							?>
							<span class="error-msg">Wrong Password !!</span>
							<?php
						}
					}
					else
					{
						?>
						<span class="error-msg">Wrong UserName !!</span>
						<?php
					}
				}
			}
		?>
    </center>
</body>

</html>