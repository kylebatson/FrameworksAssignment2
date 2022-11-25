<?php
require 'autoloader.php';
require 'config.php';

$controller = new StreamsController();
$controller -> start();
