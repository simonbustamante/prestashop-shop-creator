<?php
$file_name = "manufacturer.xml"; 
$file = "./generated_data/data/".$file_name;
$xml = file_get_contents($file);

$entity = new SimpleXMLElement($xml,LIBXML_PARSEHUGE);
$count = 1;
foreach($entity->entities->manufacturer as $attribute)
{
    $attribute['id'] = "Farm ".$count;
    $attribute['name'] = "Farm ".$count;
    $count = $count + 1;
}

file_put_contents($file,$entity->asXML());
echo "\n\033[33m * ".$file_name." \033[34m => ACTUALIZADO";
