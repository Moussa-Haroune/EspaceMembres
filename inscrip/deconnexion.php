<?php 
session_start();
session_destroy();
header('Location: ../index.html'); // header pour des redirection !

?>