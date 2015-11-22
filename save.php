<?php
$filename = "data.json";
$file = fopen($filename, 'w') or die("can't open file");
$stringData = $_GET["data"];
fwrite($file, $stringData);
fclose($file)
?>