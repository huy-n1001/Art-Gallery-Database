<?php
    include_once 'include/dbh.inc.php';
    require 'header.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Delete Data</title>
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
    <h1>Delete Artist</h1>	
    <form action="" method="POST">
        <input type="text" name="artistID" placeholder="Artist ID...">
        <input type="submit" name="delete" value="Delete Data">

    </form>
</body>
</html>
 
<?php
    $conn = OpenCon();
    if(isset($_POST['delete'])) {
        $id = $_POST['artistID'];

        $query = "DELETE FROM artist WHERE artistID='$id' ";
        $query_run = mysqli_query($conn, $query);

        if($query_run) {
            header("Location: ../artists.php?delete=success");
        } else {
            header("Location: ../delete.php?error=deleteerror");
        }
    }

?>