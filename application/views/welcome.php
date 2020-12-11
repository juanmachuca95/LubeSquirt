<?=$head?>
<?=$nav?>
	<body>
    <!---Model de imagen-->
     <div class="modal fade" id="modalImagen" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Imagen
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
            <img id="verImagen" class="img-fluid w-100" src="">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
    <!--Fin modal de mensaje--->

    <!--Modal de Aviso--->
    <div class="modal fade" id="modalAviso" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">
              <i class="fas fa-shopping-cart fa-lg text-warning"></i> ¡Haz agregado un producto a tu Carrito!
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
                <h6>El producto se ha agregado. Dirigete a <a href="<?=base_url('welcome#carrito')?>">carrito &#x1f6d2;</a> para modificar cantidades.</h6>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Seguir &#x1f6b4;</button>
          </div>
        </div>
      </div>
    </div>
    <!--Fin modal de aviso-->

    <!--Modal de Aviso--->
    <div class="modal fade" id="modalAvisoRepetido" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">&#x1f6ab; ¡Ya haz agregado este producto!
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
                <h6>Dirigete a <a class="btn bg-violeta btn-sm text-white" href="<?=base_url('welcome#carrito')?>">ir a <i class="fas fa-shopping-cart fa-lg text-warning"></i></a> para modificar cantidades.</h6>
            </div>
          </div>
          <div class="modal-footer">
            <a href="<?=base_url('welcome#carrito')?>" class="btn bg-violeta text-white" data-dismiss="modal"> Ok </a>
          </div>
        </div>
      </div>
    </div>
    <!--Fin modal de aviso-->


    <!--SLIDER-->
  	<div class="container-fluid p-0">
  		<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  		  <ol class="carousel-indicators">
  		    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
  		    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
  		    <!-- li data-target="#carouselExampleCaptions" data-slide-to="2"></li> -->
  		  </ol>
  		  <div class="carousel-inner">
  		    <div class="carousel-item active">
  		      <img src="<?=base_url('assets/img/2.jpg')?>" class="d-block w-100" alt="...">
  		      <div class="carousel-caption d-none d-md-block">
  		        <h2 data-wow-duration="700ms" data-wow-delay="500ms" class="wow bounceInDown animated" style="color:#030E7E">
                Squirt<span style="color:white;" >Lube</span>
              </h2>
  		        <h3 data-wow-duration="1000ms" class="wow slideInLeft animated" style="color:#030E7E">
                <span style="color:white;">Avalado</span> por el Campeón del Mundo
              </h3>
              <h1 data-wow-duration="1000ms" class="wow slideInRight animated">Argentina</h1>
  		      </div>
  		    </div>
  		    <div class="carousel-item">
  		      <img src="<?=base_url('assets/img/3.jpg')?>" class="d-block w-100" alt="...">
  		      <div class="carousel-caption d-none d-md-block">
  		        <h2 data-wow-duration="500ms" data-wow-delay="500ms" class="wow bounceInDown animated" style="color:white;">Squirt<span style="color:#030E7E">Lube</span></h2>
                <h3 data-wow-duration="500ms" class="wow slideInLeft animated" style="color:white;">
                  <span >Una gama de Productos </span > Para Profesionales
                </h3>
  		      </div>
  		    </div>
  		  </div>
  		  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
  		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  		    <span class="sr-only">Previous</span>
  		  </a>
  		  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
  		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
  		    <span class="sr-only">Next</span>
  		  </a>
  		</div>
  	</div>









  	<!-- <div id="contenido"> -->
    <div class="container-fluid p-0 fondo_contenido">
      <div class="container py-4 fondo_contenido" id="productos">
          <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 my-4 mx-auto text-center">
            <h1 data-wow-duration="700ms" data-wow-delay="500ms" class="wow bounceInDown animated text-warning"> Galeria </h1>
            <h1 data-wow-duration="1000ms" class="wow slideInLeft animated font-weight-light">
              <span style="color: #ccc;">Lista de Productos</span> </h1>       
            <p data-wow-duration="1000ms" class="wow slideInRight animated font-weight-lighter" style="color:#030E7E"><span class="text-info">Selecciona uno de nuestros productos </span> </p>
          </div>

          <div class="row m-0  d-flex justify-content-center">

              <?php if(isset($productos)): foreach ($productos as $row) : ?>              

              <div class="col-12 col-sm-6 col-md-4">
                  <div class="card shadow-lg mb-5 bg-white rounded">
                     
                      <a class="text-center" href="#" id="ver">
                      	<img class="img-fluid" src="<?=base_url($row->img)?>" alt="">
                      </a>
                      <div class="card-body">
                          <h5 class="card-title font-weight-bold"> 
                              <i class="fas fa-image text-violeta"></i> <?=$row->modelo?>
                          </h5>
                          <p class="card-text font-weight-lighter">
                              Capacidad de <?=$row->ml?> ML. 
                          </p>
                          <p class="font-weight-light">
                              <i class="fas fa-hand-holding-usd fa-lg text-warning"></i>
                               <?=$row->precio?>  USD
                          </p>
                          <a href="#<?=$row->id_producto?>" id="add" class="btn text-white text-uppercase form-control bg-violeta"> Comprar </a>
                          <!-- <a href="#" class="btn btn-outline-light text-uppercase" onclick="actualizarTablaCarrito();" style="color: #6200ee;"> Detalles </a> -->
                      </div>
                  </div>
              </div>

              <?php endforeach; endif;?>

          </div>

      <!---Fin contenido-->
      </div>
    </div>













    <!---CARRITO-->
  <div class="container-fluid p-0 bg-white">
    <div class="container p-0 bg-light py-5 rounded" id="carrito">
        
        <?php if(null !== $this->session->flashdata('msj')) {
          echo $this->session->flashdata('msj');
        }?>
        <div class="text-left pt-5 px-3">
          <h1  data-wow-duration="700ms" data-wow-delay="500ms" class="wow bounceInDown animated" style="color:#030E7E"> Tu Carrito <i class="fas fa-shopping-cart text-warning"></i>
          </h1>
          <p data-wow-duration="1000ms" class="wow slideInRight animated font-weight-light">
            Panel de Productos agregados al carrito
          </p>
        </div>
        <div class="row m-0 py-4">
            <div class="col-md-12 px-3">
                <!-- <h1>
                    Tu Carrito <i class="fas fa-shopping-cart text-warning"></i>
                </h1>
                <p class="font-weight-light">
                    Panel de Productos agregados al carrito
                </p>  -->

                <form method="post" action="<?=base_url('welcome/procesarCompra')?>">
                  <div class="form-group">
                      <div class="form-group row">
                          <div class="col-sm-6 mb-2">
                              <label for="nombre" class="control-label">Tu nombre</label>
                              <input type="text" class="form-control bg-palid-blue text-left" id="nombre" name="nombre" placeholder="Ej.: Juan . . ." value="Juan" required>
                          </div>
                          <div class="col-sm-6 mb-2">
                            <label for="apellido" class="control-label ">Apellido/s  </label>
                              <input type="text" class="form-control bg-palid-blue text-left" id="apellido" name="apellido" placeholder="Ej.: Perez . . ." value="Machuca" required>
                          </div>
                      </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-sm-6 mb-2">
                          <label for="email" class="control-label">Correo electronico</label>
                          <input type="email" class="form-control bg-palid-blue  text-left" id="email" name="email" placeholder="Ej.: tunombre@gmail.com" value="machucajuangabriel@gmail.com" required >
                      </div>
                      <div class="col-sm-6 mb-2">
                          <label for="tel" class="control-label">Telefono celular </label>
                          <input class="form-control mb-2 bg-palid-blue text-left" type="tel" maxlength="17" id="telefono" name="telefono" 
                              placeholder="+ (Codigo) Número de teléfono " value="011 (894) 43 334" 
                              required>
                      </div>   
                  </div> 
                  <div class="table-responsive">
                      <table class="table d-flex">
                          <h4 class="font-weight-light">Descripción: </h4>
                          <!-- <thead>
                              <tr class="d-flex">
                                <th scope="col">Cod</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">Capacidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Total</th>
                                <th scope="col">Imagen</th>
                              </tr>
                          </thead> -->
                          <tbody id="panel">
                          </tbody>
                      </table>
                    
                  </div> 
                  <div class="text-right">
                      <div class="row">
                          <div class=" col-md-12">
                              <a class="btn btn-info text-white" id="actualizarTotal" href="#"> <i class="fas fa-sync-alt"></i> </a>
                              <input class="rouded p-3 border-0 font-weight-bold text-right" id="montoTotal" name="monto" placeholder="MONTO TOTAL . . ." required="">
                          </div>
                      </div>
                  </div>
                  <button class="btn btn-warning font-weight-bold" id="confirmar">Confirmar <i class="fas fa-clipboard-check fa-lg"></i></button>
                </form>
            </div>
        </div>   
    </div>
  </div>


<!-- boton whatsapp-->
  <a href="https://api.whatsapp.com/send?phone=5491149977972" class="float" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
  </a>
 <!-- fin boton whatsapp-->
<?=$footer?>
<script>
    $(document).on('click','#ver',function(e){
        e.preventDefault();
        var imagen = $(this).children().attr('src');
        $('#verImagen').attr('src',imagen);
        $('#modalImagen').modal('show');
    });
</script>