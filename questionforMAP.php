<?php
include 'config.php';

session_start();

error_reporting(0);

$mapid = mysqli_real_escape_string($conn,$_SESSION["map_id"]);

$load = mysqli_query($conn, "SELECT * FROM maplogin WHERE id='$mapid' ");

  if (mysqli_num_rows($load) > 0) {
	$row = mysqli_fetch_assoc($load);
    	$mapname = mysqli_real_escape_string($conn, $row['full_name']);
  } else {
    echo "<script>alert('Loading profile details not complete.');</script>";
  }

if (isset($_POST["back"])) {
  header("Location: dashboardforMAP.php");
}
if (isset($_POST["Submit"])) {

  	$question = mysqli_real_escape_string($conn, $_POST["question"]);
  	$profileid = mysqli_real_escape_string($conn, $_POST["profileid"]);
	$check = mysqli_query($conn, "SELECT * FROM mapservice WHERE profileid ='$profileid' ");
	if (mysqli_num_rows($check)>0) {
		$row = mysqli_fetch_assoc($check);
    		$globalid = $row['globalid'];
  	} else {
    		echo "<script>alert('No Application number found ');</script>";
  	}

  	$sql = "UPDATE `mapservice` SET `question` = '$question' WHERE globalid = '$globalid' ";
	$result = mysqli_query($conn, $sql);

	$verify = mysqli_query($conn, "SELECT * FROM mapservice WHERE globalid='$globalid' AND question = '$question' ");
	if (mysqli_num_rows($verify)>0) {
   		 echo "<script>alert('Question Submitted');
         window.location = 'dashboardforMAP.php';
       </script>";
   		 
  	} else {
    		echo "<script>alert('Question submission failed');</script>";
  	}
  };
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="statusstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Question and Answers</title>
  </head>
<body>

<h1 class="display-6 form__title"> Asked Questions & Responses </h1>

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
	<th>Offered Price </th>
	<th>question </th>
	<th>response </th>
    </tr>
  </thead>
  <tbody>
   <?php
	$mapnameformatted = mysqli_real_escape_string($conn, $mapname);
	$sql = "SELECT * FROM mapservice WHERE currentcompany= '$mapnameformatted' AND NOT question= '' ";
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
                        $field8 = $row["price"];
                        $field9 = $row["question"];
			            $field10 = $row["response"];
			
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

<h1 class="display-6 form__title">Select Profiles</h1>
	
	<form class="form-container js-form-container" method="post">
            <!-- No id should be same. Change / replace at all occurrences -->
            <div class="form-inputs">
            	<div class="mb-3 row">
                    <label for="profileid" class="col-sm-2 col-form-label">Ask Question for Profile ID:</label>
                    <div class="col-sm-10">
                        <input id="profileid" name="profileid" class="form-control" type="text" placeholder="Enter Profile ID" value="<?php echo $_POST["profileid"]; ?>" required />
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="question" class="col-sm-2 col-form-label">Question:</label>
                    <div class="col-sm-10">
			<textarea id="question" name="question" class="form-control" type="text" placeholder="Enter your question" rows="7" value="<?php echo $_POST["question"]; ?>" ></textarea>
                    </div>
                </div>
		<div class="form-input-actions">                
                    <div id="actionButtons">
                        <input type="submit" class="btn" name="Submit" value="Submit Question" />
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