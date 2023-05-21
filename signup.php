<?php
	include_once 'include/dbh.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- <script>
		function artistBut() {
			window.open("artists.php");
		}
	</script> -->
<head>
<body>
	<h1>Welcome to the Art Gallery Database!</h1>
	
</body>
</html>

<?php
	require "header.php";
?>
<main>
	<h1>Signup</h1>
    <form action="include/signup.inc.php" method="post";>
        <input type="text" name="uid" placeholder="Username">
        <input type="text" name="mail" placeholder="Email">
        <input type="password" name="pwd" placeholder="Password">
        <input type="password" name="pwd-repeat" placeholder="Re-enter Password">
        <button type="submit" name="signup-submit">Signup</button>
</main>