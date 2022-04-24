# Marvel_API
Connection to marvel API and putting the data in MySQL with PHP
Usando la API /v1/public/comics extraje los datos necesarios de comics, limitando la consulta a objetos Json, estos objetos los trabajo completamente
desde un perfil de inventario, para poder agregarlos a las sucursales que deben ser creadas en primera instancia.
Las sucursales se agregarán a una base de datos llamada "gest_comics", específicamente en la tabla sucursales.
Las sucursales pueden ser Agregadas, Consultadas(Son la primer vista en el index y propiamente en una tabla en el apartado donde se crean), modificadas y eliminadas.
Una vez creada la sucursal, desde la mtriz donde se crea, podemos acceder al apartado del inventario, es aqui donde la consulta a la API /v1/public/comics
nos muestra los 50 objetos Json y dichos objetos tienen un apartado para agregarlos a la base de datos en una tabla llamada "inventario" y 
poder relacionarlo también a la sucursal(se obtiene el id de la sucursal y se asigna al valor del cómic para saber a qué sucursal pertenece).
Una vez tenemos agregados los cómics a la base de datos, podemos ingresar a las sucursales y ver(gracias a una consulta a la base de datos), 
sus cómics específicos.
