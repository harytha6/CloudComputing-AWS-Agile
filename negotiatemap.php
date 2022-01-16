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

if (isset($_POST["negotiate"])) {

  	$profileid = mysqli_real_escape_string($conn, $_POST["profileid"]);
    $globalid = mysqli_real_escape_string($conn, $_POST["globalid"]);
	$negotiateprice = mysqli_real_escape_string($conn, $_POST["negotiateprice"]);
	$sql = "UPDATE `service_requests` SET `negotiateprice` = '$negotiateprice' WHERE globalid = '$globalid' ";
	$result = mysqli_query($conn, $sql);	

	$verify = mysqli_query($conn, "SELECT * FROM service_requests WHERE globalid='$globalid' AND negotiateprice = '$negotiateprice'");
	if (mysqli_num_rows($verify)>0) {
			/*  Add code to send email to MAP notifying that there has been a new negotiated price offered

*/
   		 echo "<script>alert('Price sent for Negotiation');</script>";
  	} else {
    		echo "<script>alert('Negotiation failed');</script>";
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
      	<th>Negotiation initiated by</th>
	<th>Currently Offered Price by MAP </th>
	<th>Consumer Negotiated price </th>
	<th>Project Role </th>
	<th>Negotiaion possible? </th>
  <th>Your Negotiated price </th>
    </tr>
  </thead>
  <tbody>
   <?php
	$sql = "SELECT * FROM mapservice WHERE currentcompany = '$mapname' AND agreed_status = '0' ";
  	$result = $conn-> query($sql);

    if ($result-> num_rows > 0) {	
        while ($row = $result-> fetch_assoc()) {
            		$field1 = $row["profileid"];
			$field2 = $row["globalid"];
                        $field3 = $row["created_by"];
			$field4 = $row["price"];
			$field5 = $row["negotiateprice"];
			$field2post = mysqli_real_escape_string($conn,$field2);
			$roleverify = mysqli_query($conn, "SELECT * FROM service_requests WHERE globalid='$field2post' AND NOT Submission_status = '3,4,5' ");
			if (mysqli_num_rows($roleverify)>0) {
				$rows = mysqli_fetch_assoc($roleverify);
    				$field6 = $rows['role'];
				$field7 = "Can Negotiate";
        $field8 = $rows["negotiateprice"];
  				} else {
					$field6 = "N/A";
					$field7 = "Cannot Negotiate. Profile already appointed to other Consumers or Cancelled by MAP";
    					//echo "<script>alert('The Application or Profile you are looking for is no longer available');</script>";
              $field8 = "N/A";   
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
                    <label for="globalid" class="col-sm-2 col-form-label">Global ID:</label>
                    <div class="col-sm-10">
                        <input id="globalid" name="globalid" class="form-control" type="text" placeholder="Enter the Global ID for whom to negotiate price" value="<?php echo $_POST["globalid"]; ?>" required />
                    </div>
                </div>
		<div class="mb-3 row">
                    <label for="negotiateprice" class="col-sm-2 col-form-label"> Negotiate Price for (in Euro):</label>
                    <div class="col-sm-10">
                        <input id="negotiateprice" name="negotiateprice" class="form-control" type="text" placeholder="Enter the price (without comma, dot) to enter into negotiation with MAP" value="<?php echo $_POST["negotiateprice"]; ?>" required />
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


