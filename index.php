<?php

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION["user_id"])) {
  header("Location: dashboard.php");
}

if (isset($_SESSION["map_id"])) {
  header("Location: dashboardforMAP.php");
}



if (isset($_POST["signinmap"])) {
  $email = mysqli_real_escape_string($conn, $_POST["mapemail"]);
  $password = mysqli_real_escape_string($conn, md5($_POST["mappassword"]));

  $check_email = mysqli_query($conn, "SELECT * FROM map_user WHERE map_user_email='$email' AND password='$password'");

  if (mysqli_num_rows($check_email) > 0) {
    $row = mysqli_fetch_assoc($check_email);
    $_SESSION["map_id"] = $row['map_id'];
    $activestatus = $row['active_status'];
    if($activestatus == 1){
        echo "<script>alert('Login successful');</script>";
        header("Location: dashboardforMAP.php");
    }
    else {
        echo "<script>alert('Your account has been deactivated. Contact administrator');</script>";
    }
    
  } else {
    echo "<script>alert('Login details are incorrect. Please try again.');</script>";
  }
 
}

if (isset($_POST["signin"])) {
  $email = mysqli_real_escape_string($conn, $_POST["email"]);
  $password = mysqli_real_escape_string($conn, $_POST["password"]);

  $check_email = mysqli_query($conn, "SELECT id FROM users WHERE email='$email' AND password='$password' AND status = 1");

  if (mysqli_num_rows($check_email) > 0) {
    $row = mysqli_fetch_assoc($check_email);
    $_SESSION["user_id"] = $row['id'];
    header("Location: dashboard.php");
  } else {
    echo "<script>alert('Login details seem to be incorrect. Please try again.');</script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title> Login Portal for Consumer and MAP </title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="" method="post" class="sign-in-form">
          <h2 class="title">Sign in for Companies</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Email Address" name="email" value="<?php echo $_POST['email']; ?>" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required />
          </div>
          <input type="submit" value="Login" name="signin" class="btn solid" />
          <p style="display: flex;justify-content: center;align-items: center;margin-top: 20px;"><a href="forgot-password.php" style="color: #4590ef;">Forgot Password?</a></p>
        </form>
        <form action="" class="sign-up-form" method="post">
          <h2 class="title">Sign in for Master Agreement Partners</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Email Address" name="mapemail" value="<?php echo $_POST['mapemail']; ?>" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="mappassword" value="<?php echo $_POST['mappassword']; ?>" required />
          </div>
          <input type="submit" value="Login" name="signinmap" class="btn solid" />
          <p style="display: flex;justify-content: center;align-items: center;margin-top: 20px;"><a href="forgot-password.php" style="color: #4590ef;">Forgot Password?</a></p>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Want to login as a Provider ?</h3>
          <p>
            If you want to login as one of the Master Agreement Partners,
            then click below
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign in for MAP
          </button>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>One of the consumers ?</h3>
          <p>
             If you want to login as one of the consumers,
             then click here
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <script src="app.js"></script>
</body>

</html>