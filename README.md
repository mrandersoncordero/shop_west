# Productos Occidente — Plataforma Web

Sistema web informativo con panel de administración para **Productos Occidente, C.A.**, empresa venezolana fabricante de materiales de construcción (pegamentos, morteros y revestimientos).

---

## Tabla de Contenidos

- [Descripción General](#descripción-general)
- [Tecnologías](#tecnologías)
- [Requisitos del Sistema](#requisitos-del-sistema)
- [Instalación](#instalación)
- [Configuración](#configuración)
- [Estructura del Proyecto](#estructura-del-proyecto)
- [Módulos del Sistema](#módulos-del-sistema)
- [Roles y Permisos](#roles-y-permisos)
- [Base de Datos](#base-de-datos)
- [Almacenamiento de Archivos](#almacenamiento-de-archivos)
- [Correos Transaccionales](#correos-transaccionales)
- [Carrito de Compras](#carrito-de-compras)

---

## Descripción General

La plataforma cumple dos funciones principales:

1. **Sitio web público:** catálogo de productos con categorías, subcategorías, búsqueda, página de contacto, proyectos realizados y descarga de fichas técnicas y catálogo en PDF.
2. **Panel de administración:** gestión completa de productos, categorías, subcategorías, usuarios, órdenes de compra y comprobantes de pago.

El registro de nuevos usuarios está desactivado de forma pública; solo puede realizarse desde el panel de administración.

---

## Tecnologías

| Capa | Tecnología |
|---|---|
| Backend | Laravel 10 / PHP 8.1+ |
| Base de datos | MySQL |
| Frontend | Blade + TailwindCSS 3 + Alpine.js |
| Build | Vite 4 |
| Autenticación | Laravel Breeze |
| API tokens | Laravel Sanctum |
| Slider/Carrusel | Glide.js |
| Sitemap | spatie/laravel-sitemap |
| i18n | laraveles/spanish |

---

## Requisitos del Sistema

- PHP >= 8.1
- Composer
- Node.js >= 18 y npm
- MySQL >= 8.0
- Extensiones PHP: `BCMath`, `Ctype`, `Fileinfo`, `JSON`, `Mbstring`, `OpenSSL`, `PDO`, `Tokenizer`, `XML`

---

## Instalación

```bash
# 1. Clonar el repositorio
git clone <url-del-repositorio>
cd shop_west

# 2. Instalar dependencias PHP
composer install

# 3. Instalar dependencias de frontend
npm install

# 4. Copiar el archivo de entorno
cp .env.example .env

# 5. Generar la clave de la aplicación
php artisan key:generate

# 6. Configurar la base de datos en .env y ejecutar migraciones con datos iniciales
php artisan migrate --seed

# 7. Crear los symlinks de almacenamiento
php artisan storage:link

# 8. Compilar los assets de frontend
npm run build

# 9. Iniciar el servidor de desarrollo
php artisan serve
```

---

## Configuración

Las variables principales se definen en el archivo `.env`:

```ini
APP_NAME="Productos Occidente"
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base_de_datos
DB_USERNAME=usuario
DB_PASSWORD=contraseña

MAIL_MAILER=smtp
MAIL_HOST=smtp.ejemplo.com
MAIL_PORT=587
MAIL_USERNAME=correo@ejemplo.com
MAIL_PASSWORD=contraseña_smtp
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@productosoccidente.com"
MAIL_FROM_NAME="Productos Occidente"
```

### Usuario superadministrador por defecto (seeder)

Tras ejecutar `php artisan migrate --seed`, se crea un usuario `superuser` con acceso completo. Las credenciales se definen en `database/seeders/UserSeeder.php`.

---

## Estructura del Proyecto

```
shop_west/
├── app/
│   ├── Http/
│   │   ├── Controllers/         # Controladores de la aplicación
│   │   └── Middleware/          # CheckRole, PermissionMiddleware
│   ├── Mail/                    # 8 Mailables (correos transaccionales)
│   ├── Models/                  # 18 modelos Eloquent
│   └── Notifications/           # Notificación personalizada de reset de contraseña
├── database/
│   ├── migrations/              # 20 migraciones
│   ├── seeders/                 # 6 seeders con datos iniciales
│   └── factories/
├── resources/
│   ├── views/
│   │   ├── admin/               # Panel de administración
│   │   ├── auth/                # Vistas de autenticación
│   │   ├── cart/                # Carrito de compras (deshabilitado)
│   │   ├── components/          # 13 componentes Blade reutilizables
│   │   ├── layouts/             # Layouts principales
│   │   ├── mails/               # Plantillas de correo HTML
│   │   ├── order/               # Órdenes del cliente
│   │   ├── page/                # Páginas públicas
│   │   └── user/                # Perfil de usuario
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php                  # Rutas principales
│   ├── auth.php                 # Rutas de autenticación
│   └── api.php                  # Rutas API (Sanctum)
└── storage/
    └── app/public/
        ├── products/            # Imágenes de productos
        ├── palette_color/       # Imágenes de paletas de color
        ├── proof_of_payment/    # Comprobantes de pago
        └── download_datainfo/   # Catálogos y fichas técnicas PDF
```

---

## Módulos del Sistema

### Sitio Público

| Ruta | Descripción |
|---|---|
| `/` | Home con productos destacados |
| `/products` | Catálogo completo de productos |
| `/products/article/{id}` | Detalle del producto con valoraciones y descarga de ficha técnica |
| `/products/category/{id}` | Productos filtrados por categoría |
| `/products/subcategory/{id}` | Productos filtrados por subcategoría |
| `/search?q=...` | Búsqueda de productos por nombre |
| `/about` | Información sobre la empresa |
| `/project` | Proyectos realizados |
| `/contact` | Formulario de contacto |

Las páginas de detalle de categorías y subcategorías incluyen **metadata SEO dinámica** (title, description, keywords).

#### Descarga de Materiales

Al ingresar su nombre, apellido y correo, los visitantes pueden descargar:
- **Catálogo general** en PDF
- **Ficha técnica** individual de cada producto en PDF

Los datos del visitante se registran en la tabla `interested_clients`.

---

### Panel de Administración (`/dashboard`)

Accesible para roles `superuser` y `admin`. Cada acción está controlada por permisos granulares.

| Módulo | Ruta | Descripción |
|---|---|---|
| Dashboard | `/dashboard` | Vista principal del panel |
| Categorías | `/dashboard/categories` | CRUD de categorías de productos |
| Subcategorías | `/dashboard/subcategories` | CRUD de subcategorías |
| Productos | `/dashboard/products` | CRUD de productos con imagen, paleta de color y ficha técnica PDF |
| Órdenes | `/dashboard/orders` | Gestión y seguimiento de órdenes de compra |
| Usuarios | `/dashboard/users` | CRUD de usuarios con asignación de permisos |
| Comprobantes | `/dashboard/payments` | Listado de comprobantes de pago subidos por los clientes |

---

### Área de Cliente (autenticado)

| Ruta | Descripción |
|---|---|
| `/my_orders` | Listado de órdenes del cliente |
| `/my_orders/{order}` | Detalle y seguimiento de una orden |
| `/store/payment` | Subir comprobante de pago |
| `/profile/view` | Ver y editar perfil personal |

Los clientes también pueden calificar productos (1 a 5 estrellas) desde el detalle del artículo.

---

## Roles y Permisos

El sistema maneja tres roles:

| Rol | Descripción |
|---|---|
| `superuser` | Acceso total. Omite validación de permisos granulares |
| `admin` | Acceso al panel según permisos asignados |
| `client` | Acceso al área de cliente (órdenes, perfil, carrito) |

### Permisos Granulares (21 en total)

Los permisos se asignan individualmente a cada usuario administrador y cubren las operaciones ver, crear, editar y eliminar de cada módulo:

| # | Permiso | Módulo |
|---|---|---|
| 1–4 | Ver / Crear / Editar / Eliminar categorías | Categorías |
| 5–8 | Ver / Crear / Editar / Eliminar subcategorías | Subcategorías |
| 9–12 | Ver / Crear / Editar / Eliminar productos | Productos |
| 13–16 | Ver / Ver detalle / Editar / Eliminar / Cambiar estado órdenes | Órdenes |
| 17 | Ver comprobantes de pago | Pagos |
| 18–21 | Ver / Crear / Editar / Eliminar usuarios | Usuarios |

---

## Base de Datos

### Diagrama de Tablas

```
roles ──────────────────────── users
                                  │
                    ┌─────────────┼──────────────┐
                    │             │              │
                profiles   user_permissions    orders
                                               │    │
                                  products_ordereds  payments
categories
    │
subcategories
    │
products ──── product_ratings

states ──── commercial_partners

interested_clients
payment_types
order_statuses
permissions
```

### Tablas Principales

| Tabla | Descripción |
|---|---|
| `users` | Usuarios del sistema con rol asignado |
| `profiles` | Datos personales del usuario (DNI, dirección, teléfono, etc.) |
| `roles` | `superuser`, `admin`, `client` |
| `permissions` | 21 permisos granulares del panel |
| `user_permissions` | Permisos asignados por usuario |
| `categories` | Categorías de productos |
| `subcategories` | Subcategorías vinculadas a una categoría |
| `products` | Productos con imagen, paleta de color, ficha técnica y datos de venta |
| `product_ratings` | Valoraciones de productos (1–5 estrellas) por usuario |
| `orders` | Órdenes de compra con estado y tipo de pago |
| `products_ordereds` | Detalle de productos por orden (cantidad, precio al momento de compra) |
| `payments` | Comprobantes de pago subidos por el cliente |
| `payment_types` | Punto de venta, Transferencia, Divisas, Pago móvil |
| `order_statuses` | Aprobado, En proceso, Rechazado, Comprobando pago, Pago comprobado |
| `states` | Estados/regiones del país |
| `commercial_partners` | Distribuidores y socios comerciales por estado |
| `interested_clients` | Visitantes que descargaron el catálogo o una ficha técnica |

### Datos Iniciales (Seeders)

```bash
php artisan db:seed
```

Los seeders cargan:
- Roles (`superuser`, `admin`, `client`)
- 21 permisos granulares
- Estados de orden y tipos de pago
- Usuarios de prueba (superuser, admins, cliente)
- Categorías, subcategorías y ~24 productos reales de la empresa

---

## Almacenamiento de Archivos

El sistema usa **4 discos locales personalizados** en lugar del symlink estándar de Laravel.

| Disco | Almacenamiento | URL pública |
|---|---|---|
| `products` | `storage/app/public/products/` | `/product/` |
| `palette_color` | `storage/app/public/palette_color/` | `/palette_color/` |
| `proof_of_payment` | `storage/app/public/proof_of_payment/` | `/proof_of_payment/` |
| `download_datainfo` | `storage/app/public/download_datainfo/` | `/download_datainfo/` |

Los symlinks se crean con:

```bash
php artisan storage:link
```

---

## Correos Transaccionales

El sistema envía correos automáticos en los siguientes eventos:

| Evento | Destinatario | Mailable |
|---|---|---|
| Registro de nuevo usuario | Cliente | `WelcomeMail` |
| Creación de orden (checkout) | Cliente + Empresa | `CreateOrderMail` |
| Subida de comprobante de pago | Empresa | `PaymentRegisterMail` |
| Cambio de estado de una orden | Cliente | `ChangeOrderStatusMail` |
| Formulario de contacto | Cliente (confirmación) | `Contact` |
| Formulario de contacto | Empresa | `CompanyContact` |
| Descarga de catálogo | Visitante | `CatalogMail` |
| Descarga de ficha técnica | Visitante | `ProductSheet` |

---

## Carrito de Compras

El módulo de carrito está **implementado pero deshabilitado** en la interfaz pública. La funcionalidad existe en el backend y está lista para activarse:

- **`CartController`**: gestión del carrito en sesión PHP (agregar, editar cantidad, eliminar, vaciar y realizar checkout).
- **Checkout**: convierte el carrito en una `Order` + `ProductsOfOrder` en base de datos y notifica al cliente y a la empresa por correo.
- **Rutas**: definidas bajo middleware `auth + role:client|admin`, accesibles en `/cart`.

Para habilitarlo basta con exponer el botón "Agregar al carrito" en las vistas de productos y hacer visible el acceso al carrito desde la navegación.
