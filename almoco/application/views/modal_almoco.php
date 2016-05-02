<?php


$cont = 0;
if(isset($_POST['cardapio'])){    
 $cardapio_temp =  $_POST['cardapio'];
 $checked = "";
}else{   
	$checked = "checked='checked'";
    $cardapio_temp = 0;
}

//ve os dias que já foram escolhidos na semana
$dias_semana_ja_escolhido = array();
foreach ($dados['almoco'] as $almoco): 
   $dias_semana_ja_escolhido[] =  $almoco->dia_semana;
 $cont++;
endforeach;


/*print_r($dados);
exit();*/

$array_cardapio =  array();
$array_cardapio[0] = "Selecione o Cardápio";
 foreach ($dados['cardapio'] as $cardapio): 
   $array_cardapio[$cardapio->id ] = $cardapio->cardapio; 
   
 endforeach;
 if (isset($_POST['controller'])) {
    $controller = 'almoco/inserir';
} else {

    $controller = 'almoco/inserir';
}
 ?>

<!-- Bootstrap modal -->
<div class="modal fade" id="myModal" role="dialog">





    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Cadastro do Almoço</h3>
            </div>
            <div class="modal-body form">
                <?php echo form_open($controller, 'id="form-pessoas"'); ?>

                <div>
                    <label for="nome">Cardápio:</label>
                    <?php     
                    echo form_dropdown('cardapio', $array_cardapio, $cardapio_temp,'class="form-control"');
                    ?>
                    <div class="error"><?php echo form_error('cardapio'); ?></div>
                </div>
            </div>
                 <div class="modal-body form" id='dia_semana_cardapio'>
                
                    <label id='dia_semana' >Dia:</label>
                    <?php 
                            if (!in_array("Segunda", $dias_semana_ja_escolhido)) { ?>
                                Segunda:<input type="checkbox" name="dia_semana[]" value="Segunda" <?php echo set_checkbox('dia_semana[]', 'Segunda'); ?> />
                            <?php }
                            if (!in_array("Terça", $dias_semana_ja_escolhido)) { ?>
                            Terça:<input type="checkbox" name="dia_semana[]" value="Terça" <?php echo set_checkbox('dia_semana[]', 'Terça'); ?> />
                            <?php }
                            if (!in_array("Quarta", $dias_semana_ja_escolhido)) { ?>
                                Quarta:<input type="checkbox" name="dia_semana[]" value="Quarta" <?php echo set_checkbox('dia_semana[]', 'Quarta'); ?> />
                            <?php }
                            if (!in_array("Quinta", $dias_semana_ja_escolhido)) { ?>
                                Quinta:<input type="checkbox" name="dia_semana[]" value="Quinta" <?php echo set_checkbox('dia_semana[]', 'Quinta'); ?> />
                            <?php }
                            if (!in_array("Sexta", $dias_semana_ja_escolhido)) { ?>
                                Sexta:<input type="checkbox" name="dia_semana[]" value="Sexta" <?php echo set_checkbox('dia_semana[]', 'Sexta'); ?> />
                           <?php }?>
                    <div class="error"><?php echo form_error('dia_semana'); ?></div>
                </div>
                <div class="modal-body form">
                    <label for="nome">Opções:</label>

                    <?php
                        foreach ($dados['opcoes'] as $opcoes): 
                            echo '<span >'.$opcoes->opcao.':<input '.$checked.'  type="checkbox" name="opcao[]" value="'.$opcoes->opcao.'" '.set_checkbox('opcao[]', $opcoes->opcao).' /></span> ';

                        endforeach;
                    ?>                  
                </div>

                <div class="modal-footer">
                    
                    <input type="submit" id="cadastrar" name="cadastrar" value="Cadastrar" class="btn btn-primary" />
                </div>
                <?php echo form_close(); ?>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
