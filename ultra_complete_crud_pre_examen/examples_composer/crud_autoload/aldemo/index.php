<?php
require 'vendor/autoload.php';

echo lego();


$cm = new Cmautoload();
echo $cm->classmap();

$calculator = new \Calculator\Sum();
echo $calculator->sum(2,3);