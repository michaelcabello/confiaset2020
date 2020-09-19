<!--=====================================
MENU
======================================-->	

<ul class="sidebar-menu">

	<li class="active"><a href="inicio"><i class="fa fa-home"></i> <span>Inicio</span></a></li>


	<li><a href="slide"><i class="fa fa-edit"></i> <span>Gestor Slide</span></a></li>
  
  <li><a href="configuraciones"><i class="fa fa-cog"></i> <span>Configuraciones</span></a></li>
 <!--  <li><a href="nosotros"><i class="fa fa-building-o"></i> <span>Nosotros</span></a></li>-->

	<li class="treeview">
      
      <a href="#">
        <i class="fa fa-th"></i>
        <span>Gestor Categorías</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>

      <ul class="treeview-menu">
        
        <li><a href="categorias"><i class="fa fa-circle-o"></i> Categorías</a></li>
        <!--<li><a href="subcategorias"><i class="fa fa-circle-o"></i> Subcategorías</a></li>-->
        <li><a href="subcategoriasd"><i class="fa fa-circle-o"></i> Subcategoríasd</a></li>
      
      </ul>

  </li>
  
 <!-- <li><a href="productos"><i class="fa fa-product-hunt"></i> <span>Gestor Productos</span></a></li> -->
  <li><a href="staff"><i class="fa fa-male"></i> <span>Staff</span></a></li>
  <li><a href="contactos"><i class="fa fa-envelope"></i> <span>Contactos</span></a></li>

  <li><a href="seo"><i class="fa fa-bar-chart"></i> <span>SEO</span></a></li>
  <!-- <li><a href="seo"><i class="fa fa-calendar-check-o"></i> <span>Proyectos Realizados</span></a></li> -->

  <!--<li><a href="banner"><i class="fa fa-map-o"></i> <span>Gestor Banner</span></a></li>-->

    <li class="treeview">
      
      <a href="#">
        <i class="fa fa-id-card"></i>
        <span>Blog Admin</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        
        <li><a href="categoriasblog"><i class="fa fa-circle-o"></i> Categorías de Blog</a></li>
        <li><a href="blog"><i class="fa fa-circle-o"></i>Contenido de Blog</a></li>
        
      
      </ul>

  </li>





  <!-- <li><a href="usuarios"><i class="fa fa-users"></i> <span>Gestor Usuarios</span></a></li> -->

  <?php

   if($_SESSION["perfil"] == "administrador"){

    echo '<li><a href="perfiles"><i class="fa fa-key"></i> <span>Gestor Perfiles</span></a></li>';

  }

  ?>

</ul>	