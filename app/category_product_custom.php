<?php 
$file_name = "category_product.xml";
$file = "./generated_data/data/".$file_name;
$xml = file_get_contents($file);
$category = ['Root','Home','Farming','Fishing','Cattle Raising'];
$entity = new SimpleXMLElement($xml,LIBXML_PARSEHUGE);
$count = 1;
$id_product = 1;
$catNum = 0;


foreach($entity->entities->category_product as $attribute)
{
    if($catNum<5)
    {
        $attribute['id_category'] = $category[$catNum];
        $attribute['id_product'] = $id_product;
        $catNum++;
    }
    else
    {
        $catNum = 0;
        $id_product++;
        $attribute['id_category'] = $category[$catNum];
        $attribute['id_product'] = $id_product;
        $catNum++;
    }
}

file_put_contents($file,$entity->asXML());
echo "\n\033[33m * ".$file_name." \033[34m => ACTUALIZADO";
