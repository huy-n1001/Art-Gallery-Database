<?php
    include_once 'include/dbh.inc.php';
    require 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>List of Museums</title>
<head>
<body>
    <h1>Museums:</h1>
	<?php
        $conn = OpenCon();
        $sql = "SELECT * FROM Museum;";
        $result = $conn->query($sql);
        $resultCheck = mysqli_num_rows($result);

        echo "<br>";
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) { //"mysqli_fetch_assoc" fetches all the info from $result (php function)
                echo "ID: {$row['mID']} <br>
                    Name: {$row['name']} <br>
                    Operating Hours: {$row['opHrs']} <br>
                    Capacity: {$row['Capacity']}";
                echo "<br> <br>"; 
            }
        }

	?>
</body>
</html>