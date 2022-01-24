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

if (isset($_POST["createaccount"])) {
    $newemail = mysqli_real_escape_string($conn, $_POST["newemail"]);
    $oldemail = mysqli_real_escape_string($conn, $_POST["oldemail"]);
    $newpassword = mysqli_real_escape_string($conn, md5($_POST["newpassword"]));
    $oldpassword = mysqli_real_escape_string($conn, md5($_POST["oldpassword"]));
    $repassword = mysqli_real_escape_string($conn, md5($_POST["repwd"]));

    if($newpassword == $repassword){
    $verify = mysqli_query($conn, "SELECT * FROM map_user WHERE map_user_email ='$oldemail' AND password = '$oldpassword' ");
	         if (mysqli_num_rows($verify)>0) {

                $sql = "INSERT INTO `map_user` (`map_user_name`, `map_user_email`, `active_status`, `created_at`, `password`) VALUES ('$mapname', '$newemail', '1', current_timestamp, '$newpassword') ";
                $result = mysqli_query($conn, $sql);
                $verify2 = mysqli_query($conn, "SELECT * FROM map_user WHERE map_user_email='$newemail' AND password = '$newpassword' ");
	            if (mysqli_num_rows($verify2)>0) {
   		            echo "<script>alert('New account created successfully');</script>";
  	            } else {
    		        echo "<script>alert('Account creation failed');</script>";
  	            }
             }
             else{
                echo "<script>alert('Incorrect user details. Authentication failed');</script>";
             }
    }
    else{
        echo "<script>alert('Newly entered Passwords dont match');</script>";
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

<h1>Create New MAP login</h1>

<form class="form-container js-form-container" method="post">
            <!-- No id should be same. Change / replace at all occurrences -->
            <div class="form-inputs">
            <div class="mb-3 row">
                    <label for="oldemail" class="col-sm-2 col-form-label">Enter the current email (for Authentication):</label>
                    <div class="col-sm-10">
                        <input id="oldemail" name="oldemail" class="form-control" type="text" placeholder="Enter current email" value="<?php echo $_POST["oldemail"]; ?>" required />
                    </div>
            </div>
		    <div class="mb-3 row">
                    <label for="oldpassword" class="col-sm-2 col-form-label"> Enter Current Password (for Authentication):</label>
                    <div class="col-sm-10">
                        <input type="password" ng-model="dataItem.password" id="oldpassword" name="oldpassword" class="form-control" type="text" placeholder="Current Password " value="<?php echo $_POST["oldpassword"]; ?>" required />
                    </div>
            </div>
            <div class="mb-3 row">
                    <label for="newemail" class="col-sm-2 col-form-label">Enter the new email for login:</label>
                    <div class="col-sm-10">
                        <input id="newemail" name="newemail" class="form-control" type="text" placeholder="Enter new MAP email" value="<?php echo $_POST["newemail"]; ?>" required />
                    </div>
            </div>
            <div class="mb-3 row">
                    <label for="newpassword" class="col-sm-2 col-form-label"> Enter New Password for Login:</label>
                    <div class="col-sm-10">
                        <input type="password" ng-model="dataItem.password" id="newpassword" name="newpassword" class="form-control" type="text" placeholder="New password" value="<?php echo $_POST["newpassword"]; ?>" required />
                    </div>
            </div>
            <div class="mb-3 row">
                    <label for="repwd" class="col-sm-2 col-form-label"> Re-enter Password:</label>
                    <div class="col-sm-10">
                        <input type="password" ng-model="dataItem.password"  id="repwd" name="repwd" class="form-control" type="text" placeholder="Repeat password " value="<?php echo $_POST["repwd"]; ?>" required />
                    </div>
            </div>
		<div class="form-input-actions">                
                    <div id="actionButtons">
                        <input type="submit" class="btn" name="createaccount" value="Create New Account" />
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


