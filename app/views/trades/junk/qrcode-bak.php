<?php
require_once APPROOT . '/libraries/phpqrcode/qrlib.php';

$tempDir = WEBROOT . '/public/qrcodes';

$codeContents = '~d013S~d0138007~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d013~d0131USD~d0138007~d01316418649~d013FUJI%20XF%2056MM%20F1~d0462%20R~d013EX%20~d013529.99~d013344.00~d013~d013~d013~d013~d013~d013~d013~d0131FUJ~d027[31~d12601~d013INSPEC~d013344.00';


// we need to generate filename 
$fileName = 'qrcode_file_' . md5($codeContents) . '.png';

$pngAbsoluteFilePath = $tempDir . '/' . $fileName;
$urlRelativeFilePath =  '../qrcodes/' . $fileName;

// make png file
if (!file_exists($pngAbsoluteFilePath)) {
    // QRencode::encodeRAW
    QRcode::png($codeContents, $pngAbsoluteFilePath, QR_ECLEVEL_Q);
    echo 'File generated!';
    echo '<hr />';
} else {
    echo 'File already generated! We can use this cached file to speed up site on common codes!';
    echo '<hr />';
}

echo 'Server PNG File: ' . $pngAbsoluteFilePath;
echo '<hr />';

// displaying
//echo thisUrl();
// echo '<br>';
// echo 'WEBROOT: ' . WEBROOT;
// echo '<br>';
// echo 'APPROOT: ' . APPROOT;
// echo '<br>';
// echo '<img src="../qrcodes/test002.jpg" />';
// echo '<br>';
// echo '<br>';
echo '<img src="' . $urlRelativeFilePath . '" width="125" height="125">';
