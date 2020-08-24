<?php

ob_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
include 'funcs/db/db.php';

define("MAIN_TITLE", "A'amico Pizza");
define("MAIN_LOGO_IMG", "logo.png");
