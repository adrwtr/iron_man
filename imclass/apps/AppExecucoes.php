<?
namespace imclass\apps;

use imclass\entidades\internos\execucoes\IMExecucoes;
use imclass\repositorios\internos\execucoes\IMExecucoesRespositorio;

/**
 * Classe que ira trabalhar com as execucoes de uma aplicacao
 * faz a ligacao com o banco de dados
 */
class AppExecucoes { 

   /**
    * imclass\banco_dados\IMDoctrine
    */
   var $objIMDoctrine;

   /**
    * nome da entidade de execucao
    */
   const ENTIDADE = 'imclass\entidades\internos\execucoes\IMExecucoes';

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

   /**
    * Retorna todas as execuções de uma determinada classe
    * @return array of IMExecucoes
    */
   public function getExecucoes( $ds_nome_classe, $ds_path_classe )
   {
      $arrObjImExecucao = $this->getIMDoctrine()
         ->getRepository( self::ENTIDADE )
         ->getExecucoesRecentes( 
            $ds_nome_classe, 
            $ds_path_classe  
         );
      
      return $arrObjImExecucao;
   }

   /**
    * apaga todas as execuções de uma determinada classe
    */
   public function apagarExecucao( $ds_nome_classe, $ds_path_classe )
   {
      $this->getIMDoctrine()
         ->getRepository( self::ENTIDADE )
         ->apagarExecucao( 
            $ds_nome_classe, 
            $ds_path_classe  
         );
   }
}
?>