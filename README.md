## About Rumbabar

Aplicación sencilla para registro de ventas en el establecimiento Rumbabar

## User Requirements

Aparte de los requerimientos solicitados incluye algunos adicionales como:

- [validacion de existencia para no ventas/productos guardados]().
- [peticiones realizadas de forma asincrona con Ajax]().
- [se mantiene actualizado el total de resultados para los productos de cada venta]().
- [se activa mecanismo de paginación de lado del servidor]().

## App Requirements
- [Laravel 7.3+](https://github.com/laravel/framework)

## Demo
- [Demo Application](http://2279dba5ca41.ngrok.io) tunnel available for 8 hours.

## Installing Rumbabar

 - clone this repository 
`git clone https://github.com/Lsickle/rumbabar.git`

 - install php dependencies 
`composer install`

 - install javascript dependencies and compilate scripts 
`npm install && npm run dev`

 - copy .env file 
`cp .env.example .env`

 - generate key file with artisan 
`php artisan key generate`

 - modify your .env file to especify your db_table, db_user and db_password 

 - run migrations 
`php artisan migrate`

 - Enjoy!

## Rumbabar Sponsors

We would like to extend our thanks to the following sponsors for funding Intelcost development. 
  - [Instructor: Andrea Torres](mailto:atorres011@misena.edu.co)
  - [Carolina](mailto:kiito.0519@gmail.com)
  - [Jessica](mailto:jeancora25@gmail.com)

### Premium Partners

- **[SENA](https://www.sena.edu.co)**


