<?php 
$file_name = "category.xml";
$file = "./generated_data/data/".$file_name;
$xml = file_get_contents($file);
$category = ['Farming','Fishing','Cattle Raising'];
$entity = new SimpleXMLElement($xml);
$count = 1;
$catNum = 0;
foreach($entity->entities->category as $attribute)
{
    $attribute['id_parent'] = "Home";
    $attribute['id'] = $category[$catNum];
    $attribute->addAttribute('name', $category[$catNum]);
    $count = $count + 1;
    if($catNum == 2)
        $catNum = 0;
    else
        $catNum = $catNum + 1;
}

file_put_contents($file,$entity->asXML());
echo "\n\033[33m * ".$file_name." \033[34m => ACTUALIZADO";
