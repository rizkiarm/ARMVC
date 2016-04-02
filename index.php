<?php

// DEBUG MODE: Enable Error Report
error_reporting(-1);
ini_set('display_errors', 'On');

session_start();

require 'app/bootstrap.php';
require 'app/routes.php';

?>