<?php
require_once("../autoload/autoload.php");
header('Content-Type: application/json');

echo(json_encode(Dalcomment::getComments()));
