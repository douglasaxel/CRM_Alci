<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?php if (!empty(htmlspecialchars($usuario['nome']))) echo 'Alterar informações de ' . htmlspecialchars($usuario['nome']);
                                    else echo 'Adicionar novo usuário.'; ?></h4>
            <?php echo validation_errors(); ?>
        </div>
        <div class="card-body">
            <form class="was-validated" action="<?= site_url('clientes/save'); ?>" method="post">
                <input type="hidden" name="id" value="<?php if (!empty(htmlspecialchars($usuario['id']))) echo htmlspecialchars($usuario['id']); ?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nome</label>
                        <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php if (!empty(htmlspecialchars($usuario['nome']))) echo htmlspecialchars($usuario['nome']); ?>" required>
                        <div class="invalid-feedback">
                            Por favor preencha este campo.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Sobrenome</label>
                        <input type="text" class="form-control" name="sobrenome" placeholder="Sobrenome" value="<?php if (!empty(htmlspecialchars($usuario['sobrenome']))) echo htmlspecialchars($usuario['sobrenome']); ?>" required>
                        <div class="invalid-feedback">
                            Por favor preencha este campo.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label>Login</label>
                        <input type="text" class="form-control" name="login" placeholder="Login" value="<?php if (!empty(htmlspecialchars($usuario['login']))) echo htmlspecialchars($usuario['login']); ?>" required>
                        <div class="invalid-feedback">
                            Por favor preencha este campo.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Senha</label>
                        <input type="password" class="form-control" name="senha" placeholder="Senha" value="<?php if (!empty(htmlspecialchars($usuario['senha']))) echo htmlspecialchars($usuario['senha']); ?>" required>
                        <div class="invalid-feedback">
                            Por favor preencha este campo.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label>E-mail</label>
                        <input type="email" class="form-control" name="email" placeholder="exemplo@gmail.com" value="<?php if (!empty(htmlspecialchars($usuario['email']))) echo htmlspecialchars($usuario['email']); ?>" required>
                        <div class="invalid-feedback">
                            Por favor preencha este campo.
                        </div>
                    </div>
                </div>
                <div class="pull-right">
                    <input type="reset" class="btn btn-danger btn-fill" value="Limpar">
                    <input type="submit" class="btn btn-success btn-fill" value="Salvar">
                    <a href="<?= site_url('usuarios/index'); ?>" class="btn btn-warning btn-fill">Voltar</a>
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
</script>