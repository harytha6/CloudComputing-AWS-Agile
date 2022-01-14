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
  
  if (isset($_POST["save"])) {

    $role = mysqli_real_escape_string($conn, $_POST["projectRole"]);
    $skilllevel = mysqli_real_escape_string($conn, $_POST["skilllevel"]);
    $location = mysqli_real_escape_string($conn, $_POST["location"]);
    $skillset = mysqli_real_escape_string($conn, $_POST["skillset"]);
    $duration = mysqli_real_escape_string($conn, $_POST["period"]);
    $projectname = mysqli_real_escape_string($conn, $_POST["projectName"]);
    $taskdescription = mysqli_real_escape_string($conn, $_POST["taskdescription"]);
    $weight = mysqli_real_escape_string($conn, $_POST["function"]);
    $comments = mysqli_real_escape_string($conn, $_POST["comments"]);
    $createdbyuserid = $_SESSION["user_id"];
    $globalid = rand(1000,5000);
  
  
      $sql = "INSERT INTO service_requests (role, skilllevel, location, skillset, duration, projectname,taskdescription,weight,comments,Created_by_userid,created_at,is_open_for_bidding,cycle,Submission_status,created_by,globalid) VALUES ('$role', '$skilllevel', '$location','$skillset','$duration','$projectname','$taskdescription','$weight','$comments','$createdbyuserid',current_timestamp,'1','1','0','$username','$globalid')";
     // $sql = "INSERT INTO service_requests (id, role, skilllevel, location, skillset, duration, projectname,taskdescription,weight) VALUES ('1001', 'fgu', '2', 'fytfy','ghg','hh','yg','guh','hjh')";    
$result = mysqli_query($conn, $sql);
$check = mysqli_query($conn, "SELECT id FROM service_requests WHERE globalid = '$globalid' AND Submission_status = '0'");

if (mysqli_num_rows($check)>0) {
    echo "<script>alert('Request submitted successfully');</script>";
  } else {
    echo "<script>alert('Submission failed');</script>";
  }
};