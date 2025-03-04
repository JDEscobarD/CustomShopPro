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
- **Categorías**: Organización de los productos por tipo.
- **Roles**: Tipo de usuarios que tendrá el CMS.
- **Ciudades/Departamentos**: Departamentos y ciudades(algunas) de Colombia.
- **Tipo de documento**: Documentos permitidos por el CMS.
- **Medios de pago**: Almacena los bancos y tipos de cuenta.
- **Productos**: 'en construcción'.


### Desarrollo
- **Framework**: Laravel 11.
- **Blade**: Manejo del front-end.
- **Javascript**: Javascript vanilla, sin framework, para funciones mínimas como toggle y/o tabs.
- **Ajax**: Se implementó para la funcionalidad de que las ciudades carguen con respecto al departamento seleccionado.
- **CSS**: Estilos en cascada (no sass) para estilizar el CMS.

### Próximos Pasos
- **Configurar Productos**: Agregar la funcionalidad de creación de productos.
- **Integración de Métodos de Pago**: Añadir soporte para diversas pasarelas de pago.

CustomShopPro es un proyecto en constante evolución, enfocado en mejorar la experiencia de compra personalizada para los usuarios. 🚀
