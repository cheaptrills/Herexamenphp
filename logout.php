<?php
require_once("autoload/autoload.php");
unset ($_SESSION['username']);
session_destroy();
header('location: login.php');
