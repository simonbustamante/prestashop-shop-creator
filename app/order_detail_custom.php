<?php 
$file_name = "order_detail.xml";
$file = "./generated_data/data/".$file_name;
$xml = file_get_contents($file);

$entity = new SimpleXMLElement($xml,LIBXML_PARSEHUGE);
$id_customer = 1;
$id_guest = 1;
$customer_count = 1;
$id_cart = 1;
$id_product = 1;
foreach($entity->entities->order_detail as $attribute)
{
    if($id_product>40000) $id_product = 1;
    $attribute['product_id'] = $id_product;
    $attribute['product_attribute_id'] = $id_product;
    $attribute['product_name'] = "Product ".$id_product++;   
}

file_put_contents($file,$entity->asXML());
echo "\n\033[33m * ".$file_name." \033[34m => ACTUALIZADO";
