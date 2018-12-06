<?php

session_start();
session_unset();    # deletes all values of session variables
session_destroy();
header("Location: ../index.php");