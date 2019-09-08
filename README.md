# proyecto-qtesting
Proyecto Final para el modulo de PRUEBAS DE SOFTWARE – QTESTING

Desarrollado en PHP utilizando PHPUnit para las pruebas unitarias, para ejecutarlo hay que tener instalado :

- PHP Version 7 o superior
- MYSQL
- Composer

Una vez clonado el repositorio, abrir la consola dentro de la carpeta "server" y ejecutar el comando: 
```
composer update 
```
Una vez instalados los componentes necesarios , se procedera creacion de una Base de Datos MySql llamado "proyectofinal" y dentro de ella se ejecutara el script "proyectofinal.sql" que se encuentra el repositorio.

Realizar las configuraciones respectiva para la conexion de la BD en "server/app/DB.php"

# Pruebas Unitarias

Dentro de la consola dirigirse a la direccion "server" del repositorio, para ejecutar las pruebas unitarias utilizar el comando 
```
vendor/bin/phpunit 
```
# Pruebas Integracion, UI

Para levantar el servidor ejecutar en la consola el siguiente comando en la direccion "server/app" : 
```
php -S localhost:8000
```
Con la consola en la raiz del proyecto para instalar las dependencias de Node con la instruccion : 
```
npm install
```
Para ingresar a la UI una vez levantado el servidor en la siguiente direccion :
```
http://localhost:8000/formulario.php
```

Para ejecutar las pruebas ejecutar la consola en la raiz del proyecto con la instruccion:
```
./node_modules/.bin/cucumber-js
```
