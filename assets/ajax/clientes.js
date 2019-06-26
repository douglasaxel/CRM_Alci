$(document).ready(function() {
	//before upload to server, alter this to "document.location.origin + '/'"
	var caminho = $('input[name=site_url]').val(); 


	$("form#form-addClient").submit(function(form) {
		form.preventDefault();
		$.ajax({
			method: 'POST',
			url: caminho + 'clientes/save',
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
			beforeSend: function() {
				$('#form-addClient#resultado').html('Enviando...');
			}
		}).done(function(data) {
			Swal.fire({
				title: 'Sucesso',
				text: 'Cliente cadastrado com sucesso!',
				type: 'success',
				onAfterClose: location.reload()
			});
		}).fail(function(jqXHR, textStatus, msg) {
			Swal.fire(
				'ERRO',
				'Erro ao encaminhar os dados.\n' + jqXHR + '\n' + textStatus + '\n' + msg,
				'error'
			  );
		});
	});

	$('form#form-clientComment').submit(function(form) {
		form.preventDefault();
		$.ajax({
			method: 'POST',
			url: caminho +  '/clientes/save_desc',
			data: {
				id: $(this).find('input[name=id]').val(),
				descricao: $(this).find('textarea[name=descricao]').val()
			}
		}).done(function(data) {
			$(this).find('#resultado').html('');
			$(this).find('textarea[name=descricao]').val('');
			Swal.fire({
				title: 'Sucesso',
				text: 'Descrição cadastrada com sucesso!',
				type: 'success'
			});
			location.reload();
		}).fail(function(jqXHR, textStatus, msg) {
			Swal.fire({
				title: 'ERRO',
				text: 'Erro ao encaminhar os dados.\n' + jqXHR + '\n' + textStatus + '\n' + msg,
				type: 'error'
			});
		});
	});

	$('.btn-delete').click(function() {
		$.ajax({
			method: 'post',
			url: caminho + 'clientes/delete/' + $(this).val()
		}).done(function(data) {
			Swal.fire({
				title: 'Sucesso',
				text: 'Cliente deletado com sucesso!',
				type: 'success',
				onAfterClose: location.reload()
			});
		}).fail(function(jqXHR, textStatus, msg) {
			Swal.fire({
				title: 'ERRO',
				text: 'Erro ao encaminhar os dados.\n' + jqXHR + '\n' + textStatus + '\n' + msg,
				type: 'error'
			});
		});
	});

	$('.btn-alter').click(function() {
		$.ajax({
			method: 'POST',
			url: caminho + 'clientes/show/' + $(this).val()
		}).done(function(data) {
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
		}).fail(function(jqXHR, textStatus, msg) {
			Swal.fire(
				'ERRO',
				'Erro ao encaminhar os dados.\n' + jqXHR + '\n' + textStatus + '\n' + msg,
				'error'
			  );
		});
	});

	$('.btn-show').click(function() {
		$.ajax({
			method: 'POST',
			url: caminho + 'clientes/show/' + $(this).val()
		}).done(function(data) {
			data = JSON.parse(data);
			$('#mais-informacoes').find('input[name=id]').val(data.id),
			$('#mais-informacoes').find('input[name=nome]').val(data.nome + ' ' + data.sobrenome),
			$('#mais-informacoes').find('input[name=cpf]').val(data.cpf),
			$('#mais-informacoes').find('input[name=data_nasc]').val(data.data_nasc),
			$('#mais-informacoes').find('input[name=endereco]').val(data.endereco),
			$('#mais-informacoes').find('input[name=bairro]').val(data.bairro),
			$('#mais-informacoes').find('select[name=regiao]').val(data.regiao),
			$('#mais-informacoes').find('input[name=telefone]').val(data.telefone),
			$('#mais-informacoes').find('input[name=celular]').val(data.celular),
			$('#mais-informacoes').find('input[name=email]').val(data.email),
			$('#mais-informacoes').find('textarea[name=descricao]').html(data.descricao)
		}).fail(function(jqXHR, textStatus, msg) {
			Swal.fire(
				'ERRO',
				'Erro ao encaminhar os dados.\n' + jqXHR + '\n' + textStatus + '\n' + msg,
				'error'
			  );
		});
	});
});
