<?php 
$file_name = "customer.xml";
$file = "./generated_data/data/".$file_name;
$xml = file_get_contents($file);

$entity = new SimpleXMLElement($xml,LIBXML_PARSEHUGE);
$count = 1;
foreach($entity->entities->customer as $attribute)
{
    if($count <= 8000)
    {
        $attribute['id'] = "C".$count;
        $attribute['is_guest'] = 0;
        $count++;
    }
    else if($count > 8000)
    {
        $attribute['id'] = "G".$count;
        $attribute['is_guest'] = 1;
        $count++;
    }


}

file_put_contents($file,$entity->asXML());
echo "\n\033[33m * ".$file_name." \033[34m => ACTUALIZADO";
