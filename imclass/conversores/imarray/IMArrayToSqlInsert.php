<?php
namespace imclass\conversores\imarray;

/**
 * Classe responsável por converter um array em um sql insert into
 */
class IMArrayToSqlInsert {
  
   /**
    * Converte o resultado para insert into
    * @param  nome da tabela
    * @param  valores
    * @param  campos
    * @return  string sql
    */
   public function convertToInsert( $tabela, $arrResultado )
   {      
      $valores      = array();
      $sql_campos   = '';
      $sql_insert   = '';
      $sql_completo = '';
      $sql_campos   = $this->getSQLCampos( $arrResultado );

      $sql_insert = "insert into $tabela $sql_campos values ( ";

      if ( is_array( $arrResultado ) )
      {
         //foreach ( $arrResultado as $resultado_id => $resultado_v ) 
         //{
            $sql_valores = implode( "','", $arrResultado ); 
            $sql_completo .= $sql_insert . $sql_valores . " );\n";
         //}
      }  

      return $sql_completo;
   }

   /**
    * Retorna a lista de campos em formato sql
    * @param  [arr] $arrCampos [description]
    * @return [str]            [description]
    */
   private function getSQLCampos( $arrCampos )
   {
      $arrCampos  = array_keys($arrCampos);
      $sql_campos = '';

      if ( is_array($arrCampos) == true )
      {         
         $sql_campos = implode( ",", $arrCampos );
      }

      return $sql_campos;
   }
}
?>