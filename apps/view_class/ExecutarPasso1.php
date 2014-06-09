<?
use imclass\apps\AppExecucoes;

/**
 * Classe para melhorar a codificação da view executar passo 1
 */
class ExecutarPasso1 {

   var $cd_execucao;
   var $ds_nome_classe;
   var $ds_path_classe;
   var $recuperar;

   // classe de execucao
   var $objiAppInterface;   

   // objeto doctrine 
   var $objIMDoctrine;

   // objeto de execucao que ja ocorreu
   var $objExecucaoRecuperada;

   public function __construct()
   {
      $this->objiAppInterface      = null;
      $this->objIMDoctrine         = null;
      $this->objExecucaoRecuperada = null;
   }

   /**
    * recupera os requests que serao utilizados
    * pela aplicacao
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
         $this->recuperarParametros();
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
      $objAppExecucoes->registerDoctrine( $this->objIMDoctrine );

      $arrObjExecucao = $objAppExecucoes->getExecucaoFromCodigo( 
         $this->cd_execucao 
      );

      $this->setExecucaoRecuperada( $arrObjExecucao );

   }

   /**
    * Seta os valores de uma execucao recuperada
    * @param [type] $arrObjExecucao [description]
    */
   public function setExecucaoRecuperada( $arrObjExecucao )
   {
      if ( $arrObjExecucao != null )
      {
         if ( $arrObjExecucao[0]->getCdExecucao() != '' )
         {
            $this->cd_execucao           = $arrObjExecucao[0]->getCdExecucao();
            $this->ds_nome_classe        = $arrObjExecucao[0]->getDsNomeClasse();
            $this->ds_path_classe        = $arrObjExecucao[0]->getDsPathClasse();   
            $this->objExecucaoRecuperada = $arrObjExecucao[0];            
         }
      }
   }

   /**
    * Registra o objeto de banco de dados
    * @param  imclass\banco_dados\IMDoctrine $objIMDoctrine [description]
    */
   public function registerDoctrine( \imclass\banco_dados\IMDoctrine $objIMDoctrine )
   {
      $this->objIMDoctrine = $objIMDoctrine;
   }


   /** 
    * Recupera as execucoes da mesma classe anteriores
    * @return  array
    */
   public function getExecucoesAnteriores()
   {
      $objAppExecucoes = new AppExecucoes();

      $objAppExecucoes->registerDoctrine( 
         $this->objIMDoctrine 
      );

      $arrObjExecucoes = $objAppExecucoes->getExecucoes(
         $this->ds_nome_classe,
         $this->ds_path_classe
      );

      return $arrObjExecucoes;
   }


   /**
    * Recupera os parametros de uma execucao
    * @return [type] [description]
    */
   private function recuperarParametros()
   {
      if ( $this->cd_execucao != '' )
      {  
         $arrInputs = $this->objiAppInterface
            ->getArrInputs();

         foreach ( $arrInputs as $input_id => $input_v ) 
         {            
            $nome_campo  = $input_v->getNome();
            $valor_campo = $this->recuperaParametroFromBase(
               $nome_campo
            );
            
            // seta o valor do campo
            $this->objiAppInterface
               ->setInputValor( $nome_campo, $valor_campo );
         }
      }
   }

   /**
    * Retorna o valor de um campo especificado
    * @param  [str] $nome_campo [description]
    * @return [str]             [description]
    */
   private function recuperaParametroFromBase( $nome_campo )
   {      
      foreach ( 
         $this->objExecucaoRecuperada
            ->getExecucoesParametros() as $key => $value
      ) 
      {
         if ( $value->getDsNome() == $nome_campo )
         {
            return $value->getDsValor();
         }
      }

      return null;
   }


}
?>