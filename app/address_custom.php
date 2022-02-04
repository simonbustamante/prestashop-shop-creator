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
    $attribute['id_country'] = "PH";
    $attribute['id_state'] = "PH-EXAMPLE".$count;
    if($attribute['id_supplier']!="" && $supplier == 0)
    {
        $supplier = $supplier + 1;
        $attribute['id_supplier'] = "Mayani";
        $attribute['id'] = "S".$supplier;
    }
    else if($attribute['id_customer']!="" || $attribute['id_supplier']!="" || $attribute['id_manufacturer']!="")
    {
        if($id_customer <= 8000)
        {
            $attribute['id_customer'] = "C".$id_customer;
            $attribute['id'] = $attribute['id_customer'];
            $attribute['id_supplier'] = "";
            $attribute['id_manufacturer'] = "";
            $id_customer++;
        }
        else
        {
            $attribute['id_customer'] = "G".$id_customer;
            $attribute['id'] = $attribute['id_customer'];
            $attribute['id_supplier'] = "";
            $attribute['id_manufacturer'] = "";
            $id_customer++;
        }
    }
    $count = $count + 1;

    
}

file_put_contents($file,$entity->asXML());
echo "\n\033[33m * ".$file_name." \033[34m => ACTUALIZADO";
