<?php
require_once "../DAO/UsuariosDAO.php";
require_once "../Model/Usuarios.php";
require_once "../DAO/ProjetosDAO.php";
require_once "../DAO/TarefasDAO.php";
require_once "../Model/Tarefas.php";

$itens = TarefasDAO::listarTarefas(0, $proj,"");

?>
      
                   
            <div class="table-responsive border">
                
                <table class="table table-sm table-striped">
                    <thead class="bg-light"> <!-- cabeçalho da tabela -->
                        <th><?=$texto[$lang]['tblTask_col1'];?></th>
                        <th><?=$texto[$lang]['tblTask_col2'];?></th>
                        <th><?=$texto[$lang]['tblTask_col3'];?></th>
                        <th><?=$texto[$lang]['tblTask_col4'];?></th>                        
                    </thead> 
                    
                    <tbody>                        
                        <?php 
                        if($itens != null){
                        
                        for($i=0; $i<count($itens); $i++) {  ?>
                        
                        <tr>
                            <td>
                                <a href="DetalhesTarefaUI.php?proj=<?=$proj;?>&tar=<?=$itens[$i]->getCodigo();?>">
                                    <?=$itens[$i]->getNome();?>
                                </a>
                            </td>
                                                        
                            <td><?=ProjetosDAO::corrigirData($itens[$i]->getData());?></td>
                            
                                <?php
                                    $user = $itens[$i]->getEmailUsuario();
                                    $tmpUsuario = UsuariosDAO::consultarUsuario($user);
                                    $nome = $tmpUsuario->getNome();
                                ?>
                            <td><?=$nome;?></td>
                            <td>                                
                                <?php
                                    if($itens[$i]->getStatus() == 0)
                                        echo $texto[$lang]['text_tasknofinished'];
                                    else
                                        echo $texto[$lang]['text_taskfinished'];
                                ?>                                
                            </td>
                        </tr>
                        
                        <?php  } 
                        }
                        ?>
                        
                    </tbody>
                    
                </table>                
                
            </div>
            