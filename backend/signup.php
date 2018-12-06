<head>
<title>Create Account</title>
</head>
<body id="bodySignup">
<h1 id="h1Signup"> Create Account </br>for</br> BANK of San Jose State </h1>
<div id="backHome">
    <a href="header.php">Home Page</a>
</div>
<div id="centered">

    <div id="phpDiv">
    <?php
    # if there is an error, run an error message
    if (isset($_GET["error"])) {

        if ($_GET["error"] == "emptyfields") {
            echo '<p class="signuperror">Fill in all fields!</p>';
        } 
        # error for invalid email
        else if ($_GET["error"] == "invaliduidmail"){
            echo '<p class="signuperror">Invalid Username and Email!</p>';
        } 
        # error for invalid username
        else if ($_GET["error"] == "invaliduid"){
            echo '<p class="signuperror">Invalid Username!</p>';
        } 
        # error for invalid e-mail
        else if ($_GET["error"] == "invalidmail"){
            echo '<p class="signuperror">Invalid Email!</p>';
        } 
        # error for ummatching passwords
        else if ($_GET["error"] == "passwordcheck"){
            echo '<p class="signuperror">Your passwords do not match!</p>';
        } 
        # error for username already taken
        else if ($_GET["error"] == "usertaken"){
            echo '<p class="signuperror">Username is already taken!</p>';
        } 
    } 
    # if successful
    else if ($_GET["signup"] == "success"){
        echo '<p class="signupsuccess">Signup successful!</p>';
    }
    ?>
    </div>


    <form id ="myForm" action="includes/signup.inc.php" method="post">Create Your Account:<br></br>
        
        <b><u>Username: </b><br />
        <input type="text" name="uid" placeholder="Username"/>
        <br />
        <b>Email:</b> <br />
        <input type="text" name="mail" placeholder="Email">
        <br /></u>
        <b><u>Password: </b><br />
        <input type="password" name="pwd" placeholder="Password">
        <br />
        <b>Repeat Password:</b> <br />
        <input type="password" name="pwd-repeat" placeholder="Repeat Password">
        <br/></u>
        <br></br>
        <button type="submit" name="signup-submit">Create Account</button>
        <br />
    </form>

</div>

<div id="top-left">
    <!-- "logo.png" alt="logo"-->
    
	<img src="" >
	
</div>

<!-- Styling: -->
<style>
body {
    background-color: #939597;
}
</style>

<!-- Links to other pages: -->
<footer>
    <link rel="stylesheet" type="text/css" href="../style.css">
</footer>

<?php
	require "footer.php";
?>