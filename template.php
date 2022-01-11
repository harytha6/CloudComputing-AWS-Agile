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

if (isset($_POST["accept"])) {

  	$globalid = mysqli_real_escape_string($conn, $_POST["globalid"]);
	$check = mysqli_query($conn, "SELECT * FROM mapservice WHERE globalid ='$globalid' ");
	if (mysqli_num_rows($check)>0) {
		$row = mysqli_fetch_assoc($check);
    		$globalid = $row['globalid'];
  	} else {
    		echo "<script>alert('No Application number found ');</script>";
  	}

	$sql = "UPDATE `service_requests` SET `Submission_status` = '0' WHERE globalid = '$globalid' ";
	$result = mysqli_query($conn, $sql);

	$verify = mysqli_query($conn, "SELECT * FROM service_requests WHERE globalid='$globalid' AND Submission_status = '0' ");
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
    <title>Used Template</title>
  </head>
<body>

<h1>Used Templates</h1>

<table class="content-table">
  <thead>
    <tr>
	<th>Global ID </th>
	<th>Project Name</th>
      	<th>Project Role</th>
      	<th>Location</th>
      	<th>Skill Level</th>
	<th>Skill Set</th>
      	<th>Duration</th>
      	<th>Weight </th>
      	<th>Task description</th>
	<th>Comments</th>
    </tr>
  </thead>
  <tbody>
   <?php
	$sql = "SELECT * FROM mapservice WHERE created_by = '$username' AND agreed_status = '0' ";
  	$result = $conn-> query($sql);

    if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            		$field1 = $row["globalid"];
                        $field2 = $row["projectname"];
                        $field3 = $row["role"];
                        $field4 = $row["location"];
                        $field5 = $row["skilllevel"];
                        $field6 = $row["skillset"];
                        $field7 = $row["duration"];
                        $field8 = $row["weight"];
                        $field9 = $row["taskdescription"];
			$field10 = $row["comments"];
			//$field11 = $row["profileuploadedon"];
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

<h1>Please select any from the available templates</h1>
	
	<form class="form-container js-form-container" method="post">
            <!-- No id should be same. Change / replace at all occurrences -->
            <div class="form-inputs">
                <div class="mb-3 row">
                    <label for="globalid" class="col-sm-2 col-form-label">Global ID</label>
                    <div class="col-sm-10">
                        <input id="globalid" name="globalid" class="form-control" type="text" placeholder="Enter the GlobalID" value="<?php echo $_POST["globalid"]; ?>" required />
                    </div>
                </div>
		<div class="form-input-actions">                
                    <div id="actionButtons">
                        <input type="submit" class="btn" name="accept" value="Use Template" />
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


