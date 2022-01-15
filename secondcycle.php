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

if (isset($_POST["start"])) {

  	$globalid = mysqli_real_escape_string($conn, $_POST["globalid"]);
	$deadlinenew = mysqli_real_escape_string($conn, $_POST["deadline"]);
	$sql = "UPDATE `service_requests` SET `Submission_status` = '1', `cycle` = '2', `deadline_new` = '$deadlinenew', expired_status = '0' WHERE globalid = '$globalid' AND NOT cycle = '2' ";
	$result = mysqli_query($conn, $sql);

	$verify = mysqli_query($conn, "SELECT * FROM service_requests WHERE globalid='$globalid' AND Submission_status = '1' AND cycle = '2' AND deadline_new = '$deadlinenew' AND expired_status = '0' ");
	if (mysqli_num_rows($verify)>0) {
   		 echo "<script>alert('Second Cycle initiated');</script>";
  	} else {
    		echo "<script>alert('Inititation of second cycle failed / Already in Second Cycle');</script>";
  	}
	
};

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="statusstyle.css">
    <title>Expired Requests / Initiate Second Cycle</title>
  </head>
<body>

<h1>Expired Service Requests in Cycle 1</h1>

<table class="content-table">
  <thead>
    <tr>
			<th> Unique Application Number </th>
                        <th>Project Name</th>
                        <th>Project Role</th>
                        <th>Location</th>
                        <th>Level of Expertise</th>
                        <th>Skill Set</th>
                        <th>Time Period</th>
                        <th>Submission_Status</th>
                        <th>Cycle</th>
			<th>Deadline</th>
			<th> Expired Status </th>
    </tr>
  </thead>
  <tbody>
   <?php
	
	$sql = "SELECT * FROM service_requests WHERE created_by = '$username' AND cycle = '1' AND expired_status='1' ";
  	$result = $conn-> query($sql);

    if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            		$field0 = $row["globalid"];
                        $field1 = $row["projectname"];
                        $field2 = $row["role"];
                        $field3 = $row["location"];
                        $field4 = $row["skilllevel"];
                        $field5 = $row["skillset"];
                        $field6 = $row["duration"];
			$field8 = $row["cycle"];
			$field9 = $row["deadline"];  
	 		switch($row["Submission_status"]) {
                            case 0:
                                $field7 = "in Creation";
                                break;
                            case 1:
                                $field7 = "Requested";
                                break;
                            case 2:
                                $field7 = "Profile Uploaded";
                                break;
                            case 3:
                                $field7 = "Appointed";
                                break;
                            case 4:
                                $field7 = "Evaluated";
                                break;
                            case 5:
                                $field7 = "Cancelled";
                                break;
                        }

			 switch($row["expired_status"]) {
                            case 0:
                                $field10 = "Valid";
                                break;
                            case 1:
                                $field10 = "Expired";
                                break;
                        }
	echo '<tr>
				<td>'.$field0.'</td>                                
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

<h1>Successfully initiated Second Cycle Service Requests</h1>

<table class="content-table">
  <thead>
    <tr>
			<th> Unique Application Number </th>
                        <th>Project Name</th>
                        <th>Project Role</th>
                        <th>Location</th>
                        <th>Level of Expertise</th>
                        <th>Skill Set</th>
                        <th>Time Period</th>
                        <th>Submission_Status</th>
                        <th>Cycle</th>
			<th>Deadline</th>
			<th> Expired Status </th>
    </tr>
  </thead>
  <tbody>
   <?php
	
	$sql = "SELECT * FROM service_requests WHERE created_by = '$username' AND cycle = '2' ";
  	$result = $conn-> query($sql);

    if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            		$field0 = $row["globalid"];
                        $field1 = $row["projectname"];
                        $field2 = $row["role"];
                        $field3 = $row["location"];
                        $field4 = $row["skilllevel"];
                        $field5 = $row["skillset"];
                        $field6 = $row["duration"];
			$field8 = $row["cycle"];
			$field9 = $row["deadline_new"];  
	 		switch($row["Submission_status"]) {
                            case 0:
                                $field7 = "in Creation";
                                break;
                            case 1:
                                $field7 = "Requested";
                                break;
                            case 2:
                                $field7 = "Profile Uploaded";
                                break;
                            case 3:
                                $field7 = "Appointed";
                                break;
                            case 4:
                                $field7 = "Evaluated";
                                break;
                            case 5:
                                $field7 = "Cancelled";
                                break;
                        }

			 switch($row["expired_status"]) {
                            case 0:
                                $field10 = "Valid";
                                break;
                            case 1:
                                $field10 = "Expired";
                                break;
                        }
	echo '<tr>
				<td>'.$field0.'</td>                                
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

<h1>Initiate Second Cycle For Service Request</h1>
	
	<form class="form-container js-form-container" method="post">
            <!-- No id should be same. Change / replace at all occurrences -->
            <div class="form-inputs">
                <div class="mb-3 row">
                    <label for="globalid" class="col-sm-2 col-form-label">Unique Application Number:</label>
                    <div class="col-sm-10">
                        <input id="globalid" name="globalid" class="form-control" type="text" placeholder="Enter Application Number" value="<?php echo $_POST["globalid"]; ?>" required />
                    </div>
                </div>
		<div class="mb-3 row">
                    <label for="deadline" class="col-sm-2 col-form-label">New Deadline of Second Cycle:</label>
                    <div class="col-sm-10">
                        <input id="deadline" name="deadline" class="form-control" type="text" placeholder="yyyy-mm-dd" value="<?php echo $_POST["deadline"]; ?>" required />
                    </div>
                </div>
		<div class="form-input-actions">                
                    <div id="actionButtons">
                        <input type="submit" class="btn" name="start" value="Start Second Cycle" />
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


