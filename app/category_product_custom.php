<?php 
$file_name = "category_product.xml";
$file = "./generated_data/data/".$file_name;
$xml = file_get_contents($file);
$category_home = "Home";
$category = ['Farming','Fishing','Cattle Raising'];
$entity = new SimpleXMLElement($xml,LIBXML_PARSEHUGE);
$count = 1;
$product = 1;
$catNum = 0;

//if you need to unset some nodes, uncomment this
/*$data = $entity->entities;

for($i=1;$i<=120000;$i++)
{
    unset($data->xpath('category_product[@id="'.$i.'"]')[0]->{0});
    system('clear');
    echo "limpiando nodos que no se necesitan ".$i."\n";
}

file_put_contents($file,$data->asXML());
*/

foreach($entity->entities->category_product as $attribute)
{
    $attribute['id'] = $count;
    $count++;

    if($count % 2 == 0)
    {
        $attribute['id_category'] = "Home";
        $attribute['id_product'] = $product;
    }
    else
    {
        if($catNum>2) $catNum = 0;
        $attribute['id_category'] = $category[$catNum];
        $attribute['id_product'] = $product;
        $product++;
        $catNum++;
    }
}

file_put_contents($file,$entity->asXML());
echo "\n\033[33m * ".$file_name." \033[34m => ACTUALIZADO";
