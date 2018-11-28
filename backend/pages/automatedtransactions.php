<body>
<h1 align="center"> SAN JOSE STATE BANK  </h1>
<ul id="ulMainpage">
  <li><a href="home.php">Home</a></li>
  <li><a href="MoneyTransfer.php">Money Transfer</a></li>
  <li><a href="GoogleMapsAPI.html">Search ATM Locations</a></li>
  <li><a href="automatedtransactions.php">Automated Transactions</a></li>
  <li><a href="accountsettings.php">Account Settings</a></li>
  <!-- <li><a href="header.php">Log Out</a></li> -->
  <li>
    <form action="includes/logout.inc.php" method="post">
    <button type="submit" name="logout-submit">Logout</button>
    </form>
  </li>
</ul>

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


<h1> Automated Transactions </h1>

<div id="phpDiv">
    <?php
    # if there is an error, run an error message
    if (isset($_GET["error"])) {

        if ($_GET["error"] == "invalidbalance") {
            echo '<p class="transfererror">Please enter a valid number!</p>';
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
    
    ?>
</div>

    <form id ="myForm" action="../includes/autotransfer.inc.php" method="post"><br></br>    
        <b>Username: </b><br />
        <input type="text" name="uid" placeholder="Enter Username"/>
        <br />
        <b>Amount:</b> <br />
        <input type="text" name="balance" placeholder="Enter Final Amount">
        <br/></u>
        <button type="submit" name="autotransfer-submit">Submit</button>
        <br />
    </form>
