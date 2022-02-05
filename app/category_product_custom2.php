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
    //root
    if($count <= 40000 && $catNum == 0)
    {
        $attribute['id_category'] = $category[$catNum];
        $attribute['id_product'] = $attribute['id'];
        $count++;
        if($count>40000)
        {
            $catNum++;
            $count = 1;   
        }
    }
    //Home
    else if($count <= 40000 && $catNum == 1)
    {
        $attribute['id_category'] = $category[$catNum];
        $attribute['id_product'] = $count;
        $count++;
        if($count>40000)
        {
            $catNum++;
            $count = 1;   
        }
    }
    //Farming
    else if($count <= 40000 && $catNum == 2)
    {
        $attribute['id_category'] = $category[$catNum];
        $attribute['id_product'] = $count;
        $count = $count + 3;
        if($count>40000)
        {
            $catNum++;
            $count = 2;   
        }
    }
    //Fishing
    else if($count <= 40000 && $catNum == 3)
    {
        $attribute['id_category'] = $category[$catNum];
        $attribute['id_product'] = $count;
        $count = $count + 3;
        if($count>40000)
        {
            $catNum++;
            $count = 3;   
        }
    }

    //Cattle Raising
    else if($count <= 40000 && $catNum == 4)
    {
        $attribute['id_category'] = $category[$catNum];
        $attribute['id_product'] = $count;
        $count = $count + 3;
        if($count>40000)
        {
            $catNum++;
            $count = 4;   
        }
    }
    
    
}

file_put_contents($file,$entity->asXML());
echo "\n\033[33m * ".$file_name." \033[34m => ACTUALIZADO";
