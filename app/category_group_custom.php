<?php 
$file_name = "category_group.xml";
$file = "./generated_data/data/".$file_name;
$xml = file_get_contents($file);
$category = ['Root','Home','Farming','Fishing','Cattle Raising'];
$groups = ['Visitor','Guest','Customer'];
$entity = new SimpleXMLElement($xml);
$count = 1;
$catNum = 0;
$group = 0;


foreach($entity->entities->category_group as $attribute)
{
    if($catNum<5)
    {
        $attribute['id_category'] = $category[$catNum];
        $attribute['id_group'] = $groups[$group];
        $catNum++;
    }
    else
    {
        $catNum = 0;
        $group++;
        if($group > 2) $group = 0;
        $attribute['id_category'] = $category[$catNum];
        $attribute['id_group'] = $groups[$group];
        $catNum++;
    }
}

file_put_contents($file,$entity->asXML());
echo "\n\033[33m * ".$file_name." \033[34m => ACTUALIZADO";
