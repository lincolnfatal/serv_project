<!-- Bootstrap modal -->
<div class="modal fade" id="myModalMsg" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Cadastro Cardápio</h3>
            </div>
            <div class="modal-body form" id="msg_id">


                <?php echo form_open('deletar_cardapio', 'id="form-msg"'); ?>
                <div id='dia'>
                    
                </div>

                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-default">Cancelar</button>
                    <input type="submit" id="cadastrar" name="cadastrar" value="Confirma a exclusão" class="btn btn-primary" />
                </div>
                <?php echo form_close(); ?>



            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>