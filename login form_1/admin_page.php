<!-- 12 start -->
<?php
@include 'config.php';

session_start();
if(!isset($_SESSION['admin_name']))
{
    header('location:login_form.php');
}
?>
<!-- 12 end -->
<!-- 04 start -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <h3>Hi, <span>Admin</span></h3>
            <h1>Welcome <span><?php echo $_SESSION['admin_name']; ?></span></h1> <!-- 13 </?php echo $_SESSION['admin_name']; ?> -->
            <p>This is an admin page</p>
            <a href="login_form.php" class="btn">Login</a>
            <a href="register_form.php" class="btn">Register</a>
            <a href="logout.php" class="btn">Logout</a>
        </div>
    </div>
</body>
</html>
<!-- 04 end -->