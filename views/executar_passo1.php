<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>IronMan 6.0</title>

<!-- Bootstrap -->
<link href="<? echo C_PATH_BOOT; ?>css/bootstrap.min.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="<? echo C_PATH_BOOT; ?>js/bootstrap.min.js"></script>
<script src="<? echo C_PATH_EXTERNOS; ?>bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<? echo C_PATH_ANGULAR; ?>"></script>
<script src="<? echo C_PATH_VIEW; ?>/js/executar_passo1.js"></script>

<div class="panel panel-default">

  <div class="panel-heading" width="80%">Veja os detalhes da app</div>
  <div class="panel-body">


      <form name="form1" id="form1" action="executar_passo2.php">

      <div class="alert alert-info"><? echo $descricao; ?></div>

      <?
      if ( is_array($arrInputs) )
      {
         foreach( $arrInputs as $id => $objiInput ) 
         {

            // o campo tem valor?
            if ( 
                $objiAppInterface->getObjAppInputs()
                    ->hasInputValor( 
                        $objiInput->getNome() 
                    )  
            )
            {
               $objiInput->setValor(
                  $objiAppInterface
                    ->getObjAppInputs()
                    ->getInputValor(
                     $objiInput->getNome()
                  )
               );
            }
            echo $objiInput->getComponente();
         }   
      }
      ?>

      

      <input type="hidden" name="class_nome" value="<? echo $objExecutarPasso1->ds_nome_classe; ?>" />
      <input type="hidden" name="class_path" value="<? echo $objExecutarPasso1->ds_path_classe; ?>" />


      </form>

      </div>
</div>

<BR/>
      <div class="panel panel-default">
         <div class="panel-heading" width="50%">Opções</div>
         <div class="panel-body">
         <a class="btn btn-primary btn-lg" role="button" onClick="$('#form1').submit();">Enviar</a>
         <a class="btn btn-primary btn-lg" role="button" href="index.php">Voltar</a>
      </div>
      </div>

<BR/>
   
   <div ng-app="angular_app_execucoes">
      <div ng-controller="angular_app_controller">
         <div ng-init="arrExecucoes = [
                     <?
                     foreach ( $arrObjExecucoes as $id => $objIMExecucoes) 
                     {
                        // recupera os parametros da execucao
                        $arrParametros    = $objIMExecucoes->getExecucoesParametros();                         
                        $total_parametros = ( count($arrParametros) > $total_parametros ? count($arrParametros) : $total_parametros );
                        $arrInterno       = null;

                        foreach ( $arrParametros as $parametro_id => $parametro_v ) 
                        {
                           $ds_nome      = $parametro_v->getDsNome();
                           $ds_valor     = $parametro_v->getDsValor();
                           $arrInterno[] = "{ ds_nome : '". $ds_nome ."', ds_valor : '". $ds_valor ."' }";
                        }


                        $cd_execucao      = $objIMExecucoes->getCdExecucao();
                        $ds_nome_classe   = $objIMExecucoes->getDsNomeClasse();                        
                        

                        echo "{ cd_execucao : '". $cd_execucao."', ";
                        echo " ds_nome_classe : '" . $ds_nome_classe ."', ";

                        if ($arrInterno!=null)
                        {
                            echo " arrParametros : [". implode( ',', $arrInterno ) ." ] },";
                        }
                     }
                     echo "{}\n\n";
                     
                     ?>]">
            <table border="1" class="table">
               
               <tr>
                  <td>
                     Execução Realizada   
                  </td>

                  <td colspan="<? echo $total_parametros; ?>">
                     Parametros Utilizados
                  </td>
               </tr>

               <tr ng-repeat="execucoes in arrExecucoes">
                  <td >                  
                     <a href="executar_passo1.php?recuperar=1&cd_execucao={{execucoes.cd_execucao}}">      
                     {{execucoes.cd_execucao}} - {{execucoes.ds_nome_classe}}
                     </a>
                  </td>

                  <td ng-repeat="parametros in execucoes.arrParametros">                                       
                     {{parametros.ds_nome}}: {{parametros.ds_valor}}                     
                  </td>
                  
               </tr> 

            </table>    
         </div>
      </div>  
   </div>

</body>
</html>