<?php

$filename = "C:/xampp/htdocs/PHP-Gr.40/FileExport.php";
$file = fopen ("$filename", "w");

fwrite($file, " Ky tekst eshte lexuar nga file 'FileExport.php'.");
if(file_exists($filename)){
	$filesize = filesize($filename);
	$msg = "Fajlli u krijua me emrin '$filename'.";
	
	echo ($msg);
}
else
{
	echo ("Fajlli me emrin '$filename' nuk ekziston.");
}

?>