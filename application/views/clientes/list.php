<div class="row">
    <div class="col-md-12 col-lg-3 col-sm-12">
        <div id="mais-informacoes" class="card">
            <h4 class="text-center">Mais informações:</h4>
            <hr>
            <div class="form-group">
                <input class="form-control" type="text" name="nome" placeholder="Nome"readonly>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="cpf" placeholder="CPF"readonly>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="data_nasc" placeholder="Data de nascimento"readonly>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="endereco" placeholder="Endereço"readonly>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="bairro" placeholder="Bairro"readonly>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="telefone" placeholder="Telefone"readonly>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="celular" placeholder="Celular"readonly>
            </div>
            <div class="form-group">
                <input class="form-control" type="text" name="email" placeholder="E-mail"readonly>
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
                <form action="search" method="post">
                    <label for="search">Pesquisa: 
                    <input type="search" name="search" id="search">
                    </label>
                    <input type="submit" value="enviar">
                </form>
                    <!-- <button class="btn btn-fill btn-success btn-csv"><i class="fas fa-file-excel"></i> Exportar</button> -->
                    <!-- <button class="btn btn-fill btn-danger btn-pdf"><i class="fas fa-file-pdf"></i> Imprimir</button> -->
                </div>
                <div class="float-right">
                    <button data-toggle="modal" data-target="#addClient" class="btn btn-fill btn-info btn-add"><i class="far fa-plus-square"></i> Adicionar</button>
                </div>
            </div>
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
                        <form method="post" id="list_clients">
                            <?php foreach ($clientes as $c) : ?>
                                <tr>
                                    <td><?= $c['id'] ?> <input type="checkbox" value="<?=$c['id']; ?>"></td>
                                    <td><?= $c['nome'] . ' ' . $c['sobrenome']; ?></td>
                                    <td><?= $c['cpf']; ?></td>
                                    <td><?= date('d/m/Y', strtotime($c['data_nasc'])); ?></td>
                                    <td><?= $c['regiao']; ?></td>
                                    <td><?= $c['celular']; ?></td>
                                    <td style="display: inline-flex;">
                                        <button title="Enviar e-mail" value="<?=$c['id']; ?>" class="btn-sm btn-danger btn-fill btn-mail" style="margin-right: 4px"><i class="fas fa-envelope"></i></i></button>
                                        <button title="Mostrar mais informações" value="<?=$c['id']; ?>" class="btn-sm btn-warning btn-fill btn-show" style="margin-right: 4px"><i class="fas fa-search"></i></i></button>
                                        <button title="Alterar informações" value="<?=$c['id']; ?>" class="btn-sm btn-primary btn-fill btn-alter" style="margin-right: 4px"><i class="fas fa-user-edit"></i></button>
                                        <button title="Deletar <?= $c['nome']; ?>" value="<?=$c['id']; ?>" class="btn-sm btn-danger btn-fill btn-delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </form>
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
            </div>
        </div>
    </div>
</div>