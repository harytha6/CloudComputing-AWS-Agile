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

  //update expired_status for first cycle
$datesql = "SELECT * FROM service_requests WHERE deadline < cast(now() as date) AND cycle = '1' ";
$dateresult = $conn->query($datesql);
		if ($dateresult->num_rows > 0) {
			 while($row = $dateresult->fetch_assoc()) {
			    $globalidtoupdate =  mysqli_real_escape_string($conn, $row["globalid"]) ;
				$updatesql = "UPDATE `service_requests` SET `expired_status` = '1' WHERE `globalid` = '$globalidtoupdate' ";
				$updateresult = mysqli_query($conn, $updatesql);
			}			
		}
 //update expired_status for second cycle
$datesql2 = "SELECT * FROM service_requests WHERE deadline_new < cast(now() as date) AND cycle = '2'  ";
$dateresult2 = $conn->query($datesql2);
		if ($dateresult2->num_rows > 0) {
			 while($row = $dateresult2->fetch_assoc()) {
				$globalidtoupdate =  mysqli_real_escape_string($conn, $row["globalid"]) ;
				$updatesql = "UPDATE `service_requests` SET `expired_status` = '1' WHERE `globalid` = '$globalidtoupdate' ";
				$updateresult = mysqli_query($conn, $updatesql);
			}			
		};

  header("Location: dashboardforMAP.php");
?>



