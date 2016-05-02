
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