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

How to run the script
--------
```
php app/console.php
```
Make sure to have enough memory allocated to php, as it could eat a lot of memory depending on the number of entities
you want to generate


Entity Model syntax
--------
Each entity model is described in the src/Model directory.

If you want to add a new Model, create of file with the same name the class it's related to, and an entry in the 
app/config/config.yml.dist file (the name should be the pluralized & tablized version of the model name).


The model file is in yml format, and contains three main section:

1. <b>The fields section (required)</b>

    This section describes the list of fields of an entity (not language related).
    
    Available options in this section:
    
    1. <i><b>columns (required) </b></i>

        Describe each field of the entity we want to generate.
        
        Syntax:
        ```yaml
        columns:
            id:
              type: increment        
            id_state:
              relation: State
            exclusive_fields:
              id_customer:
                relation: Customer
              id_manufacturer:
                relation: Manufacturer
              id_supplier:
                relation: Supplier
            id_warehouse:
              value: 0
            alias:
              type: words
              args:
                - 10 #nb words
            id_customer:
              relation: Customer
              conditions: 
               id_guest: 1
            name:
              type: word
              args:
                - 10 #nb chars
              hidden: true   
            price:
              type: numberBetween
              args:
                - 1 #start
                - 1000 #stop
            wholesale_price:
              value: '{price}/100'              
        ```
        1. <u>the 'type' property</u>
            
            * 'increment' is a simple autoincrement.
            
            * 'conditionalValue' allow to generate value depending on a condition.
            Example:
                ```yaml
                default_on:
                  type: conditionalValue
                  args:
                    - isNewValue({id_product}) # condition
                    - 1 # value if condition is true
                    - null # value if condition is false
                ```
             The isNewValue is a special function which checks if the value related to the field {id_product} 
             has changed since the last time we have generated an entity.   
            
            * other properly value allows to generate random value. , another types
            available are described from the faker module: https://github.com/FakerPHP/Faker 
            
            If you need to pass an argument to a faker function, just add the 'args:' tag like in the above example.
            
            If you want to generate a field, but hide it from the final result, add the "hidden: true" property
            (only useful if the field in question is referenced as an "id", but only present in the field_lang)
            
        2. <u>the 'relation' property</u>
        
            The 'relation' property indicates it should generates the value from an another entity (it will use a value
            from the 'id' of the other entity).
            
            If the 'generate_all' property is used in conjunction with a relation type, it means we should use
            all the existing relations instead of just choosing a random one. It's especially usefull if we want for
            example generate combinations for every product in the database:
            
            ```yaml
            fields:
                class: 'Combination'
                columns:
                    id:
                      type: increment
                    id_product:
                      relation: Product
                      generate_all: true
            ```
            
            If the 'conditions' property is used in conjunction with a relation type, it means all the fields specified 
            should have the specified value in the related entity:
            
            ```yaml
            fields:
                class: 'Guest'
                columns:
                    id:
                      type: increment
                id_customer:
                  relation: Customer
                  conditions:
                    is_guest: 1
            ```
            
        3. <u>the 'value' property</u>
                         
            The 'value' property sets a specific value for the column. It could also be a reference to another
            column, or a mathematical expression, like the "wholesale_price" in the example above.
            
        4. <u>the 'exclusive_fields' property</u>
                 
            Some columns should have a value only if other column are not set.
            That's the purpose of this property. In the example above only one randomly chosen field 
            among id_customer/id_manufacturer/id_supplier will be set.
    
    2. <i><b>class (optional) </b></i>
    
        The name of the class related to the entity.
        
        Example: 
            
        ```yaml
        class: 'Carrier'
        ```
    3. <i><b>sql (optional)</b></i>
        
        Sql argument when want to add to help debugging
        
        Example:
        ```yaml
        sql: 'a.id_carrier > 1'
        ```
    
    4. <i><b>id</b></i>
    
        The 'id' tag sets which field inside the 'columns' property should be considered as a the reference unique field 
        for relation resolution.
        
        Example:
        ```yaml
        id: 'name'
        ```
     
    5. <i><b>primary</b></i>
    
        When the primary tag is used, the script iterate over all the existing values, excepted if there's a 
        'generate_all: true' tag present (the fields in the 'primary' tag should be described as relations to other 
        entities)
        
        Example:
        ```yaml
        primary: 'id_carrier, id_group'
        columns:
            id_carrier:
              relation: Carrier
            id_group:
              relation: Group
       ```      
     
    6. <i><b>image (optional)</b></i>
        
        Generate random images in the given relative path of the generated_data/img/ directory for each entity.
        It's used in conjonction with image_width, image_height and image_category.
        
        Example:
        ```yaml
       image: 'c'
       image_width: 141
       image_height: 180
       image_category: abstract
        ```
           
        Possible image_category are:
        ```  
        abstract
        animals
        business
        cats
        city
        food
        night
        life
        fashion
        people
        nature
        sports
        technics 
        transport
        ```                                        

2. <b>The fields_lang section (optional)</b>

    This section describes the list of fields present in the language related part of the entity (if any).
    
    You can set an optional 'id_shop' tag and a 'columns' property which support the type same 'value' and 'type' than the 
    'fields' section.
    
    Example:
    ```yaml
    fields_lang:
        id_shop: 1
        columns:
            name:
              type: words
              args:
                - 6
            description:
              type: sentence
            description_short:
              type: sentence
              args:
                - 4
            link_rewrite:
              type: slug
            available_now:
              value: In stock
    ```  

3. <b>The entities section (optional)</b>

    This section describes any custom entities we want to create (no random generation for those one).
    
    The key of each entry used will be used as the 'id' of the entity

    Example:
    ```yaml
    entities:
        My_carrier:
            fields:
                id_reference: 2
                active: 1
                shipping_handling: 1
                range_behaviour: 0
                is_free: 0
                shipping_external: 0
                need_range: 0
                shipping_method: 0
                max_width: 0
                max_height: 0
                max_depth: 0
                max_weight: 0
                grade: 0
                name: My carrier
                url: ~
            fields_lang:
                delay: Delivery next day!
    ```


Default xml data
--------
If you want to use a default xml file instead of generating one using the entity model, just put it in the default_data 
directory.

It will be automatically parsed by the script and will be taken into account for the existing entity relations.
