<?php
include 'config.php';

session_start();

error_reporting(0);

$userid = mysqli_real_escape_string($conn,$_SESSION["user_id"]);

$load = mysqli_query($conn, "SELECT * FROM users WHERE id='$userid' ");

  if (mysqli_num_rows($load) > 0) {
	$row = mysqli_fetch_assoc($load);
    	$username = mysqli_real_escape_string($conn,$row['full_name']);	
  } else {
    echo "<script>alert('Loading profile details not complete.');</script>";
  }

if (isset($_POST["back"])) {
  header("Location: dashboard.php");
}

if (isset($_POST["accept"])) {

  	$profileid = mysqli_real_escape_string($conn, $_POST["profileid"]);
	$check = mysqli_query($conn, "SELECT * FROM mapservice WHERE profileid ='$profileid' ");
	if (mysqli_num_rows($check)>0) {
		$row = mysqli_fetch_assoc($check);
    		$globalid = $row['globalid'];
  	} else {
    		echo "<script>alert('No Application number found ');</script>";
  	}

	$sql = "UPDATE `service_requests` SET `Submission_status` = '3' WHERE globalid = '$globalid' ";
	$result = mysqli_query($conn, $sql);

	$verify = mysqli_query($conn, "SELECT * FROM service_requests WHERE globalid='$globalid' AND Submission_status = '3' ");
	if (mysqli_num_rows($verify)>0) {
   		 echo "<script>alert('Profile selected');</script>";
  	} else {
    		echo "<script>alert('Selection failed');</script>";
  	}
	
};

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="statusstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Uploaded Profiles</title>
  </head>
<body>

<h1 class="display-6 form__title">Uploaded Profiles</h1>

<table class="content-table">
  <thead>
    <tr>
	<th>Profile ID </th>
	<th>Provided by MAP</th>
      	<th>Employee Name</th>
      	<th>Location</th>
      	<th>Skill Set</th>
	<th>Skill Level</th>
      	<th>Duration available for</th>
      	<th>Language </th>
      	<th>Comments</th>
	<th>Offered Price </th>
	<th>Profile uploaded on </th>
	<th>Cycle</th>
    </tr>
  </thead>
  <tbody>
   <?php
	$sql = "SELECT * FROM mapservice WHERE created_by = '$username' AND agreed_status = '0' ";
  	$result = $conn-> query($sql);

    if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            		$field1 = $row["profileid"];
                        $field2 = $row["currentcompany"];
                        $field3 = $row["employeename"];
                        $field4 = $row["location"];
                        $field5 = $row["skillset"];
                        $field6 = $row["skilllevel"];
                        $field7 = $row["durationavailablefor"];
                        $field8 = $row["language"];
                        $field9 = $row["comments"];
			$field10 = $row["price"];
			$field11 = $row["profileuploadedon"];
			$tempglobalid = $row["globalid"];
			$internalsql = mysqli_query($conn, "SELECT cycle FROM service_requests WHERE globalid = '$tempglobalid' ");
			if (mysqli_num_rows($internalsql) > 0) {
			$row = mysqli_fetch_assoc($internalsql);
			$field12 = $row['cycle'];	
			}
	echo '<tr>
                                <td>'.$field1.'</td> 
                                <td>'.$field2.'</td> 
                                <td>'.$field3.'</td> 
                                <td>'.$field4.'</td> 
                                <td>'.$field5.'</td> 
                                <td>'.$field6.'</td> 
                                <td>'.$field7.'</td> 
                                <td>'.$field8.'</td> 
                                <td>'.$field9.'</td> 
				<td>'.$field10.'</td>
				<td>'.$field11.'</td>
				<td>'.$field12.'</td>
                            </tr>';
                                
                                "<br>";
	}
	$result->free();
        //echo "</table>";
    }
    else {
        echo "0 results";
    }
    ?>
        
  </tbody>
</table>

<h1>Select Profiles</h1>
	
	<form class="form-container js-form-container" method="post">
            <!-- No id should be same. Change / replace at all occurrences -->
            <div class="form-inputs">
                <div class="mb-3 row">
                    <label for="profileid" class="col-sm-2 col-form-label">Profile ID:</label>
                    <div class="col-sm-10">
                        <input id="profileid" name="profileid" class="form-control" type="text" placeholder="Enter the Profile ID to select" value="<?php echo $_POST["profileid"]; ?>" required />
                    </div>
                </div>
		<div class="form-input-actions">                
                    <div id="actionButtons">
                        <input type="submit" class="btn" name="accept" value="Accept Profile" />
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


