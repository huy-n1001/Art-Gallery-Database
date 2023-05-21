<?php
    include_once 'include/dbh.inc.php';
    require 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Artworks</title>
    <link rel="stylesheet" href="style2.css">

<head>
<body>
    <h1>Artworks</h1>
    <div class="wrapper">
        <p><a class="active" href="artForms.php">View Art forms</a></p>
        <p><a class="active" href="join.php">Join Tables</a></p>
    </div>
	<?php
        $conn = OpenCon();
        $sql = "SELECT * FROM Artwork_Create_IsIn;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        echo "<br>";
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) { //"mysqli_fetch_assoc" fetches all the info from $result (php function)
                echo "Art ID: {$row['artID']} <br>
                    Artist ID: {$row['artistID']} <br>
                    Museum ID: {$row['mID']} <br>
                    Title: {$row['title']} <br>
                    Material ID: {$row['material']} ";
                echo "<br> <br>"; 
            }
        }
	?>
</body>
</html>