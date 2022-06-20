<?= $this->include('header_view', array('titulo' => $titulo)); ?>

<div id="content" class="container mt-4 mb-5">
    <?php if (session()->has('usuario')) : ?>
        <h3>Lista de Usuários</h3>

        <br>

        <table class="table table-hover">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Categoria</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario) : ?>
                    <tr>
                        <td><?= $usuario->id ?></td>
                        <td><?= $usuario->nomeUsuario ?></td>
                        <td><?= $usuario->emailUsuario ?></td>
                        <td><?= $usuario->nomeCategoria ?></td>
                        <td>
                            <a class="btn btn-dark" href="<?= base_url("usuario/editar/$usuario->id") ?>">
                                Editar
                            </a>
                            <!-- Botão para acionar modal -->
                            <button type="button" class="btn btn-danger" id="btnModal" onclick="modalExclui(<?= $usuario->id ?>)">
                                Excluir
                            </button>
                        </td>
                    </tr>
            </tbody>
        <?php endforeach ?>
        </table>

        <div class="alert mt-5" id="alert" role="alert" style="display: none;">
            <center><span id="msgAlert"></span></center>
        </div>
    <?php else : ?>
        <?php base_url('/autenticacao'); ?>
    <?php endif; ?>
</div>

<!-- Modal -->
<div class="modal fade" id="modalExclui" tabindex="-1" aria-labelledby="excluiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="excluiModalLabel">Confirmação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Você tem certeza que deseja excluir esse usuário?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button class="btn btn-danger" id="btnExcluiModal" link="#">Excluir</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function modalExclui(id) {
        $('#btnExcluiModal').attr('link', "<?= base_url('usuario/excluir/') ?>" + "/" + id);
        $('#modalExclui').modal('show');
    }

    $('#btnExcluiModal').on('click', function() {
        $.ajax({
            type: 'POST',
            url: $('#btnExcluiModal').attr('link'),
            data: null,
            cache: false,
            processData: false,
            success: function() {
                $('#modalExclui').modal('hide');
                $('#msgAlert').html('Usuário excluído com sucesso!');
                $('#alert').addClass('alert-warning');
                $('#alert').fadeIn(1000);
                $('#alert').fadeOut(2000);
                setTimeout(location.reload.bind(location), 2500);
            }
        })
    })
</script>

<?= $this->include('footer_view'); ?>