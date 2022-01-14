<?php
include 'config.php';

session_start();

error_reporting(0);

$mapid = mysqli_real_escape_string($conn,$_SESSION["map_id"]);

if(isset($_POST["ask"])) {
  $globalid = mysqli_real_escape_string($conn, $_POST["globalid"]);
  $question = mysqli_real_escape_string($conn, $_POST["question"]);

$sql = "INSERT INTO mapservice (globalid, question) VALUES ('$globalid', '$question')";
$result = mysqli_query($conn, $sql);
$check = mysqli_query($conn, "SELECT * FROM mapservice WHERE globalid ='$globalid' AND question = '$question' ");

if (mysqli_num_rows($check)>0) {
    echo "<script>alert('Question posted successfully');</script>";
	$globalid = '';
        $question = '';
	$_POST["globalid"] = '';
	$_POST["question"] = '';

  } else {
    echo "<script>alert('Question not posted');</script>";
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
        .qa_service_wrapper{
            margin-top:20px;
        }

        .qa_service_table{
            width:100%;
        }

        .qa_service_head{
            border-bottom: 1px solid #ccc!important;
        }

        .qa_service_head th{
            padding-bottom:20px;
        }

        .qa_service_body{
            border-bottom: 1px solid #ccc!important;
        }

        .qa_service_body td{
            padding:20px 0 20px 0;
        }
    </style>
</head>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>

<body>
    
<!-- Q&A, Comments Section -->
    <div class="request-form-wrapper form-hide js-qa-form-wrapper">
        <div class="form-head">
            <h1 class="display-6 form__title">Q&A, Comments </h1>
            <button class="btn btn-dark js-request-form-close btn-desktop" onclick="closeQAServ()">Close</button>
            <button class="btn-sm btn-dark qa_ser_close js-request-form-close btn-mobile">Close</button>
        </div>
 	<form class="form-container js-qa-form-container" method="post">
            <!-- No id should be same. Change / replace at all occurrences -->
            <div class="form-inputs">
		<div class="mb-3 row">
                    <label for="globalid" class="col-sm-2 col-form-label">Unique Application Number:</label>
                    <div class="col-sm-10">
                        <input id="globalid" name="globalid" class="form-control" type="text" placeholder="Copy the Unique Application Number for the desired Request on which you want to question" value="<?php echo $_POST["globalid"]; ?>" required />
                    </div>
                </div>
		<div class="mb-3 row">
                    <label for="question" class="col-sm-2 col-form-label">Question:</label>
                    <div class="col-sm-10">
                        <textarea id="question" name="question" class="form-control" type="text" placeholder="Type your question" rows="3" value="<?php echo $_POST["question"]; ?>" ></textarea>
                    </div>
                </div>
                <div class="form-input-actions">                
                    <div id="actionButtons">
                        <button class="btn btn-secondary js-reset-qaservice-form">Reset</button>
                        <input type="submit" class="btn" name="ask" value="Ask Question" />
                    </div>
                </div>
            </div>
        </form>
        <div class="qa_service_wrapper">
            <table class="qa_service_table">
                <!--
                <tr class="qa_service_head">
                    <th style="width: 50px;">No.</th>
		    <th>Unique Application Number</th>
                    <th>Questions Asked</th>
                    <th>Consumer Name</th>
                    <th>Response</th>
                </tr>
                -->

                <tr class="qa_service_body">
                <?php
		$sql = "SELECT * FROM mapservice";
             //   $sql = "SELECT * FROM mapservice WHERE NOT question = 'NULL'";
                
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    echo '<table border="0" cellspacing="2" cellpadding="20">
                    <tr class="qa_service_head">
			<th>Unique Application Number</th>
                    	<th>Questions Asked</th>
                   	<th>Consumer Name</th>
                   	<th>Response</th>
                    </tr>';

                    while($row = $result->fetch_assoc()) {
                        $field1 = $row["globalid"];
                        $field2 = $row["question"];
                        $field3 = $row["created_by"];
                        $field4 = $row["response"];                        

                        echo '<tr>
                                <td>'.$field1.'</td> 
                                <td>'.$field2.'</td> 
                                <td>'.$field3.'</td> 
                                <td>'.$field4.'</td> 
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
        var requestForm, requestFormOpen, requestFormClose, requestFormClasses, resetFormButton, reqServices, reqServiceClose, qaServices, qaServiceClose, qaForm, qaFormOpen, qaFormClose, qaFormClasses, qaresetFormButton, requestFormFields, qaFormFields;

        function _init() {
            requestForm = document.querySelector('.js-request-form-wrapper');
            requestFormOpen = document.querySelector('.js-service-request-form');
            requestFormClose = requestForm.querySelectorAll('.js-request-form-close');
            requestFormClasses = requestForm.classList;
            resetFormButton = requestForm.querySelector('.js-reset-service-form');
            requestFormFields = requestForm.querySelectorAll('.js-form-container input');

            reqServices = document.querySelector('.req_ser').classList;
            reqServiceClose = document.querySelector('.req_ser_close').classList;

	    qaServices = document.querySelector('.qa_ser').classList;
	    qaServiceClose = document.querySelector('.qa_ser_close').classList;
            qaFormFields = qaForm.querySelectorAll('.js-qa-form-container input');
            qaFormClasses = qaForm.classList;
            qaresetFormButton = qaForm.querySelector('.js-reset-qaservice-form');
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

	// Method to open Q&A form.
        function openQAForm() {
            if(qaFormOpen !== undefined || qaFormOpen !== null) {
                qaFormOpen.addEventListener('click', function() {
                    qaFormClasses.contains('form-hide') && qaFormClasses.remove('form-hide');
                });
            }

            if(qaFormClose !== undefined || qaFormClose !== null) {
                qaFormClose.forEach(element => {
                    element.addEventListener('click', function() {
                        !qaFormClasses.contains('form-hide') && qaFormClasses.add('form-hide');
                        resetqaInputFields();
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

	function OpenQA(){
            qaServices.remove('form-hide');
        }

        function closeQAServ(){
            qaServices.add('form-hide');
        }
        // Function to reset input fields in Service Request Form
        function resetInputFields() {
            resetFormButton.addEventListener('click', function() {
                for(var i = 0 ; i < requestFormFields.length ; i++) {
                    requestFormFields[i].value =  '';
                }
            });
        }
	// Function to reset input fields in Q & A Form
        function resetqaInputFields() {
            qaresetFormButton.addEventListener('click', function() {
                for(var i = 0 ; i < qaFormFields.length ; i++) {
                    qaFormFields[i].value =  '';
                }
            });
        }

        _init();
        openServiceRequestForm();
	openQAForm();
        resetInputFields();
	resetqaInputFields();

    </script>
</body>
</html>