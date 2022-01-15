<?php
include 'config.php';

session_start();

error_reporting(0);

$mapid = mysqli_real_escape_string($conn,$_SESSION["map_id"]);

$load = mysqli_query($conn, "SELECT * FROM maplogin WHERE id='$mapid' ");

  if (mysqli_num_rows($load) > 0) {
	$row = mysqli_fetch_assoc($load);
    	$mapname = $row['full_name'];
  } else {
    echo "<script>alert('Loading profile details not complete.');</script>";
  }
  if (isset($_POST["back"])) {
  header("Location: dashboardforMAP.php");
  }
  if (isset($_POST["upload"])) {
   /* $profileid = mysqli_real_escape_string($conn, $_POST["profileid"]);
    $check = mysqli_query($conn, "SELECT * FROM mapservice WHERE profileid ='$profileid' ");
    if (mysqli_num_rows($check)>0) {
        $row = mysqli_fetch_assoc($check);
            $globalid = $row['globalid'];
        } else {
            echo "<script>alert('No Application number found ');</script>";
        }*/
  //$globalid = mysqli_real_escape_string($conn, $_POST["globalid"]);
  $globalid = mysqli_real_escape_string ($conn,$_POST["globalid"]);
  $mapnamenew = mysqli_real_escape_string ($conn, $mapname);
  $employeename = mysqli_real_escape_string($conn, $_POST["employeename"]);
  $employeeid = mysqli_real_escape_string($conn, $_POST["employeeid"]);
  $location = mysqli_real_escape_string($conn, $_POST["location"]);
  $skilllevel = mysqli_real_escape_string($conn, $_POST["skilllevel"]);
  $skillset = mysqli_real_escape_string($conn, $_POST["skillset"]);
  $duration = mysqli_real_escape_string($conn, $_POST["period"]);
  $language = mysqli_real_escape_string($conn, $_POST["language"]);
  $comments = mysqli_real_escape_string($conn, $_POST["comments"]);
  $price = mysqli_real_escape_string($conn, $_POST["price"]);
   
    $sql = "INSERT INTO `mapservice` (globalid, employeename, location, skilllevel, skillset, submission_status, bid_status, agreed_status, durationavailablefor, currentcompany, language, comments, price, employeeid) VALUES ('$globalid','$employeename', '$location', '$skilllevel','$skillset','2','0','0','$duration','$mapnamenew','$language','$comments','$price','$employeeid')";
     
$result = mysqli_query($conn, $sql);
$check = mysqli_query($conn, "SELECT * FROM mapservice WHERE globalid ='$globalidd' AND submission_status= '2' ");

if (mysqli_num_rows($check)>0) {
 echo "<script>alert('Profile uploaded successfully');
  window.location = 'dashboardforMAP.php';
       </script>";
  } else {
    echo "<script>alert('Upload failed');</script>";
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

<h1>Service Requests in the Second Cycle</h1>

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
      $field12 = $row["globalid"];
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
  
  <form class="form-container js-form-container" method="post">
            <!-- No id should be same. Change / replace at all occurrences -->
            <div class="form-inputs">
                <div class="mb-3 row">
                    <label for="globalid" class="col-sm-2 col-form-label">Global ID:</label>
                    <div class="col-sm-10">
                        <input id="globalid" name="globalid" class="form-control" type="text" value="<?php echo $_POST["globalid"]; ?>" required />
                    </div>
                </div>
            
                <div class="mb-3 row">
                    <label for="profileid" class="col-sm-2 col-form-label">Employee Name:</label>
                    <div class="col-sm-10">
                        <input id="employeename" name="employeename" class="form-control" type="text" placeholder="Enter the Employee name" value="<?php echo $_POST["employeename"]; ?>"  />
                    </div>
                </div>
            
                <div class="mb-3 row">
                    <label for="employeeid" class="col-sm-2 col-form-label">Employee ID:</label>
                    <div class="col-sm-10">
                        <input id="employeeid" name="employeeid" class="form-control" type="text" placeholder="Enter the Employee ID" value="<?php echo $_POST["employeeid"]; ?>"  />
                    </div>
                </div>
            
                <div class="mb-3 row">
                    <label for="location" class="col-sm-2 col-form-label">Location:</label>
                    <div class="col-sm-10">
                        <input id="location" name="location" class="form-control" type="text" placeholder="Enter the location" value="<?php echo $_POST["location"]; ?>"  />
                    </div>
                </div>
            
                <div class="mb-3 row">
                    <label for="skilllevel" class="col-sm-2 col-form-label">Skill Level:</label>
                    <div class="col-sm-10">
                        <input id="skilllevel" name="skilllevel" class="form-control" type="text" placeholder="Enter the Skill Level" value="<?php echo $_POST["skilllevel"]; ?>"  />
                    </div>
                </div>
            
                <div class="mb-3 row">
                    <label for="skillset" class="col-sm-2 col-form-label">Skillset:</label>
                    <div class="col-sm-10">
                        <input id="skillset" name="skillset" class="form-control" type="text" placeholder="Enter the Skillset" value="<?php echo $_POST["skillset"]; ?>" />
                    </div>
                </div>
             
                <div class="mb-3 row">
                    <label for="duration" class="col-sm-2 col-form-label">Duration:</label>
                    <div class="col-sm-10">
                        <input id="duration" name="duration" class="form-control" type="text" placeholder="Enter the Duration" value="<?php echo $_POST["duration"]; ?>" />
                    </div>
                </div>
              
                <div class="mb-3 row">
                    <label for="language" class="col-sm-2 col-form-label">Language:</label>
                    <div class="col-sm-10">
                        <input id="language" name="language" class="form-control" type="text" placeholder="Enter the Language" value="<?php echo $_POST["language"]; ?>" />
                    </div>
                </div>
              
                <div class="mb-3 row">
                    <label for="comments" class="col-sm-2 col-form-label">Comments:</label>
                    <div class="col-sm-10">
                        <input id="comments" name="comments" class="form-control" type="text" placeholder="Enter the Comments" value="<?php echo $_POST["comments"]; ?>" />
                    </div>
                </div>                           
              
                <div class="mb-3 row">
                    <label for="price" class="col-sm-2 col-form-label">Price:</label>
                    <div class="col-sm-10">
                        <input id="price" name="price" class="form-control" type="text" placeholder="Enter the price" value="<?php echo $_POST["price"]; ?>" />
                    </div>
                </div>  
    <div class="form-input-actions">                
                    <div id="actionButtons">
                        <input type="submit" class="btn" name="upload" value="Upload another Profile" />
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