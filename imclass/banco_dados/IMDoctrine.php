<?
namespace imclass\banco_dados;

use Doctrine\ORM\EntityManager;

/**
 * Esta classe representa um objeto original do doctrine chamado entityManager.
 * Ao invez de executar os comandos do doctrine, iremos usar esta classe como uma camada
 */
class IMDoctrine {

   private $objEntityManager;

   public function setEntityManager( \Doctrine\ORM\EntityManager $obj )
   {
      $this->objEntityManager = $obj;
      return $this;
   }

   public function getEntityManager()
   {
      return $this->objEntityManager;
   }

   /**
    * Salva o objeto no banco de dados
    * @param  [Object]
    * @return 
    */
   public function persist( $obj )
   {
      return $this->getEntityManager()
         ->persist( $obj );
   }

   /**
    * Executa os comandos no banco de dados
    */
   public function flush()
   {
      return $this->getEntityManager()
         ->flush();
   }

   public function remove( $obj )
   {
      return $this->getEntityManager()
         ->remove( $obj );
   }
}
