<?php
session_start();
session_unset(); // Removes all session variables
session_destroy(); // Destroys the session completely
header("Location: index.php"); // Takes them back to the Home page
exit();
?>