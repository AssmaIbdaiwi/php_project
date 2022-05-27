<?php
// include('../admin_cp/init.php');

session_start();


unset ($_SESSION["id"]);
unset ($_SESSION['user_name']);
unset ($_SESSION['name']);

header('location:../new/index.php');

?>