<?php
    include_once 'include/dbh.inc.php';
    require 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Organizes</title>
    <link rel="stylesheet" href="style2.css">

<head>
<body>
    <h1>Organizes</h1>

	<?php
        $conn = OpenCon();
        $sql = "SELECT * FROM Organizes";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        echo "<br>";
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) { //"mysqli_fetch_assoc" fetches all the info from $result (php function)
                echo "Staff ID: {$row['sID']} <br>
                    Ex ID: {$row['exID']} ";
                echo "<br> <br>"; 
            }
        }
	?>
</body>
</html>