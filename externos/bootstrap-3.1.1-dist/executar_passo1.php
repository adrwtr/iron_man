<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>IronMan 6.0</title>

<!-- Bootstrap -->
<link href="<? echo C_PATH_BOOT; ?>css/bootstrap.min.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<? echo C_PATH_BOOT; ?>js/bootstrap.min.js"></script>

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
      echo $objiInput->getComponente();
   }   
}
?>

<BR/>
<div class="panel panel-default">
  <div class="panel-heading" width="50%">Opções</div>
  <div class="panel-body">
  <a class="btn btn-primary btn-lg" role="button" onClick="$('#form1').submit();">Enviar</a>
  <a class="btn btn-primary btn-lg" role="button" href="index.php">Voltar</a>
</div>
</div>

<input type="hidden" name="class_nome" value="<? echo $nome; ?>" />
<input type="hidden" name="class_path" value="<? echo $path; ?>" />


</form>

</div>
</div>

</body>
</html>