# Administración de Días Económicos y Pases de Salida

Este proyecto es una **aplicación web** desarrollada en **Laravel** que permite gestionar de manera eficiente las solicitudes de días económicos y pases de salida para docentes en el Instituto Tecnológico Superior del Sur del Estado de Yucatán (ITSSY).

---

## 🚀 Funcionalidades principales

- **Gestión de roles personalizados**:
  - **Docentes**: Solicitan permisos para faltar o salir antes de su horario.
  - **Coordinadores y subdirectores**: Reciben notificaciones por correo electrónico y aprueban/rechazan solicitudes.
  - **Administradores**: Gestionan usuarios (crear, editar, eliminar).

- **Notificaciones automáticas**:
  - Envío de correos electrónicos a los responsables para gestionar las solicitudes.

- **Interfaz intuitiva**:
  - Diseño responsivo y fácil de usar gracias a **TailwindCSS**.

---

## ⚙️ Tecnologías utilizadas

- **Backend**: Laravel 11, Breeze (autenticación), Eloquent ORM.
- **Frontend**: TailwindCSS.
- **Base de datos**: MySQL.
- **Notificaciones**: Sistema integrado de correos electrónicos de Laravel.

---

## 📂 Instalación

### Requisitos previos
- PHP >= 8.2
- Composer
- MySQL
- Node.js & npm

### Pasos para la instalación

1. Clona este repositorio:
   ```bash
   git clone https://github.com/tu-usuario/administracion-dias-economicos.git
   cd administracion-dias-economicos
   ```


2. Instala las dependencias de Laravel:
    ```bash
    composer install
    ```

3. Instala las dependencias de Node.js:
    ```bash
    npm install
    ```

4. Configura tu archivo .env:
    ```bash
    cp .env.example .env
    ```

5. Genera la clave de la aplicación:
    ```bash
    php artisan key:generate
    ```

6. Ejecuta las migraciones:
    ```bash
    php artisan migrate
    ```

7. Levanta el servidor de desarrollo:
    ```bash
    php artisan serve
    ```

## 🤝 Contribuciones
Si deseas contribuir a este proyecto, por favor sigue estos pasos:

Haz un fork del repositorio.
Crea una rama nueva (git checkout -b feature/nueva-funcionalidad).
Realiza tus cambios y haz un commit (git commit -m 'Agrega nueva funcionalidad').
Haz un push a la rama (git push origin feature/nueva-funcionalidad).
Abre un Pull Request.
📄 Licencia
Este proyecto está bajo la licencia MIT. Consulta el archivo LICENSE para más información.

📧 Contacto
Desarrollado por Felipe de Jesús Duarte Castillo
Correo: fduartecastillo2@gmail.com
Portafolio: https://felipeduarte2.netlify.app/



