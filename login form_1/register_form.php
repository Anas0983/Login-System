<!-- 05 start -->

<!-- 07 start -->
<?php
@include 'config.php';


if(isset($_POST['submit']))
{
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
    $user_type = $_POST['user_type'];

    $select_user = "SELECT * FROM `user_form` WHERE email = '$email' && password = '$password'";
    $result = mysqli_query($conn, $select_user);

    if(mysqli_num_rows($result) > 0)
    {
        $error[] = 'user already exist';
    }
    else
    {
        if($password != $cpassword)
        {
            $error[] = 'password does ot matched';
        }
        else
        {
            $insert = "INSERT INTO `user_form`(`name`, `email`, `password`, `user_type`) VALUES ('$name','$email','$password','$user_type')";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
        }
    }
}
?>
<!-- 07 end -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <img src="icon-2.png" alt="">
            <?php
            if(isset($error))
            {
                foreach($error as $error)
                {
                    echo '<span class="error-msg">'.$error.'</span>';
                }
            }
            ?>
            <h3>Register now</h3>
            <div class="input-field">
                <p>Your name <sup>*</sup></p>
                <input type="text" name="name" placeholder="enter your name" required>
            </div>
            <div class="input-field">
                <p>Your email <sup>*</sup></p>
                <input type="email" name="email" placeholder="enter your email" required>
            </div>
            <div class="input-field">
                <p>Your password <sup>*</sup></p>
                <input type="password" name="password" placeholder="enter your password" required>
            </div>
            <div class="input-field">
                <p>Confirm Password <sup>*</sup></p>
                <input type="password" name="cpassword" placeholder="confirm password" required>
            </div>
            <div class="input-field">
                <p>user type <sup>*</sup></p>
                <select name="user_type">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <input type="submit" name="submit" id="" value="Register Now" class="form-btn">
            <p>already have an account? <a href="login_form.php">login now</a></p>
        </form>
    </div>
</body>
</html>
<!-- 05 end -->