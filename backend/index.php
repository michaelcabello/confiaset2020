<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/administradores.controlador.php";
require_once "controladores/banner.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/categoriasblog.controlador.php";
require_once "controladores/subcategorias.controlador.php";
require_once "controladores/subcategoriasd.controlador.php";
require_once "controladores/cabeceras.controlador.php";
require_once "controladores/comercio.controlador.php";
require_once "controladores/mensajes.controlador.php";
require_once "controladores/perfiles.controlador.php";
require_once "controladores/productos.controlador.php";
require_once "controladores/slide.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/visitas.controlador.php";
require_once "controladores/notificaciones.controlador.php";
require_once "controladores/staff.controlador.php";
require_once "controladores/configuraciones.controlador.php";
require_once "controladores/seo.controlador.php";
require_once "controladores/blog.controlador.php";
//require_once "controladores/blognuevo.controlador.php";
require_once "controladores/subcategoriasblog.controlador.php";

require_once "modelos/administradores.modelo.php";
require_once "modelos/banner.modelo.php";
require_once "modelos/categorias.modelo.php";
require_once "modelos/categoriasblog.modelo.php";
require_once "modelos/subcategorias.modelo.php";
require_once "modelos/subcategoriasd.modelo.php";
require_once "modelos/cabeceras.modelo.php";
require_once "modelos/comercio.modelo.php";
require_once "modelos/mensajes.modelo.php";
require_once "modelos/perfiles.modelo.php";
require_once "modelos/productos.modelo.php";
require_once "modelos/slide.modelo.php";
require_once "modelos/usuarios.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/visitas.modelo.php";
require_once "modelos/notificaciones.modelo.php";
require_once "modelos/staff.modelo.php";
require_once "modelos/configuraciones.modelo.php";
require_once "modelos/seo.modelo.php";
require_once "modelos/blog.modelo.php";
//require_once "modelos/blognuevo.modelo.php";
require_once "modelos/subcategoriasblog.modelo.php";


require_once "modelos/rutas.php";

$plantilla = new ControladorPlantilla();
$plantilla -> plantilla();