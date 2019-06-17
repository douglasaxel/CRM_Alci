<!doctype html>
<html lang="pt-br">

<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/jpeg" href="<?= base_url(); ?>assets/img/logo.jpeg">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>Pastor Alci</title>

		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />


		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?=base_url();?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?=base_url();?>assets/css/datatables.min.css">
		<link rel="stylesheet" href="<?=base_url();?>assets/css/summernote-bs4.css">
		<link rel="stylesheet" href="<?=base_url();?>assets/css/jodit.min.css">
		<link rel="stylesheet" href="<?=base_url();?>assets/css/style.css">

</head>

<body>
		<nav id="nav-bar" class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
				<a id="brand" class="navbar-brand font-weight-bold" href=""><img src="<?= base_url(); ?>assets/img/logo.jpeg" height="70px"> Pastor Alci</a>
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

				<hr>
				<?= $contents; ?>
				<hr>

		</div>

		<!--        final do conteudo-->

		<!--        inicio do bottom-->

		<footer class="footer">
			<p class="copyright pull-right">&copy; <script>document.write(new Date().getFullYear())</script> Douglas Kjellin.</p>
		</footer>

		<div class="modal fade" tabindex="-1" role="dialog" id="addClient">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Cadastrar Cliente</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
							<form method="POST" action="" id="form-addClient">
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
													<input type="text" class="form-control cpf" name="cpf" id="cpf" placeholder="CPF">
											</div>
											<div class="form-group col-md-6">
													<label>Data de nascimento</label>
													<input type="date" class="form-control" name="data_nasc" placeholder="Data de nascimento">
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
													<input type="text" class="form-control phone" name="telefone" >
											</div>
											<div class="form-group col-md-3">
													<label>Celular</label>
													<input type="text" class="form-control phone" name="celular"  required >
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
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-primary btn-addClient">Salvar Informações</button>
							</div>
								</form>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
</body>


<script type="text/javascript" src="<?=base_url();?>assets/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/jquery-mask.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/datatables.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/summernote-bs4.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/jodit.min.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/js/custom.js"></script>
<script type="text/javascript" src="<?=base_url();?>assets/ajax/clientes.js"></script>
<?php echo linkJs(); ?>

</html>