<?php 
$file_name = "category_group.xml";
$file = "./generated_data/data/".$file_name;
$xml = file_get_contents($file);
$category = ['Home','Farming','Fishing','Cattle Raising'];
$groups = ['Visitor','Guest','Customer'];
$entity = new SimpleXMLElement($xml);
$count = 1;
$catNum = 0;
$group = 0;

//if you need to unset some nodes, uncomment this
/*$data = $entity->entities;

for($i=1;$i<=3;$i++)
{
    unset($data->xpath('category_group[@id="'.$i.'"]')[0]->{0});
    system('clear');
    echo "limpiando nodos que no se necesitan ".$i."\n";
}

file_put_contents($file,$data->asXML());
*/

foreach($entity->entities->category_group as $attribute)
{
    if($catNum<4)
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
