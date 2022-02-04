<?php 
$file_name = "store.xml";
$file = "./generated_data/data/".$file_name;
$xml = file_get_contents($file);

$entity = new SimpleXMLElement($xml);
$count = 1;
foreach($entity->entities->store as $attribute)
{
    $attribute['id_country'] = "PH";
    $attribute['id_state'] = "manila";
    $attribute['city'] = "manila";
    $attribute['id'] = "manila";
    $attribute['post_code'] = "1000";
    $attribute['latitude'] = "14.6006";
    $attribute['longitude'] = "120.982";
    $attribute['email'] = "simon.bustamante@gmail.com";

    $count = $count + 1;
}

file_put_contents($file,$entity->asXML());
echo "\n\033[33m * ".$file_name." \033[34m => ACTUALIZADO";
