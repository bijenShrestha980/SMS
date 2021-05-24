<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.css">
</head>

<body>
    <center style="margin-top: 14rem;">
        <h1 class="opening-header">Student Management System</h1>
        <form action="" method="post" id="login-form-btn">
            <input type="submit" name="admin_login" value="Admin Login" id="admin_login">
            <input type="submit" name="student_login" value="Student Login" id="student_login">
            <input type="submit" name="teacher_login" value="Teacher Login" id="teacher_login">
        </form>

        <?php
        if (isset($_POST['admin_login'])) {
            header("Location: admin/admin_login.php");
        }
        if (isset($_POST['student_login'])) {
            header("Location: stu/student_login.php");
        }
        if (isset($_POST['teacher_login'])) {
            header("Location: teach/teacher_login.php");
        }
        ?>

    </center>
</body>

</html>