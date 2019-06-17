<div class="row">
    <div class="col-md-12 col-lg-3 col-sm-12">
        <div id="mais-informacoes" class="card">
            <h4 class="text-center">Mais informações:</h4>
            <hr>
            <div class="form-group">
                <input class="form-control" type="text" name="nome" placeholder="Nome" value="<?php if (!empty(htmlspecialchars($show['nome']) and htmlspecialchars($show['sobrenome']))) echo htmlspecialchars($show['nome']) . ' ' . htmlspecialchars($show['sobrenome']); ?>" readonly>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="cpf" placeholder="CPF" value="<?php if (!empty(htmlspecialchars($show['cpf']))) echo htmlspecialchars($show['cpf']); ?>" readonly>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="data_nasc" placeholder="Data de nascimento" value="<?php if (!empty(htmlspecialchars($show['data_nasc']))) echo htmlspecialchars($show['data_nasc']); ?>" readonly>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="endereco" placeholder="Endereço" value="<?php if (!empty(htmlspecialchars($show['endereco']))) echo htmlspecialchars($show['endereco']); ?>" readonly>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="bairro" placeholder="Bairro" value="<?php if (!empty(htmlspecialchars($show['bairro']))) echo htmlspecialchars($show['bairro']); ?>" readonly>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="telefone" placeholder="Telefone" value="<?php if (!empty(htmlspecialchars($show['telefone']))) echo htmlspecialchars($show['telefone']); ?>" readonly>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="celular" placeholder="Celular" value="<?php if (!empty(htmlspecialchars($show['celular']))) echo htmlspecialchars($show['celular']); ?>" readonly>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="E-mail" value="<?php if (!empty(htmlspecialchars($show['email']))) echo htmlspecialchars($show['email']); ?>" readonly>
            </div>
            <form id="form-clientComment" action="" method="post">
                <input type="hidden" name="id" value="<?php if (!empty($show['id'])) echo $show['id']; ?>">
                <div class="form-group">
                    <textarea class="form-control" name="descricao" <?php if (empty($show['id'])) echo 'readonly'; ?>><?php if (!empty(htmlspecialchars($show['descricao']))) echo htmlspecialchars($show['descricao']); ?></textarea>
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
                    <button class="btn btn-fill btn-success"><i class="fas fa-file-excel"></i> Exportar</button>
                    <button class="btn btn-fill btn-danger"><i class="fas fa-file-pdf"></i> Imprimir</button>
                </div>
                <div class="float-right">
                    <button data-toggle="modal" data-target="#addClient" class="btn btn-fill btn-info btn-add"><i class="far fa-plus-square"></i> Adicionar</button>
                </div>
            </div>
            <div style="margin: 1rem;">
                <table id="clients_table" class="table table-responsive-sm table-bordered">
                    <thead>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Data de Nascimento</th>
                        <th>Região</th>
                        <th>Celular</th>
                        <th>Opções</th>
                    </thead>
                    <tbody>
                        <?php foreach ($clientes as $c) : ?>
                            <tr>
                                <td><?= $c['nome'] . ' ' . $c['sobrenome']; ?></td>
                                <td><?= $c['cpf']; ?></td>
                                <td><?= date('d/m/Y', strtotime($c['data_nasc'])); ?></td>
                                <td><?= $c['regiao']; ?></td>
                                <td><?= $c['celular']; ?></td>
                                <td style="display: inline-flex;">
                                    <a title="Enviar e-mail" href="<?= site_url('email/index/' . $c['id'] . '/clientes'); ?>" class="btn-sm btn-danger btn-fill" style="margin-right: 4px"><i class="fas fa-envelope"></i></i></a>
                                    <a title="Mostrar mais informações" href="<?= site_url('clientes/show/' . $c['id']); ?>" class="btn-sm btn-warning btn-fill" style="margin-right: 4px"><i class="fas fa-search"></i></i></a>
                                    <a title="Alterar informações" href="<?= site_url('clientes/edit/' . $c['id']); ?>" class="btn-sm btn-primary btn-fill" style="margin-right: 4px"><i class="fas fa-user-edit"></i></a>
                                    <a title="Deletar <?= $c['nome']; ?>" href="<?= site_url('clientes/delete/' . $c['id']); ?>" class="btn-sm btn-danger btn-fill"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Data de Nascimento</th>
                        <th>Região</th>
                        <th>Celular</th>
                        <th>Opções</th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>