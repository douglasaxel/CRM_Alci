<!doctype html>
<html lang="pt-br">

<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="<?= base_url(); ?>assets/img/logo.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="base" content="<?php echo base_url(); ?>">

	<title>Pastor Alci</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />


	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/datatables.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/summernote-bs4.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/jodit.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/sweetalert2.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">

</head>

<body>
	<nav id="nav-bar" class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
		<a id="brand" class="navbar-brand font-weight-bold" href=""><img src="<?= base_url(); ?>assets/img/logo.png" height="70px"> Pastor Alci</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?= site_url('clientes/index'); ?>"><i class="fas fa-users"></i> Clientes</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="<?= site_url('usuarios/index'); ?>"><i class="far fa-id-badge"></i> Usuários</a>
				</li>
			</ul>
			<ul class="navbar-nav active">
				<li class="nav-item">
					<a class="nav-link" href="<?= site_url('login/logout') ?>"><i class="fas fa-sign-out-alt"></i> Log out</a>
				</li>
			</ul>
		</div>
	</nav>

	<!--        final do top-->
	<!--        inicio do conteudo-->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-lg-3 col-sm-12">
				<div id="mais-informacoes" class="card">
					<h4 class="text-center">Mais informações:</h4>
					<hr>
					<div class="form-group">
						<input class="form-control" type="text" name="nome" placeholder="Nome" readonly>
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="cpf" placeholder="CPF" readonly>
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="data_nasc" placeholder="Data de nascimento" readonly>
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="endereco" placeholder="Endereço" readonly>
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="bairro" placeholder="Bairro" readonly>
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="telefone" placeholder="Telefone" readonly>
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="celular" placeholder="Celular" readonly>
					</div>
					<div class="form-group">
						<input class="form-control" type="text" name="email" placeholder="E-mail" readonly>
					</div>
					<form id="form-clientComment" action="" method="post">
						<input type="hidden" name="id">
						<div class="form-group">
							<textarea class="form-control" name="descricao" rows="6"></textarea>
						</div>
						<div class="form-group text-center">
							<button class="btn btn-info btn-fill btn-save-comment" type="submit">Salvar Comentário</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-12 col-lg-9 col-sm-12">
				<div class="card">
					<div class="card-body">
						<div class="float-left">
							<button class="btn btn-fill btn-success btn-csv"><i class="fas fa-file-excel"></i> Exportar</button>
							<button class="btn btn-fill btn-danger btn-pdf"><i class="fas fa-file-pdf"></i> Imprimir</button>
						</div>
						<div class="float-right">
							<button data-toggle="modal" data-target="#addClient" class="btn btn-fill btn-info btn-add"><i class="far fa-plus-square"></i> Adicionar</button>
						</div>
					</div>
					<hr>
					<div id="lista">
						<?= $list; ?>
					</div>
					<hr>
				</div>
			</div>
		</div>

		<div class="modal fade" tabindex="-1" role="dialog" id="addClient">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Cadastrar Cliente</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form method="POST" action="" id="form-addClient">
						<input type="hidden" name="site_url" value="<?php echo site_url(); ?>">
						<input type="hidden" name="id" value="">
						<div class="modal-body">

							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Nome</label>
									<input type="text" class="form-control" name="nome" placeholder="Nome" required>
								</div>
								<div class="form-group col-md-6">
									<label>Sobrenome</label>
									<input type="text" class="form-control" name="sobrenome" placeholder="Sobrenome" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>CPF</label>
									<input type="text" class="form-control" name="cpf" id="cpf" placeholder="CPF">
								</div>
								<div class="form-group col-md-6">
									<label>Data de nascimento</label>
									<input type="date" class="form-control" name="data_nasc" min="1900-01-01" max="<?php echo date('Y-m-d'); ?>" placeholder="Data de nascimento" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-5">
									<label>Endereço</label>
									<input type="text" class="form-control" name="endereco" placeholder="Avenida Assis Brasil, 0000">
								</div>
								<div class="form-group col-md-4">
									<label>Bairro</label>
									<input type="text" class="form-control" name="bairro" placeholder="Cristo Redentor">
								</div>
								<div class="form-group col-md-3">
									<label>Região</label>
									<select class="custom-select" name="regiao" id="regiao" required>
										<option value="">Selecione uma região</option>
										<option value="Zona Norte">Zona Norte</option>
										<option value="Zona Nordeste">Zona Nordeste</option>
										<option value="Zona Leste">Zona Leste</option>
										<option value="Região do Glória e do Cristal">Região do Glória e do Cristal</option>
										<option value="Zona Sul">Zona Sul</option>
										<option value="Região do Partenon">Região do Partenon</option>
										<option value="Zona Extremo Sul">Zona Extremo Sul</option>
										<!-- 'Zona Norte','Zona Nordeste','Zona Leste','Região do Glória e do Cristal','Zona Sul','Região do Partenon','Zona Extremo Sul' -->
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-3">
									<label>Telefone</label>
									<input type="text" class="form-control phone" name="telefone">
								</div>
								<div class="form-group col-md-3">
									<label>Celular</label>
									<input type="text" class="form-control phone" name="celular" required>
								</div>
								<div class="form-group col-md-6">
									<label>E-mail</label>
									<input type="email" class="form-control" name="email" placeholder="exemplo@gmail.com">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-12">
									<textarea class="form-control" name="descricao" id="descricao" rows="10"><?php if (!empty($cliente['descricao'])) echo $cliente['descricao']; ?></textarea>
								</div>
							</div>

						</div>
						<div class="modal-footer">
							<label id="resultado"></label>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary btn-addClient">Salvar Informações</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<footer class="footer">
		<p class="copyright pull-right">Sistema criado por Douglas Kjellin <script>
				document.write(new Date().getFullYear())
			</script>.</p>
	</footer>

</body>


<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jquery-mask.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/datatables.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/summernote-bs4.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/jodit.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/custom.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/moment.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
<script type="text/javascript" src="<?= base_url(); ?>assets/ajax/clientes.js"></script>

</html>