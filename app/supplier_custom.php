<?php 
$file_name = "supplier.xml";
$file = "./generated_data/data/".$file_name;
$xml = file_get_contents($file);

$entity = new SimpleXMLElement($xml);
$count = 1;
foreach($entity->entities->supplier as $attribute)
{
    $attribute['id'] = "Mayani";
    $attribute['name'] = "Mayani";
    $count = $count + 1;
}

file_put_contents($file,$entity->asXML());
echo "\n\033[33m * ".$file_name." \033[34m => ACTUALIZADO";
