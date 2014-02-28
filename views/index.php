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
<script src="<? echo C_PATH_ANGULAR; ?>"></script>
<script src="<? echo C_PATH_VIEW; ?>/js/index.js"></script>


<div class="panel panel-default">

  <div class="panel-heading" width="80%">Procure pela app na lista abaixo</div>
  <div class="panel-body">


      <div ng-app="angular_projetos_procurar">
            <div class="input-group">
               <span class="input-group-addon">AppName</span>
               <input type="text" class="form-control" placeholder="AppName" ng-model="angular_search">
            </div>
      

            <div ng-controller="angular_projetos_controller">
               
               <div ng-init="Apps = [
                  <?
                  foreach ( $arrApps as $id => $objAppDescricao) 
                  {
                     $nome = $objAppDescricao->getClass();
                     $path = $objAppDescricao->getPath() . $nome;

                     echo "{ nome : '" . $nome ."', path : '". $path ."' },";
                  }
                  echo "{}";
                  ?>]">

                  <ul class="nav nav-pills" ng-repeat="appa in Apps | filter:angular_search | orderBy:'nome'" >
                     <li>
                        <a href="executar_passo1.php?nome={{appa.nome}}&path={{appa.path}}">      
                        {{appa.nome}}
                        </a>
                     </li>

                  </ul>
               </div>
            </div>
      </div>

   </div>
</div>

</body>
</html>