<?php
include 'config.php';

session_start();

error_reporting(0);

$userid = mysqli_real_escape_string($conn,$_SESSION["user_id"]);
$globalid = mysqli_real_escape_string($conn,$_SESSION["globalidfortemplate"]);

$load = mysqli_query($conn, "SELECT * FROM users WHERE id='$userid' ");

  if (mysqli_num_rows($load) > 0) {
	    $row = mysqli_fetch_assoc($load);
    	$usernamepre = $row['full_name'];
        $username = mysqli_real_escape_string($conn, $usernamepre);
  } else {
    echo "<script>alert('Loading profile details not complete.');</script>";
  }

if (isset($_POST["back"])) {
  header("Location: dashboard.php");
}

if (isset($_POST["push"])) {

    //$globalid = mysqli_real_escape_string($conn, $globalid);
    $newglobalid = rand(1000,5000);
    $deadline = mysqli_real_escape_string($conn, $_POST["deadline"]);;
    $role = mysqli_real_escape_string($conn, $_POST["projectRole"]);
    $skilllevel = mysqli_real_escape_string($conn, $_POST["skilllevel"]);
    $location = mysqli_real_escape_string($conn, $_POST["location"]);
    $skillset = mysqli_real_escape_string($conn, $_POST["skillset"]);
    $duration = mysqli_real_escape_string($conn, $_POST["period"]);
    $projectname = mysqli_real_escape_string($conn, $_POST["projectName"]);
    $taskdescription = mysqli_real_escape_string($conn, $_POST["taskdescription"]);
    $weight = mysqli_real_escape_string($conn, $_POST["function"]);
    $comments = mysqli_real_escape_string($conn, $_POST["comments"]);
    $createdbyuserid = mysqli_real_escape_string($conn, $userid);

    $sql = "INSERT INTO service_requests (role, skilllevel, location, skillset, duration, projectname,taskdescription,weight,comments,Created_by_userid,Submission_status,template_status,globalid, deadline, created_by,created_at,is_open_for_bidding,expired_status) VALUES ('$role', '$skilllevel', '$location','$skillset','$duration','$projectname','$taskdescription','$weight','$comments','$userid','1','0','$newglobalid', '$deadline','$username',current_timestamp,'1','0')";
  	$result = mysqli_query($conn, $sql);
    $check = mysqli_query($conn, "SELECT * FROM service_requests WHERE globalid ='$globalid' ");

  if (mysqli_num_rows($check)>0) {
          echo "<script>alert('New Service Request submitted successfully');</script>";
    } else {
          echo "<script>alert('Submission failed');</script>";
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

   <?php
	$sql = "SELECT * FROM service_requests WHERE globalid = '$globalid' AND template_status='1' "; 
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
        }
    }
    else {
        echo "<script>alert('Updated');</script>";
    }
    ?> 

    <div class="container-fluid">
        <div class="request-form-wrapper form-hide js-request-form-wrapper">
            <div class="form-head">
                <h1>Create Service Request Form from template</h1>
            </div>
            <form class="form-container js-form-container" method="post">
            <div class="form-inputs">
                <div class="form-inputs">
                    <div class="mb-3 row">
                        <label for="deadline" class="col-sm-2 col-form-label">Deadline:</label>
                        <div class="col-sm-10">
                            <input id="deadline" name="deadline" class="form-control" type="text"
                            placeholder ="Enter deadline for Project" value="<?php echo $_POST["deadline"]; ?>" required />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="projectName" class="col-sm-2 col-form-label">Project Name:</label>
                        <div class="col-sm-10">
                            <input id="projectName" name="projectName" class="form-control" type="text"
                                value="<?php print_r($field2); ?>" value="<?php echo $_POST["projectName"];?>" required />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="projectRole" class="col-sm-2 col-form-label">Project Role:</label>
                        <div class="col-sm-10">
                            <input id="projectRole" name="projectRole" class="form-control" type="text"
                            value="<?php print_r($field3); ?>" value="<?php echo $_POST["projectRole"]; ?>" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="location" class="col-sm-2 col-form-label">Location:</label>
                        <div class="col-sm-10">
                            <input id="location" name="location" class="form-control" type="text" value="<?php print_r($field4); ?>"
                                value="<?php echo $_POST["location"]; ?>" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="skilllevel" class="col-sm-2 col-form-label">Level of Expertise needed:</label>
                        <div class="col-sm-10">
                            <input id="skilllevel" name="skilllevel" class="form-control" type="text"
                            value="<?php print_r($field5); ?>" value="<?php echo $_POST["skilllevel"]; ?>" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="skillset" class="col-sm-2 col-form-label">Skill Set</label>
                        <div class="col-sm-10">
                            <input id="skillset" name="skillset" class="form-control" type="text" value="<?php print_r($field6); ?>"
                                value="<?php echo $_POST["skillset"]; ?>" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="period" class="col-sm-2 col-form-label">Time Period:</label>
                        <div class="col-sm-10">
                            <input id="period" name="period" class="form-control" type="text" value="<?php print_r($field7); ?>"
                                value="<?php echo $_POST["period"]; ?>" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="function" class="col-sm-2 col-form-label">Commercial/Functional weight:</label>
                        <div class="col-sm-10">
                            <input id="function" name="function" class="form-control" type="text" value="<?php print_r($field8); ?>"
                                value="<?php echo $_POST["function"]; ?>" />
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="taskdescription" class="col-sm-2 col-form-label">Detailed Task
                            Description:</label>
                        <div class="col-sm-10">
                            <textarea id="taskdescription" name="taskdescription" class="form-control" type="text"
                            value="<?php print_r($field9); ?>" rows="3"
                                value="<?php echo $_POST["taskdescription"]; ?>"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="comments" class="col-sm-2 col-form-label">Comments:</label>
                        <div class="col-sm-10">
                            <textarea id="comments" name="comments" class="form-control" type="text"
                            value="<?php print_r($field10); ?>" rows="3" value="<?php echo $_POST["comments"]; ?>"></textarea>
                        </div>
                    </div>
                    <div class="form-input-actions">
                        <div id="actionButtons">
                            <input type="submit" class="btn" name="push" value="Submit New Request" />
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
        </div>
    </div>

</body>
</html>

