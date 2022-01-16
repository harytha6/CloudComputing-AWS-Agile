<?php
include 'config.php';

session_start();

error_reporting(0);

$userid = mysqli_real_escape_string($conn,$_SESSION["user_id"]);

$load = mysqli_query($conn, "SELECT * FROM users WHERE id='$userid' ");

  if (mysqli_num_rows($load) > 0) {
	$row = mysqli_fetch_assoc($load);
    	$username = $row['full_name'];	
  } else {
    echo "<script>alert('Loading profile details not complete.');</script>";
  }

if (isset($_POST["back"])) {
  header("Location: dashboard.php");
}

if (isset($_POST["savetemplate"])) {

  	$globalid = mysqli_real_escape_string($conn, $_POST["globalid"]);
	$check = mysqli_query($conn, "SELECT * FROM mapservice WHERE globalid ='$globalid' ");
	if (mysqli_num_rows($check)>0) {
		$row = mysqli_fetch_assoc($check);
    		$globalid = $row['globalid'];
  	} else {
    		echo "<script>alert('No Application number found ');</script>";
  	}

	$sql = "UPDATE `service_requests` SET `template_status` = '1' WHERE globalid = '$globalid' ";
	$result = mysqli_query($conn, $sql);

	$verify = mysqli_query($conn, "SELECT * FROM service_requests WHERE globalid='$globalid' AND template_status = '1' ");
	if (mysqli_num_rows($verify)>0) {
   		 echo "<script>alert('Template saved for future use');</script>";
  	} else {
    		echo "<script>alert('Saving template failed');</script>";
  	}
	
};

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="statusstyle.css">
    <title>Save Template</title>
  </head>
<body>

<h1>Save Template by Entering Application Number</h1>
<h4> Save Templates that are frequently needed/used.</h4>

	
	<form class="form-container js-form-container" method="post">
            <!-- No id should be same. Change / replace at all occurrences -->
            <div class="form-inputs">
                <div class="mb-3 row">
                    <label for="globalid" class="col-sm-2 col-form-label">Enter Application Number (from previous page) to save as a Template : </label>
                    <div class="col-sm-10">
                        <input id="globalid" name="globalid" class="form-control" type="text" placeholder="Application Number" value="<?php echo $_POST["globalid"]; ?>" required />
                    </div>
                </div>
		<div class="form-input-actions">                
                    <div id="actionButtons">
                        <input type="submit" class="btn" name="savetemplate" value="Save as Template" />
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


