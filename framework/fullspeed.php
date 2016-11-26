<?php
// remeber to call composer dump every time has changed composer.json
require "vendor/autoload.php";

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = false;
$config['db']['name']   = 'mysql:host=localhost;dbname=microdemo';
$config['db']['user']   = "micro";
$config['db']['pass']   = 'demo123123123!';
R::setup($config['db']['name'],$config['db']['user'],$config['db']['pass']);