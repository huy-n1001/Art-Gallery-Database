<?php
    include_once 'include/dbh.inc.php';
    require 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Staff</title>
    <link rel="stylesheet" href="style2.css">
<head>
<body>
    <h1>Staff</h1>
    <div class="wrapper">
        <p><a class="active" href="curator.php">View Curators Managing Staff</a></p>
        <p><a class="active" href="nested.php">View Max. Staff Members</a></p>
        <p><a class="active" href="division.php">Retrieve Staff IDs Working in Same Museum</a></p>
    </div>   
	<?php
        $conn = OpenCon();
        $sql = "SELECT * FROM Staff_ManagedBy;";
        $result = $conn->query($sql);
        $resultCheck = mysqli_num_rows($result);

        echo "<br>";
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) { //"mysqli_fetch_assoc" fetches all the info from $result (php function)
                echo "Staff ID: {$row['sID']} <br>
                    Curator ID: {$row['cID']} <br>
                    First Name: {$row['fname']} <br>
                    Last Name: {$row['lname']}";
                echo "<br> <br>"; 
            }
        }

	?>
</body>
</html>