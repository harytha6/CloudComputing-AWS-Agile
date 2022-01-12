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
    $profileid = mysqli_real_escape_string($conn, $_POST["profileid"]);
    check = mysqli_query($conn, "SELECT * FROM mapservice WHERE profileid ='$profileid' ");
    if (mysqli_num_rows($check)>0) {
        $row = mysqli_fetch_assoc($check);
            $globalid = $row['globalid'];
        } else {
            echo "<script>alert('No Application number found ');</script>";
        }
  $globalid = mysqli_real_escape_string($conn, $_POST["globalid"]);
  $employeename = mysqli_real_escape_string($conn, $_POST["employeename"]);
  $employeeid = mysqli_real_escape_string($conn, $_POST["employeeid"]);
  $location = mysqli_real_escape_string($conn, $_POST["location"]);
  $skilllevel = mysqli_real_escape_string($conn, $_POST["skilllevel"]);
  $skillset = mysqli_real_escape_string($conn, $_POST["skillset"]);
  $duration = mysqli_real_escape_string($conn, $_POST["period"]);
  $language = mysqli_real_escape_string($conn, $_POST["language"]);
  $comments = mysqli_real_escape_string($conn, $_POST["comments"]);
  $price = mysqli_real_escape_string($conn, $_POST["price"]);
  

    $sql = "INSERT INTO mapservice (globalid, employeename, location, skilllevel, skillset, submission_status, bid_status, agreed_status, durationavailablefor, currentcompany, language, comments,price,employeeid) VALUES ('$globalid','$employeename', '$location', '$skilllevel','$skillset','2','0','0','$duration','$mapname','$language','$comments','$price','$employeeid')";
$result = mysqli_query($conn, $sql);
$check = mysqli_query($conn, "SELECT * FROM mapservice WHERE globalid ='$globalid' AND employeeid= '$employeeid' ");

  }
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
        <th>Language </th>
        <th>Comments</th>
  <th>Offered Price </th>
  <th>Profile uploaded on </th>
    </tr>
  </thead>
  <tbody>
   <?php
  $sql = "SELECT * FROM mapservice WHERE agreed_status = '0'"; 
  
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
  
  <form class="form-container js-form-container" method="post">
            <!-- No id should be same. Change / replace at all occurrences -->
            <div class="form-inputs">
                <div class="mb-3 row">
                    <label for="profileid" class="col-sm-2 col-form-label">Profile ID:</label>
                    <div class="col-sm-10">
                        <input id="profileid" name="profileid" class="form-control" type="text" placeholder="Profile ID" value="<?php echo $_POST["profileid"]; ?>" required />
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