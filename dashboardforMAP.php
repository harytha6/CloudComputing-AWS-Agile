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

/*if (isset($_POST["submit"])) {

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


    $sql = "INSERT INTO service_requests (role, skilllevel, location, skillset, duration, projectname,taskdescription,weight,comments,Created_by_userid,created_at,is_open_for_bidding,cycle,Submission_status) VALUES ('$role', '$skilllevel', '$location','$skillset','$duration','$projectname','$taskdescription','$weight','$comments','$createdbyuserid',current_timestamp,'1','1','1')";
   // $sql = "INSERT INTO service_requests (id, role, skilllevel, location, skillset, duration, projectname,taskdescription,weight) VALUES ('1001', 'fgu', '2', 'fytfy','ghg','hh','yg','guh','hjh')";    
$result = mysqli_query($conn, $sql);
$check = mysqli_query($conn, "SELECT id FROM service_requests WHERE id>='1002' ");

if (mysqli_num_rows($check)>0) {
    echo "<script>alert('Request submitted successfully');</script>";
  } else {
    echo "<script>alert('Submission failed');</script>";
  }
};*/

?>
<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous"> 


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAP Portal</title>
    <!-- insert stylesheets here -->

    <style>
        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 90px 0 0;
            box-shadow: inset -1px 0 0 rgba(250, 4, 4, 0.1);
            z-index: 99;
        }

        @media (max-width: 767.98px) {
            .sidebar {
                top: 11.5rem;
                padding: 0;
            }
        }
            
        .navbar {
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .1);
        }

        @media (min-width: 767.98px) {
            .navbar {
                top: 0;
                position: sticky;
                z-index: 999;
            }
        }

        .sidebar .nav-link {
            color: #333;
        }

        .sidebar .nav-link.active {
            color: #0d6efd;
        }

        .sidebar .nav-link:hover {
            background-color: aquamarine;
        }

        .request-form-wrapper {
            height: 100%;
            width: 100%;
            position: fixed;
            left: 0;
            top: 0;
            background-color: white;
            z-index: 999;
            padding: 16px 32px;
            transition: transform .5s ease;
            transform: translateX(0);
        }

        .request-form-wrapper.form-hide {
            transform: translateX(110%);
        }

        .form-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 8px;
            border-bottom: 1px solid #ced4da;
        }

        .form-inputs {
            padding-top: 12px;
        }
                
        .form-input-actions {
            margin-top: 12px;
            display: flex;
            justify-content: flex-end;
        }

        .btn-mobile {
            display: none;
        }

        @media only screen and (max-width: 600px) {
            .request-form-wrapper {
                padding: 16px 18px;
                transition: transform .5s ease;
                transform: translateY(0);
            }

            .request-form-wrapper.form-hide {
                transform: translateY(110%);
            }

            .form__title {
                font-size: 24px;
            }

            .btn-desktop {
                display: none;
            }

            .btn-mobile {
                display: block;
            }
        }

        .req_service_wrapper{
            margin-top:20px;
        }

        .req_service_table{
            width:100%;
        }

        .req_service_head{
            border-bottom: 1px solid #ccc!important;
        }

        .req_service_head th{
            padding-bottom:20px;
        }

        .req_service_body{
            border-bottom: 1px solid #ccc!important;
        }

        .req_service_body td{
            padding:20px 0 20px 0;
        }
    </style>
</head>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

<body>	

    <nav class="navbar navbar-light bg-light p-3">
  <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
      <a class="navbar-brand" href="#">
          MAP Dashboard
      </a>
      <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
  </div>
  <div class="col-12 col-md-4 col-lg-2">
      <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search">
  </div>
  <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">

      <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
            Hello, <?php echo $mapname ?>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Messages</a></li>
            <li><a class="dropdown-item" class="nav-link" href="logout.php">Sign out</a></li>
          </ul>
        </div>
  </div>
</nav>
<div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                            <span class="ml-2">Dashboard</span>
                          </a>
                        
                        <li class="nav-item">
                          <a class="nav-link" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                            <span class="ml-2">Service Requests & Status</span>
                          </a>
                        </li>
                        <li class="nav-item js-service-request-form">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                                <span class="ml-2">Upload Profiles</span>
                            </a>
                        </li>
                        <li class="nav-item js-service-request-form">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                                <span class="ml-2">Q&A</span>
                            </a>
                        </li>
                       </ul>
                </div>
            </nav>
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Overview</li>
                    </ol>
                </nav>
                 <h1 class="h2">Dashboard</h1>
		 <p> This is the homepage of <?php echo $mapname ?> </p> 
            </main>
        </div>
    </div>
</body>
</html>
  