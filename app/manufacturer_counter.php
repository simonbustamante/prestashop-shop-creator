<?php
$file_name = "manufacturer.xml"; 
$file = "./generated_data/data/".$file_name;
$xml = file_get_contents($file);

$entity = new SimpleXMLElement($xml,LIBXML_PARSEHUGE);
$entity2 = new SimpleXMLElement($xml,LIBXML_PARSEHUGE);
$count = 0;
foreach($entity->entities->manufacturer as $attribute)
{
    $count = 0;
    foreach($entity2->entities->manufacturer as $attribute2)
    {
        
        //echo "\n".$attribute['id']." ".$attribute2['id']; 
        if(strcmp($attribute['id'], $attribute2['id']) === 0)
        {
            $count++; //echo $count;
        }
        
    }
    if ($count >= 2){
        echo "\n".$attribute['id']." => ".$count;   
    }
}

//file_put_contents($file,$entity->asXML());
echo "\n\033[33m * ".$file_name." \033[34m => ACTUALIZADO";
