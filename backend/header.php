<?php
    session_start();
?>

<head><title>Bank of San Jose State</title></head>

<body>

	<div id="container">
	<img src="pictures/wallpaper.pic.jpg" alt="Snow" style="width:100%;">

<div id="bottom-left"> Left</div>

<div id="top-left"></div>

<div id="top-right">
    <ul>
        <li><a href="index.php">Home</a></li>
        <!-- <li><a href="#">Portfolio</a></li>
        <li><a href="#">About Me</a></li>
        <li><a href="#">Contact</a></li> -->
    </ul>
        <?php
        if (isset($_SESSION['userId'])) {
            echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" name="logout-submit">Logout</button>
        </form>';
        } else {
            echo '
            <h2>Already a Member?</h2>
            <form action="includes/login.inc.php" method="post">
            <input type="text" name="mailuid" placeholder="Username/E-mail...">
            <input type="password" name="pwd" placeholder="Password...">
            <button type="submit" name="login-submit">Login</button>
            <p><h4>Not a Member?</h4>
            <a href="signup.php">Open an account</a>
            <p> <b><u>Contact Information</b></u></p>
            <p> Phone: 1-800- xxx-xxxx</br>
            Email: sjsubankteam2@sjsu.edu
            </form>';
        }
        ?>
<div>

<style>
input[type=Submit]:hover {
    background-color: #45a049;
    width:12.5em;
    height:2em;
}		
</style>

<footer>
    <link rel="stylesheet" type="text/css" href="./style.css">
</footer>

</body>

<?php
    require "footer.php";
?>
