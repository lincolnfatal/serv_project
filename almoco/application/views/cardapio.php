<!DOCTYPE html>



<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Cadárpios </h3>
        <?php if ($this->session->userdata("id_perfil") == 1) { ?>
            <h3 class="panel-title" align='center'> <a href="javascript:novoCadastroAlmoco()"  >Cadastrar Novo Cardápio</a> </h3>
        <?php } ?>
    </div><br />



    <div class="panel-body">

        <table class="table table-bordered table-hover span2">
            <tr>                               
                <th>Cardápio</th>  
                <?php if ($this->session->userdata("id_perfil") == 1) { ?>
                    <th>Ação</th>
                <?php } ?>
            </tr>

            <?php $dia_semana_anterior = "";
            foreach ($dados['cardapio'] as $cardapio):
                ?>
                <?php
                if ($cardapio->dia_semana != $dia_semana_anterior) {
                    $dia_semana_anterior = $cardapio->dia_semana;
                    ?>
                    <tr style='background: #CCC'>
                        <td colspan="2" align='center'><?= $cardapio->dia_semana; ?></td>                                                    

                    </tr>
    <?php } ?>
                <tr>

                    <td><?= $cardapio->cardapio ?></td>  
    <?php if ($this->session->userdata("id_perfil") == 1) { ?>
                        <td>
                            <a title="Deletar" href="<?php echo base_url() . 'index.php/almoco/deletar_cardapio/' . $cardapio->id; ?>" onclick="return confirm('Confirma a exclusão deste registro?')"><img src="<?php echo base_url(); ?>assets/img/lixo.png" /></a>
                            <span> - </span>
                            <a href="javascript:carregaDadosCardapioJSon('<?php echo $cardapio->id; ?>')"> Editar</a>
                        </td>
                <?php } ?>
                </tr>
<?php endforeach; ?>
        </table>
    </div>

</div>	

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
            
            var id_cardapio = "<?php echo $id_cardapio; ?>";

            $('#myModal').modal('show');
            if (id_cardapio > 0) {
                $("#form-pessoas").attr("action", base_url + "index.php/inserir_cardapio" + id_cardapio);
            } else {
                $("#form-pessoas").attr("action", base_url + "index.php/almoco/inserir_cardapio");
            }
        });
    </script>
<?php endif; ?>
  

