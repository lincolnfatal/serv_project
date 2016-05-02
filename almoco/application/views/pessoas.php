<!DOCTYPE html>



<div class="container">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Meus Usuários Cadastrados </h3>
            <h3 class="panel-title" align='center'> <a href="javascript:novoCadastroPessoa()"  >Cadastrar novo Usuário</a> </h3>

        </div>
        <div class="panel-body">
            <table class="table">
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Perfil</th>
                    <th>Ação</th>
                </tr>
                <?php foreach ($dados['pessoas'] as $pessoa): ?>
                    <tr>
                        <td><?php echo $pessoa->nome; ?></td>
                        <td><?php echo $pessoa->email; ?></td>
                        <td><?php echo $pessoa->perfil; ?></td>

                        <td>
                            <a title="Deletar" href="<?php echo base_url() . 'index.php/pessoas/deletar/' . $pessoa->id; ?>" onclick="return confirm('Confirma a exclusão deste registro?')"><img src="<?php echo base_url(); ?>assets/img/lixo.png" /></a>
                            <span> - </span>
                            <a href="javascript:carregaDadosPessoaJSon('<?php echo $pessoa->email; ?>')"  >Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>		

</div><!-- /.container -->

<?php
if (isset($_POST['modal_id_pessoa'])) {
    $id_pessoa = $_POST['modal_id_pessoa'];
} else {

    $id_pessoa = 0;
}
if (isset($_POST['cadastrar'])) :
    ?>
    <script type="text/javascript">
        $(document).ready(function ()
        {
            var id_pessoa = "<?php echo $id_pessoa; ?>";

            $('#myModal').modal('show');
            if (id_pessoa > 0) {
                $("#form-pessoas").attr("action", base_url + "index.php/pessoas/editar/" + id_pessoa);
            } else {
                $("#form-pessoas").attr("action", base_url + "index.php/pessoas/inserir");
            }
        });
    </script>
<?php endif; ?>
  
