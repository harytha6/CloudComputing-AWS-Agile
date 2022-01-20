<?php
include 'config.php';

session_start();

error_reporting(0);

$mapid = mysqli_real_escape_string($conn,$_SESSION["map_id"]);

$load = mysqli_query($conn, "SELECT * FROM map_user WHERE map_id='$mapid' ");

  if (mysqli_num_rows($load) > 0) {
	$row = mysqli_fetch_assoc($load);
    	$mapnamepre = $row['map_user_name'];
        $mapname = mysqli_real_escape_string($conn, $mapnamepre);

  } else {
    echo "<script>alert('Loading profile details not complete.');</script>";
  }

if (isset($_POST["back"])) {
  header("Location: dashboardforMAP.php");
}

if (isset($_POST["negotiate"])) {

  	$profileid = mysqli_real_escape_string($conn, $_POST["profileid"]);
	$negotiateprice = mysqli_real_escape_string($conn, $_POST["negotiateprice"]);

    //checking if price falls within range in contract
    $sqlcheck = "SELECT * FROM mapservice WHERE profileid = '$profileid' AND agreed_status = '0' AND NOT submission_status = '5' ";
  	$resultcheck = $conn-> query($sqlcheck);
    if ($resultcheck-> num_rows > 0) {
        $temprow = $resultcheck-> fetch_assoc();
        $tempskilllevel = $temprow["skilllevel"];
        $tempglobalid = $temprow["globalid"];
        $tempget = mysqli_query($conn, "SELECT * FROM service_requests WHERE globalid='$tempglobalid' AND Submission_status = '2' ");
			        if (mysqli_num_rows($tempget)>0) {
				        $temprows = mysqli_fetch_assoc($tempget);
                        $rolepre= $temprows['role'];
                        $temprole = mysqli_real_escape_string($conn,$rolepre);
                        $cyclepre = $temprows['cycle'];
                        $tempcycle = mysqli_real_escape_string($conn,$cyclepre);
                    }
                    else {
                        echo "<script>alert('Application status has changed');</script>";
                    }
                    $tempmaxpricesql = mysqli_query($conn, "SELECT * FROM map_contracts WHERE role_name = '$temprole' AND skill_level = '$tempskilllevel' AND map_username = '$mapname' AND cluster = '$tempcycle' ");
                         if (mysqli_num_rows($tempmaxpricesql)>0) {
                            $rowss = mysqli_fetch_assoc($tempmaxpricesql);
                            $tempmaxprice = $rowss["price"];
                         }
                         else {
                              echo "<script>alert('No info in Contract');</script>";
                         }
                    if($negotiateprice<= $tempmaxprice) {   
	                    $sqlfinal = "UPDATE `mapservice` SET `price` = '$negotiateprice' WHERE profileid = '$profileid' AND agreed_status = '0' AND NOT submission_status = '5' ";
	                    $resultfinal = mysqli_query($conn, $sqlfinal);	

	                    $verifyfinal = mysqli_query($conn, "SELECT * FROM mapservice WHERE profileid='$profileid' AND price = '$negotiateprice' ");
	                    if (mysqli_num_rows($verifyfinal)>0) {
			            /*  Add code to send email to MAP notifying that there has been a new negotiated price offered

                        */
   		                echo "<script>alert('Price sent for Negotiation');</script>";
  	                    } else {
    		                  echo "<script>alert('Negotiation failed');</script>";
  	                    }
                    }
                    else{
                        echo "<script>alert('Negotiation price exceeded the price allowed as per contract. Negotiation failed');</script>";                 
                    }

    }
    else {
	    echo "<script>alert('Profile not found in MAP database/ Profile Status has changed');</script>";
    }	
	
};

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="statusstyle.css">
    <title>Negotiation</title>
  </head>
<body>

<h1>Offered Prices for Profiles</h1>

