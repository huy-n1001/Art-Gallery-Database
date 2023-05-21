<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>header</title>
    <link rel="stylesheet" href="style.css">
<head>
<body>
    <header>
        <nav>
            <div class="header">
                <ul>
                    <li><a class="active" href="index.php">Home</a></li>
                    <li><a href="artists.php">Artists</a></li>
                    <li><a href="artworks.php">ArtWorks</a></li>
                    <li><a href="museum.php">Museums</a></li>
                    <li><a href="exhibition.php">Exhibitions</a></li>                
                </ul>

                <div class ="header-right">
                    <form action="include/login.inc.php" method="post">
                        <input type="text" name="mailuid" placeholder="Username...">
                        <input type="password" name="pwd" placeholder="Password...">
                        <button type="submit" name="login-submit">Login</button>
                    </form>

                    <a href="signup.php">Signup</a>
                    <form action="include/logout.inc.php" method="post">
                        <button type="submit" name="logout-submit">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

</body>
</html>