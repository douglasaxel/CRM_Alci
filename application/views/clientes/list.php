<div style="margin: 1rem;">
	<table id="clients_table" class="table table-responsive-sm table-bordered">
		<thead>
			<th>ID</th>
			<th>Nome</th>
			<th>CPF</th>
			<th>Data de Nascimento</th>
			<th>Região</th>
			<th>Celular</th>
			<th>Opções</th>
		</thead>
		<tbody>
			<?php foreach ($clients as $client) : ?>
				<tr>
					<td>
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="<?= $client['id']; ?>" name="delete_id[]">
							<label class="form-check-label" for="check-<?= $client['id']; ?>" style="color:black"><?= $client['id']; ?></label>
						</div>
					</td>
					<td><?= $client['nome'] . ' ' . $client['sobrenome']; ?></td>
					<td><?= $client['cpf']; ?></td>
					<td><?= date('d/m/Y', strtotime($client['data_nasc'])); ?></td>
					<td><?= $client['regiao']; ?></td>
					<td><?= $client['celular']; ?></td>
					<td>
						<button href="javascript:void(0);" title="Enviar email" name="email" value="<?= $client['id']; ?>" class="btn-sm btn-danger btn-fill">
							<i class="fas fa-envelope"></i>
						</button>
						<button href="javascript:void(0);" title="Visulizar" name="show" value="<?= $client['id']; ?>" class="btn-sm btn-warning btn-fill btn-show">
							<i class="fas fa-search"></i>
						</button>
						<button href="javascript:void(0);" title="Alterar informações" name="alter" value="<?= $client['id']; ?>" class="btn-sm btn-primary btn-fill btn-alter">
							<i class="fas fa-user-edit"></i>
						</button>
						<button href="javascript:void(0);" title="Deletar" name="delete" value="<?= $client['id']; ?>" class="btn-sm btn-danger btn-fill btn-delete">
							<i class="fas fa-trash"></i>
						</button>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
		<tfoot>
			<th>ID</th>
			<th>Nome</th>
			<th>CPF</th>
			<th>Data de Nascimento</th>
			<th>Região</th>
			<th>Celular</th>
			<th>Opções</th>
		</tfoot>
	</table>
	<form id="form_delete" method="post" action=""></form>
	<div class="pagination row">
		<div class="col-5">
			<p><span style="color:#13C5FF; font-weight: 700"><?= $total; ?></span> Clientes cadastrados.</p>
		</div>
		<div class="col-7 text-right pr-3">
			<?php echo $pagination; ?>
		</div>
	</div>
</div>