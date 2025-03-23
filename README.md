# Prueba Técnica Amplifica

Este repositorio contiene la solución para la prueba técnica de **Amplifica**, que consiste en el desarrollo de una aplicación backend utilizando Laravel para la gestión de pedidos y tarifas de envío.

## Requisitos

Antes de comenzar, asegúrate de tener las siguientes herramientas instaladas en tu máquina:

- [Git](https://git-scm.com/)
- [Composer](https://getcomposer.org/)

Además, este proyecto está desarrollado con las siguientes versiones de las herramientas:

- Laravel 10
- PHP 8.0^

## Instalación

Sigue los siguientes pasos para configurar el proyecto en tu entorno local:

1. **Clonar el repositorio**  
   Ejecuta el siguiente comando para clonar el repositorio en tu máquina local:

   ```bash
   git clone https://github.com/efuentealbaCh/desafio-amplifica.git
   ```
2. **Accder al directorio**  
    Ejecutar el comando
    ```bash
    cd desafio-amplifica
    ```
3. **Instalar dependencias**
    Ejecutar el comando de instalación de composer
    ```bash
    composer install
    ```
4. **Configuración del entorno**
    Ejecutar comando
    ```bash
    cp .env.example .env
    ```
5. **Generar la clave de la aplicación**

    Después de configurar el archivo .env, ejecuta el siguiente comando para generar la clave de la aplicación Laravel:
    
    ```bash
    php artisan key:generate
    ```
6. **Iniciar el servidor de desarrollo**
    ```bash
    php artisan serve
    ```
Una vez iniciado el servicio se puede acceder a las rutas usando los metodos especificados para cada endopint de la api externa entregada, se pueden usar las credenciales proporcionadas para la realización de esta prueba y los mismos body json entregados como ejemplo.

Rutas API:

- POST /api/auth: sirve para autentica al usuario y generar un tokn JWT
- POST /api/getRate: Consulta las tarifas de envío para los productos en el carrito.
- GET/ API/regiones: Obtiene las regiones y comunas disponibles.

De igual forma solo hace falta acceder a la ruta http://127.0.0.1:8000/ y una vez que este lenvantado el servicio esta ruta nos lleva a una vista front de login, una vez loggeados nos mostrar la vista en la cual podemos probar las fucionalidades para hacer un pedido.
