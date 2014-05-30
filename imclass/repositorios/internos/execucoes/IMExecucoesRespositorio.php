<?php
namespace imclass\repositorios\internos\execucoes;

use Doctrine\ORM\EntityRepository;


/**
 * repositorios para a entidade IMExecucoes
 */
class IMExecucoesRespositorio extends EntityRepository
{

   private $limite;

   /**
    * Seta o limite
    * @param integer $limite [description]
    */
   public function setLimite( $limite=30 )
   {
      $this->limite = $limite;
      return $this;
   }

   /**
    * Retorna o limite
    * @return int
    */
   public function getLimite()
   {
      if ( $this->limite <= 0 )
      {
         $this->setLimite(30);
      }

      return $this->limite;
   }

   /**
    * Retorna as execuções por ordem de execução
    * @param  integer $total quantas deve retornar?
    * @return array of IMExecucoes
    */
   public function getExecucoesRecentes( $ds_nome_classe, $ds_path_classe )
   {
      $dql = "
      SELECT 
         e 
      FROM 
         imclass\\entidades\\internos\\execucoes\\IMExecucoes e
      ORDER BY 
         e.cd_execucao 
      DESC";

      /*$query = $this->getEntityManager()
         ->createQuery($dql);*/

      $objQB = $this->getEntityManager()
         ->createQueryBuilder();

      $objQB->select('e')
         ->from('imclass\\entidades\\internos\\execucoes\\IMExecucoes', 'e')
         ->where('e.ds_nome_classe = :ds_nome_classe and e.ds_path_classe = :ds_path_classe')
         ->setMaxResults( $this->getLimite() )
         ->setParameter('ds_nome_classe', $ds_nome_classe)
         ->setParameter('ds_path_classe', $ds_path_classe);

      //$query->setMaxResults($total);
      $query = $objQB->getQuery();

      // vl($objQB->getDQL());
      /*vl($query->getSQL());
      vl($query->getParameters() );*/

      return $query->getResult();
   }
}