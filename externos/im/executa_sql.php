<?
$testa_conexao = $_REQUEST['testa_conexao'];

$host          = $_REQUEST['host'];
$login         = $_REQUEST['login'];
$senha         = $_REQUEST['senha'];
$banco         = $_REQUEST['banco'];
$query         = $_REQUEST['query'];
$executar      = $_REQUEST['executar'];

if ( $testa_conexao == 1 )
{
   $conn = mysql_connect( $host, $login, $senha );
   
   if (!$conn) 
   {
      echo 'false';
      die(); 
   }

   echo 'true';
}

if ( $query != '' )
{
   $query = ajusta_q($query);

   $conn = mysql_connect( $host, $login, $senha );   
   mysql_select_db( $banco, $conn );

   $rs = mysql_query( $query, $conn );

   while( $row = mysql_fetch_assoc($rs) )
   {
      $arr[] = $row;
   }
 
   echo 'return ';
   echo var_export( $arr, true );
   echo ";";
   die();
}

if ( $executar != '' )
{
   $executar = ajusta_q($executar);

   $conn = mysql_connect( $host, $login, $senha );   
   mysql_select_db( $banco, $conn );
   $rs = mysql_query( $executar, $conn );
   echo mysql_affected_rows();
   die();
}

function ajusta_q( $s )
{
   $s = stripslashes($s);
   return $s;
}
?>