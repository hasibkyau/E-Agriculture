<?php
session_start(); // start the session
session_destroy(); // destroy all session data
header("Location: index.php"); // redirect to the login page
exit; // make sure the code stops executing here
?>