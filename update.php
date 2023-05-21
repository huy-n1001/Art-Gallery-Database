<?php
    include_once 'include/dbh.inc.php';
    require 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Updating</title>
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
    <h1>Update Artist information</h1>	
    <p>Enter the ID of the artist you would like to update then enter the new information:</p>
    <form action="" method="POST">
        <input type="text" name="artistID" placeholder="Artist ID...">

        <input type="text" name="name" placeholder="Artist's Name...">
        <input type="text" name="age" placeholder="Artist's Age...">
        <input type="text" name="rating" placeholder="Artist's Rating...">

        <input type="submit" name="update" value="Update Entry">
    </form>

</body>
</html>
 
<?php
    $conn = OpenCon();

    if (isset($_POST['update'])) {
        $id = $_POST['artistID'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $rating = $_POST['rating'];

        $query = "UPDATE artist SET name ='$name', age='$age', rating ='$rating' WHERE artistID='$id' ";
        // $query = "UPDATE artist SET name="$_POST[name]
        
        $query_run = mysqli_query($conn, $query);

        if($query_run) {
            header("Location: ../artists.php?update=success");
        } else {
            header("Location: ../update.php?error=updateerror");
        }
    }

?>