<?php
    require header.php;
    require signup.php;
?>
    <b><u>First Name: </b><br />
	<input type = "text" name = "firstname" />
	<br />
	<b>Last Name:</b> <br />
	<input type="text" name = "lastname" />
	<br /></u>

    <body>
    <b><u></br>Date of Birth?</b></u></br>
        Month:

        <select>
        <option value="1">January</option>
        <option value="2">February</option>
        <option value="3">March</option>
        <option value="4">April</option>
        <option value="5">May</option>
        <option value="6">June</option>
        <option value="7">July</option>
        <option value="8">August</option>
        <option value="9">September</option>
        <option value="10">October</option>
        <option value="11">November</option>
        <option value="12">December</option>

        </select>
        Day:<input type="text" name = "day" maxlength="4" size="4" />
        Year:<input type="text" name = "year"maxlength="6" size="6"/></br>

        


        </br><b><u>Address:</b></u> <br />
        Street:</br><input type="text" name = "street" /></br>
        City: </br><input type="text" name = "city" /> </br>
        State: </br><input type="text" name = "state" /> </br>
        Zip Code:</br> <input type="text" name = "zipcode" /> </br>
        <br />




        <b><u>Type Of Account: </b></u><br />
        <input type = "radio" name = "typeOfAccount" value= "savings" /> Savings
        <br />
        <input type = "radio" name = "typeOfAccount" value= "checking" /> Checking
        <br /></br>
        <input type = "button" Value = "Submit" onclick = "CreateAccount()" />
	<br />


</body>