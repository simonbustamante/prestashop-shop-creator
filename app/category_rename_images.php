<?php 
$folder = "./generated_data/img/c/";  
$filenames = array_diff(scandir($folder), array('.', '..'));   
$categories = ['Farming','Fishing','Cattle Raising'];
$count = 0;
foreach($filenames as  $filename)
{
    rename($folder.$filename, $folder.$categories[$count++].".jpg");
}


echo "\n\033[33m * category images \033[34m => IMAGENES ACTUALIZADAS";

