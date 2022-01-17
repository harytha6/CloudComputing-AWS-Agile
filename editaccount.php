<?php
include 'config.php';

session_start();

error_reporting(0);

$mapid = mysqli_real_escape_string($conn,$_SESSION["map_id"]);

$load = mysqli_query($conn, "SELECT * FROM map_user WHERE map_id='$mapid' ");

  if (mysqli_num_rows($load) > 0) {
	$row = mysqli_fetch_assoc($load);
    	$mapnamepre = $row['map_user_name'];
        $mapname = mysqli_real_escape_string($conn, $mapnamepre);

  } else {
    echo "<script>alert('Loading profile details not complete.');</script>";
  }

if (isset($_POST["back"])) {
  header("Location: dashboardforMAP.php");
}

if (isset($_POST["changeemail"])) {
    $oldemail = mysqli_real_escape_string($conn, $_POST["oldemail"]);
    $newemail = mysqli_real_escape_string($conn, $_POST["newemail"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $verify = mysqli_query($conn, "SELECT * FROM map_user WHERE map_user_email ='$oldemail' AND password = '$password' ");
	         if (mysqli_num_rows($verify)>0) {

                $sql = "UPDATE `map_user` SET `map_user_email` = '$newemail' WHERE `map_user_email` = '$oldemail' AND password = '$password' ";
                $result = mysqli_query($conn, $sql);
                $verify = mysqli_query($conn, "SELECT * FROM map_user WHERE map_user_email='$newemail' AND password = '$password' ");
	            if (mysqli_num_rows($verify)>0) {
   		            echo "<script>alert('Email updated successfully');</script>";
  	            } else {
    		        echo "<script>alert('Email updation failed');</script>";
  	            }
             }
             else{
                echo "<script>alert('Incorrect user details');</script>";
             }
}
if (isset($_POST["changepassword"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $oldpassword = mysqli_real_escape_string($conn, $_POST["password"]);
    $newpassword = mysqli_real_escape_string($conn, $_POST["newpwd"]);
    $repeatpassword = mysqli_real_escape_string($conn, $_POST["repwd"]);

    $verify = mysqli_query($conn, "SELECT * FROM map_user WHERE map_user_email ='$email' AND password = '$oldpassword' ");
	    if($newpassword==$repeatpassword){    
            if (mysqli_num_rows($verify)>0) {
                $sql = "UPDATE `map_user` SET `password` = '$newpassword' WHERE `map_user_email` = '$email' AND password = '$oldpassword' ";
                $result = mysqli_query($conn, $sql);
                $verify = mysqli_query($conn, "SELECT * FROM map_user WHERE map_user_email='$email' AND password = '$newpassword' ");
	            if (mysqli_num_rows($verify)>0) {
   		            echo "<script>alert('Password updated successfully');</script>";
  	            } else {
    		        echo "<script>alert('Password updation failed');</script>";
  	            }
             }
             else{
                echo "<script>alert('Incorrect user details');</script>";
             }
        }
        else{
                echo "<script>alert('Both Passwords dont match');</script>";
             }
};

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="statusstyle.css">
    <title>Negotiation</title>
  </head>
<body>

<h1>Change Email</h1>

<form class="form-container js-form-container" method="post">
            <!-- No id should be same. Change / replace at all occurrences -->
            <div class="form-inputs">
                 <div class="mb-3 row">
                    <label for="oldemail" class="col-sm-2 col-form-label">Enter the current email:</label>
                    <div class="col-sm-10">
                        <input id="oldemail" name="oldemail" class="form-control" type="text" placeholder="Enter current email" value="<?php echo $_POST["oldemail"]; ?>" required />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="newemail" class="col-sm-2 col-form-label">Enter the new email:</label>
                    <div class="col-sm-10">
                        <input id="newemail" name="newemail" class="form-control" type="text" placeholder="Enter new MAP email" value="<?php echo $_POST["newemail"]; ?>" required />
                    </div>
                </div>
		<div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label"> Enter Current Password:</label>
                    <div class="col-sm-10">
                        <input id="password" name="password" class="form-control" type="text" placeholder="Verify change" value="<?php echo $_POST["password"]; ?>" required />
                    </div>
                </div>
		<div class="form-input-actions">                
                    <div id="actionButtons">
                        <input type="submit" class="btn" name="changeemail" value="Change Email" />
                    </div>
                </div>
            </div>
        </form>

<h1>Change Account Password</h1>
	
	<form class="form-container js-form-container" method="post">
            <!-- No id should be same. Change / replace at all occurrences -->
            <div class="form-inputs">
                <div class="mb-3 row">
                    <label for="login email" class="col-sm-2 col-form-label">Login Email:</label>
                    <div class="col-sm-10">
                        <input id="email" name="email" class="form-control" type="text" placeholder="Enter Email" value="<?php echo $_POST["email"]; ?>" required />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="password" class="col-sm-2 col-form-label"> Enter Old Password:</label>
                    <div class="col-sm-10">
                        <input id="password" name="password" class="form-control" type="text" placeholder="Enter old password" value="<?php echo $_POST["password"]; ?>" required />
                    </div>
                </div>
		        <div class="mb-3 row">
                    <label for="newpwd" class="col-sm-2 col-form-label"> New Password:</label>
                    <div class="col-sm-10">
                        <input id="newpwd" name="newpwd" class="form-control" type="text" placeholder="Enter new password" value="<?php echo $_POST["newpwd"]; ?>" required />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="repwd" class="col-sm-2 col-form-label"> Re-enter Password:</label>
                    <div class="col-sm-10">
                        <input id="repwd" name="repwd" class="form-control" type="text" placeholder="Repeat password " value="<?php echo $_POST["repwd"]; ?>" required />
                    </div>
                </div>
		        <div class="form-input-actions">                
                    <div id="actionButtons">
                        <input type="submit" class="btn" name="changepassword" value="Change Password" />
                    </div>
                </div>
            </div>
        </form>

	<form class="form-container js-form-container" method="post">
           
		<div class="form-input-actions">                
                    <div id="actionButtons">
			<input type="submit" class="btn" name="back" value="Go Back to Dashboard" />
                    </div>
                </div>
            </div>
        </form>



</body>
</html>


