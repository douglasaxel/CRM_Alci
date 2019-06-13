<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?php if (!empty(htmlspecialchars($cliente['nome']))) echo 'Alterar informações de ' . htmlspecialchars($cliente['nome']);
                                    else echo 'Adicionar novo Cliente.'; ?></h4>
            <?php echo validation_errors(); ?>
        </div>
        <div class="card-body">
            <form class="was-validated" action="<?= site_url('clientes/save'); ?>" method="post">
                <input type="hidden" name="id" value="<?php if (!empty(htmlspecialchars($cliente['id']))) echo htmlspecialchars($cliente['id']); ?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php if (!empty(htmlspecialchars($cliente['nome']))) echo htmlspecialchars($cliente['nome']); ?>" required>
                        <div class="invalid-feedback">
                            Por favor preencha este campo.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Sobrenome</label>
                        <input type="text" class="form-control" name="sobrenome" placeholder="Sobrenome" value="<?php if (!empty(htmlspecialchars($cliente['sobrenome']))) echo htmlspecialchars($cliente['sobrenome']); ?>" required>
                        <div class="invalid-feedback">
                            Por favor preencha este campo.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>CPF</label>
                        <input type="text" class="form-control cpf" name="cpf" id="cpf" placeholder="CPF" value="<?php if (!empty(htmlspecialchars($cliente['cpf']))) echo htmlspecialchars($cliente['cpf']); ?>" required>
                        <div class="invalid-feedback">
                            Por favor preencha este campo.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Data de nascimento</label>
                        <input type="date" class="form-control" name="data_nasc" placeholder="Data de nascimento" value="<?php if (!empty(htmlspecialchars($cliente['data_nasc']))) echo htmlspecialchars($cliente['data_nasc']); ?>" required>
                        <div class="invalid-feedback">
                            Por favor preencha este campo.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label>Endereço</label>
                        <input type="text" class="form-control" name="endereco" placeholder="Avenida Assis Brasil, 0000" value="<?php if (!empty(htmlspecialchars($cliente['endereco']))) echo htmlspecialchars($cliente['endereco']); ?>" required>
                        <div class="invalid-feedback">
                            Por favor preencha este campo.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Bairro</label>
                        <input type="text" class="form-control" name="bairro" placeholder="Cristo Redentor" value="<?php if (!empty(htmlspecialchars($cliente['bairro']))) echo htmlspecialchars($cliente['bairro']); ?>" required>
                        <div class="invalid-feedback">
                            Por favor preencha este campo.
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Região</label>
                        <select class="custom-select" name="regiao" id="regiao" required>
                            <option value="">Selecione uma região</option>
                            <option <?php if ($cliente['regiao'] === 'Zona Norte') echo 'selected'; ?> value="Zona Norte">Zona Norte</option>
                            <option <?php if ($cliente['regiao'] === 'Zona Nordeste') echo 'selected'; ?> value="Zona Nordeste">Zona Nordeste</option>
                            <option <?php if ($cliente['regiao'] === 'Zona Leste') echo 'selected'; ?> value="Zona Leste">Zona Leste</option>
                            <option <?php if ($cliente['regiao'] === 'Região do Glória e do Cristal') echo 'selected'; ?> value="Região do Glória e do Cristal">Região do Glória e do Cristal</option>
                            <option <?php if ($cliente['regiao'] === 'Zona Sul') echo 'selected'; ?> value="Zona Sul">Zona Sul</option>
                            <option <?php if ($cliente['regiao'] === 'Região do Partenon') echo 'selected'; ?> value="Região do Partenon">Região do Partenon</option>
                            <option <?php if ($cliente['regiao'] === 'Zona Extremo Sul') echo 'selected'; ?> value="Zona Extremo Sul">Zona Extremo Sul</option>
                            <!-- 'Zona Norte','Zona Nordeste','Zona Leste','Região do Glória e do Cristal','Zona Sul','Região do Partenon','Zona Extremo Sul' -->
                        </select>
                        <div class="invalid-feedback">
                            Por favor selecione uma opção.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label>Telefone</label>
                        <input type="text" class="form-control" name="telefone" value="<?php if (!empty(htmlspecialchars($cliente['telefone']))) echo htmlspecialchars($cliente['telefone']); ?>">
                        <div class="invalid-feedback">
                            Por favor preencha este campo.
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Celular</label>
                        <input type="text" class="form-control" name="celular" value="<?php if (!empty(htmlspecialchars($cliente['celular']))) echo htmlspecialchars($cliente['celular']); ?>" required data-mask="(00) 0000-0000">
                        <div class="invalid-feedback">
                            Por favor preencha este campo.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>E-mail</label>
                        <input type="email" class="form-control" name="email" placeholder="exemplo@gmail.com" value="<?php if (!empty(htmlspecialchars($cliente['email']))) echo htmlspecialchars($cliente['email']); ?>" required>
                        <div class="invalid-feedback">
                            Por favor preencha este campo.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <textarea class="form-control" name="descricao" id="descricao" rows="10"><?php if (!empty($cliente['descricao'])) echo $cliente['descricao']; ?></textarea>
                    </div>
                </div>
                <div class="pull-right">
                    <input type="reset" class="btn btn-danger btn-fill" value="Limpar">
                    <input type="submit" class="btn btn-success btn-fill" value="Salvar">
                    <a href="<?= site_url('clientes/index'); ?>" class="btn btn-warning btn-fill">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();

    $(document).ready(function() {
        $('.phone').mask('(00) 00000-0000');
        $('.cpf').mask('000.000.000-00');
    });
</script>