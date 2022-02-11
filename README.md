# About PrestaShop Shop Generator
--------

La plataforma B2C se encuentra basada en “Prestashop”   el cual es un sistema de gestión de contenidos (CMS) libre y de código abierto pensado para construir desde cero tiendas en línea de comercio electrónico. Enfocado para permitir crear tiendas en línea desde pequeñas empresas a grandes corporaciones. Cuenta con un amplio mercado de temas con los que personalizar la tienda y más de 5000 módulos, entre gratuitos y de pago, con los que adaptar las funcionalidades propias de la herramienta.

Por otra parte “Prestashop” como compañía de servicios tecnológicos realiza pruebas de rendimiento sobre su plataforma generando data aleatoria y en cantidades que pueden ir de pequeñas a muy grandes. Para hacer esto, se usa la herramienta “prestashop-shop-creator” que genera una lista de carpetas y archivos xml en el directorio “generated_data” que debe copiarse en el directorio /install/fixtures/fashion de PrestaShop, para generar en la instalación una tienda inicializada con el especificado número de entidades.


# Instalación y configuración

## Clonar proyecto prestashop-shop-creator

```
git clone https://github.com/simonbustamante/prestashop-shop-creator.git
```
--------

## Instalar el aplicativo

```
cd prestashop-shop-creator
```
```
composer install
```

##### Presionar “enter” a todas las opciones por defecto y restaurar la configuración config_BACK.yml la cual contiene la  estructura de la data utilizada en esta simulación

```
cp app/config/config_BACK.yml app/config/config.yml
```

## Generar Datos Base
--------
```
php app/console.php
```
##### Espere mientras termina el proceso


## Los datos generados se encuentran basados en el modelo entidad de Prestashop
--------
Cada  modelo entidad  es descrito en el directorio src/Model. La estructura de generada contine la siguiente información:

# config_BACK.yml

```
parameters:
    shop_id: 1
    customers: 13000
    manufacturers: 10000
    suppliers: 1
    addresses: 13001
    aliases: 1
    categories: 3
    warehouses: 1
    carriers: 1
    specific_prices: 40000
    attribute_groups: 1
    products: 40000
    attributes: 1
    carts: 52000
    cart_rules: 1
    customizations: 1
    features: 1
    feature_values: 1
    orders: 4
    guests: 5000
    order_histories: 5
    range_prices: 100
    range_weights: 100
    product_attributes: 1
    images: 1
    order_messages: 100
    deliveries: 15000
    connections: 20000
    product_suppliers: 1
    order_carriers: 1
    order_details: 4
    feature_products: 1
    stores: 1
    profiles: 10
    stock_availables: 1
    langs:
        - fr_FR
        - en_US

```


