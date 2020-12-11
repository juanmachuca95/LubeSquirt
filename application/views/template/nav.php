<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Squirt</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#carrito">Carrito <span class="badge badge-warning" id="indice">0</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
  </div>
</nav> -->


<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #002647;">
  <div class="container p-0">
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#" href="">
      <img src="<?php echo base_url('assets/img/logodark.png')?>" width="150px;">
    </a>
      
    <div class="collapse navbar-collapse" id="navbarNav">
       <ul class="  navbar-nav ml-auto ">
          <li class="nav-item active">
            <li class="nav-item active">

            <a class="nav-link text-white font-weight-bold" href="<?=base_url('welcome')?>"> Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" href="#productos">Productos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white font-weight-bold" href="#carrito">
              Carrito
              <!-- <i class="fas fa-shopping-cart fa-lg text-warning"></i> -->
              <sup>
                <span class="badge bg-violeta text-white" id="indice">0</span>
              </sup>
            </a>
          </li>
          
          </li>
        </ul>
    </div>
  </div>
</nav>
