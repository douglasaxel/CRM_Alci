<div class="row">
    <div class="col-md-12 col-lg-3 col-sm-12">
        <div class="card">
            <h4 class="text-center">Mais informações:</h4>
            <hr>
            <form>
                <div class="form-group">
                    <input class="form-control" name="nome" type="text" placeholder="Nome" value="<?php if (!empty(htmlspecialchars($show['nome']))) echo htmlspecialchars($show['nome']); ?>" readonly>
                </div>
                <div class="form-group">
                    <input class="form-control" name="sobrenome" type="text" placeholder="Sobrenome" value="<?php if (!empty(htmlspecialchars($show['sobrenome']))) echo htmlspecialchars($show['sobrenome']); ?>" readonly>
                </div>
                <div class="form-group">
                    <input class="form-control" name="login" type="text" placeholder="Login" value="<?php if (!empty(htmlspecialchars($show['login']))) echo htmlspecialchars($show['login']); ?>" readonly>
                </div>
                <div class="form-group">
                    <input class="form-control" name="email" type="text" placeholder="E-mail" value="<?php if (!empty(htmlspecialchars($show['email']))) echo htmlspecialchars($show['email']); ?>" readonly>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-12 col-lg-9 col-sm-12">
        <div class="card">
            <div class="card-body">
                <!-- <div class="row"> -->
                <div style="float:left">
                    <button class="btn btn-fill btn-success"><i class="fas fa-file-excel"></i> Exportar</button>
                    <button class="btn btn-fill btn-danger"><i class="fas fa-file-pdf"></i> Imprimir</button>
                </div>
                <a href="<?= site_url('usuarios/index'); ?>" class="btn btn-fill btn-success" style="margin-left:1rem;" title="Recarregar a tabela"><i class="fas fa-sync-alt"></i></a>
                <div style="float:right">
                    <form action="<?= site_url('usuarios/search'); ?>" method="post" class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" name="search" type="text" placeholder="Pesquisar" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                    </form>
                </div>
                <!-- </div> -->
            </div>
            <table class="table table-responsive-sm">
                <thead>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Login</th>
                    <th>E-mail</th>
                    <th>Opções</th>
                </thead>
                <tbody>
                    <?php foreach ($usuarios as $u) : ?>
                        <tr>
                            <td><?= htmlspecialchars($u['nome']); ?></td>
                            <td><?= htmlspecialchars($u['sobrenome']); ?></td>
                            <td><?= htmlspecialchars($u['login']); ?></td>
                            <td><?= htmlspecialchars($u['email']); ?></td>
                            <td style="display: inline-flex;">
                                <a title="Enviar e-mail" href="<?= site_url('email/index/' . $u['id'] . '/usuarios'); ?>" class="btn-sm btn-danger btn-fill" style="margin-right: 4px"><i class="fas fa-envelope"></i></i></a>
                                <a title="Mostrar mais informações" href="<?= site_url('usuarios/show/' . $u['id']); ?>" class="btn-sm btn-warning btn-fill" style="margin-right: 4px"><i class="fas fa-search"></i></i></a>
                                <a title="Alterar informações" href="<?= site_url('usuarios/edit/' . $u['id']); ?>" class="btn-sm btn-primary btn-fill" style="margin-right: 4px"><i class="fas fa-user-edit"></i></a>
                                <a title="Deletar <?= $u['nome']; ?>" href="<?= site_url('usuarios/delete/' . $u['id']); ?>" class="btn-sm btn-danger btn-fill"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>