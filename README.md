<div align="center">
  
# Proyecto Pos-Venta para empresa STHIL
<img width="15%" src="https://github.com/user-attachments/assets/494a2b0a-acd2-4a47-b779-45c11d3e133c">

### Front-End Vue.js (Nuxt.js)
<p>
  <code><img width="15%" src="https://www.vectorlogo.zone/logos/nuxtjs/nuxtjs-ar21.svg"></code>
  <code><img width="15%" src="https://www.vectorlogo.zone/logos/vuejs/vuejs-ar21.svg"></code>
  <code><img width="7%" src="https://github.com/user-attachments/assets/dd07c1a7-302b-484f-a212-950193fc97bc"></code>

</p>

### Back-End Laravel
<code><img width="15%" src="https://www.vectorlogo.zone/logos/laravel/laravel-ar21.svg"></code>
<code><img width="10%" src="https://www.vectorlogo.zone/logos/php/php-icon.svg"></code>

### Gestor de Base de Datos
<code><img width="15%" src="https://www.vectorlogo.zone/logos/mysql/mysql-ar21.svg"></code>

### Tecnologias
<code><img width="10%" src="https://www.vectorlogo.zone/logos/docker/docker-official.svg"></code>
<code><img width="15%" src="https://www.vectorlogo.zone/logos/nginx/nginx-ar21.svg"></code>
<code><img width="12%" src="https://github.com/user-attachments/assets/612c4826-b370-4be0-b82a-3694718166fe"></code>
<code><img width="15%" src="https://www.vectorlogo.zone/logos/visualstudio_code/visualstudio_code-ar21.svg"></code>
<code><img width="15%" src="https://www.vectorlogo.zone/logos/git-scm/git-scm-ar21.svg"></code>
<code><img width="15%" src="https://www.vectorlogo.zone/logos/github/github-ar21.svg"></code>

</div>

# Proyecto POS-Venta

## Estructura del Proyecto

- **admin-pos-venta**: Frontend con Vue.js
- **api-pos-venta**: Backend con Laravel

# Proyecto Full-Stack con Docker

## Descripción

Este proyecto es una aplicación full-stack que consta de un backend en Laravel y un frontend en Node.js. Ambos servicios se ejecutan en contenedores Docker.

## Requisitos

Antes de empezar, asegúrate de tener instalados los siguientes programas:

- [Docker](https://www.docker.com/get-started) (para la virtualización de contenedores)
- [Docker Compose](https://docs.docker.com/compose/install/) (para manejar múltiples contenedores)

## Configuración del Proyecto

Para correr este proyecto usando Docker, sigue estos pasos:


1. **Clona el repositorio a tu máquina local:**

    ```bash
    git clone https://github.com/10ElvisDqs/pos_venta.git
    cd pos-venta
    ```

2.  **Configuración con Docker Compose:**

    ```bash
     version: '3.8'

    services:
      laravel:
        build:
          context: ./api-pos-venta
        container_name: laravel
        ports:
          - "8000:80"
        volumes:
          - ./api-pos-venta:/var/www/html
          - laravel_data:/var/www/html/storage
        environment:
          - APP_ENV=local
          - APP_DEBUG=true
          - APP_KEY=base64:HDVoeNxdWJu30xrIL9VS3AbAGg4ZjB2p+mWZuuaqWOQ=
          - DB_CONNECTION=mysql
          - DB_HOST=mysql
          - DB_PORT=3306
          - DB_DATABASE=pos_venta
          - DB_USERNAME=root
          - DB_PASSWORD=secret
        depends_on:
          - mysql
    
      nuxt:
        build:
          context: ./admin-pos-venta
        container_name: nuxt
        ports:
          - "3000:3000"
        volumes:
          - ./admin-pos-venta:/usr/src/app
          - nuxt_data:/usr/src/app/.nuxt
        command: npm run dev
        depends_on:
          - laravel
    
      mysql:
        image: mysql:8.0
        container_name: mysql
        ports:
          - "3306:3306"
        environment:
          MYSQL_DATABASE: pos_venta
          MYSQL_ROOT_PASSWORD: secret
        volumes:
          - mysql_data:/var/lib/mysql
    
    volumes:
      laravel_data:
      nuxt_data:
      mysql_data:

    ```

3. **Construir y Ejecutar Contenedores:**

    ```bash
    docker-compose up --build
    ```

4. **Acceder a la Aplicación:**

   - **Backend (Laravel):** Una vez que el contenedor esté corriendo, puedes acceder al backend en tu navegador en:
      ```bash
      http://localhost:8080
      ```

   - **Frontend (Node.js):** Puedes acceder al frontend en tu navegador en:
      ```bash
      http://localhost:3000
      ```

##**Acceder a la Base de datos**

1. Abrir la aplicacion TablePlus
   
  <img width="10%" src="https://github.com/user-attachments/assets/612c4826-b370-4be0-b82a-3694718166fe">

3. configurar 
<img width="50%" src="https://github.com/user-attachments/assets/8ed389b7-ed15-4dc7-838f-b1d11fbd8469">

  <img width="70%" src="https://github.com/user-attachments/assets/279e3e9a-10a7-4246-b659-5b5572b8ad24">

4. Darle click a conentar

  <img width="70%" src="https://github.com/user-attachments/assets/1b0bb6f5-11ad-48cd-84e9-b88481d12a1c">








