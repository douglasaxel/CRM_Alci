<div class="container">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title"><?php if (!empty(htmlspecialchars($person['nome']))) echo 'Enviar e-mail para ' . htmlspecialchars($person['nome']);
                                    else echo 'Selecione alguém na lista para encaminhar um e-mail!!!!!'; ?></h4>
            <?php echo validation_errors(); ?>
        </div>
        <div class="card-body">
            <form action="<?= site_url('email/send'); ?>" method="post">
                <input type="hidden" name="id" value="<?php if (!empty(htmlspecialchars($person['id']))) echo htmlspecialchars($person['id']); ?>">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label>Para:</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" value="<?php if (!empty(htmlspecialchars($person['email']))) echo htmlspecialchars($person['email']); ?>" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Assunto:</label>
                        <input type="text" class="form-control" name="assunto" placeholder="Assunto" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Mensagem:</label>
                        <textarea id="editor" name="mensagem" rows="10"></textarea>
                    </div>
                </div>
                <div class="pull-right">
                    <input type="submit" class="btn btn-success btn-fill" value="Enviar">
                    <a href="<?= site_url('clientes/index'); ?>" class="btn btn-warning btn-fill">Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>