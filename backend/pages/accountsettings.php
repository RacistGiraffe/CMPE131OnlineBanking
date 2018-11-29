<html>
<head>
<title>My Account</title>
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
</style>
<body>
<h1 align="center"> SAN JOSE STATE BANK  </h1>
<ul>
  <li><a href="home.php">Home</a></li>
  <li><a href="MoneyTransfer.php">Money Transfer</a></li>
  <li><a href="GoogleMapsAPI.html">Search ATM Locations</a></li>
  <li><a href="automatedtransactions.php">Automated Transactions</a></li>
  <li><a href="accountsettings.php">Account Settings</a></li>
  <li>
    <form action="../includes/logout.inc.php" method="post">
    <button type="submit" name="logout-submit">Logout</button>
    </form>
  </li>
</ul>

<div id="phpDiv">
    <?php
    # if there is an error, run an error message
    if (isset($_GET["error"])) {

        if ($_GET["error"] == "invaliduid") {
            echo '<p class="deletionerror">Please enter a valid username!</p>';
        } 
        else if ($_GET["error"] == "emptyfields") {
            echo '<p class="transfererror">Fill in all fields!</p>';
        }
        # error for SQL error
        else if ($_GET["error"] == "sqlerror"){
            echo '<p class="deletionerror">MySQL Error!</p>';
        } 
    } else if ($_GET["deletion"] == "success"){
        echo '<p class="deletionsuccess">Deletion Successful!</p>';  
    }
    ?>
</div>

<form id ="myForm" action="../includes/delete.inc.php" method="post">Delete Account:<br></br>  
        <b>Username: </b><br />
        <input type="text" name="username" placeholder="Username"/>
        <br />
        <br/></u>
        <button type="submit" name="delete-submit">Delete Account</button>
        <br />