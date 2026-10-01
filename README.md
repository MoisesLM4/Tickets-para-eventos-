# Entradas Perú — Laravel

Proyecto académico avanzado para la Unidad Didáctica **Innovación Tecnológica**.

Inspirado en la referencia visual proporcionada: plataforma peruana de eventos con navegación, eventos, reservas, tickets digitales y paneles por rol.

## Stack

- Laravel 12
- PHP 8.2+
- MySQL / MariaDB
- Blade + CSS responsive
- Eloquent ORM
- Migraciones + Seeders
- Middleware de roles
- Validación de formularios

> Laravel 12 es usado para mantener compatibilidad con entornos PHP 8.2. La documentación oficial indica soporte para PHP 8.2–8.5.

## Instalación en VS Code + XAMPP

### 1. Requisitos

Instala XAMPP con PHP 8.2+ y MySQL/MariaDB, además de Composer.

Verifica:

```bash
php -v
composer -V
```

### 2. Crear base de datos

Abre phpMyAdmin desde XAMPP y crea:

```text
entradas_peru
```

También puedes ejecutar:

```sql
CREATE DATABASE entradas_peru CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 3. Preparar Laravel

Dentro de la carpeta del proyecto:

```bash
composer install
copy .env.example .env
php artisan key:generate
```

En Linux/macOS usa `cp .env.example .env`.

### 4. Configurar `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=entradas_peru
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Migrar y cargar datos de demostración

```bash
php artisan migrate --seed
```

### 6. Ejecutar

```bash
php artisan serve
```

Abre:

```text
http://127.0.0.1:8000
```

También puedes usar el Apache de XAMPP apuntando el DocumentRoot a la carpeta `public` del proyecto.

## Usuarios de prueba

| Rol | Correo | Contraseña |
|---|---|---|
| Administrador | admin@entradasperu.test | Admin12345 |
| Organizador | organizador@entradasperu.test | Organizador123 |
| Cliente | cliente@entradasperu.test | Cliente12345 |

El rol **Personal** puede asignarse desde Administración → Usuarios.

## Rutas principales

- `/` Inicio
- `/eventos` Catálogo
- `/login` Login
- `/registro` Registro
- `/dashboard` Redirección según rol
- `/mis-compras` Compras del cliente
- `/mis-entradas` Tickets del cliente
- `/organizador` Panel del organizador
- `/admin` Panel administrativo

## Estructura importante

```text
app/
 ├── Http/Controllers/
 ├── Http/Middleware/RoleMiddleware.php
 └── Models/

database/
 ├── migrations/
 └── seeders/DatabaseSeeder.php

resources/views/
 ├── auth/
 ├── events/
 ├── organizer/
 ├── admin/
 ├── tickets/
 └── layouts/
routes/web.php
docs/REQUERIMIENTOS.md
docs/ROLES_PERMISOS.md
```

## Funcionalidades implementadas

1. Registro e inicio de sesión.
2. Roles: admin, organizer, customer y staff.
3. Catálogo de eventos con búsqueda y filtro por ciudad.
4. CRUD de eventos para organizadores.
5. Tipos de entrada y control de capacidad.
6. Compra demo con transacción de base de datos.
7. Generación de códigos únicos de ticket.
8. Panel de cliente.
9. Panel de organizador.
10. Panel administrativo.
11. Cambio de roles.
12. Validación de tickets.
13. Estados de eventos y órdenes.
14. Diseño responsive inspirado en la referencia.

## Para presentar al profesor

La carpeta `docs/` contiene directamente los tres entregables solicitados:

- Requerimientos funcionales.
- Requerimientos no funcionales.
- Roles y permisos.

Además, el código demuestra MVC, Eloquent, migraciones, seeders, middleware, autenticación, autorización por rol, validación y transacciones.
