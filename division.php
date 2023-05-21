<?php

    include_once 'include/dbh.inc.php';
    require 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Division Query</title>
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
    <h1>Staff IDs Managing Exhibtion</h1>	

    <p>Retrieve all staff member ID's organizing all exhibitions in museum 2.</p>
    <form action="" method="POST">
 
        <input type="submit" name ="enter" value="Retrieve"> 
    </form>

</body>
</html> 
<?php
    $conn = OpenCon() ;
    if(isset($_POST['enter'])){
     
        $sql = "SELECT DISTINCT T1.sID FROM Organizes as T1 
        WHERE NOT EXISTS (
        (SELECT exID FROM Exhibition_Held WHERE mID = 'mus2')
        EXCEPT 
        (SELECT exID FROM Organizes as T2 WHERE T2.sID = T1.sID)) ";
    
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        echo "<br>"; 

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_array($result)) { //"mysqli_fetch_assoc" fetches all the info from $result (php function)
                echo "ID: {$row['sID']}";
                    
                echo "<br>"; 
            }
        }
    }

?>
