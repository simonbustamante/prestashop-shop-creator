<?php 
$file_name = "cart.xml";
$file = "./generated_data/data/".$file_name;
$xml = file_get_contents($file);

$entity = new SimpleXMLElement($xml,LIBXML_PARSEHUGE);
$id_customer = 1;
$id_guest = 1;
$count = 1;
foreach($entity->entities->cart as $attribute)
{
    if($id_customer <= 8000)
    {
        $attribute['id_customer'] = "C".$id_customer;
        $attribute['id_guest']="";
        $attribute['id'] = $count++;
        $attribute['id_address_delivery'] = "C".$id_customer; 
        $id_customer++;
    }
    else if ($id_customer>8000)
    {
        
        $attribute['id_guest'] = "G".$id_customer;
        $attribute['id_customer'] = "";
        $attribute['id'] = $count++;
        $attribute['id_address_delivery'] = "G".$id_customer; 
        $id_customer++;
        if($id_customer>13000) $id_customer = 1;
        
    }

}

file_put_contents($file,$entity->asXML());
echo "\n\033[33m * ".$file_name." \033[34m => ACTUALIZADO";
