<?
namespace imclass\banco_dados;

/**
 * Esta classe representa atributos de conexão com banco de dados
 * Os atributos são primitivos.
 */
class IMConexaoAtributos {

   public $nome_banco;
   public $login;
   public $senha;
   public $banco;
   public $host;
   public $porta;

   public function __construct()
   {
      $this->setNomeBanco("");
      $this->setLogin("");
      $this->setSenha("");
      $this->setBanco("");
      $this->setHost("");
      $this->setPorta("");
   }

   public function getPDOMysqlString()
   {
      $dsn = 'mysql:host=' . $this->getHost() .';dbname=' . $this->getBanco() . ';';

      return $dsn;
   }

   public function setNomeBanco( $valor )
   {
      $this->nome_banco = $valor;
   }
   
   public function setLogin( $valor )
   {
      $this->login = $valor;
   }   

   public function setSenha( $valor )
   {
      $this->senha = $valor;
   }

   public function setBanco( $valor )
   {
      $this->banco = $valor;
   }

   public function setHost( $valor )
   {
      $this->host = $valor;
   }

   public function setPorta( $valor )
   {
      $this->porta = $valor;
   }

   public function getNomeBanco()
   {
      return $this->nome_banco;
   }
   
   public function getLogin()
   {
      return $this->login;
   }   

   public function getSenha()
   {
      return $this->senha;
   }

   public function getBanco()
   {
      return $this->banco;
   }

   public function getHost()
   {
      return $this->host;
   }

   public function getPorta()
   {
      return $this->porta;
   }
}
?>