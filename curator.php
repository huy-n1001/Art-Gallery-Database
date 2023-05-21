<?php
    include_once 'include/dbh.inc.php';
    require 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Curators</title>
    <link rel="stylesheet" href="style2.css">

<head>
<body>
    <h1>Curators</h1>
    <div class="wrapper">
        <p><a class="active" href="projection.php">View Specific Information</a></p>

    </div>
	<?php
        $conn = OpenCon();
        $sql = "SELECT * FROM Curator;";
        $result = $conn->query($sql);
        $resultCheck = mysqli_num_rows($result);

        echo "<br>";
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) { //"mysqli_fetch_assoc" fetches all the info from $result (php function)
                echo "Curator ID: {$row['cID']} <br>
                    First Name: {$row['fname']} <br>
                    Last Name: {$row['lname']} <br>
                    Education: {$row['education']} <br>
                    DepartmentID: {$row['departmentID']} <br>
                    Staff Members: {$row['staff_members']}";
                echo "<br> <br>"; 
            }
        }

	?>
</body>
</html>