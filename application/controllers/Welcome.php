<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Productos');
		
	}

	public function index()
	{	
		if(null !== $this->session->userdata('itemsAgregados')){
			$this->session->set_userdata('itemsAgregados', array());	
		}
		$data = $this->template();
		$this->load->view('welcome', $data);	
	}

	function template(){
		$data = array(
			'head' => $this->load->view('template/head','',true),
			'footer'=> $this->load->view('template/footer','', true),
			'nav'=> $this->load->view('template/nav','', true),
			'productos' =>  $this->getProductos(),
		);
		return $data;
	}


	function agregarItem(){

		if(isset($_POST['id_producto'])){
			$items = $this->session->userdata('itemsAgregados');
			$id_prod = $_POST['id_producto'];
			$id_prod = substr($id_prod, 1);

			if(array_key_exists($id_prod, $items)){
				//$items[$id_prod] = $items[$id_prod] + 1;
				echo false;
			}else{
				$items[$id_prod] = 1;
				$this->session->set_userdata('itemsAgregados', $items);
				echo json_encode($items);
			}
		}
	}

	function listadoDeProductos(){
		$datos = $this->session->userdata('items');
	}
	

	function getProductos(){
		$datos = $this->Productos->getProductos();
		return $datos;
	}

	function generarCarrito(){
		if(isset($_POST['generar'])){
			$items = $this->session->userdata('itemsAgregados');
			$this->session->set_userdata('itemsAgregados', $items);
			
			$productos = array_keys($items);
			$id = end($productos);
			$datos = $this->Productos->getProductoId($id);
			
			echo json_encode($datos);
		}
	}

	function procesarCompra(){
		$nombre 	= $this->input->post('nombre');
		$apellido 	= $this->input->post('apellido');
		$email 		= $this->input->post('email');
		$tel 		= $this->input->post('telefono');
		$monto 		= $this->input->post('monto');


		echo $nombre.' '.$apellido.' '.$email.' '.$tel.' '.$monto;
		$tablaDetalles = $this->detalle();
		

		/*Mensaje para el USUARIO*/
		$cuerpo_mensaje =
		'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">';
		$head = 
		'<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
			<title>[SUBJECT]</title>
			<style type="text/css">

			@media screen and (max-width: 600px) {
			    table[class="container"] {
			        width: 95% !important;
			    }
			}

			#outlook a {padding:0;}
				body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0;}
				.ExternalClass {width:100%;}
				.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div {line-height: 100%;}
				#backgroundTable {margin:0; padding:0; width:100% !important; line-height: 100% !important;}
				img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;}
				a img {border:none;}
				.image_fix {display:block;}
				p {margin: 1em 0;}
				h1, h2, h3, h4, h5, h6 {color: black !important;}

				h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {color: blue !important;}

				h1 a:active, h2 a:active,  h3 a:active, h4 a:active, h5 a:active, h6 a:active {
					color: red !important; 
				 }

				h1 a:visited, h2 a:visited,  h3 a:visited, h4 a:visited, h5 a:visited, h6 a:visited {
					color: purple !important; 
				}

				table td {border-collapse: collapse;}

				table { border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; }

				a {color: #000;}

				@media only screen and (max-device-width: 480px) {

					a[href^="tel"], a[href^="sms"] {
								text-decoration: none;
								color: black; /* or whatever your want */
								pointer-events: none;
								cursor: default;
							}

					.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
								text-decoration: default;
								color: orange !important; /* or whatever your want */
								pointer-events: auto;
								cursor: default;
							}
				}


			@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
				a[href^="tel"], a[href^="sms"] {
							text-decoration: none;
							color: blue; /* or whatever your want */
							pointer-events: none;
							cursor: default;
						}

				.mobile_link a[href^="tel"], .mobile_link a[href^="sms"] {
							text-decoration: default;
							color: orange !important;
							pointer-events: auto;
							cursor: default;
						}
			}

			@media only screen and (-webkit-min-device-pixel-ratio: 2) {
				/* Put your iPhone 4g styles in here */
			}

			@media only screen and (-webkit-device-pixel-ratio:.75){
				/* Put CSS for low density (ldpi) Android layouts in here */
			}
			@media only screen and (-webkit-device-pixel-ratio:1){
				/* Put CSS for medium density (mdpi) Android layouts in here */
			}
			@media only screen and (-webkit-device-pixel-ratio:1.5){
				/* Put CSS for high density (hdpi) Android layouts in here */
			}
			/* end Android targeting */
			h2{
				color:#181818;
				font-family:Helvetica, Arial, sans-serif;
				font-size:22px;
				line-height: 22px;
				font-weight: normal;
			}
			a.link1{

			}
			a.link2{
				color:#fff;
				text-decoration:none;
				font-family:Helvetica, Arial, sans-serif;
				font-size:16px;
				color:#fff;border-radius:4px;
			}
			p{
				color:#555;
				font-family:Helvetica, Arial, sans-serif;
				font-size:16px;
				line-height:160%;
			}
			</style>

			<script type="colorScheme" class="swatch active">
			  {
			    "name":"Default",
			    "bgBody":"ffffff",
			    "link":"fff",
			    "color":"555555",
			    "bgItem":"ffffff",
			    "title":"181818"
			  }
			</script>
		</head>';
		$contenido = 
		'<table cellpadding="0" width="100%" cellspacing="0" border="0" id="backgroundTable" class="bgBody">
				<tr>
				<td>
					<table cellpadding="0" width="620" class="container" align="center" cellspacing="0" border="0">
				<tr>
				<td>
				<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
					<tr>
					<td class="movableContentContainer bgItem">

						<div class="movableContent">
							<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
								<tr height="40">
									<td width="200">&nbsp;</td>
									<td width="200">&nbsp;</td>
									<td width="200">&nbsp;</td>
								</tr>
								<tr>
									<td width="200" valign="top">&nbsp;</td>
									<td width="200" valign="top" align="center">
										<div class="contentEditableContainer contentImageEditable">
						                	<div class="contentEditable" align="center" >
						                  		<img src="'.base_url('assets/img/logo.png').'" width="155" height="155"  alt="Logo"  data-default="placeholder" />
						                	</div>
						              	</div>
									</td>
									<td width="200" valign="top">&nbsp;</td>
								</tr>
								<tr height="25">
									<td width="200">&nbsp;</td>
									<td width="200">&nbsp;</td>
									<td width="200">&nbsp;</td>
								</tr>
							</table>
						</div>

						<div class="movableContent">
							<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
								<tr>
									<td width="100%" colspan="3" align="center" style="padding-bottom:10px;padding-top:25px;">
										<div class="contentEditableContainer contentTextEditable">
						                	<div class="contentEditable" align="center">
						                  		<h2 >¡Muchas gracias por tu compra!</h2>
						                	</div>
						              	</div>
									</td>
								</tr>
								<tr>
									<td width="100">&nbsp;</td>
									<td width="100%" align="center">
										<div class="contentEditableContainer contentTextEditable">
						                	<div class="contentEditable" align="left" >
						                  		<p >Hola '.$nombre.' '.$apellido.',
						                  			<br/>
						                  			<br/>
													Nos complace informate que tu orden se ha registrado correctamente y que proximamente nos pondremos en contacto contigo.</p>
						                	</div>
						              	</div>
									</td>
									<td width="100">&nbsp;</td>
								</tr>
							</table>
							'.$tablaDetalles.'
							<p style="text-align:right">'.$monto.'</p>
							<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
								<tr>
									<td width="200">&nbsp;</td>
									<td width="200" align="center" style="padding-top:25px;">
										<table cellpadding="0" cellspacing="0" border="0" align="center" width="200" height="50">
											<tr>
												<td bgcolor="#6600cc" align="center" style="border-radius:4px;" width="200" height="50">
													<div class="contentEditableContainer contentTextEditable">
									                	<div class="contentEditable" align="center" >
									                  		<a target="_blank" href="http://squirtlube.com" class="link2">ir a SQUIRT</a>
									                	</div>
									              	</div>
												</td>
											</tr>
										</table>
									</td>
									<td width="200">&nbsp;</td>
								</tr>
							</table>
						</div>


						<div class="movableContent">
							<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
								<tr>
									<td width="100%" colspan="2" style="padding-top:65px;">
										<hr style="height:1px;border:none;color:#333;background-color:#ddd;" />
									</td>
								</tr>
								<tr>
									<td width="60%" height="70" valign="middle" style="padding-bottom:20px;">
										<div class="contentEditableContainer contentTextEditable">
						                	<div class="contentEditable" align="left" >
						                  		<span style="font-size:13px;color:#181818;font-family:Helvetica, Arial, sans-serif;line-height:200%;">Sent to '.$email.' by info@squirtlube.com.ar </span>
												<br/>
												<span style="font-size:11px;color:#555;font-family:Helvetica, Arial, sans-serif;line-height:200%;">Squirt Cycling Products | +54 9 11 4997-7972</span>
												<br/>
												<span style="font-size:13px;color:#181818;font-family:Helvetica, Arial, sans-serif;line-height:200%;">
												<a target="_blank" href="http://squirtlube.com" style="text-decoration:none;color:#555">http://squirtlube.com</a>
												</span>
												<br/>
						                	</div>
						              	</div>
									</td>
									<td width="40%" height="70" align="right" valign="top" align="right" style="padding-bottom:20px;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0" align="right">
											<tr>
												<td width="57%"></td>
												<td valign="top" width="34">
													<div class="contentEditableContainer contentFacebookEditable" style="display:inline;">
								                        <div class="contentEditable" >
								                            <img src="'.base_url('assets/img/icons/f.png').'" data-default="placeholder" data-max-width="30" data-customIcon="true" width="30" height="30" alt="facebook" style="margin-right:40x;">
								                        </div>
								                    </div>
												</td>
												<td valign="top" width="34">
													<div class="contentEditableContainer contentTwitterEditable" style="display:inline;">
								                      <div class="contentEditable" >
								                        <img src="'.base_url('assets/img/icons/t.png').'" data-default="placeholder" data-max-width="30" data-customIcon="true" width="30" height="30" alt="twitter" style="margin-right:40x;">
								                      </div>
								                    </div>
												</td>
												<td valign="top" width="34">
													<div class="contentEditableContainer contentImageEditable" style="display:inline;">
								                      <div class="contentEditable" >
								                        <a target="_blank" href="#" data-default="placeholder"  style="text-decoration:none;">
															<img src="'.base_url('assets/img/icons/i.png').'" width="30" height="30" data-max-width="30" alt="pinterest" style="margin-right:40x;" />
														</a>
								                      </div>
								                    </div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</div>
					</td>
					</tr>
				</table>
				</td>
				</tr>
			</table>
			</td>
			</tr>
			</table>';
		$cuerpo_mensaje .= $head;
		$cuerpo_mensaje .= '<body>';
		$cuerpo_mensaje .= $contenido;
		$cuerpo_mensaje .= '</body></html>';


		/*Mensaje para el administrador*/
		$correo_administrador = 'machucajuangabriel@gmail.com';
		$mensaje_administrador 	= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">';
		$mensaje_administrador 	.= $head;
		$mensaje_administrador	.= '<body>';
		$contenido_administrador =  
			'<table cellpadding="0" width="100%" cellspacing="0" border="0" id="backgroundTable" class="bgBody">
				<tr>
				<td>
					<table cellpadding="0" width="620" class="container" align="center" cellspacing="0" border="0">
				<tr>
				<td>
				<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
					<tr>
					<td class="movableContentContainer bgItem">

						<div class="movableContent">
							<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
								<tr height="40">
									<td width="200">&nbsp;</td>
									<td width="200">&nbsp;</td>
									<td width="200">&nbsp;</td>
								</tr>
								<tr>
									<td width="200" valign="top">&nbsp;</td>
									<td width="200" valign="top" align="center">
										<div class="contentEditableContainer contentImageEditable">
						                	<div class="contentEditable" align="center" >
						                  		<img src="'.base_url('assets/img/logo.png').'" width="155" height="155"  alt="Logo"  data-default="placeholder" />
						                	</div>
						              	</div>
									</td>
									<td width="200" valign="top">&nbsp;</td>
								</tr>
								<tr height="25">
									<td width="200">&nbsp;</td>
									<td width="200">&nbsp;</td>
									<td width="200">&nbsp;</td>
								</tr>
							</table>
						</div>

						<div class="movableContent">
							<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
								<tr>
									<td width="100%" colspan="3" align="center" style="padding-bottom:10px;padding-top:25px;">
										<div class="contentEditableContainer contentTextEditable">
						                	<div class="contentEditable" align="center">
						                  		<h2 >¡Hay una nueva Orden en espera!</h2>
						                	</div>
						              	</div>
									</td>
								</tr>
								<tr>
									<td width="100">&nbsp;</td>
									<td width="100%" align="center">
										<div class="contentEditableContainer contentTextEditable">
						                	<div class="contentEditable" align="left" >
						                  		<p >Usuario '.$nombre.' '.$apellido.',
						                  			<br>
													Ha solicitado una nueva orden de compra, el usuario "'.$nombre.' '.$apellido.'" con correo electronico <b>'.$email.'</b> y número de teléfono <b>'.$tel.'</b> y un monto total de orden de $.'.$monto.' dolares.</p>
						                	</div>
						              	</div>
									</td>
									<td width="100">&nbsp;</td>
								</tr>
							</table>
							'.$tablaDetalles.'
							<p style="text-align:right">'.$monto.'</p>
							<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
								<tr>
									<td width="200">&nbsp;</td>
									<td width="200" align="center" style="padding-top:25px;">
										<table cellpadding="0" cellspacing="0" border="0" align="center" width="200" height="50">
											<tr>
												<td bgcolor="#6600cc" align="center" style="border-radius:4px;" width="200" height="50">
													<div class="contentEditableContainer contentTextEditable">
									                	<div class="contentEditable" align="center" >
									                  		<a target="_blank" href="http://squirtlube.com" class="link2">ir a SQUIRT</a>
									                	</div>
									              	</div>
												</td>
											</tr>
										</table>
									</td>
									<td width="200">&nbsp;</td>
								</tr>
							</table>
						</div>


						<div class="movableContent">
							<table cellpadding="0" cellspacing="0" border="0" align="center" width="600" class="container">
								<tr>
									<td width="100%" colspan="2" style="padding-top:65px;">
										<hr style="height:1px;border:none;color:#333;background-color:#ddd;" />
									</td>
								</tr>
								<tr>
									<td width="60%" height="70" valign="middle" style="padding-bottom:20px;">
										<div class="contentEditableContainer contentTextEditable">
						                	<div class="contentEditable" align="left" >
						                  		<span style="font-size:13px;color:#181818;font-family:Helvetica, Arial, sans-serif;line-height:200%;">Sent to '.$email.' by info@squirtlube.com.ar </span>
												<br/>
												<span style="font-size:11px;color:#555;font-family:Helvetica, Arial, sans-serif;line-height:200%;">Squirt Cycling Products | +54 9 11 4997-7972</span>
												<br/>
												<span style="font-size:13px;color:#181818;font-family:Helvetica, Arial, sans-serif;line-height:200%;">
												<a target="_blank" href="http://squirtlube.com" style="text-decoration:none;color:#555">http://squirtlube.com</a>
												</span>
												<br/>
						                	</div>
						              	</div>
									</td>
									<td width="40%" height="70" align="right" valign="top" align="right" style="padding-bottom:20px;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0" align="right">
											<tr>
												<td width="57%"></td>
												<td valign="top" width="34">
													<div class="contentEditableContainer contentFacebookEditable" style="display:inline;">
								                        <div class="contentEditable" >
								                            <img src="'.base_url('assets/img/icons/f.png').'" data-default="placeholder" data-max-width="30" data-customIcon="true" width="30" height="30" alt="facebook" style="margin-right:40x;">
								                        </div>
								                    </div>
												</td>
												<td valign="top" width="34">
													<div class="contentEditableContainer contentTwitterEditable" style="display:inline;">
								                      <div class="contentEditable" >
								                        <img src="'.base_url('assets/img/icons/t.png').'" data-default="placeholder" data-max-width="30" data-customIcon="true" width="30" height="30" alt="twitter" style="margin-right:40x;">
								                      </div>
								                    </div>
												</td>
												<td valign="top" width="34">
													<div class="contentEditableContainer contentImageEditable" style="display:inline;">
								                      <div class="contentEditable" >
								                        <a target="_blank" href="#" data-default="placeholder"  style="text-decoration:none;">
															<img src="'.base_url('assets/img/icons/i.png').'" width="30" height="30" data-max-width="30" alt="pinterest" style="margin-right:40x;" />
														</a>
								                      </div>
								                    </div>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</div>
					</td>
					</tr>
				</table>
				</td>
				</tr>
			</table>
			</td>
			</tr>
			</table>';
		$mensaje_administrador .= $contenido_administrador;
		$mensaje_administrador .= '</body></html>';

		//var_dump($mensaje_administrador);

		//var_dump($cuerpo_mensaje);
		$asunto = "SQUIRT : Orden confirmada";
		$responder = "From : $nombre $apellido <$email>";
		$para = $email.', ajedrezesquina@outlook.com';

		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "From: $nombre <$email>"."\r\n";
		$headers .= "Reply-To: ".'info@squirtlube.com.ar'."\r\n";

		if(mail($para, $asunto, $cuerpo_mensaje, $headers) && mail($correo_administrador, $asunto, $mensaje_administrador, $headers)){
			$this->session->set_userdata('itemsAgregados',array()); //Reestablecer el array de items;
			$msj = '<p class="bg-success p-3"> Se ha enviado la confirmacion de su compra exitosamente.</p>';
			$this->session->set_flashdata('msj', $msj);
			redirect('welcome#carrito');
		}else{
			$msj = '<p class="bg-danger p-3"> No se ha enviado el correo electronico. Verifique que sea correcto.</p>';
			$this->session->set_flashdata('msj', $msj);
			redirect('welcome#carrito');
		}

	}


	function detalle(){
		$items = $this->session->userdata('itemsAgregados');
		$ids = array_keys($items);
		$datos = $this->Productos->getProductosIDS($ids);
		var_dump($datos);

		$html=
		'<table cellpadding="0" width="600" cellspacing="0" border="0" id="backgroundTable" class="bgBody" style="font-family:Helvetica, Arial, sans-serif;">
			<p>Detalles</p>
			<tr style="background-color: #e6e6ff;">
				<td style="padding:10px;">Modelo</td>
				<td style="padding:10px;">Ml</td>
				<td style="padding:10px;">Precio</td>
				<td style="padding:10px;">Cantidad</td>
				<td style="padding:10px;">Total USD</td>
			</tr>';

		foreach ($datos as $row) {
			if(array_key_exists($row->id_producto, $items)){
				$cantidad = $items[$row->id_producto];
				$html .= 
				'<tr>
					 <td><p style="padding:0px; margin:0px;">'.$row->modelo.'</p></td>'.
					'<td><p style="padding:0px; margin:0px;">'.$row->ml.'</p></td>'.
					'<td><p style="padding:0px; margin:0px; text-align: center;">'.$row->precio.'</p></td>'.
					'<td><p style="padding:0px; margin:0px; text-align: center;">'.$cantidad.'</p></td>'.
					'<td><p style="padding:0px; margin:0px; text-align: center;">'.($cantidad*$row->precio).'</p></td>
				</tr>';			
			}
		}
		$html.='</table>';

		return $html;
	}
	
	function productosSolicitados(){
		if(isset($_POST['id_prod']) && isset($_POST['cantidad'])){
			$id = $_POST['id_prod'];
			$cant = $_POST['cantidad'];

			$items = $this->session->userdata('itemsAgregados');
			if(array_key_exists($id, $items)){
				$items[$id] = $cant;
				$this->session->set_userdata('itemsAgregados', $items);
				echo json_encode($items);
			}
		}
	}
}