<table class="content-table">
  <thead>
    <tr>
	<th>Profile ID </th>
	<th>Unique Application Number </th>
    <th>Negotiation initiated by Consumer</th>
	<th>Currently Offered Price by you </th>
	<th>Consumer Negotiated price </th>
	<th>Project Role </th>
    <th>Skill Level </th>
    <th>Cycle </th>
    <th>Deadline of Application</th>
	<th>Negotiaion possible? </th>
    <th>Maximum possible price as per contract </th>
    </tr>
  </thead>
  <tbody>
   <?php
	$sql = "SELECT * FROM mapservice WHERE currentcompany = '$mapname' AND agreed_status = '0' AND submission_status = '2' ";
  	$result = $conn-> query($sql);

    if ($result-> num_rows > 0) {	
        while ($row = $result-> fetch_assoc()) {
            		$field1 = $row["profileid"];
			        $field2 = $row["globalid"];
                    $field3 = $row["created_by"];
			        $field4 = $row["price"];
			        $field5 = $row["negotiateprice"];
                    $field7pre = $row["skilllevel"];
                    $field7 = mysqli_real_escape_string($conn,$field7pre);
			        $field2post = mysqli_real_escape_string($conn,$field2);
			        $roleverify = mysqli_query($conn, "SELECT * FROM service_requests WHERE globalid='$field2post' AND Submission_status = '2' AND expired_status = '0' ");
			        if (mysqli_num_rows($roleverify)>0) {
				        $rows = mysqli_fetch_assoc($roleverify);
    				    $field6pre = $rows['role'];
                        $field6 = mysqli_real_escape_string($conn,$field6pre);
                        $field8pre = $rows['cycle'];
                        $field8 = mysqli_real_escape_string($conn,$field8pre);
                        $field9 = $rows['deadline'];
				        $field10 = "Can Negotiate";
                        $maxpricesql = mysqli_query($conn, "SELECT * FROM map_contracts WHERE role_name = '$field6' AND skill_level = '$field7' AND map_username = '$mapname' AND cluster = '$field8' ");
                         if (mysqli_num_rows($maxpricesql)>0) {
                            $rowss = mysqli_fetch_assoc($maxpricesql);
                            $field11 = $rowss["price"];
                         }
                         else {
                              $field11 = "No info in Contract";
                         }
  				    } else {
					    $field6 = "N/A";
                        $field8 = "N/A";
                        $field9 = "N/A";
					    $field10 = "Cannot Negotiate";
                        $field11 = "N/A in contract";
    					//echo "<script>alert('The Application or Profile you are looking for is no longer available');</script>";
  		  
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
                    </tr>';
                                
                    "<br>";
	    }
	
	    $result->free();
	    $roleverify->free();

        //echo "</table>";
    }
    else {
        echo "0 results";
    }
    ?>
        
  </tbody>
</table>

<h1>Negotiate Price</h1>
	
	<form class="form-container js-form-container" method="post">
            <!-- No id should be same. Change / replace at all occurrences -->
            <div class="form-inputs">
                <div class="mb-3 row">
                    <label for="profilelid" class="col-sm-2 col-form-label">Profile ID (from above):</label>
                    <div class="col-sm-10">
                        <input id="profileid" name="profileid" class="form-control" type="text" placeholder="Enter Profile ID" value="<?php echo $_POST["profileid"]; ?>" required />
                    </div>
                </div>
		<div class="mb-3 row">
                    <label for="negotiateprice" class="col-sm-2 col-form-label"> Negotiate Price for (in Euro):</label>
                    <div class="col-sm-10">
                        <input id="negotiateprice" name="negotiateprice" class="form-control" type="text" placeholder="Enter the price (without ',') to enter into negotiation with MAP" value="<?php echo $_POST["negotiateprice"]; ?>" required />
                    </div>
                </div>
		<div class="form-input-actions">                
                    <div id="actionButtons">
                        <input type="submit" class="btn" name="negotiate" value="Negotiate" />
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


