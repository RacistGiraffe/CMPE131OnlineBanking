<body>
<h1 align="center"> SAN JOSE STATE BANK  </h1>
<ul id="ulMainpage">
  <li><a href="home.php">Home</a></li>
  <li><a href="MoneyTransfer.php">Money Transfer</a></li>
  <li><a href="GoogleMapsAPI.html">Search ATM Locations</a></li>
  <li><a href="automatedtransactions.php">Automated Transactions</a></li>
  <li><a href="upload_image.php">Upload Image</a></li>
  <li><a href="accountsettings.php">Account Settings</a></li>
  <li><a href="logout.php">Logout</a></li>
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
label.labelclass {
    font-size: medium;
}
p.indent{
    padding-left: 1.8em;
}
</style>


<h1> Automated Transactions </h1>

<div id="phpDiv">
    <?php
    # if there is an error, run an error message
    if (isset($_GET["error"])) {

        # invalid balance given
        if ($_GET["error"] == "invalidbalance") {
            echo '<p class="transfererror">Please enter a valid number!</p>';
        } 
        # empty fields
        else if ($_GET["error"] == "emptyfields") {
            echo '<p class="transfererror">Fill in all fields!</p>';
        }
        # error for invalid email
        else if ($_GET["error"] == "sqlerror"){
            echo '<p class="transfererror">MySQL Error!</p>';
        } 
        # connection error
        else if ($_GET["error"] == "sqlerrorconn") {
            echo '<p class="transfererrorconn">MySQL Connection Error!</p>';
        } 
        # transfer is successful
        else if ($_GET["error"] == "success"){
            echo '<p class="transfersuccess">Automated Transfer Successful!</p>';  
        }
    }
    ?>
</div>

    <form id ="myForm" action="../includes/autotransfer.inc.php" method="post"><br> 
        <label>Please calculate the final amount you want in your account</label><br>
        <label class="labelclass">ie, transferring 200$ from Account 1 (300$) to Account 2 (500$) will result in ||:
            Account 1: 100$, Account 2: 700$  </label> <br>
        <br />
        <b>First Account Amount:</b> <br />
        <input type="text" name="balance" placeholder="Enter Final Amount">
        <br/>
        <b>Second Account Amount:</b> <br />
        <input type="text" name="balanceTwo" placeholder="Enter Final Amount">
        <br/>
        <b>Enter Time of Transfer [Hrs/Mins]   (00:00) ie (01:23)</b> <br />
        <input type="text" name="time" placeholder="Enter Time for Transfer">
        <br/></u>
        <button type="submit" name="autotransfer-submit">Transfer Money</button>
        <br />
    </form>


<div class="b">
    <?php
        require '../includes/dbh.inc.php';
        require '../includes/check.inc.php';

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