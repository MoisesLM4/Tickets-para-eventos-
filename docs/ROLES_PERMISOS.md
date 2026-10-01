# Roles y permisos

## Matriz de acceso

| Función | Cliente | Organizador | Personal | Administrador |
|---|:---:|:---:|:---:|:---:|
| Ver eventos publicados | ✅ | ✅ | ✅ | ✅ |
| Buscar/filtrar eventos | ✅ | ✅ | ✅ | ✅ |
| Comprar entradas demo | ✅ | ❌ | ❌ | ❌ |
| Ver sus compras | ✅ | ❌ | ❌ | ❌ |
| Ver sus entradas | ✅ | ❌ | ❌ | ❌ |
| Crear eventos | ❌ | ✅ | ❌ | ✅ |
| Editar sus eventos | ❌ | ✅ | ❌ | ✅ |
| Cancelar sus eventos | ❌ | ✅ | ❌ | ✅ |
| Gestionar tipos de entrada | ❌ | ✅ | ❌ | ✅ |
| Validar entradas | ❌ | ⚠️ | ✅ | ✅ |
| Ver métricas globales | ❌ | ❌ | ❌ | ✅ |
| Gestionar usuarios | ❌ | ❌ | ❌ | ✅ |
| Cambiar roles | ❌ | ❌ | ❌ | ✅ |
| Moderar estado de eventos | ❌ | ❌ | ❌ | ✅ |

> ⚠️ El organizador puede validar entradas desde el panel del sistema; en una versión empresarial conviene restringirlo a personal de acceso asignado a cada evento.

## Roles

### Cliente
Usuario que compra entradas y consulta sus órdenes/tickets.

### Organizador
Usuario que crea y administra sus propios eventos, aforo y tipos de entrada.

### Personal
Rol destinado al control de acceso. Puede validar tickets autorizados.

### Administrador
Tiene control global del sistema: usuarios, roles, eventos y métricas.
