<?php

    include_once 'include/dbh.inc.php';
    require 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nested Aggregation Query</title>
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
    <h1>Average Number of Staff</h1>	
    <p>Get the current maximum average of staff members in a department</p>
    <form action="" method="POST">
        
 
        <input type="submit" name ="enter" value="Enter"> 
    </form>

    <?php
        $conn = OpenCon() ;
        if(isset($_POST['enter'])){
            
            $sql = "SELECT max(average) FROM( SELECT AVG(staff_members) AS average FROM Curator GROUP BY departmentID) AS average2";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            echo "<br />"; 

            if ($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) { //"mysqli_fetch_assoc" fetches all the info from $result (php function)
                    $datas[] = $row;
                } 
                
            } 
            foreach ($datas[0] as $data) {
                echo "The current maximum value of the average of staff members in a department is: ".round($data,2);
            }
        }

    ?>
</body>
</html> 
