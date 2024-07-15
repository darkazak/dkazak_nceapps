<?php
$jsonDataLoc = APPROOT . '/data/hunt_btn_data.json';
$datafFile = fopen($jsonDataLoc, "r") or die("Unable to open file!");
echo fread($datafFile,filesize($jsonDataLoc));
fclose($datafFile);