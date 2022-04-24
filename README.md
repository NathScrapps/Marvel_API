# Marvel_API
## Conexión a la **API** gratuita de Marvel usando MySQL y PHP.

***¿Cómo usar la App?
Para trabajar con la APP, se precisa tener acceso a la propia API, por lo cual, es necesario registrarse en [Marvel para desarrolladores](https://developer.marvel.com/).

***Una vez se haya realizado el registro:***
1. Al ingresar a tu [cuenta](https://developer.marvel.com/account), el sitio te otorgan:
	- Public key.
	- Private key
	- Dominios a través de los cuales se podrá conectar a la API (también se pueden registrar o eliminar dichos dominios).
2. Para poder conectarse a la API se requiere hacer un hash MD5 de manera conjunta a los valores: 
	- Timestamp (ts), se debe asignar un valor númerico a este parámetro.
	- Private key.
	- Public key.
> Se puede buscar un sitio en internet para hacer este proceso. El hash debe hacerse ingresando los tres parámetros anteriores (ts+Private_key+Public_key).
> El valor de ***ts*** también se usará por separado en la ***URL*** a la que nos conectaremos.
> Este paso puedes corroborarlo en [autenticación para aplicaciones de lado del servidor](developer.marvel.com/documentation/authorization).

3. Agregar una lista de dominios desde los que se podrá tener acceso a la API (en mi caso dejé el sitio por defecto "***developer.marvel.com***" y agregué otro llamado "***localhost***" para poder acceder desde mi servidor local).
4. Una vez tenemos el hash, lo agregaremos reemplazando los valores de la ***URL*** que obtenemos en el apartado [documentación interactiva](https://developer.marvel.com/docs) , llamada "***Request URL***", realizando una consulta a cualquier API Get que nos proporciona este apartado (click sobre la API, dirigirse hasta la parte de abajo de la misma sección de la API y hacer click sobre el botón "***Try it out!***"), en este proyecto se realizó a la API "***v1/public/comics***", tal que el resultado fue:
	* https://gateway.marvel.com:443/v1/public/comics?apikey=
	> Esta es la estructura base de la URL usada para este proyecto.
5. Ahora que ya tenemos los valores necesarios y los conocimientos sobre los mismos, acceder a los siguientes documentos para colocar tus propias claves y valores:
	- assets\complements\comic_price_API.php
	- assets\complements\character_comicAPI.php
	- assets\complements\api_comic.php
	> Ejemplo: https://gateway.marvel.com:443/v1/public/comics?ts=1&apikey=d08578d6407e408beb952d33978d92
 
## Para trabajar la base de datos:
1. Crear una base de datos con el nombre "***gest_comics***", e importar la base de datos anexada en la carpeta "***assets/bd/***".
> En caso de querer crear tu propia bd, deberás modificar el nombre asignado a la base de datos en los archivos de conexion y consulta.
	> En caso de usar el mismo nombre para tu bd, deberás crear 2 tablas con las siguientes estructuras:
	A. Tabla sucursales:
		- id int(11) primary_key Auto_increment,
		- sucursal varchar(255),
		- direc text,
		- habre time,
		- hcierra time
	B. Tabla inventario:
		- id_inventario int(11) primary_key Auto_increment,
		- id_comic int(10),
		- title varchar(255),
		- descripcion text,
		- pagenums int(5),
		- imagen varchar(255),
		- disponibilidad varchar(50),
		- id_sucursal int(11).
### Función principal del proyecto:
CRUD simple de sucursales, agregar de manera local(en la base de datos) a las sucursales creadas, cómics que se obtengan de la consulta a la API, para posteriormente poder consultar el inventario de cada sucursal, o bien el inventario de manera global.
