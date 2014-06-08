<?
use imclass\apps\AppExecucoes;

/**
 * Classe para melhorar a codificação da view executar passo 1
 */
class ExecutarPasso1 {

   var $cd_execucao;
   var $ds_nome_classe;
   var $ds_path_classe;

   // classe de execucao
   var $objiAppInterface;

   var $recuperar;

   /**
    * recupera os requests que serao utilizados
    */
   public function getRequests()
   {
      $this->cd_execucao    = $_REQUEST['cd_execucao'];
      $this->ds_nome_classe = $_REQUEST['ds_nome_classe'];
      $this->ds_path_classe = $_REQUEST['ds_path_classe'];
      $this->recuperar      = $_REQUEST['recuperar'];

      if ( $this->recuperar != '' )
      {
         $this->RecuperarExecucao();
      }
   }

   /**
    * Cria a classe que será usada na execução
    * faz isso para recuperar os parametros
    */
   public function createClass()
   {
      if ( $this->ds_path_classe != '')
      {
         require_once( C_PATH_RAIZ .  $this->ds_path_classe . '.php' );
         $this->objiAppInterface = new $this->ds_nome_classe;
         return true;
      }

      vl('Classe de execução não encontrada');
      die();
   }

   /**
    * Recupera os parametros de execucao
    */
   public function RecuperarExecucao()
   {
      $objAppExecucoes = new AppExecucoes();
      $objAppExecucoes->registerDoctrine( $objIMDoctrine );

      $arrObjExecucao = $objAppExecucoes->getExecucaoFromCodigo( 
         $this->cd_execucao 
      );

      $arrObjExecucoes = $objAppExecucoes->getExecucoes(
         $objExecutarPasso1->ds_nome_classe,
         $objExecutarPasso1->ds_path_classe
      );

   }

   /**
    * Registra o objeto de banco de dados
    * @param  imclass\banco_dados\IMDoctrine $objIMDoctrine [description]
    */
   public function registerDoctrine( \imclass\banco_dados\IMDoctrine $objIMDoctrine )
   {
      $this->objIMDoctrine = $objIMDoctrine;
   }


}
?>