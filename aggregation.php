<?php

    include_once 'include/dbh.inc.php';
    require 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Aggregation</title>
    <style>
        input{
            padding: 12px;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            box-shadow: 1px 1px 2px 1px grey;
        }
        input:hover{
            background-color: #ddd;
            color: black;
        }
    </style>
<head>
<body>	
    <h1>Artist Age/Rating</h1>
    <p>Retrieve the average age or rating of all artists </p>
    <form action="" method="POST">
        <input type="text" name="option" placeholder="Type age or rating">
 
        <input type="submit" name ="enter" value="Enter"> 
    </form>

    <?php
        $conn = OpenCon() ;
        if(isset($_POST['enter'])){
            $option = $_POST["option"];

            $sql = "SELECT ROUND(AVG($option)) AS average FROM artist";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                echo "The current average age of all artists is: ". $row['average'];
                echo "<br />";

            }
        }
    ?>
</body>
</html>


