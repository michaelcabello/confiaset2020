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

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["tituloPost"]) && preg_match('/^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["descripcionCorta"]) ){

					$datos = array("titulo"=>$_POST["tituloPost"],
								   "descripcionlarga"=>$_POST["editor1"],
								   "estado"=> 1
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



/*	static public function ctrCrearBlog($datos){

					$datosBlog = array("titulo"=>$datos["titulo"],
								   "descripcionlarga"=>$datos["descripcionlarga"],
								   "estado"=> 1
								   );

					$respuesta = ModeloBlog::mdlIngresarBlog("blog", $datosBlog);
					return $respuesta;
	}*/


}/*fin de la clase ControladorBlog*/