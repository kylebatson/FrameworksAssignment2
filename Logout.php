<?php
require 'autoloader.php';
require 'config.php';


$sess = new SessionClass();
$sess -> create();
$sess -> destroy();

//And send back to index page
header('Location: index.php');
exit();