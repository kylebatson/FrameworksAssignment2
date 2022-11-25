<?php
require 'autoloader.php';
require 'config.php';


$auth = new Authenticate();
$auth -> logOutUser();


//And send back to index page
header('Location: index.php');
exit();