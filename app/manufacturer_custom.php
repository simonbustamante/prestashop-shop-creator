<?php 
$manufacturer_file = "./generated_data/data/manufacturer.xml";
$manufacturer_xml = file_get_contents($manufacturer_file);

$manufacturer = new SimpleXMLElement($manufacturer_xml);
$count = 1;
foreach($manufacturer->entities->manufacturer as $manu)
{
    $manu['id'] = "Farmer ".$count;
    $manu['name'] = "Farmer ".$count;
    $count = $count + 1;
}

file_put_contents($manufacturer_file,$manufacturer->asXML());
echo "\n".$manufacturer." actualizado";
