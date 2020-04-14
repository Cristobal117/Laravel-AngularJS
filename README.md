## Instalación

+ Después de descargar el proyecto entramos a la carpeta del proyecto.

        cd nombreRepositorio

+ Ejecutamos el siguiente comando.

        composer install
    
+ Modificamos el nombre del archivo .env.example. por .env y agregamos los datos de la base de datos

+ Realizamos las migraciones

        php artisan migrate


+ Por ultimo solo debemos generar una key para nuestra API.

         php artisan key:generate

+ Listo ya podemos ejecutar nuestra API.

        php artisan serve