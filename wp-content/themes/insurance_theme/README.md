# Tema WordPress - Documentación

## 📋 Introducción

Este documento proporciona instrucciones para implementar correctamente los formularios de contacto y shortcodes personalizados en el tema de WordPress.

## 📞 Formulario de Contacto con Contact Form 7

### Estructura HTML Requerida

Para garantizar la correcta estilización y funcionamiento del formulario, utilice exactamente esta estructura en Contact Form 7:

```html
<div class="cf7-form">
  <div class="space-y-5">
    <div class="wpcf7-form-control-wrap">
      <label for="nombre">Nombre Completo *</label>
      [text* nombre id:nombre class:wpcf7-form-control]
    </div>

    <div class="wpcf7-form-control-wrap">
      <label for="email">Correo Electrónico *</label>
      [email* email id:email class:wpcf7-form-control]
    </div>

    <div class="wpcf7-form-control-wrap">
      <label for="telefono">Teléfono *</label>
      [tel* telefono id:telefono class:wpcf7-form-control]
    </div>

    <div class="wpcf7-form-control-wrap">
      <label for="mensaje">Tu Mensaje *</label>
      [textarea* mensaje id:mensaje class:wpcf7-form-control]
    </div>

    <div class="wpcf7-form-control-wrap">
      [submit class:wpcf7-submit "Enviar Mensaje"]
    </div>
  </div>
</div>
```

### Instrucciones de Implementación

1. **Instalar Contact Form 7** desde el repositorio de plugins de WordPress
2. **Crear un nuevo formulario** en Contact Form 7
3. **Pegar la estructura HTML** proporcionada en la pestaña "Formulario"
4. **Configurar los ajustes** de mail y mensajes según sea necesario
5. **Copiar el shortcode** generado y colocarlo donde desee mostrar el formulario

## 🎯 Shortcodes Personalizados

### 1. Sección de Contacto

```php
[seccion_contacto]
```

**Descripción:** Muestra una sección predefinida de contacto con información y formulario.

**Uso:** Coloque este shortcode en cualquier página o post donde desee mostrar la sección de contacto.

---

### 2. Sección de Ventajas

```php
[seccion_ventajas]
```

**Descripción:** Muestra una sección con ventajas o características destacadas.

**Uso:** Ideal para páginas de inicio o landing pages.

---

### 3. Sección de Testimonios

```php
[testimonios]
```

**Descripción:** Muestra un slider con testimonios de clientes.

**Uso:** Perfecto para generar confianza en los visitantes.

---

### 4. Ventajas del Seguro (Custom Post Type)

```php
[beneficios_seguro tipo_seguro="slug-del-post" numero_ventajas="20"]
```

**Parámetros:**

- `tipo_seguro` (obligatorio): Slug del tipo de seguro
- `numero_ventajas` (opcional): Número de ventajas a mostrar (valor por defecto: 20)

**Ejemplo:**

```php
[beneficios_seguro tipo_seguro="seguro-vida" numero_ventajas="10"]
```

---

### 5. Cómo Funciona el Seguro (Custom Post Type)

```php
[como_funciona_seguro tipo_seguro="slug-del-post" titulo_seccion="¿Cómo funciona el Seguro"]
```

**Parámetros:**

- `tipo_seguro` (obligatorio): Slug del tipo de seguro
- `titulo_seccion` (opcional): Título personalizado para la sección

**Ejemplo:**

```php
[como_funciona_seguro tipo_seguro="seguro-auto" titulo_seccion="Funcionamiento de Nuestro Seguro"]
```

---

### 6. Consejos para Elegir el Seguro (Custom Post Type)

```php
[consejos_seguro tipo_seguro="slug-del-seguro" numero_consejos="20"]
```

**Parámetros:**

- `tipo_seguro` (obligatorio): Slug del tipo de seguro
- `numero_consejos` (opcional): Número de consejos a mostrar (valor por defecto: 20)

**Ejemplo:**

```php
[consejos_seguro tipo_seguro="seguro-hogar" numero_consejos="5"]
```

## 🚀 Instalación y Configuración

1. **Subir el tema** al directorio `/wp-content/themes/`
2. **Activar el tema** desde el panel de administración de WordPress
3. **Instalar plugins requeridos** (Contact Form 7)
4. **Configurar los shortcodes** según las necesidades de cada página

## ❓ Soporte Técnico

Para problemas técnicos o consultas sobre la implementación:

- Verificar que todos los plugins requeridos estén instalados y activados
- Asegurarse de usar la estructura HTML exacta para Contact Form 7
- Comprobar que los slugs de los custom post types existan

## 📝 Notas Importantes

- Todos los campos marcados con \* son obligatorios en el formulario
- Los shortcodes dependen de la correcta configuración de custom post types
- El estilo visual está optimizado para la estructura HTML proporcionada

Este README será actualizado regularmente con nueva información y ejemplos adicionales.
