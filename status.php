<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="statusstyle.css">
    <title>Service Request Status</title>
  </head>
<body>

<h1>Service Request Status</h1>

<table class="content-table">
  <thead>
    <tr>
      <th>Username</th>
      <th>Project Name</th>
      <th>Project Role</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php

    include 'config.php'

    //$hostname = "localhost";
    //$username = "root";
    //$password = "";
    //$database = "Request";

    //$conn = mysqli_connect($hostname, $username, $password, $database) or die("Database connection failed");
    //if ($conn->connect_error) {
   //     die("Connection failed: " . $conn->connect_error);
   // }

    $sql = "SELECT * FROM Service_Requests WHERE id = 1000";
    $result = $conn-> query($sql);

    if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["projectname"] . "</td><td>" . $row["role"] . "</td><td>" . $row["status"] . "</td></tr>";
        }
        echo "</table>";
    }
    else {
        echo "0 result";
    }
    $conn-> close();
    ?>
      
  </tbody>
</table>

</body>
</html>


