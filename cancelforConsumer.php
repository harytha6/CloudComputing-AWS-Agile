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
  if (isset($_POST["cancel"])) {
  $globalid = mysqli_real_escape_string($conn, $_POST["globalid"]);
 
  $sql = "UPDATE `service_requests` SET `Submission_status`='5' WHERE globalid='$globalid' ";
  $result = mysqli_query($conn, $sql);
  $verify = mysqli_query($conn, "SELECT * FROM `service_requests` WHERE `globalid`='$globalid' AND `Submission_status`='5'");  
  if (mysqli_num_rows($verify)>0) {
       echo "<script> alert('Request Cancelled');
       window.location = 'dashboard.php';
       </script>";
       
    } else {
        echo "<script>alert('Request cancellation failed');</script>";
    }

  }
?>



<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="statusstyle.css">
    <title> Requested Services</title>
  </head>
<body>

<h1>Requested Services</h1>

<table class="content-table">
            <thead>
                    <tr>
                        <th>Project Name</th>
                        <th>Project Role</th>
                        <th>Location</th>
                        <th>Level of Expertise</th>
                        <th>Skill Set</th>
                        <th>Time Period</th>
                        <th>Commercial/Functional weight</th>
                        <th>Detailed Task Description</th>
                        <th>Consumer name</th>
                        <th>Status</th>
                        <th>Cycle</th>
                        <th>Unique Application Number </th>
                        <!--<th>Action</th>-->
                    </tr>
            </thead>
            <tbody>        
                <!--
                <tr class="req_service_head">
                    <th style="width: 50px;">No.</th>
                    <th>Project Name</th>
                    <th>Project Role</th>
                    <th>Location</th>
                    <th>Level of Expertise</th>
                    <th>Skill Set</th>
                    <th>Time Period</th>
                    <th>Commercial/Functional weight</th>
                    <th>Detailed Task Description</th>
                    <th>Comments</th>
                </tr>
                -->
                <?php
                $sql2 = "SELECT * FROM service_requests WHERE NOT Submission_status = '0' ";
                
                $result2 = $conn->query($sql2);

                if ($result2->num_rows > 0) {

                    

                    while($row = $result2->fetch_assoc()) {
                        $field1 = $row["projectname"];
                        $field2 = $row["role"];
                        $field3 = $row["location"];
                        $field4 = $row["skilllevel"];
                        $field5 = $row["skillset"];
                        $field6 = $row["duration"];
                        $field7 = $row["weight"];
                        $field8 = $row["taskdescription"];
                        $field9 = $row["created_by"];
                        $field11 = $row["globalid"];
                        $field12 = $row["cycle"];                        
                        

                        switch($row["Submission_status"]) {
                          
                            case 0:
                                $field10 = "In Creation/Saved for Later";
                                break;
                            case 1:
                                $field10 = "Requested";
                                break;
                            case 2:
                                $field10 = "Profile Uploaded";
                                break;
                            case 3:
                                $field10 = "Appointed";
                                break;
                            case 4:
                                $field10 = "Evaluated";
                                break;
                            case 5:
                                $field10 = "Cancelled";
                                break;
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
                                <td>'.$field12.'</td>
                                <td>'.$field11.'</td>
                                
                            </tr>';
                                //<td> <button class="btn_upload_profile" > Upload Profile </button> </td>
                                "<br>";
                    }

                    $result2->free();
                }
                else{
                    echo "0 results";
                }
                ?>
             </tbody>
    </table>
        </div>
    </div>

  <h1>Cancel Request</h1>
  
  <form class="form-container js-form-container" method="post">
            <!-- No id should be same. Change / replace at all occurrences -->
            <div class="form-inputs">
                <div class="mb-3 row">
                    <label for="globalid" class="col-sm-2 col-form-label">Enter Unique Application Number to Cancel:</label>
                    <div class="col-sm-10">
                        <input id="gloablid" name="globalid" class="form-control" type="text" placeholder="Application Number" value="<?php echo $_POST["globalid"]; ?>" required />
                    </div>
                </div>
    <div class="form-input-actions">                
                    <div id="actionButtons">
                        <input type="submit" class="btn" name="cancel" value="Cancel Request" />
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