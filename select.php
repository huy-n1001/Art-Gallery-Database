<?php

    include_once 'include/dbh.inc.php';
    require 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Select</title>
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
    <h1>Ticket Pricing</h1>	
    <p>List all ticket types where price of the ticket is more than $ price (max ticket price = $25) </p>
    <form action="" method="POST">
        <input type="text" name="price" placeholder="Price">
 
        <input type="submit" name ="enter" value="Enter"> 
    </form>

</body>
</html> 
<?php
    $conn = OpenCon() ;
    if(isset($_POST['enter'])){
        $price = $_POST["price"];
        echo "<br>Price entered: $price";

        $sql = "SELECT ticketType FROM Ticket_Sells WHERE price >'$price' ";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        echo "<br><br> Ticket Types: <br>"; 

        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_array($result)) { //"mysqli_fetch_assoc" fetches all the info from $result (php function)
                echo $row['ticketType'];
                    
                echo "<br>"; 
            }
        }

    }

?>
