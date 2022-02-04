<?php 
$file_name = "specific_price.xml";
$file = "./generated_data/data/".$file_name;
$xml = file_get_contents($file);
$groups = ['Guest','Customer'];
$entity = new SimpleXMLElement($xml,LIBXML_PARSEHUGE);
$id_customer = 1;
$id_cart = 1;
$id_product = 1;
foreach($entity->entities->specific_price as $attribute)
{
    $attribute['id_cart'] = $id_cart++;
    $attribute['id_product'] = $id_product;
    $attribute['id_country'] = "PH";
    $attribute['id_product_attribute'] = $id_product++;
    if($id_customer <= 8000)
    {
        if($id_customer == 1) $switch = 1;
        $attribute['id_group'] = $groups[$switch];
        $attribute['id_customer'] = "C".$id_customer;
        $id_customer++;
    }
    else if ($id_customer>8000)
    {
        if($id_customer == 8001) $switch = 0;
        $attribute['id_group'] = $groups[$switch];
        $attribute['id_customer'] = "G".$id_customer;
        $id_customer++;
        if($id_customer>13000) $id_customer = 1;
        
    }

}

file_put_contents($file,$entity->asXML());
echo "\n\033[33m * ".$file_name." \033[34m => ACTUALIZADO";
