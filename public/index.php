<?php

ini_set('display_errors', 1);

require "../vendor/autoload.php";
/*
* Each request passes through this file.
*/

require "../config/bootstrap.php";

$router = new Router();