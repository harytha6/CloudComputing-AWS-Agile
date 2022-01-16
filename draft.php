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

if (isset($_POST["editdraft"])) {
    $_SESSION["globalidfordraft"] = mysqli_real_escape_string($conn, $_POST["globalid"]);
  	$globalid = mysqli_real_escape_string($conn, $_POST["globalid"]);
	$check = mysqli_query($conn, "SELECT * FROM service_requests WHERE globalid ='$globalid' AND Submission_status = '0' ");
	if (mysqli_num_rows($check)>0) {
        header("Location: editdraft.php");	
  	} else {
    		echo "<script>alert('No draft currently found ');</script>";
  	}
};

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="statusstyle.css">
    <title>Saved Service Requests</title>
  </head>
<body>

<h1>Saved Service Requests</h1>

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
                        <th>Commercial/Functional weight</th>
                        <th>Detailed Task Description</th>
                        <th>Submission_Status</th>
                        <th>Cycle</th>
			            <th>Deadline</th>
			            <th>Expired Status </th>
    </tr>
  </thead>
  <tbody>
   <?php
	$sql = "SELECT * FROM service_requests WHERE created_by = '$username' AND Submission_status = '0' ";
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
                        $field7 = $row["weight"];
                        $field8 = $row["taskdescription"];
			            $field10 = $row["cycle"];
			            $field11 = $row["deadline"];                     
                        

                        switch($row["Submission_status"]) {
                            case 0:
                                $field9 = "in Creation";
                                break;
                            case 1:
                                $field9 = "Requested";
                                break;
                            case 2:
                                $field9 = "Profile Uploaded";
                                break;
                            case 3:
                                $field9 = "Appointed";
                                break;
                            case 4:
                                $field9 = "Evaluated";
                                break;
                            case 5:
                                $field9 = "Cancelled";
                                break;
                        }

			            switch($row["expired_status"]) {
                            case 0:
                                $field12 = "Valid";
                                break;
                            case 1:
                                $field12 = "Expired";
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
				                <td>'.$field11.'</td> 
				                <td>'.$field12.'</td>
				
                </tr>';
                                
                "<br>";
	}
	$result->free();
        //echo "</table>";
    }
    else {
        echo "No saved drafts available right now.";
    }
    ?>
        
  </tbody>
</table>

<h1>Submit Draft</h1>
	
	<form class="form-container js-form-container" method="post">
            <!-- No id should be same. Change / replace at all occurrences -->
            <div class="form-inputs">
                <div class="mb-3 row">
                    <label for="globalid" class="col-sm-2 col-form-label">Enter Unique Application Number of Draft to submit:</label>
                    <div class="col-sm-10">
                        <input id="globalid" name="globalid" class="form-control" type="text" placeholder="Application Number" value="<?php echo $_POST["globalid"]; ?>" required />
                    </div>
                </div>
		<div class="form-input-actions">                
                    <div id="actionButtons">
                        <input type="submit" class="btn" name="editdraft" value="Edit Draft" />
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


