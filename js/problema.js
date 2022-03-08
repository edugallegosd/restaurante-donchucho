$(document).on("keypress", ".cantidad", function(e) {
    if ($(this).val()!='') {
		if (e.which == 13) {
			var id=$(this).attr('data-id');
			var precio=$(this).attr('data-precio');
			var cantidad=$(this).val();
			$(this).parentsUntil('.producto').find('.subtotal').text('Subtotal: '+(precio*cantidad));
			$.post('js/modificarDatos.php',{
				Id:id,
				Precio:precio,
				Cantidad:cantidad
			},function(e){
				$("#total").text('Total: '+e);
			});
		}
	}
});