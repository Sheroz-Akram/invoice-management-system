<?php

// Delete the Session Data
session_start();
session_destroy();

// Delete the Cookies
setcookie("isLogin", false, time() - 3600, "/");
setcookie("username", "", time() - 3600, "/");
setcookie("privateKey", "", time() - 3600, "/");

// Move the User to the Login Page
header("Location: ../Login");

?>