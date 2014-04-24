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

<div class="panel panel-default">

  <div class="panel-heading" width="80%">Resultado:</div>
      <div class="panel-body">
      <? echo $STRING_RESULTADO; ?>
      </div>
</div>

<BR/>
      <div class="panel panel-default">
         <div class="panel-heading" width="50%">Opções</div>
         <div class="panel-body">         
         <a class="btn btn-primary btn-lg" role="button" href="index.php">Voltar</a>
      </div>
      </div>

</body>
</html>