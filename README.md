<div align="center">

### Front-End Vue.js (Nuxt.js)
<p>
  <code><img width="15%" src="https://www.vectorlogo.zone/logos/nuxtjs/nuxtjs-ar21.svg"></code>
  <code><img width="15%" src="https://www.vectorlogo.zone/logos/vuejs/vuejs-ar21.svg"></code>
</p>

### Back-End Laravel
<code><img width="15%" src="https://www.vectorlogo.zone/logos/laravel/laravel-ar21.svg"></code>

### Gestor de Base de Datos
<code><img width="15%" src="https://www.vectorlogo.zone/logos/mysql/mysql-ar21.svg"></code>

</div>

# Proyecto POS-Venta

## Estructura del Proyecto

- **admin-pos-venta**: Frontend con Vue.js
- **api-pos-venta**: Backend con Laravel

## Requisitos Previos

- **Node.js** y **npm**
- **Composer**
- **PHP**
- **Laravel**

## Instrucciones

## Clonar el Repositorio

```bash
git clone https://github.com/10ElvisDqs/pos_venta.git
```

### Backend (Laravel - api-pos-venta)

1. Navega al directorio:

    ```bash
    cd api-pos-venta
    ```

2. Instalar dependencias:

    ```bash
    composer install
    ```

3. Configurar archivo de entorno:

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. Edita las variables de entorno en `.env`:

    - `DB_DATABASE`
    - `DB_USERNAME`
    - `DB_PASSWORD`

5. Migrar la base de datos:

    ```bash
    php artisan migrate
    ```

6. Ejecutar el servidor:

    ```bash
    php artisan serve
    ```

   - El servidor estará en `http://localhost:8000`.

### Frontend (Vue.js - admin-pos-venta)

1. Navega al directorio:

    ```bash
    cd admin-pos-venta
    ```

2. Instalar dependencias:

    ```bash
    npm install
    ```

3. Compilar y ejecutar el proyecto:

    ```bash
    npm run dev
    ```

   - Para producción, usa `npm run build`.

4. Ejecutar el servidor de desarrollo:

    ```bash
    npm run serve
    ```

   - El servidor estará en `http://localhost:8080`.

## Notas

- **Integración**: Asegúrate de que el frontend y el backend estén correctamente integrados.
- **Compilación**: Usa Laravel Mix para gestionar la compilación de assets si es necesario.
