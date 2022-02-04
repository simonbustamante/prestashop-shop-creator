<?php

include("address_custom.php");
include("cart_custom.php");
include("category_custom.php");
include("category_group_custom.php");
include("category_product_custom.php");
include("connections_custom.php");
include("customer_custom.php");
include("delivery_custom.php");
include("guest_custom.php");
include("manufacturer_custom.php");
include("orders_custom.php");
include("product_custom.php");
include("product_supplier_custom.php");
include("specific_price_custom.php");
include("store_custom.php");
include("supplier_custom.php");

echo "\n\n\n\033[33m IMPORTANTE!!! - AJUSTAR ARCHIVOS XML DE FORMA MANUAL SEGUN LAS INSTRUCCIONES !!!";
echo "\n\n\033[33m 1.- category_group.xml \033[0m => \033[31m BORRAR MANUALMENTE NODOS \033[33m 'category_group' \033[31m DE ID 13 al 15";
echo "\n\n\033[33m 2.- category_product.xml \033[0m => \033[31m BORRAR MANUALMENTE NODOS \033[33m 'category_product' \033[31m DE ID 80001 al 200000";
echo "\n\n\033[33m 3.- order_carrier.xml \033[0m => \033[31m BORRAR MANUALMENTE NODOS \033[33m 'order_carrier' \033[31m DE ID_ORDER 40001 al 52000";
echo "\n\n\033[33m 4.- order_detail.xml \033[0m => \033[31m BORRAR MANUALMENTE NODOS \033[33m 'order_detail' \033[31m DE ID_ORDER 40001 al 52000";
echo "\n\n\033[33m 5.- order_history.xml \033[0m => \033[31m BORRAR MANUALMENTE NODOS \033[33m 'order_history' \033[31m DE ID_ORDER 40001 al 52000";
echo "\n\n\033[33m 6.- orders.xml \033[0m => \033[31m BORRAR MANUALMENTE NODOS \033[33m 'orders' \033[31m DE ID_ORDER 40001 al 52000";