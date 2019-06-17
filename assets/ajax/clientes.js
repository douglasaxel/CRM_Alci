$(document).ready(function() {
	$( "#form-addClient" ).submit(function(form) {
		$.ajax({
			method: 'POST',
			url: 'clientes/save',
			data: $('#form-addClient').serialize(),
			dataType: 'json',
			success: function(data) {
				console.log(data);
			},
			error: function() {

			}
		});
	});

	$('form#form-clientComment').submit(function(form) {
		form.preventDefault();
		$.post('/index.php/clientes/save_desc', $('form#form-clientComment').serialize(), function(data) {
			console.log($('form#form-clientComment').serialize());
		});
	});

	// $( "form#form-clientComment" ).submit(function(form) {
	// 	// form.preventDefault();
	// 	dados = $('form#form-clientComment').serialize();
	// 	$.ajax({
	// 		method: 'POST',
	// 		url: '/index.php/clientes/save_desc',
	// 		data: {dados : dados},
	// 		dataType: 'json',
	// 		success: function(data) {
	// 			console.log(data);
	// 		},
	// 		error: function(data) {
	// 			console.log(data);
	// 			alert('Erro de transmissão');
	// 		}
	// 	});
	// });
});