

$(document).on('click', '#add', function(e){
	e.preventDefault();
	codigo = $(this, '#add').attr('href');

	$.ajax({
		url		: '/lube/welcome/agregarItem/',
		method	: 'POST',
		data: {id_producto : codigo},

		success:function(data){
			if(Object.entries(data).length !== 0){
				$('#modalAviso').modal('show');
				data = JSON.parse(data);
				document.getElementById('indice').innerHTML = Object.entries(data).length;
				actualizarTablaCarrito();
			}else{
				$('#modalAvisoRepetido').modal('show');
			}
		},
		error:function(xhr, status){
			alert("Petición Rechazada");
		}
	});
});



/*Actualiza el panel del cliente*/
function actualizarTablaCarrito(){

	$.ajax({
		url		: '/lube/welcome/generarCarrito/',
		method	: 'POST',
		data: {generar : true},

		success:function(data){
			if(Object.entries(data).length !== 0){
				data = JSON.parse(data);
				console.log(data);
				/*$.each(data, function(index, value){*/
					console.log(data.id_producto);
					$('<tr>',{
						'class':'d-flex',	
						}).append(
						$('<td>').append(
							$('<input>',{
								'value': data.id_producto,
								'class':'form-control',
								'name' : 'cod_prod',
								'readonly' : true,
							}),	
						),
						$('<td>').append(
							$('<input>',{
								'value': data.modelo,
								'class': 'rounded p-2 font-weight-bold border-0',
								'name' : 'modelo',
								'readonly' : true,
							}),	
						),
						$('<td>').append(
							$('<input>',{
								'value': data.ml+' ml.',
								'class':'form-control',
								'name' : 'capacidad',
								'readonly' : true,
							}),	
						),
						$('<td>').append(
							$('<input>',{
								'value': data.precio,
								'class':'form-control',
								'name'	: 'precio',
								'readonly' : true,
							}),	
						),
						$('<td>').append(
							$('<input>',{
								'value': 1,
								'class':'form-control',
								'type' : 'number',
								'name' : 'cantidad',
								'id' : 'cantidad',
								'min': 1,
							}),	
						),
						$('<td>').append(
							$('<input>',{
								'value' : data.precio,
								'class':'form-control',
								'name' : 'total',
								'id' : 'total',
								'readonly' : true,
							}),	
						),
						$('<td>').append(
							$('<img>',{
								'src': data.img,
								'height' : '50px',
							}),	
						),
					).appendTo($('#panel'));
				/*});	*/
			}
		},
		error:function(xhr, status){
			alert("Petición Rechazada");
		}
	});

}


/*SI POR ALGUN MOTIVO SE MODIFICA LOS LUGARES DE LA TABLA TAMBIEN SE DEBERAN MODIFICAR AQUI.*/
$(document).on('change', '#cantidad', function(e){
	cant = $(this,'#cantidad').val();
	//alert($(this,'#cantidad').parent().parent().children().children()[3].value);//Precio
	//alert($(this,'#cantidad').parent().parent().children().children()[5].value);//Total
	id_producto = $(this,'#cantidad').parent().parent().children().children()[0].value;
	precio = $(this,'#cantidad').parent().parent().children().children()[3].value;
	salida = $(this,'#cantidad').parent().parent().children().children()[5];

	$.ajax({
		url: './welcome/productosSolicitados/',
		type: 'POST',
		data:{id_prod: id_producto, cantidad: cant},

		success: function(response){
			total = parseFloat(cant * precio);
			$(salida).val(total);
			montoTotal = 0;
			t = $('input#total');
			for(i=0; i < t.length; i++){
				montoTotal = montoTotal + parseInt(t[i].value);
			}
			document.getElementById('montoTotal').value = 'Monto Total: '+montoTotal+' USD';
		},
		error: function(error){
			alert("fallo");
		}
	})
	
})


$(document).on('click','#actualizarTotal',function(e){
	e.preventDefault();
	if(!$('#panel').is(':empty')){
		mtTotal = 0;
		if(null !== $('input#total')){
			t = $('input#total');
			for(i=0; i < t.length; i++){
				mtTotal = mtTotal + parseInt(t[i].value);
			}
			document.getElementById('montoTotal').value = 'Monto Total: '+mtTotal+' USD';
		}
	}
})



$(document).on('click', '#confirmar', function(){
	if(document.getElementById('panel').childElementCount == 0){
	   document.getElementById('montoTotal').setCustomValidity("Agrega items al carrito.");
	}else{
 		document.getElementById('montoTotal').setCustomValidity("");
	}

	if(document.getElementById('montoTotal').value == 'Monto Total: 0 USD'){
		document.getElementById('montoTotal').setCustomValidity("Actualiza la tabla de productos.");
	}else{
		document.getElementById('montoTotal').setCustomValidity("");
	}
});


