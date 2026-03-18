# 🛠️ Servicios Ya

## 📌 Descripción General

**Servicios Ya** es una plataforma web orientada a conectar personas que necesitan servicios profesionales u oficios con prestadores disponibles en su zona geográfica.

A través de una interfaz simple e intuitiva, los usuarios pueden buscar servicios por categoría (hogar, salud, etc.), visualizar perfiles de profesionales y acceder a información relevante como contacto, ubicación y rango de precios.

El sistema también permite la reserva de turnos online, facilitando la organización tanto para el cliente como para el prestador. Además, incorpora un sistema de calificaciones y comentarios que mejora la confianza y calidad del servicio dentro de la plataforma.

Por otro lado, los prestadores pueden aumentar su visibilidad publicando sus servicios y manteniendo actualizada su información, lo cual influye en su posicionamiento dentro de los resultados.

---

## 👥 Integrantes del Grupo

* Miqueas Gabriel Müller
* Agustín
* Christian Guillermo Galeano
* Judith Geraldina Magalí Capriz

---

## 🚀 MVP (Producto Mínimo Viable)

El sistema en su primera versión incluirá:

* Búsqueda de servicios por categoría y texto libre
* Visualización de perfiles de prestadores
* Registro de usuarios (cliente y prestador)
* Sistema básico de turnos (reserva de fecha y hora)
* Visualización de información de contacto

---

## 🎯 Funcionalidad Core

### ❓ ¿Qué problema resuelve?

Servicios Ya resuelve la dificultad de encontrar y contratar servicios profesionales de manera rápida y confiable, especialmente en situaciones urgentes.

Por ejemplo, ante una emergencia en el hogar (como una pérdida de gas o agua), el usuario puede acceder rápidamente a un listado de profesionales disponibles sin depender de recomendaciones informales.

---

### 📍 ¿Cuál es el alcance inicial?

El sistema permitirá conectar prestadores de servicios con clientes dentro de una zona geográfica determinada, ofreciendo:

* Búsqueda de servicios
* Visualización de perfiles
* Contacto con prestadores
* Reserva de turnos

---

## 🧱 Modelo de Datos Inicial

### Entidades principales

#### 👤 Usuario (Cliente)

* id: integer
* nombre: string
* dni: string
* domicilio: string
* genero: string

---

#### 🧰 Prestador de Servicio

* id: integer
* nombre: string
* telefono: string
* ciudad: string
* tipo_servicio: string

---

#### 📅 Turno (Entidad intermedia)

* id: integer
* fecha: datetime
* estado: string (pendiente, confirmado, cancelado, finalizado)
* usuario_id: integer
* prestador_id: integer

---

### 🔗 Relaciones

* Un **usuario** puede tener muchos turnos → (1:N)
* Un **prestador** puede tener muchos turnos → (1:N)

👉 Esto modela una relación **muchos a muchos (N:M)** entre usuarios y prestadores a través de la entidad *Turno*.

---

## 📖 Historias de Usuario

### 🥇 Historia 1

**Contexto:** Soy Pamela y se me pinchó un caño de agua.

**Como usuario**
quiero buscar profesionales por categoría
para encontrar rápidamente el servicio que necesito

**Criterios de aceptación:**

* Debe existir una barra de búsqueda
* Debe permitir filtrar por categoría
* Debe mostrar resultados relevantes

---

### 🥈 Historia 2

**Contexto:** Necesito reparar una pared en mi casa.

**Como usuario**
quiero ver información de contacto del profesional
para poder comunicarme con él

**Criterios de aceptación:**

* Se debe mostrar nombre, teléfono y ciudad
* La información debe ser clara y accesible

---

### 🥉 Historia 3

**Contexto:** Necesito instalar electricidad en mi casa.

**Como usuario**
quiero reservar un turno online
para asegurar disponibilidad del profesional

**Criterios de aceptación:**

* Debe permitir seleccionar fecha y hora
* Debe confirmar la reserva

---

### ⭐ Historia 4

**Contexto:** Ya utilicé un servicio contratado.

**Como usuario**
quiero calificar y comentar un servicio
para ayudar a otros usuarios a elegir

**Criterios de aceptación:**

* Debe permitir puntuar (1 a 5)
* Debe permitir agregar comentarios
* Solo usuarios que usaron el servicio pueden calificar

---

### 🛠️ Historia 5

**Contexto:** Soy carpintero y quiero conseguir clientes.

**Como prestador**
quiero registrarme y publicar mis servicios
para aumentar mi visibilidad

**Criterios de aceptación:**

* Debe poder crear un perfil
* Debe seleccionar tipo de servicio
* Debe cargar datos de contacto

---

## 🌐 Endpoints Propuestos (v1.0)

### 1. Health Check

**GET /health**

Descripción: Verifica que el servidor está activo.

```json
{
  "status": "ok",
  "timestamp": "2026-03-18T10:00:00Z"
}
```

---

### 2. Listar Prestadores

**GET /api/prestadores**

Descripción: Obtiene el listado de prestadores disponibles.

---

### 3. Obtener Prestador por ID

**GET /api/prestadores/{id}**

Descripción: Obtiene el detalle de un prestador específico.

---

### 4. Crear Usuario

**POST /api/usuarios**

Descripción: Registra un nuevo usuario.

```json
{
  "nombre": "Juan",
  "dni": "12345678",
  "domicilio": "Calle Falsa 123",
  "genero": "Masculino"
}
```

---

### 5. Crear Turno

**POST /api/turnos**

Descripción: Crea una reserva entre usuario y prestador.

```json
{
  "usuario_id": 1,
  "prestador_id": 2,
  "fecha": "2026-04-10T14:00:00"
}
```

---

### 6. Listar Categorías

**GET /api/categorias**

Descripción: Obtiene el listado de categorías disponibles.

---

## 📌 Notas Finales

Este proyecto representa una primera iteración funcional enfocada en validar la conexión entre clientes y prestadores. Futuras mejoras podrían incluir:

* Sistema de pagos integrado
* Geolocalización en tiempo real
* Notificaciones
* Ranking avanzado de prestadores

---

