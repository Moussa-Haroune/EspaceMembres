<?php 
session_start();
session_destroy();
header('Location: ../index.php'); // header pour des redirection !

?>