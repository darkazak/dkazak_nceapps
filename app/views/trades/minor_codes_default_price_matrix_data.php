<?php
$jsonDataLoc = APPROOT . '/data/minor_codes_default_price_matrix_data.json';
$datafFile = fopen($jsonDataLoc, "r") or die("Unable to open default pricing matrix file!");
$priceingMatrixStr =  fread($datafFile, filesize($jsonDataLoc));
fclose($datafFile);
renderJSON($priceingMatrixStr);
