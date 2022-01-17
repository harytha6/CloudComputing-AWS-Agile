<?php
include 'config.php';

session_start();

error_reporting(0);

$mapid = mysqli_real_escape_string($conn,$_SESSION["map_id"]);

$load = mysqli_query($conn, "SELECT * FROM map_user WHERE map_id='$mapid' ");

  if (mysqli_num_rows($load) > 0) {
	$row = mysqli_fetch_assoc($load);
    	$mapnamepre = $row['map_user_name'];
        $mapname = mysqli_real_escape_string ($conn,$mapnamepre);
  } else {
    echo "<script>alert('Loading profile details not complete.');</script>";
  }
  if (isset($_POST["back"])) {
  header("Location: dashboardforMAP.php");
  }
  if (isset($_POST["upload"])) {
   
    $globalid = mysqli_real_escape_string ($conn,$_POST["globalid"]);
    $getdetails = mysqli_query($conn, "SELECT * FROM service_requests WHERE globalid ='$globalid' AND expired_status= '0' ");
    if (mysqli_num_rows($getdetails)>0) {
        $getrow = mysqli_fetch_assoc($getdetails);
            $temprole= $getrow['role'];
            $tempskilllevel= $getrow['skilllevel'];
            $tempcycle= $getrow['cycle'];
        } else {
            echo "<script>alert('No Application found / Application status changed ');</script>";
        }

  $mapnamenew = mysqli_real_escape_string ($conn, $mapname);
  $employeename = mysqli_real_escape_string($conn, $_POST["employeename"]);
  $employeeid = mysqli_real_escape_string($conn, $_POST["employeeid"]);
  $location = mysqli_real_escape_string($conn, $_POST["location"]);
  $skilllevel = mysqli_real_escape_string($conn, $_POST["skilllevel"]);
  $skillset = mysqli_real_escape_string($conn, $_POST["skillset"]);
  $duration = mysqli_real_escape_string($conn, $_POST["duration"]);
  $language = mysqli_real_escape_string($conn, $_POST["language"]);
  $comments = mysqli_real_escape_string($conn, $_POST["comments"]);
  $price = mysqli_real_escape_string($conn, $_POST["price"]);

  $pricesql = mysqli_query($conn, "SELECT * FROM map_contracts WHERE role_name = '$temprole' AND skill_level = '$tempskilllevel' AND map_username = '$mapname' AND cluster = '$tempcycle' ");
                         if (mysqli_num_rows($pricesql)>0) {
                            $rowss = mysqli_fetch_assoc($pricesql);
                            $maxprice = $rowss["price"];
                         }
                         else {
                            echo "<script>alert('No information in contract');</script>";
                         }
    if($price<=$maxprice){
            $sql = "INSERT INTO `mapservice` (globalid, employeename, location, skilllevel, skillset, submission_status, bid_status, agreed_status, durationavailablefor, currentcompany, language, comments, price, employeeid) VALUES ('$globalid','$employeename', '$location', '$skilllevel','$skillset','2','0','0','$duration','$mapnamenew','$language','$comments','$price','$employeeid')";
            $result = mysqli_query($conn, $sql);
            $check = mysqli_query($conn, "SELECT * FROM mapservice WHERE globalid ='$globalidd' AND submission_status= '2' AND employeeid = '$employeeid' ");
            if (mysqli_num_rows($check)>0) {
                echo "<script>alert('Profile uploaded successfully');
                window.location = 'dashboardforMAP.php';
                </script>";
            } else {
                echo "<script>alert('Upload failed');</script>";
            }
            $sql = "UPDATE `service_requests` SET `Submission_status` = '2' WHERE globalid = '$globalid' ";
            $result = mysqli_query($conn, $sql);
            $verify = mysqli_query($conn, "SELECT * FROM service_requests WHERE globalid='$globalid' AND Submission_status = '2'  ");
	            if (mysqli_num_rows($verify)>0) {
   		            //echo "<script>alert('Profile selected');</script>";
  	            } else {
    		        echo "<script>alert('Upload will not be reflected on Consumer side');</script>";
  	            }
    }
     else {
                echo "<script>alert('Price exceeded price in contract');</script>";
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
  			            <th>Unique Application Number </th>
                        <th>Project Name</th>
                        <th>Project Role</th>
                        <th>Location</th>
                        <th>Level of Expertise</th>
                        <th>Skill Set</th>
                        <th>Time Period</th>
                        <th>Commercial/Functional weight</th>
                        <th>Detailed Task Description</th>
					    <th>Comments</th>
                        <th>Submission_Status</th>
                        <th>Cycle</th>
			            <th>Deadline</th>
                        <th> Max price as per contract </th>
    </tr>
  </thead>
  <tbody>
   <?php
  $sql = "SELECT * FROM service_requests WHERE cycle = '2' AND expired_status = '0' ";
  
      $result = $conn-> query($sql);

    if ($result-> num_rows > 0) {
        while ($introw = $result-> fetch_assoc()) {
                        $field0 = $introw["globalid"];
                        $field1 = $introw["projectname"];
                        $field2 = $introw["role"];
                        $temprole = mysqli_real_escape_string ($conn, $field2);
                        $field3 = $introw["location"];
                        $field4 = $introw["skilllevel"];
                        $tempskilllevel = mysqli_real_escape_string ($conn, $field4);
                        $field5 = $introw["skillset"];
                        $field6 = $introw["duration"];
                        $field7 = $introw["weight"];
                        $field8 = $introw["taskdescription"];
						$field9 = $introw["comments"];
						$field11 = $introw["cycle"];
                        $tempcycle = mysqli_real_escape_string ($conn, $field11);
						$field12 = $introw["deadline_new"];
                        $visiblesql = mysqli_query($conn, "SELECT * FROM map_contracts WHERE role_name = '$temprole' AND skill_level = '$tempskilllevel' AND map_username = '$mapname' AND cluster = '$tempcycle' ");
                         if (mysqli_num_rows($visiblesql)>0) {
                            $rowss = mysqli_fetch_assoc($visiblesql);
                            $field13 = $rowss["price"];
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
                                <td>'.$field13.'</td>
                            </tr>';
                                
                            "<br>";
                         }
                         else {
                              //echo nothing; 
                         }
                    
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
                    <label for="globalid" class="col-sm-2 col-form-label">Unique Application Number (from above):</label>
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
                        <input id="employeeid" name="employeeid" class="form-control" type="text" placeholder="Enter the Employee ID" value="<?php echo $_POST["employeeid"]; ?>" required />
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
                    <label for="duration" class="col-sm-2 col-form-label">Duration available for:</label>
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
                        <input type="submit" class="btn" name="upload" value="Upload Profile for 2nd cycle" />
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