<?php
$jsonDataLoc = APPROOT . '/data/name_translation_data_table.json';
$datafFile = fopen($jsonDataLoc, "r") or die("Unable to open name translation data file!");
$priceingMatrixStr =  fread($datafFile, filesize($jsonDataLoc));
fclose($datafFile);
renderJSON($priceingMatrixStr);
