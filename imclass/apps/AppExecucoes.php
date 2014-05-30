<?
namespace imclass\apps;

use imclass\entidades\internos\execucoes\IMExecucoes;
use imclass\repositorios\internos\execucoes\IMExecucoesRespositorio;

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

   /**
    * Retorna o bojeto de banco de dados
    * @return imclass\banco_dados\IMDoctrine
    */
   public function getIMDoctrine()
   {
      return $this->objIMDoctrine;
   }



   public function getExecucoes( $ds_nome_classe, $ds_path_classe )
   {
      $arrObjImExecucao = $this->getIMDoctrine()
         ->getRepository('imclass\entidades\internos\execucoes\IMExecucoes')
         ->getExecucoesRecentes( 
            $ds_nome_classe, 
            $ds_path_classe  
         );
      
      return $arrObjImExecucao;
   }
}
?>