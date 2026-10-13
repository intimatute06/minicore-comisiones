# MiniCore Comisiones

Aplicación web en **Laravel 12** que calcula las comisiones de los vendedores según sus ventas dentro de un rango de fechas, aplicando el patrón **MVC**.

## Demo
- **App en línea:** https://minicore-comisiones-qass.onrender.com/
- **Video explicativo:** [(https://youtu.be/ITTEhDYftWc)]

## Cómo funciona
1. El usuario elige una fecha de inicio y una de fin.
2. Se suman las ventas de cada vendedor dentro de ese rango.
3. Al total se le aplica la regla de comisión más alta que alcanza.

| Total vendido | Comisión |
|---|---|
| Desde $0 | 0 % |
| Desde $500 | 5 % |
| Desde $1,000 | 10 % |
| Desde $2,000 | 20 % |

## Estructura MVC
- **Modelo:** `app/Models/` (Vendedor, Venta, ReglaComision)
- **Vista:** `resources/views/reporte.blade.php`
- **Controlador:** `app/Http/Controllers/ReporteComisionesController.php`
- **Ruta:** `routes/web.php`

## Requisitos
- PHP 8.2 o superior
- Composer

## Ejecutar en local
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```

## Tecnologías
Laravel 12 · PHP 8.3 · SQLite · Docker · Render

## Autor
Inti Matute — Universidad de las Américas (UDLA)
