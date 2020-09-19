<?php

class ControladorBlog{



	/*=============================================
	MOSTRAR LISTA DE POSTS DEL BLOG
	=============================================*/

	static public function ctrMostrarBlog($item, $valor){

		$tabla = "blog";

		$respuesta = ModeloBlog::mdlMostrarBlog($tabla, $item, $valor);

		return $respuesta;
	
	}


	/*=============================================
	crear post del blog
	=============================================*/

	static public function ctrCrearBlog()
	{
		if(isset($_POST["tituloPost"]))
		{

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloPost"]) && preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcioncorta"]) ){


				/*=============================================
				VALIDAR IMAGEN DEL BLOG
				=============================================*/

				$rutaFotoBlog = "vistas/img/blog/default/default.jpg";

				if(isset($_FILES["fotoblog"]["tmp_name"]) && !empty($_FILES["fotoblog"]["tmp_name"])){

					/*=============================================
					DEFINIMOS LAS MEDIDAS
					=============================================*/

					list($ancho, $alto) = getimagesize($_FILES["fotoblog"]["tmp_name"]);

					$nuevoAncho = 500;
					$nuevoAlto = 500;

					/*=============================================
					DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
					=============================================*/	

					if($_FILES["fotoblog"]["type"] == "image/jpeg"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaFotoBlog = "vistas/img/blog/".$_POST["rutapost"].".jpg";

						$origen = imagecreatefromjpeg($_FILES["fotoblog"]["tmp_name"]);	

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagejpeg($destino, $rutaFotoBlog);

					}

					if($_FILES["fotoBlog"]["type"] == "image/png"){

						/*=============================================
						GUARDAMOS LA IMAGEN EN EL DIRECTORIO
						=============================================*/

						$rutaFotoBlog = "vistas/img/blog/".$_POST["rutapost"].".png";

						$origen = imagecreatefrompng($_FILES["fotoblog"]["tmp_name"]);						

						$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

						imagealphablending($destino, FALSE);
    			
    					imagesavealpha($destino, TRUE);

						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

						imagepng($destino, $rutaFotoBlog);

					}


				}	




					$datos = array("titulo"=>$_POST["tituloPost"],
								   "ruta"=>$_POST["rutapost"],
								   "descripcionlarga"=>$_POST["editor1"],
								   "estado"=> 1,
								   "id_categoriablog"=>$_POST["seleccionarcategoriablog"],
								   "id_subcategoriablog"=>$_POST["seleccionarsubcategoriablog"],
								   "num_visitas"=>$_POST["numvisitas"],
								   "estrellas"=>$_POST["numestrellas"],
								   "fecha"=>$_POST["fecha"],
								   "title"=>$_POST["titlepost"],
								   "description"=>$_POST["descriptionpost"],
								   "keywords"=>$_POST["keywordspost"],
								   "descripcioncorta"=>$_POST["descripcioncorta"],
								   "imagen"=>$rutaFotoBlog,
								   "video"=>$_POST["videopost"]
								   );

					$respuesta = ModeloBlog::mdlIngresarBlog("blog", $datos);
					if($respuesta == "ok"){

						echo'<script>

						swal({
							  type: "success",
							  title: "El Post ha sido guardada correctamente",
							  showConfirmButton: true,
							  confirmButtonText: "Cerrar"
							  }).then(function(result){
								if (result.value) {

								window.location = "blog";

								}
							})

						</script>';

					}//fin del if con respuesta ok
			}else{
		
					echo'<script>

					swal({
						  type: "error",
						  title: "¡El título del Post no debe ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  })

			  	</script>';

			  	return;


			}//fin del pregmach	

		}//fin del if titulopost
					//return $respuesta;
	}//fin del metodo ctrCrearBlog


    static public function ctrEditarBlog($datos){

				$datosBlog = array("id"=>$datos["id"],
							   "titulo"=>$datos["titulo"],
			  			         "ruta"=>$datos["ruta"]);

				$respuesta = ModeloBlog::mdlEditarBlog("blog", $datosBlog);

				return $respuesta;


    }

/*	static public function ctrCrearBlog($datos){

					$datosBlog = array("titulo"=>$datos["titulo"],
								   "descripcionlarga"=>$datos["descripcionlarga"],
								   "estado"=> 1
								   );

					$respuesta = ModeloBlog::mdlIngresarBlog("blog", $datosBlog);
					return $respuesta;
	}*/


}/*fin de la clase ControladorBlog*/