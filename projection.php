<?php
    include_once 'include/dbh.inc.php';
    require 'header.php';
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Projection</title>
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
    <h1>View Information of Curators</h1>	
    <p>Choose a column to project </p>
    <p>  </p>
    <p>cID</p>
    <p>fname </p>
    <p>lname </p>
    <p>education </p>
    <form action="" method="POST">
        <input type="text" name="input" placeholder=" ">
 
        <input type="submit" name ="enter" value="Choose"> 
    </form>
</body>
</html> 

<?php
    $conn = OpenCon() ;
    if(isset($_POST['enter'])){
        $input = $_POST["input"];
        echo " <br>"; 

        $sql = "SELECT '$input', cID, fname, lname, education FROM CURATOR";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_array($result)) { //"mysqli_fetch_assoc" fetches all the info from $result (php function)
                if($input == 'cID') {
                    echo $row['cID'];
                    echo " <br>";
                } elseif($input == 'fname') {
                    echo $row['fname'];
                    echo " <br>";
                } elseif($input == 'lname') {
                    echo $row['lname'];
                    echo " <br>"; 
                } elseif($input == 'education') {
                    echo $row['education'];
                    echo " <br>";
                } else {
                    echo ' ';
                }  
            }
        }

    }

?>









