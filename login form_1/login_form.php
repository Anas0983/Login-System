<!-- 08 start -->

<!-- 09 start -->
<?php
@include 'config.php';
session_start();
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
        $row = mysqli_fetch_array($result);

        if ($row['user_type'] == 'admin')
        {
            $_SESSION['admin_name'] = $row['name'];
            header('location:admin_page.php');
        }
        elseif ($row['user_type'] == 'user')
        {
            $_SESSION['user_name'] = $row['name'];
            header('location:user_page.php');
        }
        else
        {
            $error[] = 'incorrect email or password';
        }
    }
    
}
?>
<!-- 09 end -->

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
            <img src="icon-2.png" style="top: -20%;">
            <?php

            

            if(isset($error))
            {
                foreach($error as $error)
                {
                    echo '<span class="error-msg">'.$error.'</span>';
                }
            }
            ?>
            <h3>Login now</h3>
            
            <div class="input-field">
                <p>Your email <sup>*</sup></p>
                <input type="email" name="email" placeholder="enter your email" required>
            </div>
            <div class="input-field">
                <p>Your password <sup>*</sup></p>
                <input type="password" name="password" placeholder="enter your password" required>
            </div>
            
            <input type="submit" name="submit" id="" value="Login Now" class="form-btn">
            <p>already have an account? <a href="register_form.php">Register now</a></p>
        </form>
    </div>
</body>
</html>
<!-- 08 end -->