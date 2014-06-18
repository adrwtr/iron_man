<?php
namespace imclass\banco_dados;

use Doctrine\ORM\EntityManager;

/**
 * Esta classe representa um objeto original do doctrine chamado entityManager.
 * Ao invez de executar os comandos do doctrine, iremos usar esta classe como uma camada
 */
class IMDoctrine {

   private $objEntityManager;

   /**
    * Seta o EntityManager do doctrine original
    * @param \Doctrine\ORM\EntityManager $obj [description]
    */
   public function setEntityManager( \Doctrine\ORM\EntityManager $obj )
   {
      $this->objEntityManager = $obj;
      return $this;
   }

   /**
    * Retorna o entity manager do doctrine
    * @return [type] [description]
    */
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

   /**
    * Remove uma entidade do banco de dados
    * @param  [mixed] $obj [description]
    * @return 
    */
   public function remove( $obj )
   {
      return $this->getEntityManager()
         ->remove( $obj );
   }

   public function getRepository( $nome_repositorio )
   {
      return $this->getEntityManager()
         ->getRepository( $nome_repositorio );
   }
}
