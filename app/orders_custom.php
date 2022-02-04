<?php 
$file_name = "orders.xml";
$file = "./generated_data/data/".$file_name;
$xml = file_get_contents($file);

$entity = new SimpleXMLElement($xml,LIBXML_PARSEHUGE);
$id_customer = 1;
$id_guest = 1;
$customer_count = 1;
$id_cart = 1;
foreach($entity->entities->orders as $attribute)
{
    $attribute['id_cart'] = $id_cart++;
    if($id_cart > 40000) $id_cart = 1;

    if($id_customer <= 8000)
    {
        $attribute['id_customer'] = "C".$id_customer;
        $attribute['id_address_delivery'] = "C".$id_customer;
        $attribute['id_address_invoice'] = "C".$id_customer;
        $attribute['name'] = "Order C".$id_customer;
        $id_customer++;
    }
    else if ($id_customer>8000)
    {
        $attribute['id_customer'] = "G".$id_customer;
        $attribute['id_address_delivery'] = "G".$id_customer;
        $attribute['id_address_invoice'] = "G".$id_customer;
        $attribute['name'] = "Order G".$id_customer;
        $id_customer++;
        if($id_customer>13000) $id_customer = 1;
    }

}

file_put_contents($file,$entity->asXML());
echo "\n\033[33m * ".$file_name." \033[34m => ACTUALIZADO";
