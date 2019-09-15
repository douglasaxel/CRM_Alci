$(document).ready(function () {
	//before upload to server, alter this to "document.location.origin + '/'"
	var caminho = $('meta[name=base').attr('content');

	// $('.btn-add').click(function() {
	// 	$('form#form-addClient').find('input[name=id]').val(''),
	// 	$('form#form-addClient').find('input[name=nome]').val(''),
	// 	$('form#form-addClient').find('input[name=sobrenome]').val(''),
	// 	$('form#form-addClient').find('input[name=cpf]').val(''),
	// 	$('form#form-addClient').find('input[name=data_nasc]').val(''),
	// 	$('form#form-addClient').find('input[name=endereco]').val(''),
	// 	$('form#form-addClient').find('input[name=bairro]').val(''),
	// 	$('form#form-addClient').find('select[name=regiao]').val(''),
	// 	$('form#form-addClient').find('input[name=telefone]').val(''),
	// 	$('form#form-addClient').find('input[name=celular]').val(''),
	// 	$('form#form-addClient').find('input[name=email]').val(''),
	// 	$('form#form-addClient').find('input[name=descricao]').val('')
	// });


	$("form#form-addClient").submit(function (form) {
		form.preventDefault();
		$.ajax({
			method: 'POST',
			url: caminho + 'clientes/save/',
			data: {
				id: $(this).find('input[name=id]').val(),
				nome: $(this).find('input[name=nome]').val(),
				sobrenome: $(this).find('input[name=sobrenome]').val(),
				cpf: $(this).find('input[name=cpf]').val(),
				data_nasc: $(this).find('input[name=data_nasc]').val(),
				endereco: $(this).find('input[name=endereco]').val(),
				bairro: $(this).find('input[name=bairro]').val(),
				regiao: $(this).find('select[name=regiao]').val(),
				telefone: $(this).find('input[name=telefone]').val(),
				celular: $(this).find('input[name=celular]').val(),
				email: $(this).find('input[name=email]').val(),
				descricao: $(this).find('input[name=descricao]').val()
			},
			beforeSend: function () {
				$('#form-addClient #resultado').html('Enviando...');
			}
		}).done(function (data) {
			alert(data);
			if (data == 'cpf') {
				Swal.fire({
					title: 'Erro',
					text: 'Este CPF já está cadastrado.',
					type: 'error'
				}).then(function () {
					$('form#form-addClient').find('#cpf').focus();
				});
			} else if(data == 'error') {
				Swal.fire({
					title: 'Erro',
					text: 'Ocorreu algum erro no cadastro do cliente.',
					type: 'success'
				});
			} else {
				Swal.fire({
					title: 'Sucesso',
					text: 'Cliente cadastrado com sucesso!',
					type: 'success'
				}).then(function () {
					location.reload();
				});
			}
		}).fail(function (jqXHR, textStatus, msg) {
			Swal.fire(
				'ERRO',
				'Erro ao encaminhar os dados.\n' + jqXHR + '\n' + textStatus + '\n' + msg,
				'error'
			);
		});
	});

	$('form#form-clientComment').submit(function (form) {
		form.preventDefault();
		$.ajax({
			method: 'POST',
			url: caminho + '/clientes/save_desc',
			data: {
				id: $(this).find('input[name=id]').val(),
				descricao: $(this).find('textarea[name=descricao]').val()
			}
		}).done(function (data) {
			$(this).find('#resultado').html('');
			$(this).find('textarea[name=descricao]').val('');
			Swal.fire({
				title: 'Sucesso',
				text: 'Descrição cadastrada com sucesso!',
				type: 'success'
			});
			location.reload();
		}).fail(function (jqXHR, textStatus, msg) {
			Swal.fire({
				title: 'ERRO',
				text: 'Erro ao encaminhar os dados.\n' + jqXHR + '\n' + textStatus + '\n' + msg,
				type: 'error'
			});
		});
	});

	$('#btn-delete').click(function () {
		$('.carregando').show();
		$.ajax({
			method: 'post',
			url: caminho + 'clientes/delete/'
		}).done(function (data) {
			Swal.fire({
				title: 'CUIDADO',
				text: 'Tem certeza que deseja deletar?',
				type: 'warning'
			}).then(function () {
				var form = $('#form_delete');
				$('#form_delete input').remove();

				$('#clients_table input[name="delete_id[]"]:checked').each(function () {
					var value = $(this).val();
					var id = form.append("<input name='id[]' type='hidden' value='" + value + "'/>");
				});
			});
			$('.carregando').hide();
		});
	});

	$('.btn-delete').click(function () {
		$.ajax({
			method: 'post',
			url: caminho + 'clientes/delete/' + $(this).val()
		}).done(function (data) {
			Swal.fire({
				title: 'Sucesso',
				text: 'Cliente deletado com sucesso!',
				type: 'success'
			});
			$('#lista').html(data);
		}).fail(function (jqXHR, textStatus, msg) {
			Swal.fire({
				title: 'ERRO',
				text: 'Erro ao encaminhar os dados.\n' + jqXHR + '\n' + textStatus + '\n' + msg,
				type: 'error'
			});
		});
	});

	$('.btn-alter').click(function () {
		$.ajax({
			method: 'POST',
			url: caminho + 'clientes/show/' + $(this).val()
		}).done(function (data) {
			data = JSON.parse(data);
			$('#form-addClient').find('input[name=id]').val(data.id),
				$('#form-addClient').find('input[name=nome]').val(data.nome),
				$('#form-addClient').find('input[name=sobrenome]').val(data.sobrenome),
				$('#form-addClient').find('input[name=cpf]').val(data.cpf),
				$('#form-addClient').find('input[name=data_nasc]').val(data.data_nasc),
				$('#form-addClient').find('input[name=endereco]').val(data.endereco),
				$('#form-addClient').find('input[name=bairro]').val(data.bairro),
				$('#form-addClient').find('select[name=regiao]').val(data.regiao),
				$('#form-addClient').find('input[name=telefone]').val(data.telefone),
				$('#form-addClient').find('input[name=celular]').val(data.celular),
				$('#form-addClient').find('input[name=email]').val(data.email),
				$('#form-addClient').find('textarea[name=descricao]').html(data.descricao)
			$('#addClient').modal('show');
		}).fail(function (jqXHR, textStatus, msg) {
			Swal.fire(
				'ERRO',
				'Erro ao encaminhar os dados.\n' + jqXHR + '\n' + textStatus + '\n' + msg,
				'error'
			);
		});
	});

	// $('.btn-show').click(function() {
	// 	$.ajax({
	// 		method: 'get',
	// 		url: caminho + 'clientes/show/' + $(this).val(),
	// 		data: {id: $(this).val()}
	// 	}).done(function(data) {
	// 		data = JSON.parse(data);
	// 		$('#mais-informacoes').find('input[name=id]').val(data.id),
	// 		$('#mais-informacoes').find('input[name=nome]').val(data.nome + ' ' + data.sobrenome),
	// 		$('#mais-informacoes').find('input[name=cpf]').val(data.cpf),
	// 		$('#mais-informacoes').find('input[name=data_nasc]').val(data.data_nasc),
	// 		$('#mais-informacoes').find('input[name=endereco]').val(data.endereco),
	// 		$('#mais-informacoes').find('input[name=bairro]').val(data.bairro),
	// 		$('#mais-informacoes').find('select[name=regiao]').val(data.regiao),
	// 		$('#mais-informacoes').find('input[name=telefone]').val(data.telefone),
	// 		$('#mais-informacoes').find('input[name=celular]').val(data.celular),
	// 		$('#mais-informacoes').find('input[name=email]').val(data.email),
	// 		$('#mais-informacoes').find('textarea[name=descricao]').html(data.descricao)
	// 	}).fail(function(jqXHR, textStatus, msg) {
	// 		Swal.fire(
	// 			'ERRO',
	// 			'Erro ao encaminhar os dados.\n' + jqXHR + '\n' + textStatus + '\n' + msg,
	// 			'error'
	// 		  );
	// 	});
	// });

	$('.btn-show').click(function () {
		$.ajax({
			method: 'get',
			url: caminho + 'clientes/setAjax/'
		}).done(function (data) {
			$('#lista').html(data);
		}).fail(function (jqXHR, textStatus, msg) {
			Swal.fire(
				'ERRO',
				'Erro na transmissão de dados.',
				'error'
			);
		});
	});

	// $('#clients_table_filter').find('input[type=search]').on('keyup', function() {
	// 	$.ajax({
	// 		method: 'POST',
	// 		url: caminho + 'clientes/search',
	// 		data: {search: $(this).val()}
	// 	}).done(function(data) {
	// 		data = JSON.parse(data);
	// 		// alert(data)
	// 		for(i = 0; i <= data.length; i++) {
	// 			echo =	'<tr>';
	// 			echo +=		'<td>'+data.id+' <input type="checkbox" value="'+data.id+'"></td>';
	// 			echo +=		'<td>'+data.nome+' '+data.sobrenome+'</td>';
	// 			echo +=		'<td>'+data.cpf+'</td>';
	// 			echo +=		'<td>'+moment(data.data_nasc, "YYYY-MM-DD").format("DD-MM-YYYY")+'</td>';
	// 			echo +=		'<td>'+data.regiao+'</td>';
	// 			echo +=		'<td>'+data.celular+'</td>';
	// 			echo +=		'<td style="display: inline-flex;">';
	// 			echo +=			'<button title="Enviar e-mail" value="'+data.id+'" class="btn-sm btn-danger btn-fill btn-mail" style="margin-right: 4px"><i class="fas fa-envelope"></i></i></button>';
	// 			echo +=			'<button title="Mostrar mais informações" value="'+data.id+'" class="btn-sm btn-warning btn-fill btn-show" style="margin-right: 4px"><i class="fas fa-search"></i></i></button>';
	// 			echo +=			'<button title="Alterar informações" value="'+data.id+'" class="btn-sm btn-primary btn-fill btn-alter" style="margin-right: 4px"><i class="fas fa-user-edit"></i></button>';
	// 			echo +=			'<button title="Deletar '+data.nome+'" value="'+data.id+'" class="btn-sm btn-danger btn-fill btn-delete"><i class="fas fa-trash"></i></button>';
	// 			echo +=		'</td>';
	// 			echo +=	'</tr>';
	// 			$('tbody').unshift(data);
	// 		}
	// 	}).fail(function(jqXHR, textStatus, msg) {
	// 		Swal.fire(
	// 			'ERRO',
	// 			'Erro ao encaminhar os dados.\n' + jqXHR + '\n' + textStatus + '\n' + msg,
	// 			'error'
	// 		  );
	// 	});
	// });
});
