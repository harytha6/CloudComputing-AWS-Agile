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
  </head>
<body>

 <div class="request-form-wrapper req_ser form-hide">
        <div class="form-head">
            <h1 class="display-6 form__title">Requested Services</h1>
            <!--<button class="btn btn-dark js-request-form-close btn-desktop" onclick="closeReqServ()">Close</button>
            <button class="btn-sm btn-dark req_ser_close js-request-form-close btn-mobile">Close</button>-->
        </div>
        <div class="req_service_wrapper">
            <table class="req_service_table">
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

                <tr class="req_service_body">
                <?php
                $sql2 = "SELECT * FROM service_requests";
                
                $result2 = $conn->query($sql2);

                if ($result2->num_rows > 0) {

                    echo '<table border="0" cellspacing="2" cellpadding="20">
                    <tr class="req_service_head">
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
      <th>Unique Application Number </th>
                        <th>Action</th>
                    </tr>';

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
                        

                        switch($row["Submission_status"]) {
                          
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
                                <td> <button class="btn_upload_profile" > Upload Profile </button> </td>
                            </tr>';
                                
                                "<br>";
                    }

                    $result2->free();
                }
                else{
                    echo "0 results";
                }
                ?>
                </tr>
            </table>
        </div>
    </div>

  <h1>Cancel Request</h1>
  
  <form class="form-container js-form-container" method="post">
            <!-- No id should be same. Change / replace at all occurrences -->
            <div class="form-inputs">
                <div class="mb-3 row">
                    <label for="globalid" class="col-sm-2 col-form-label">Global ID:</label>
                    <div class="col-sm-10">
                        <input id="gloablid" name="globalid" class="form-control" type="text" placeholder="Enter the Application Number to cancel the request" value="<?php echo $_POST["globalid"]; ?>" required />
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