

	<div class="shadow"></div>

	<div class="clearfix" style="background-image: url(vistas/imgconfia/ambliopia-oftalmoconfia.jpg); bottom: 0; left: 0;
    right: 0; top: 0; z-index: 0; margin-bottom: 0; padding:90px 0; position: relative; text-align: left">
		<div class="container">
			<div class="col-lg-12">
				<h2 style="color: #FFFFFF; padding: 0px !important">Contáctenos</h2>
                
			</div>
		</div>
	</div><!-- end post-wrapper-top -->    

	<div class="white-wrapper">
    	<div class="container">
			<div class="row ">
				<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
					<div class="big-title clearfix">
						<h3>Escríbenos</h3>
					</div><!-- end big title -->
                    <div class="contact_form">
                    <div id="message"></div>

                        <form class="row online_form_builder_big"  role="form" method="post" onsubmit="return validarContactenos()">
							<div class="col-md-12 has-success">
                                <label for="website">Nombre y Apellidos</label>
                                <input type="text" id="nombreContactenos" name="nombreContactenos" class="form-control" placeholder="Escriba su nombre" required>
                            </div>

                            <div class="col-md-6 has-success">
                                <label for="name">Correo Electrónico</label>
                                <input type="email" id="emailContactenos" name="emailContactenos" class="form-control" placeholder="Escriba su correo electrónico" required>  
                            </div>
                            <div class="col-md-6 has-success">
                                <label for="email">Celular</label>
                                <input type="text" id="celular" name="celular" class="form-control" placeholder="Escriba su Celular" required>
                            </div>
                           
                            <div class="clearfix"></div>
                            <div class="col-md-12 has-success">
                            <label for="comments">Descripción del Mensaje</label>
                                                     
                            <textarea id="mensajeContactenos" name="mensajeContactenos" class="form-control" placeholder="Escriba su mensaje" rows="5" required></textarea>

                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-12">
                            <button type="submit" value="SEND" id="submit" class="btn btn-lg btn-primary pull-right">ENVIAR MENSAJE AHORA</button>   
                            </div>   
                        </form>
                <?php 

                    $contactenos = new ControladorUsuarios();
                    $contactenos -> ctrFormularioContactenos();

                ?>

                     </div>
				</div>
				<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
					<div class="big-title clearfix">
						<h3>Información de Contacto</h3>
					</div><!-- end big title -->
                    
                    <p>Estaremos gustosos de atenderlos</p>
                    
                    <ul class="contact_details_1">
                    	<li><i class="fa fa-map-marker"></i> <span>Dirección:</span>Av. José Gálvez Barrenechea 356, Urbanización Córpac<br>
                    	  San Isisdro  - Lima - Perú</li>
                    	<li><i class="fa fa-mobile-phone"></i> <span>Teléfono:</span>(511) 475-3320 / 475-3385                    	</li>
                    	<li>
                        <i class="fa fa-envelope-o"></i> <span>Email:</span><a href="mailto:informes@oftalmoconfia.com" title="">informes@oftalmoconfia.com</a><br>
						</li>
                    </ul>
                    
				</div> 
			</div>
        </div><!-- end container -->
    </div><!-- end white-wrapper -->

    <div>
    	
    	  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.2498624461564!2d-77.01554768507027!3d-12.095039646093758!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c879cd18193d%3A0xeebf1619d49fc7b1!2sAv.+Jos%C3%A9+Galvez+Barrenechea+356%2C+San+Isidro+15036!5e0!3m2!1ses!2spe!4v1485812493383" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>

    </div>