# Proyecto Laravel

Este proyecto es una aplicación desarrollada en [Laravel](https://laravel.com). Sigue estas instrucciones para configurar y ejecutar el proyecto en tu entorno local.

## Requisitos previos

Asegúrate de que tu entorno cumpla con los siguientes requisitos:

- **PHP**: Versión 8.1 o superior.
- **Composer**: Instalado globalmente.
- **Node.js**: Versión 16 o superior (opcional, para usar Laravel Mix o Vite).
- **MySQL/MariaDB**: Para la base de datos.
- **Git**: Para clonar el repositorio.

## Instalación

1. **Clona el repositorio:**

   ```bash
   git clone https://github.com/usuario/repositorio.git
   cd repositorio
   ```

2. **Instala las dependencias de PHP:**

   ```bash
   composer install
   ```

3. **Copia el archivo de configuración de entorno:**

   ```bash
   cp .env.example .env
   ```

4. **Genera la clave de la aplicación:**

   ```bash
   php artisan key:generate
   ```

5. **Configura tu archivo `.env`:**

   Actualiza las variables de conexión a la base de datos:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nombre_base_datos
   DB_USERNAME=usuario
   DB_PASSWORD=contraseña
   ```

6. **Ejecuta las migraciones y seeders (si aplica):**

   ```bash
   php artisan migrate --seed
   ```

7. **Instala las dependencias de Node.js (opcional):**

   ```bash
   npm install
   npm run dev
   ```

## Ejecución

1. **Inicia el servidor de desarrollo:**

   ```bash
   php artisan serve
   ```

2. Accede al proyecto en tu navegador:
    ```bash
    http://127.0.0.1:8000
    ```

## Comandos Útiles

- **Linter para Laravel Pint** (opcional):

```bash
composer require laravel/pint --dev
php artisan pint
```

- **Generar assets para producción:**

```bash
npm run build
```

- **Limpieza de cachés:**

```bash
php artisan optimize:clear
```

## Problemas Comunes

- **Permisos en el directorio `storage` y `bootstrap/cache`:**

Asegúrate de que los permisos estén configurados correctamente:

```bash
chmod -R 775 storage bootstrap/cache
```

- **Faltan variables de entorno:**

Si ocurre un error relacionado con el archivo `.env`, verifica que todas las variables requeridas estén configuradas.

## Contribuciones

Si deseas contribuir, por favor abre un **pull request** o envía un **issue** detallado.

## Licencia

Este proyecto está licenciado bajo la licencia [MIT](https://opensource.org/licenses/MIT).
