<?php 
$file_name = "address.xml";
$file = "./generated_data/data/".$file_name;
$xml = file_get_contents($file);
$entity = new SimpleXMLElement($xml,LIBXML_PARSEHUGE);
$count = 1;
$id_customer = 1;
$id_guest = 1;
$supplier = 0;
foreach($entity->entities->address as $attribute)
{
    $attribute['dni'] = $count;
    $count = $count + 1;
}

file_put_contents($file,$entity->asXML());
echo "\n\033[33m * ".$file_name." \033[34m => ACTUALIZADO";
