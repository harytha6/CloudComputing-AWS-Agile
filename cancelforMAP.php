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
  if (isset($_POST["cancel"])) {
  $globalid = mysqli_real_escape_string($conn, $_POST["globalid"]);
 
  $sql = "UPDATE `mapservice` SET `submission_status`='5' WHERE globalid='$globalid' ";
  $result = mysqli_query($conn, $sql);
  $verify = mysqli_query($conn, "SELECT * FROM `mapservice` WHERE `globalid`='$globalid' AND `submission_status`='5'");  
  if (mysqli_num_rows($verify)>0) {
       echo "<script>alert('Request Cancelled');
       window.location = 'dashboardforMAP.php';
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
        <th>Language </th>
        <th>Comments</th>
  <th>Offered Price </th>
  <th>Profile uploaded on </th>
  <th>Submission status </th>
    </tr>
  </thead>
  <tbody>
   <?php
  $sql2 = "SELECT * FROM mapservice"; 
  
      $result2 = $conn-> query($sql2);

    if ($result2-> num_rows > 0) {
        while ($row = $result2-> fetch_assoc()) {
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
      $field12 = $row["submission_status"];
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
  $result2->free();
        //echo "</table>";
    }
    else {
        echo "0 results";
    }
    ?>
        
  </tbody>
</table>

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

