<?= $this->include('header_view', array('titulo' => $titulo )); ?>

<div id="content" class="container">
	<h3>Lista de Usuários</h3>
	<hr>
	<table class="table">
        <tr>
            <td>#</td>
            <td>Nome</td>
            <td>E-mail</td>
            <td>Categoria</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>

        <?php foreach ($usuarios as $usuario) : ?>
            <tr>
                <td><?= $usuario->id ?></td>
                <td><?= $usuario->nomeUsuario ?></td>
                <td><?= $usuario->emailUsuario ?></td>
                <td><?= $usuario->nomeCategoria ?></td>
                <td>
                    <a class="btn btn-info " href="<?= base_url("usuario/editar/$usuario->id") ?>">
                        Editar
                    </a>
                </td>
                <td>
                    <!-- Botão para acionar modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalExclui" id="btnModal" onclick="modalExclui(<?= $usuario->id ?>)">
                      Excluir
                  </button>
            </td>
        </tr>
    <?php endforeach ?>

</table>
</div>



<!-- Modal -->
<div class="modal fade" id="modalExclui" tabindex="-1" role="dialog" aria-labelledby="excluiModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="excluiModalLabel">Confirmação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Você tem certeza que deseja excluir esse usuário?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <a class="btn btn-danger" id="btnExcluiModal" href="#">
                    Excluir
                </a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function modalExclui(id){
        $('#btnExcluiModal').attr('href', "<?= base_url('usuario/excluir/') ?>" + "/" + id)
    }
</script>

<?= $this->include('footer_view'); ?>