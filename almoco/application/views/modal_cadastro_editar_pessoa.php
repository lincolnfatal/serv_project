<?php
if (isset($_POST['id_perfil'])) {
    $perfil_temp = $_POST['id_perfil'];
    $checked = "";
} else {
    $checked = "checked='checked'";
    $perfil_temp = 0;
}

if (isset($_POST['modal_id_pessoa'])) {
    $id_pessoa = $_POST['modal_id_pessoa'];
} else {

    $id_pessoa = 0;
}

if (isset($_POST['controller'])) {
    $controller = 'pessoas/inserir';
} else {

    $controller = 'pessoas/inserir';
}




if (isset($_POST['nome'])) {
    $nome_temp = $_POST['nome'];
} else {

    $nome_temp = '';
}

if (isset($_POST['email'])) {
    $email_temp = $_POST['email'];
} else {
    $email_temp = '';
}

if (isset($_POST['senha'])) {
    $senha_temp = $_POST['senha'];
} else {

    $senha_temp = '';
}

if (isset($_POST['confirme'])) {
    $confirme_temp = $_POST['confirme'];
} else {

    $confirme_temp = '';
}



$array_perfil = array();
$array_perfil[0] = "Selecione o Perfil";
foreach ($dados['perfil'] as $perfil):
    $array_perfil[$perfil->id] = $perfil->perfil;

endforeach;
?>

<!-- Bootstrap modal -->
<div class="modal fade" id="myModal" role="dialog">





    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Cadastro Pessoa</h3>
            </div>
            <div class="modal-body form">
                <?php echo form_open($controller, 'id="form-pessoas"'); ?>


                <label for="nome">Nome:</label><br/>
                <input value="<?php echo $nome_temp; ?>" name="nome" id="modal_nome" type="text" class="form-control" placeholder="Nome" required autofocus name="nome">
                <div class="error"><?php echo form_error('nome'); ?></div>
                <label for="email">Email:</label><br/>
                <input value="<?php echo $email_temp; ?>" name="email" id="modal_email" type="email" class="form-control" placeholder="Email" required autofocus name="email">
                <div class="error"><?php echo form_error('email'); ?></div>
                <label for="email">Perfil:</label><br/>
                <?php
                echo form_dropdown('id_perfil', $array_perfil, $perfil_temp, 'class="form-control" id="id_perfil"');
                ?>
                <div class="error"><?php echo form_error('id_perfil'); ?></div>



                <label for="email">Senha:</label><br/>
                <input value="<?php echo $senha_temp; ?>" type="password" id="modal_senha" class="form-control" placeholder="Password" required name="senha">
                <div class="error"><?php echo form_error('senha'); ?></div>

                <label for="email">Confirmar Senha:</label><br/>
                <input value="<?php echo $confirme_temp; ?>" type="password" class="form-control" placeholder="Confirme a Senha" required name="confirme" id="modal_confirme">
                <div class="error"><?php echo form_error('confirme'); ?></div>




                <div class="modal-footer">
                    <input type="hidden" name="modal_id_pessoa" id="modal_id_pessoa" value="<?php echo $id_pessoa; ?>" />
                    <input type="submit" id="cadastrar" name="cadastrar" value="Cadastrar" class="btn btn-primary" />
                </div>
                <?php echo form_close(); ?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
