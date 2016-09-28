# Aplicación en laravel basada en el reto "cube summation" de hackerrank

https://www.hackerrank.com/challenges/cube-summation

### Prerequisitos

 - php5-sqlite
	 -  sudo apt-get install php5-sqlite (Ubuntu)

#### Manual
- Clonar el repositorio
- Crear el archivo de entorno ".env" desde el de archivo de ejemplo: `cp .env.testing .env`
- Instalar las dependencias mediante composer: `composer install`
- Generar la llave de seguridad: `php artisan key:generate`
- Crear la carpeta para caché: `mkdir bootstrap/cache`
- Ejecutar la aplicación: `php artisan serve`
- Visitar la url: http://localhost:8000/


### Ejecutar los test

Correr codeception

```
./vendor/bin/codecept build
./vendor/bin/codecept run
```

El set de pruebas incluye:

- Pruebas  funcionales de la Api
- Pruebas unitarias de la clase cubo
