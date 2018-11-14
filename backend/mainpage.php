
<html>
<head>
<title>Home</title>
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
<ul id="ulMainpage">
  <li><a href="">Home</a></li>
  <li><a href="pages/MoneyTransfer.html">Money Transfer</a></li>
  <li><a href="pages/GoogleMapsAPI.html">Search ATM Locations</a></li>
  <li><a href="pages/automatedtransactions.php">Automated Transactions</a></li>
  <li><a href="">Account Settings</a></li>
  <!-- <li><a href="header.php">Log Out</a></li> -->
  <li>
    <form action="includes/logout.inc.php" method="post">
    <button type="submit" name="logout-submit">Logout</button>
    </form>
  </li>
</ul>

<footer>
    <link rel="stylesheet" type="text/css" href="./style.css">
</footer>