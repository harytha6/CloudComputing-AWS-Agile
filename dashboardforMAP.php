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

if (isset($_POST["upload"])) {

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

if (mysqli_num_rows($check)>0) {
	$status = mysqli_query($conn, "SELECT * FROM service_request WHERE globalid='$globaid' ");
    	$row = mysqli_fetch_assoc($status);
    	$username = $row['created_by'];
	$profileid = $row['profileid'];
	$statusupdate = mysqli_query($conn, "UPDATE `mapservice` SET `created_by` = '$username' WHERE profileid = '$profileid' ");
    echo "<script>alert('Profile uploaded successfully');</script>";
  } else {
    echo "<script>alert('Upload failed');</script>";
  }
};

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
            overflow: scroll;
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
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="javascript:OpenReSer();">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                            <span class="ml-2">Requested Services & Status</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="qa.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                            <span class="ml-2">Q&A</span>
                          </a>
                        </li>
                        <li class="nav-item js-service-request-form">
                            <a class="nav-link" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                                <span class="ml-2"> Upload Profiles </span>
                            </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="exchange.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                            <span class="ml-2">Exchange Profile</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="offermultipleprofiles.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                            <span class="ml-2">Offer Multiple Profiles</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="cancelforMAP.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                            <span class="ml-2">Cancel Request</span>
                          </a>
                        </li>
                        <li class="nav-item js-service-request-form">
                            <a class="nav-link" href="negotiatemap.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
                                <span class="ml-2"> Negotiation </span>
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
                <p>This is the homepage of <?php echo $mapname ?> </p>
            </main>
        </div>
    </div>

    <!-- Upload Profile form -->
    <div class="request-form-wrapper form-hide js-request-form-wrapper">
        <div class="form-head">
            <h1 class="display-6 form__title">Profile Upload Form</h1>
            <button class="btn btn-dark js-request-form-close btn-desktop">Close</button>
            <button class="btn-sm btn-dark js-request-form-close btn-mobile">Close</button>
        </div>
        <form class="form-container js-form-container" method="post">
            <!-- No id should be same. Change / replace at all occurrences -->
            <div class="form-inputs">
		<div class="mb-3 row">
                    <label for="globalid" class="col-sm-2 col-form-label">Unique Application Number:</label>
                    <div class="col-sm-10">
                        <input id="globalid" name="globalid" class="form-control" type="text" placeholder="Copy the Unique Application Number for the desired Request from 'Requested Services' section and paste it here" value="<?php echo $_POST["globalid"]; ?>" required />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="employeename" class="col-sm-2 col-form-label">Employee Name:</label>
                    <div class="col-sm-10">
                        <input id="employeename" name="employeename" class="form-control" type="text" placeholder="Employee Name" value="<?php echo $_POST["employeename"]; ?>" required />
                    </div>
                </div>
		<div class="mb-3 row">
                    <label for="employeeid" class="col-sm-2 col-form-label">Employee ID:</label>
                    <div class="col-sm-10">
                        <input id="employeeid" name="employeeid" class="form-control" type="text" placeholder="Internally used Employee ID (This is to differentiate profiles of same employees submitted to various Consumers) " value="<?php echo $_POST["employeeid"]; ?>" required />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="language" class="col-sm-2 col-form-label">Language :</label>
                    <div class="col-sm-10">
                        <input id="language" name="language" class="form-control" type="text" placeholder="Languages known" value="<?php echo $_POST["language"]; ?>" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="location" class="col-sm-2 col-form-label">Location:</label>
                    <div class="col-sm-10"> 
                        <input id="location" name="location" class="form-control" type="text" placeholder="Location of the role" value="<?php echo $_POST["location"]; ?>" />
                    </div>
                </div>
	        <div class="mb-3 row">
                    <label for="skilllevel" class="col-sm-2 col-form-label">Level of Expertise:</label>
                    <div class="col-sm-10"> 
                        <input id="skilllevel" name="skilllevel" class="form-control" type="text" placeholder="1/2/3" value="<?php echo $_POST["skilllevel"]; ?>" />
                    </div>
		</div>
		<div class="mb-3 row">
                    <label for="skillset" class="col-sm-2 col-form-label">Skill Set</label>
                    <div class="col-sm-10">
                        <input id="skillset" name="skillset" class="form-control" type="text" placeholder="Programming languages known, Project methodologies,.." value="<?php echo $_POST["skillset"]; ?>" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="period" class="col-sm-2 col-form-label">Time Period:</label>
                    <div class="col-sm-10">
                        <input id="period" name="period" class="form-control" type="text" placeholder="Duration available for" value="<?php echo $_POST["period"]; ?>" />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="comments" class="col-sm-2 col-form-label">Comments:</label>
                    <div class="col-sm-10">
                        <textarea id="comments" name="comments" class="form-control" type="text" placeholder="Comments" rows="3" value="<?php echo $_POST["comments"]; ?>" ></textarea>
                    </div>
                </div>
		<div class="mb-3 row">
                    <label for="price" class="col-sm-2 col-form-label">Offered Price (in Euro):</label>
                    <div class="col-sm-10">
                        <textarea id="price" name="price" class="form-control" type="text" placeholder="Enter the initial bid price (without comma or dot)" rows="1" value="<?php echo $_POST["price"]; ?>" ></textarea>
                    </div>
                </div>
                <div class="form-input-actions">                
                    <div id="actionButtons">
                        <button class="btn btn-secondary js-reset-service-form">Reset</button>
                        <input type="submit" class="btn" name="upload" value="Upload Profile" />
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Requested Services -->
    <div class="request-form-wrapper req_ser form-hide">
        <div class="form-head">
            <h1 class="display-6 form__title">Requested Service</h1>
            <button class="btn btn-dark js-request-form-close btn-desktop" onclick="closeReqServ()">Close</button>
            <button class="btn-sm btn-dark req_ser_close js-request-form-close btn-mobile">Close</button>
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
                $sql = "SELECT * FROM service_requests WHERE NOT Submission_status = '0,5' ";
                
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

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

                    while($row = $result->fetch_assoc()) {
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

                    $result->free();
                }
                else{
                    echo "0 results";
                }
                ?>
                </tr>
            </table>
        </div>
    </div>
    
    <script>
        var requestForm, requestFormOpen, requestFormClose, requestFormClasses, resetFormButton, reqServices, reqServiceClose;

        function _init() {
            requestForm = document.querySelector('.js-request-form-wrapper');
            requestFormOpen = document.querySelector('.js-service-request-form');
            requestFormClose = requestForm.querySelectorAll('.js-request-form-close');
            requestFormClasses = requestForm.classList;
            resetFormButton = requestForm.querySelector('.js-reset-service-form');
            requestFormFields = requestForm.querySelectorAll('.js-form-container input');

            reqServices = document.querySelector('.req_ser').classList;
            reqServiceClose = document.querySelector('.req_ser_close').classList;
        }

        // Method to open service request form.
        function openServiceRequestForm() {
            if(requestFormOpen !== undefined || requestFormOpen !== null) {
                requestFormOpen.addEventListener('click', function() {
                    requestFormClasses.contains('form-hide') && requestFormClasses.remove('form-hide');
                });
            }

            if(requestFormClose !== undefined || requestFormClose !== null) {
                requestFormClose.forEach(element => {
                    element.addEventListener('click', function() {
                        !requestFormClasses.contains('form-hide') && requestFormClasses.add('form-hide');
                        resetInputFields();
                    });
                });
            }
        }

        function OpenReSer(){
            reqServices.remove('form-hide');
        }

        function closeReqServ(){
            reqServices.add('form-hide');
        }

        // Function to reset input fields
        function resetInputFields() {
            resetFormButton.addEventListener('click', function() {
                for(var i = 0 ; i < requestFormFields.length ; i++) {
                    requestFormFields[i].value =  '';
                }
            });
        }

        _init();
        openServiceRequestForm();
        resetInputFields();

    </script>
</body>
</html>
  