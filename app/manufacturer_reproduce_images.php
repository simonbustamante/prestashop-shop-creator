<?php
$folder = "./generated_data/img/m/";  
$filenames = array_diff(scandir($folder), array('.', '..'));   
$count = 1;
$quantity_to_copy = 10000 - count($filenames);

echo $quantity_to_copy;

for($i = 1;$i <= $quantity_to_copy; $i++)
{
    copy($folder.$filenames[2], $folder.$filenames[2].$i);
}


echo "\n\033[33m * manufacturer images \033[34m => NUEVAS IMAGENES GENERADAS PARA COMPLETAR 10000";
