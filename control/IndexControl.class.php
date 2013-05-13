<?
class IndexControl {

   private $objIMConexaoBancoDados;

   public function __construct()
   {
      $this->objIMConexaoBancoDados = null;
   }

   /**
    * Header location 
    * 
    * @param  [type] $url [description]
    * @return [type]      [description]
    */
   public function goto( $url )
   {
      header("Location: ". $url );
   }

   /**
    * Retorna a conexao com o banco official
    * 
    * @return [IMConexaoAtributos] [atributos]
    */
   public function getAtributosdeConexao()
   {
      require_once( C_PATH_CLASS . 'banco_dados/IMConexaoAtributos.class.php' );
      $objIMConexaoAtributos = new IMConexaoAtributos();

      $objIMConexaoAtributos->setNomeBanco("Iron Man");
      $objIMConexaoAtributos->setLogin("backup");
      $objIMConexaoAtributos->setSenha("UniSeguro");
      $objIMConexaoAtributos->setBanco("adriano");
      $objIMConexaoAtributos->setHost("localhost");
      $objIMConexaoAtributos->setPorta("");

      return $objIMConexaoAtributos;
   } 

   public function setConexao( $objConexao = null)
   {
      $this->objIMConexaoBancoDados = $objConexao;
   }

   public function getListaMemoriaTemporaria()
   {
      $q = "select * from im_memoria_temp order by id asc";   
      $arrMemoriaTemp = $this->objIMConexaoBancoDados->query( $q )->toIMResultado()->get();

      return $arrMemoriaTemp;
   }

   public function getListaPilhaDeExecucao()
   {
      $q = "select * from im_executa_temp order by nr_ordem asc";
      $arrExecucaoTemp = $this->objIMConexaoBancoDados->query( $q )->toIMResultado()->get();

      return $arrExecucaoTemp;
   }

   public function getListaExecucao()
   {
      $q = "select * from im_executa order by id asc";
      $arrExecutar = $this->objIMConexaoBancoDados->query( $q )->toIMResultado()->get();

      return $arrExecutar;
   }




}
?>