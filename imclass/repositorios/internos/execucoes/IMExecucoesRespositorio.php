<?php
namespace imclass\repositorios\internos\execucoes;

use Doctrine\ORM\EntityRepository;


/**
 * repositorios para a entidade IMExecucoes
 */
class IMExecucoesRespositorio extends EntityRepository
{

    const class_path = 'imclass\\entidades\\internos\\execucoes\\IMExecucoes';

    private $limite;

    /**
     * Seta o limite
     * @param integer $limite [description]
     */
    public function setLimite( $limite = 30 )
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
        if ($this->limite <= 0) {
            $this->setLimite( 30 );
        }

        return $this->limite;
    }

    /**
     * Recupera execucao
     * @param  [type] $ds_nome_classe
     * @param  [type] $ds_path_classe
     * @return [type]
     */
    public function getExecucaoFromCodigo( $cd_execucao )
    {
        $objQB = $this->getEntityManager()
           ->createQueryBuilder();

        $objQB->select( 'e' )
           ->from( self::class_path, 'e' )
           ->where( 'e.cd_execucao = :cd_execucao' )
           ->setMaxResults( 1 )
           ->setParameter( 'cd_execucao', $cd_execucao );

        $query = $objQB->getQuery();
        return $query->getResult();
    }

    /**
     * Retorna as execuções por ordem de execução
     * @param  integer $total quantas deve retornar?
     * @return array of IMExecucoes
     */
    public function getExecucoesRecentes( $ds_nome_classe, $ds_path_classe )
    {
        $objQB = $this->getEntityManager()
           ->createQueryBuilder();

        $objQB->select( 'e' )
           ->from( self::class_path, 'e' )
           ->where( 'e.ds_nome_classe = :ds_nome_classe and e.ds_path_classe = :ds_path_classe' )
           ->setMaxResults( $this->getLimite() )
           ->orderBy( 'e.cd_execucao', 'DESC' )
           ->setParameter( 'ds_nome_classe', $ds_nome_classe )
           ->setParameter( 'ds_path_classe', $ds_path_classe );

        //$query->setMaxResults($total);
        $query = $objQB->getQuery();

        // vl($objQB->getDQL());
        /*vl($query->getSQL());
        vl($query->getParameters() );*/

        return $query->getResult();
    }

    /**
     * Apagar uma execucao
     * @param  $ds_nome_classe
     * @param  $ds_path_classe
     */
    public function apagarExecucao( $ds_nome_classe, $ds_path_classe )
    {
        $objQB = $this->getEntityManager()
           ->createQueryBuilder();

        $objQB->delete( self::class_path, 'e' )
           ->where( 'e.ds_nome_classe = :ds_nome_classe and e.ds_path_classe = :ds_path_classe' )
           ->setParameter( 'ds_nome_classe', $ds_nome_classe )
           ->setParameter( 'ds_path_classe', $ds_path_classe );

        $query = $objQB->getQuery();
        return $query->getResult();
    }

}