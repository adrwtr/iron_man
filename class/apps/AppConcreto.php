<?
require_once( C_PATH_CLASS . 'apps/IAppInterface.php' );

/**
 * Classe concreta base que implementa a base de uma interface
 */
class AppConcreto implements IAppInterface { 


   var $str_descricao;
   var $arrInputs;
   var $arrInputsValores;

   /**
    * Construtor
    */
   function __construct()
   {

   }

   /**
    * Seta a descriзгo da classe
    * @param string $str_descricao [description]
    */
   public function setDescricao( $str_descricao='' )
   {
      $this->str_descricao = $str_descricao;
   }  

   /**
    * Retorna a descriзгo da classe
    * @return [str]
    */
   public function getDescricao()
   {
      return $this->str_descricao;   
   }


   /**
    * seta o nome de um input
    * @param [str] $nome
    */
   public function setInput( $nome )
   {      
      $this->arrInputs[] = $nome;
   }

   /**
    * Retorna todos os inputs possнvels
    * @return [array] 
    */
   public function getArrInputs()
   {      
      return $this->arrInputs;
   }


   /**
    * Seta valor de um input
    * @param [str] $nome  [description]
    * @param [str] $valor [description]
    */
   public function setInputValor( $nome, $valor )
   {
      $this->arrInputsValores[$nome] = $valor;
   }

   /**
    * Recupera um valor de um input
    * @param  [type] $nome [description]
    * @return [type]       [description]
    */
   public function getInputValor( $nome )
   {
      return $this->arrInputsValores[ $nome ];
   }

   /**
    * Deve ser criado nas classes extendidas
    * @return [type] [description]
    */
   public function executar()
   {

   }
}
?>