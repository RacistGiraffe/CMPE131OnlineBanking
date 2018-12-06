<html>
<head>
<title>Home</title>
<link rel = "stylesheet" type = "text/css" href= "style.css">
</head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
    position: sticky; 
    position: sticky;
    top: 0;
}
li {
    float: left;
}
body {
    font-size: 28px;
}
li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}
li a:hover {
    background-color: #111;
}
.active {
    background-color: #4CAF50;
}
label{
    text-align: center;
    color: black;
}
p.indent{
    padding-left: 1.8em;
}
div.b {
    position: absolute;
    top: 200px;
    right: 300px;
    width: 300px;
    height: 230px;
    border: 3px solid blue;
}
div.c {
    position: absolute;
    top: 300px;
    right: 300px;
    width: 300px;
    height: 300px;
}
label.welcomeLabel{
    text-align: center;
    font-size: 200%;
    color: blue;
}
</style>
<body>
<h1 align="center"> SAN JOSE STATE BANK  </h1>
<ul>
  <li><a href="home.php">Home</a></li>
  <li><a href="MoneyTransfer.php">Money Transfer</a></li>
  <li><a href="GoogleMapsAPI.html">Search ATM Locations</a></li>
  <li><a href="automatedtransactions.php">Automated Transactions</a></li>
  <li><a href="upload_image.php">Upload Image</a></li>
  <li><a href="accountsettings.php">Account Settings</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>

<br><label class="welcomeLabel">Welcome to the SJSU Online Banking Portal</label><br>
<br>
<label>Please choose from one of our action choices above to navigate</label><br>
<br><br>
<div class="b">
    <?php
        require '../includes/dbh.inc.php';
        require '../includes/check.inc.php';

        # display balances
        $sql = "SELECT balanceUsers FROM users WHERE users.uidUsers = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<p class="indent">'. 'Balance of Account 1: $' . $row["balanceUsers"]. '</p>';
            }
        } else {
            echo "0 results";
        }
    ?>
</div><br><br><br><br>
<div class="c">
    <?php
        # display balances
        $sql = "SELECT balanceTwoUsers FROM users WHERE users.uidUsers = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<p class="indent">'. 'Balance of Account 2: $' . $row["balanceTwoUsers"]. '</p>';
            }
        } else {
            echo "0 results";
        }
    ?>

</div><br>

<footer>
    <link rel="stylesheet" type="text/css" href="../style.css">
</footer>

