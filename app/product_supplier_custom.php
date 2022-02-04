<?php 
$file_name = "product_supplier.xml";
$file = "./generated_data/data/".$file_name;
$xml = file_get_contents($file);

$entity = new SimpleXMLElement($xml,LIBXML_PARSEHUGE);
$count = 1;
foreach($entity->entities->product_supplier as $attribute)
{
    $attribute['id_supplier'] = "Mayani";
    $attribute['id_product_attribute'] = $count;
    $count = $count + 1;
}

file_put_contents($file,$entity->asXML());
echo "\n\033[33m * ".$file_name." \033[34m => ACTUALIZADO";
