<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

</head>

<body>
    <div class="container">
        <a href="../index.php" class="home-btn"><i class="fas fa-home"></i></a>
        <center style="margin-top: 8rem;">
            <h1 class="stu-header">Student Login Page</h1>
            <div class="form-group-stu">
                <form action="" method="post">
                    <div class="form-email-stu">
                        Email :<input type="text" name="email" required id="form_email_stu"><br><br>
                    </div>
                    <div class="form-pass-stu">
                        Password: <input type="password" name="password" required id="form_pass_stu"><br><br>
                    </div>
                    <input type="submit" name="submit" id="form_submit_stu">
                </form>
            </div>
            <span class="circle"></span>
            <span class="circle2"></span>
    </div>
    <?php
			session_start();
			if(isset($_POST['submit']))
			{
				$connection = mysqli_connect("localhost","root","");
				$db = mysqli_select_db($connection,"sms");
				$query = "select * from students where email = '$_POST[email]'";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					if($row['email'] == $_POST['email'])
					{
						if($row['password'] == $_POST['password'])
						{
							$_SESSION['name'] =  $row['name'];
							$_SESSION['email'] =  $row['email'];
							header("Location: student_dashboard.php");
						}
						else{
							?>
							<span>Wrong Password !!</span>
							<?php
						}
					}
					else
					{
						?>
						<span>Wrong UserName !!</span>
						<?php
					}
				}
			}
		?>

    </center>
</body>

</html>