<?
namespace imclass\apps;

use imclass\entidades\internos\execucoes\IMExecucoes;

/**
 * Classe que irс trabalhar com as execuчѕes de uma aplicaчуo
 * faz a ligaчуo com o banco de dados
 */
class AppExecucoes { 

   /**
    * imclass\banco_dados\IMDoctrine
    */
   var $objIMDoctrine;

   /**
    * Registra o objeto de banco de dados
    * @param  imclass\banco_dados\IMDoctrine $objIMDoctrine [description]
    */
   public function registerDoctrine( \imclass\banco_dados\IMDoctrine $objIMDoctrine )
   {
      $this->objIMDoctrine = $objIMDoctrine;
   }

   public function getExecucoes( $ds_nome_classe, $ds_path_classe )
   {
      return array();
   }
}
?>