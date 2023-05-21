<?php
    include_once 'include/dbh.inc.php';
    require 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>List of Tickets</title>
    <link rel="stylesheet" href="style2.css">

<head>
<body>
    <h1>Tickets:</h1>
    <div class="wrapper">
        <p><a class="active" href="select.php">Select Ticket Types by Price</a></p>
    </div>
	<?php
        $conn = OpenCon();
        $sql = "SELECT * FROM Ticket_Sells, Exhibition_Held WHERE Ticket_Sells.exID = Exhibition_Held.exID;";
        $result = $conn->query($sql);
        $resultCheck = mysqli_num_rows($result);

        echo "<br>";
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) { //"mysqli_fetch_assoc" fetches all the info from $result (php function)
                echo "ID: {$row['exID']} <br>
                    TNumber: {$row['ticketNum']} <br>
                    Type: {$row['ticketType']} <br>
                    Price: {$row['price']} <br>";
                echo "<br> <br>"; 
            }
        }

	?>
</body>
</html>