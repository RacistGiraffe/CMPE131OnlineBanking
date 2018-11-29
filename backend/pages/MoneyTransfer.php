<html>
<head>
<title>Money Transfer</title>
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

label {
    color: black;
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

        if ($_GET["error"] == "invalidbalance") {
            echo '<p class="transfererror">Please enter a valid number!</p>';
        } 
        # check for empty fields
        else if ($_GET["error"] == "emptyfields") {
            echo '<p class="transfererror">Fill in all fields!</p>';
        }
        # error for invalid email
        else if ($_GET["error"] == "sqlerror"){
            echo '<p class="transfererror">MySQL Error!</p>';
        } 
        else if ($_GET["error"] == "sqlerrorconn") {
            echo '<p class="transfererrorconn">MySQL Connection Error!</p>';
        } 
        else if ($_GET["transfer"] == "success"){
            echo '<p class="transfersuccess">Transfer Successful!</p>';  
        }
    }
    # if successful
    else if ($_GET["transfer"] == "success"){
        echo '<p class="transfersuccess">Transfer Successful!</p>';  
    }
    ?>
</div>

    <form id ="myForm" action="../includes/transfer.inc.php" method="post">Transfer Money:<br></br>  
        <label>Please calculate the final amount you want in your account</label>  <br></br>
        <label>ie, transferring 200$ to account with 100$ will result in 300$ total</label> <br></br>
        <b>Username: </b><br />
        <input type="text" name="username" placeholder="Enter Username"/>
        <br />
        <b>First Account Amount:</b> <br />
        <input type="text" name="balance" placeholder="Enter Final Amount">
        <br/>
        <b>Second Account Amount:</b> <br />
        <input type="text" name="balanceTwo" placeholder="Enter Final Amount">
        <br/></u>
        <button type="submit" name="transfer-submit">Transfer Money</button>
        <br />
    </form>

</body>


<footer>
    <link rel="stylesheet" type="text/css" href="../style.css">
</footer>

<?php
	require "../footer.php";
?>