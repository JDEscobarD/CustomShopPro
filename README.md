![CustomShopPro Logo](public/assets/media/images/CUSTOMSHOP-PRO-logo.svg)  
![Laravel Logo](public/assets/media/images/Logotype.svg) 


## Proyecto CustomShopPro - Análisis y desarrollo de software, SENA

### Descripción General
CustomShopPro es una plataforma de comercio electrónico diseñada para tiendas que venden productos compuestos. Su objetivo es permitir a los clientes armar productos a medida según sus preferencias, proporcionando una experiencia de compra altamente personalizada.

### Características Principales
- **Gestión de Productos**: Soporte para productos físicos y virtuales, con opciones para definir productos compuestos.
- **Configurador de Productos**: Permite la selección de componentes y personalización de productos según etiquetas y valores adicionales.
- **Gestión de Categorías**: Creación y organización de categorías de productos para facilitar la navegación.
- **Historial de Pedidos**: Registro de ventas con detalles de cada transacción.
- **Cálculo de Envíos**: Soporte para opciones de envío gratuito y cálculos basados en peso y dimensiones.
- **Carga de Imágenes**: Integración de una galería de imágenes para productos.

### Base de Datos
CustomShopPro utiliza una base de datos estructurada con múltiples tablas y relaciones para gestionar:
- **Usuarios**: Información y autenticación de clientes.
- **Productos**: Detalles, precios y configuraciones de productos compuestos.
- **Categorías**: Organización de los productos por tipo.
- **Pedidos**: Registro de compras realizadas por los clientes.
- **Facturación y Envíos**: Gestión de pagos y logística de entrega.

### Desarrollo
- **Framework**: Laravel 11.
- **Autenticación**: Basada en una tabla personalizada de usuarios sin utilizar las predeterminadas de Laravel.
- **Carga Dinámica de Ciudades**: Implementada con `pluck` y LaravelCollective.
- **Gestión de Contraseñas**: Actualmente en texto plano (pendiente de mejorar seguridad con `bcrypt`).
- **Interfaz de Usuario**: Diseñada para facilitar la navegación y personalización de productos.

### Próximos Pasos
- **Implementar papeleras**: Implementar papeleras de reciclaje para usuarios y categorias, y poder recuperar los archivos eliminados.
- **Configurar Productos**: Agregar la funcionalidad de creación de productos.
- **Integración de Métodos de Pago**: Añadir soporte para diversas pasarelas de pago.

CustomShopPro es un proyecto en constante evolución, enfocado en mejorar la experiencia de compra personalizada para los usuarios. 🚀
