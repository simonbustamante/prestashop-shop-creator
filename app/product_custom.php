<?php
$file_name = "product.xml"; 
$file = "./generated_data/data/".$file_name;
$xml = file_get_contents($file);
$category = ['Farming','Fishing','Cattle Raising'];
$catNum = 0;
$entity = new SimpleXMLElement($xml,LIBXML_PARSEHUGE);

$count = 1;


foreach($entity->entities->product as $attribute)
{
    if($count > 10000) $count = 1;
    $attribute['id_supplier'] = "Mayani";
    $attribute['id_manufacturer'] = "Farm ".$count;
    $attribute['id_category_default'] = $category[$catNum] ;

    if($catNum == 2) $catNum = 0;
    else $catNum = $catNum + 1;
    
    $count++;
}

file_put_contents($file,$entity->asXML());
echo "\n\033[33m * ".$file_name." \033[34m => ACTUALIZADO";
