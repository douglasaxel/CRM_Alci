$(document).ready(function(){

	fill_dataTable();

	function fill_dataTable() {
		var clients_table = $('#clients_table').DataTable({
			processing: true,
			serverSide: true,
			ajax: {
				url: $('meta[name=base]').attr('content') + 'clientes/search',
				method: 'post',
				data: {search: search}
			},
			language: {
			"sEmptyTable": "Nenhum registro encontrado",
			"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
			"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
			"sInfoFiltered": "(Filtrados de _MAX_ registros)",
			"sInfoPostFix": "",
			"sInfoThousands": ".",
			"sLengthMenu": "_MENU_ resultados por página",
			"sLoadingRecords": "Carregando...",
			"sProcessing": "Processando...",
			"sZeroRecords": "Nenhum registro encontrado",
			"sSearch": "Pesquisar",
			"oPaginate": {
				"sNext": "Próximo",
				"sPrevious": "Anterior",
				"sFirst": "Primeiro",
				"sLast": "Último"
			},
			"oAria": {
				"sSortAscending": ": Ordenar colunas de forma ascendente",
				"sSortDescending": ": Ordenar colunas de forma descendente"
				}
			},
			buttons: {
				buttons: true,
				buttons: ['excel','pdf']
			},
			lengthMenu: [100,300,500]
		});

		clients_table.rows({selected: true}).data();
		clients_table.buttons().container().appendTo($('div.float-left'));

		$('#filter').click(function(){
			var search = $('#search').val();
			if(search != '') {
				$('#clients_table').DataTable().destroy();
				fill_datatable(search);
			} else {
				$('#clients_table').DataTable().destroy();
				fill_datatable();
			}
		});
	}
});



$('.phone').mask('(00) 00000-0000');
$('.cpf').mask('000.000.000-00');

var editor = new Jodit('#editor');