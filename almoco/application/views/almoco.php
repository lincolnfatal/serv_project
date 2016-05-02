<!DOCTYPE html>

        
        
            <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Meu Almoço da Semana</h3>
                        <h3 class="panel-title" align='center'> <a href="javascript:novoCadastroAlmoco()"  >Novo Almoço</a> </h3>

                      </div>
                      <div class="panel-body">
                        <table class="table">
                            <tr>
                                    <th>Cardápio</th>
                                    <th>Opçoes</th>
                                    <th>Perfil</th>
                                    <th>Ação</th>
                            </tr>
                             <?php foreach ($dados['almoco'] as $almoco): ?>
                                            <tr>
                                                    <td><?= $almoco->cardapio; ?></td>
                                                    <td><?= $almoco->opcoes; ?></td>
                                                    <td><?= $almoco->opcoes;;?></td>


                                                    <td>
                                                        <a title="Deletar" href="<?php echo base_url() . 'almoco/deletar/' . $almoco->id; ?>" onclick="return confirm('Confirma a exclusão deste registro?')"><img src="<?php echo base_url(); ?>assets/img/lixo.png" /></a>
                                                        <span> - </span>
                                                        <a title="Editar" href="<?php echo base_url() . 'almoco/editar/' . $almoco->id; ?>"><?php echo $almoco->dia_semana; ?></a>
                                                    </td>
                                            </tr>
                                    <?php endforeach; ?>
                        </table>
                      </div>
                    </div>	
   

