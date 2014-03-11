<?
class IMResultado {

   public $arr;

   public function __construct()
   {
      $this->set(array());
   }

   public function get()
   {
      return $this->arr;
   }

   public function set( $arr )
   {
      $this->arr = $arr;
   }

   /**
    * Retorna um array com todos os campos
    * @return [array] 
    */
   public function getArrayCampos()
   {
      $array = $this->get();

      if ( is_array( $array ) )
      {
         $array = $array[0];         
         return array_keys( $array );
      }
   }

   /**
    * Retorna todos os valores de um determinado campo
    * 
    * @param  [string] $campo [Nome campo]
    * @return [array]        
    */
   public function getValuesFromCampo( $teste_campo )
   {
      $arrResultado = $this->get();
      $valores      = array();

      if ( is_array( $arrResultado ) )
      {
         foreach ( $arrResultado as $resultado_id => $resultado_v ) 
         {
            foreach ( $resultado_v as $campo => $valor ) 
            {       
            
               if ( $campo == $teste_campo )
               {
                  $valores[] = $valor;
               }
            } 
         }
         
         return $valores;
      }
   }

   /**
    * Recupera uma linha do resultado
    * @param  [int] $cd_linha [description]
    * @return [array]           [description]
    */
   public function getLinha( $cd_linha )
   {
      $arrResultado = $this->get();

      if ( is_array( $arrResultado ) )
      {
         $indice = $cd_linha - 1;

         return $arrResultado[$indice];
      }
   }

   /**
    * Converte o resultado para insert into
    * @param  [bool] [completo] [indica se é para preencher completo]
    * @return [type] [description]
    */
   public function convertToInsert( $completo = false, $tabela="" )
   {
      $arrResultado = $this->get();
      $valores      = array();
      $sql_campos   = '';
      $sql_insert   = '';
      $sql_completo = '';

      if ( $completo == true )
      {
         $arrCampos  = $this->getArrayCampos();
         $sql_campos = implode( ",", $arrCampos );
      }

      if ( $tabela == '' )
      {
         $tabela = '$$tabela$$';
      }

      $sql_insert = "insert into $tabela $sql_campos values ( ";


      if ( is_array( $arrResultado ) )
      {
         foreach ( $arrResultado as $resultado_id => $resultado_v ) 
         {
            $sql_valores = implode( "','", $resultado_v ); 
            $sql_completo .= $sql_insert . $sql_valores . " );\n";
         }
      }  

      return $sql_completo;
   }

   /**
    * Compara o resultado com outro array
    * 
    * @param  [array]
    * @return [array] com as igualdades e diferenças
    */
   function comparar( $arrComparar )
   {
      $arrResultado     = $this->get();
      $arrIguais        = array();
      $arrDiferentes    = array();

      $iguais     = 0;
      $diferentes = 0;
      
      foreach ( $arrResultado as $resultado_id => $resultado_v ) 
      {
         if ( $arrComparar[ $resultado_id ] == $resultado_v )
         {
            $arrIguais[$iguais]['coluna'] = $resultado_id;
            $arrIguais[$iguais]['linha']  = $resultado_v;

            $iguais++;
         }
         else
         {
            $arrDiferentes[$diferentes]['coluna'] = $resultado_id;
            $arrDiferentes[$diferentes]['linha']  = $resultado_v;

            $diferentes++;
         }         
      }
      
      $arrComparacao['arrIguais']     = $arrIguais;
      $arrComparacao['arrDiferentes'] = $arrDiferentes;

      return $arrComparacao;
   }

}
?>