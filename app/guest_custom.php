<?php 
$file_name = "guest.xml";
$file = "./generated_data/data/".$file_name;
$xml = file_get_contents($file);

$entity = new SimpleXMLElement($xml,LIBXML_PARSEHUGE);
$count = 8001;
foreach($entity->entities->guest as $attribute)
{
    $attribute['id_customer'] = "G".$count;
    $count++;
}

file_put_contents($file,$entity->asXML());
echo "\n\033[33m * ".$file_name." \033[34m => ACTUALIZADO";
