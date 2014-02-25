<?php
/**
 * Created by JetBrains PhpStorm.
 * User: ADRIANO
 * Date: 24/10/13
 * Time: 08:50
 * To change this template use File | Settings | File Templates.
 */
class IMSqlParserInsert {

   private $str_insert = 'INSERT INTO';
   private $str_value = 'VALUES';
   private $str_sql_original = '';

   public $str_table_name = '';
   public $has_campos = false;
   public $arrCampos;
   public $arrValores;

   function __construct()
   {

   }

   function getStrInsert()
   {
      return $this->str_insert;
   }

   function getStrSqlOriginal()
   {
      return $this->str_sql_original;
   }

   function setStrSqlOriginal( $valor )
   {
      $this->str_sql_original = $valor;
   }

   function getStrValue()
   {
      return $this->str_value;
   }

   function getStrTableName()
   {
      return $this->str_table_name;
   }

   function setStrTableName( $str )
   {
      $this->str_table_name = $str;
   }

   function getHasCampos()
   {
      return $this->has_campos;
   }

   function setHasCampos( $valor )
   {
      $this->has_campos = $valor;
   }

   function getArrCampos()
   {
      return $this->arrCampos;
   }

   function  setArrCampos( $arr )
   {
      foreach($arr as $id=>$v)
      {
         $arr[$id] = trim($v);
      }

      $this->arrCampos = $arr;
   }

   function getArrValores()
   {
      return $this->arrValores;
   }

   function setArrValores( $arr )
   {
      foreach($arr as $id=>$v)
      {
         $arr[$id] = trim($v);
      }

      $this->arrValores = $arr;
   }


   function parse( $sql )
   {
      $this->setStrSqlOriginal( $sql );

      $sql = trim( $sql );
      $sql = strtoupper( $sql );
      $sql = preg_replace( '/\s(?=\s)/', '', $sql );

      $existe_insert = $this->detectar( $this->getStrInsert(), $sql );

      if ( $existe_insert === false )
      {
         return false;
      }
      else
      {
         $pos_insert = $existe_insert;
         $fim_insert = $this->detectar( ';', substr($sql, $pos_insert, strlen($sql)) );

         if ( $fim_insert != false )
         {
            $sql = substr( $sql, $pos_insert, $fim_insert );
         }

         // recupera a tabela
         $str_tabela = $this->getTabela($sql);
         $this->setStrTableName($str_tabela);

         // recupera os campos se tiver
         $this->getCampos( $sql );

         // recupera os valores
         $this->getValores($sql);
      }
   }

   /**
    * Detecta uma palavra
    * @param $sql
    * @return bool
    */
   private function detectar( $valor, $aonde )
   {
      $pos = strpos( $aonde, $valor );

      if ( $pos === false )
      {
         return false;
      }
      else
      {
         return $pos;
      }
   }

   /**
    * Retorna o nome da tabela
    *
    * @param $sql
    * @return string
    */
   private function getTabela( $sql )
   {
      $pos_insert = $this->detectar( $this->getStrInsert(), $sql );
      $pos_value  = $this->detectar( $this->getStrValue(), $sql );

      $total  = strlen( $sql );
      $faltou = substr( $sql, $pos_value, strlen($sql));

      $total  = $total - strlen($faltou) - strlen($this->getStrInsert());

      $tabela = substr( $sql, $pos_insert+strlen($this->getStrInsert()), $total );

      $tabela = trim( $tabela );
      $pos_parenteses = $this->detectar( '(', $tabela );

      if ( $pos_parenteses === false )
      {
         // indica que não tem campos
         $this->setHasCampos( false );
         return $tabela;
      }
      else
      {
         // indica que tem campos
         $this->setHasCampos( true );

         $tabela = trim( substr( $tabela, 0, $pos_parenteses ) );
         return $tabela;
      }
   }

   /**
    * Retorna os campos
    *
    * @param $sql
    * @return bool
    */
   private function getCampos( $sql )
   {
      if ( $this->getHasCampos() == false )
      {
         return false;
      }
      else
      {
         $pos_insert = $this->detectar( $this->getStrInsert(), $sql );
         $pos_value  = $this->detectar( $this->getStrValue(), $sql );

         $total  = strlen( $sql );
         $faltou = substr( $sql, $pos_value, strlen($sql));

         $total  = $total - strlen($faltou) - strlen($this->getStrInsert());

         $campos = substr( $sql, $pos_insert+strlen($this->getStrInsert()), $total );
         $campos = trim( $campos );

         $pos_parenteses_ini = $this->detectar( '(', $campos );
         $pos_parenteses_fim = $this->detectar( ')', $campos );

         $final  = substr( $campos, $pos_parenteses_fim, strlen($campos) );
         $campos = substr( $campos, $pos_parenteses_ini, strlen($campos)-strlen($final) );

         $campos = str_replace( '(', '', $campos );
         $campos = str_replace( ')', '', $campos );

         $arrCampos = explode( ",", $campos );
         $this->setArrCampos( $arrCampos );

         return $this->getArrCampos();
      }
   }

   /**
    * Retorna os valores
    *
    * @param $sql
    * @return string
    */
   private function getValores( $sql )
   {
      $pos_value = $this->detectar( $this->getStrValue(), $sql );
      $str_valores = substr( $sql,  $pos_value+strlen($this->getStrValue()), strlen($sql) );
      $str_valores = trim( $str_valores );

      $str_valores = str_replace( '(', '', $str_valores );
      $str_valores = str_replace( ')', '', $str_valores );

      $arrValores = explode( ",", $str_valores );
      $this->setArrValores( $arrValores );

      return $this->getArrValores();
   }

   /**
    * Retorna o array dos campos com o array dos valores
    */
   public function mergeArray()
   {
      $arrRetornar = array();

      if ( $this->getHasCampos() == false )
      {
         $arrRetornar = $this->getArrValores();
      }
      else
      {

         $arrCampos   = $this->getArrCampos();
         foreach( $this->getArrValores() as $id => $v )
         {
            $arrRetornar[ $arrCampos[$id] ] = $v;
         }
      }

      return $arrRetornar;
   }

}
?>