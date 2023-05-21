<?php
    include_once 'include/dbh.inc.php';
    require 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Artists</title>
    <link rel="stylesheet" href="style2.css">

<head>
<body>
    <h1>Artists</h1>
    <div class="wrapper">
        <p><a class="active" href="delete.php">Delete Artist</a></p>
        <p><a class="active" href="update.php">Update Artist</a></p>
        <p><a class="active" href="aggregation.php">Average Age/Rating</a></p>
    </div>

	<?php
        $conn = OpenCon();
        $sql = "SELECT * FROM Artist;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        echo "<br>";
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) { //"mysqli_fetch_assoc" fetches all the info from $result (php function)
                echo "Artist ID: {$row['artistID']} <br>
                    Name: {$row['name']} <br>
                    Age: {$row['age']} <br>
                    Rating: {$row['rating']}";
                echo "<br> <br>"; 
            }
        }
	?>
</body>
</html>