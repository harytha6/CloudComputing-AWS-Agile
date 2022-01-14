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
if (isset($_POST["Submit"])) {

  	$response = mysqli_real_escape_string($conn, $_POST["response"]);
  	$profileid = mysqli_real_escape_string($conn, $_POST["profileid"]);
	$check = mysqli_query($conn, "SELECT * FROM mapservice WHERE profileid ='$profileid' ");
	if (mysqli_num_rows($check)>0) {
		$row = mysqli_fetch_assoc($check);
    		$globalid = $row['globalid'];
  	} else {
    		echo "<script>alert('No Application number found ');</script>";
  	}

  	$sql = "UPDATE `mapservice` SET `response` = '$response' WHERE globalid = '$globalid' ";
	$result = mysqli_query($conn, $sql);

	$verify = mysqli_query($conn, "SELECT * FROM mapservice WHERE globalid='$globalid' AND response = '$response' ");
	if (mysqli_num_rows($verify)>0) {
   		 echo "<script>alert('Response Submitted');
   		  window.location = 'dashboard.php';
       </script>";
  	} else {
    		echo "<script>alert('Response Submission failed');</script>";
  	}
  };
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="statusstyle.css">
    <title>Uploaded Profiles</title>
  </head>
<body>

<h1>Uploaded Profiles</h1>

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
	<th>Offered Price </th>
	<th>question </th>
	<th>response </th>
	<th>Created by </th>
    </tr>
  </thead>
  <tbody>
   <?php
	$sql = "SELECT * FROM mapservice WHERE created_by= '$username' AND NOT question= '' ";
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
                        $field8 = $row["price"];
                        $field9 = $row["question"];
			            $field10 = $row["response"];
			            $field11 = $row["created_by"];

			
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
                        <input id="profileid" name="profileid" class="form-control" type="text" placeholder="Enter Profile ID" value="<?php echo $_POST["profileid"]; ?>" required />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="response" class="col-sm-2 col-form-label">Response:</label>
                    <div class="col-sm-10">
                        <input id="response" name="response" class="form-control" type="text" placeholder="Enter your response" value="<?php echo $_POST["response"]; ?>" required />
                    </div>
                </div>
		<div class="form-input-actions">                
                    <div id="actionButtons">
                        <input type="submit" class="btn" name="Submit" value="Submit Response" />
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