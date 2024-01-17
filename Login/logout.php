<?php

session_start();

$_SESSION == array();

session_destroy();

header("location: /Learning/My%20practice%20files/PHP%20Practice%20Projects/login/login.php");


?>