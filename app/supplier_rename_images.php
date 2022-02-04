<?php 
$folder = "./generated_data/img/su/";  
$filenames = array_diff(scandir($folder), array('.', '..'));   
$count = 1;

foreach($filenames as  $filename)
{
    rename($folder.$filename, $folder."Mayani.jpg");
}


echo "\n\033[33m * supplier image \033[34m => IMAGEN ACTUALIZADA";

