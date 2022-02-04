<?php
$folder = "./generated_data/img/m/";  
$filenames = array_diff(scandir($folder), array('.', '..'));   
$count = 1;

foreach($filenames as  $filename)
{
    rename($folder.$filename, $folder."Farm ".$count++.".jpg");
}


echo "\n\033[33m * manufacturer images \033[34m => IMAGENES ACTUALIZADAS";
