# Entradas Perú — Requerimientos del sistema

## 1. Descripción
Entradas Perú es una plataforma web para publicar eventos, consultar disponibilidad, comprar entradas en modo demostración y controlar el acceso mediante tickets digitales con código único. El proyecto está pensado como Trabajo Individual de la Unidad Didáctica **Innovación Tecnológica**.

## 2. Requerimientos funcionales

| ID | Requerimiento | Prioridad |
|---|---|---|
| RF-01 | El sistema debe permitir registrar usuarios con nombre, correo, teléfono y contraseña. | Alta |
| RF-02 | El sistema debe permitir iniciar y cerrar sesión de forma segura. | Alta |
| RF-03 | El sistema debe asignar por defecto el rol Cliente a los nuevos registros. | Alta |
| RF-04 | El sistema debe mostrar eventos publicados con título, categoría, fecha, lugar y ciudad. | Alta |
| RF-05 | El sistema debe permitir buscar eventos por texto y filtrar por ciudad. | Alta |
| RF-06 | El sistema debe mostrar el detalle de un evento y sus tipos de entrada. | Alta |
| RF-07 | El sistema debe controlar la capacidad disponible de cada tipo de entrada. | Alta |
| RF-08 | El cliente debe poder seleccionar tipo y cantidad de entradas. | Alta |
| RF-09 | El sistema debe registrar una orden y calcular el total. | Alta |
| RF-10 | El sistema debe generar una entrada digital con código único por cada unidad comprada. | Alta |
| RF-11 | El cliente debe consultar sus compras y entradas. | Alta |
| RF-12 | El organizador debe crear, editar, publicar y cancelar sus eventos. | Alta |
| RF-13 | El organizador debe administrar tipos de entrada, precio y capacidad. | Alta |
| RF-14 | El personal autorizado debe poder validar una entrada y marcarla como utilizada. | Alta |
| RF-15 | El administrador debe consultar usuarios, eventos y métricas del sistema. | Alta |
| RF-16 | El administrador debe cambiar roles de usuarios. | Alta |
| RF-17 | El administrador debe modificar el estado de los eventos. | Media |
| RF-18 | El sistema debe conservar trazabilidad básica de órdenes, tickets y fechas de uso. | Media |

## 3. Requerimientos no funcionales

- **RNF-01 Seguridad:** usar autenticación, sesiones, CSRF, validación de formularios y contraseñas con hashing.
- **RNF-02 Rendimiento:** las consultas deben usar Eloquent y paginación en listados extensos.
- **RNF-03 Disponibilidad:** la aplicación debe poder ejecutarse localmente con PHP, Composer y MySQL/MariaDB.
- **RNF-04 Usabilidad:** interfaz responsive para escritorio y móvil.
- **RNF-05 Mantenibilidad:** arquitectura MVC de Laravel, PSR-4, controladores separados y migraciones.
- **RNF-06 Escalabilidad:** modelos y relaciones preparados para agregar pasarela de pago, notificaciones y QR real.
- **RNF-07 Integridad:** las compras y el descuento de aforo se realizan dentro de una transacción de base de datos.
- **RNF-08 Compatibilidad:** Laravel 12 requiere PHP 8.2–8.5 según la documentación oficial; el proyecto fija `^8.2`.
- **RNF-09 Accesibilidad:** etiquetas de formularios, contraste visual y controles claros.
- **RNF-10 Privacidad:** no almacenar datos reales de tarjetas; el pago incluido es exclusivamente demostrativo.

## 4. Alcance y límites
La versión académica no procesa pagos reales ni genera un QR criptográfico real. El ticket usa un código único y una representación visual de QR. Una versión productiva debería integrar una pasarela de pago, generación QR estándar, correo transaccional, almacenamiento de imágenes y auditoría avanzada.
