<?
use imclass\apps\AppExecucoes;

use imclass\apps\inputs\InputSelectList;

/**
 * Classe para melhorar a codificação da view executar passo 1
 */
class ExecutarPasso1
{

    var $cd_execucao;
    var $ds_nome_classe;
    var $ds_path_classe;
    var $recuperar;
    var $linkada;
    var $cd_execucao_anterior;
    var $ds_nome_campo;


    // classe de execucao
    var $objiAppInterface;
    var $objiAppInterfaceLinkado;

    // objeto doctrine
    var $objIMDoctrine;

    // objeto de execucao que ja ocorreu
    var $objIMExecucaoRecuperada;
    var $objIMExecucaoLinkada;

    public function __construct()
    {
        $this->objiAppInterface        = null;
        $this->objiAppInterfaceLinkado = null;
        $this->objIMDoctrine           = null;
        $this->objIMExecucaoRecuperada = null;
        $this->objIMExecucaoLinkada    = null;
        $this->linkada                 = 0;
        $this->cd_execucao_anterior    = null;
        $this->ds_nome_campo           = null;
    }

    /**
     * recupera os requests que serao utilizados
     * pela aplicacao
     */
    public function getRequests()
    {
        // execução normal
        $this->ds_nome_classe = $_REQUEST[ 'ds_nome_classe' ];
        $this->ds_path_classe = $_REQUEST[ 'ds_path_classe' ];

        // recuperação de execução da mesma classe
        $this->cd_execucao = $_REQUEST[ 'cd_execucao' ];
        $this->recuperar   = $_REQUEST[ 'recuperar' ];

        if ($this->recuperar != '') {
            $this->recuperarExecucaoFromLista();
            $this->recuperar = true;
        }

        // recuperação de execução linkada
        $this->linkada              = $_REQUEST[ 'linkada' ];
        $this->cd_execucao_anterior = $_REQUEST[ 'cd_execucao_anterior' ];
        $this->ds_nome_campo        = $_REQUEST[ 'ds_nome_campo' ];
    }

    /**
     * Cria a classe que será usada na execução
     * faz isso para recuperar os parametros
     */
    public function createClass()
    {
        if ($this->ds_path_classe != '') {
            require_once(C_PATH_RAIZ . $this->ds_path_classe . '.php');
            $this->objiAppInterface = new $this->ds_nome_classe;

            // recupera os parametros
            $this->recuperarParametros(
                $this->recuperar,
                $this->objiAppInterface,
                $this->objIMExecucaoRecuperada
            );
            return true;
        }

        vl('Classe de execução não encontrada');
        die();
    }

    /**
     * Recupera uma execução da própria classe
     * @param  [type] $cd_execucao [description]
     * @return [type]              [description]
     */
    public function recuperarExecucaoFromLista()
    {
        $arrObjExecucao = $this->recuperarExecucao(
            $this->cd_execucao
        );

        $this->setExecucaoRecuperada($arrObjExecucao);
    }

    /**
     * Recupera os parametros de execucao
     */
    public function recuperarExecucao($cd_execucao)
    {
        $objAppExecucoes = new AppExecucoes();
        $objAppExecucoes->registerDoctrine($this->objIMDoctrine);

        $arrObjExecucao = $objAppExecucoes->getExecucaoFromCodigo(
            $cd_execucao
        );

        return $arrObjExecucao;
    }

    /**
     * Seta os valores de uma execucao recuperada
     * @param [type] $arrObjExecucao [description]
     */
    public function setExecucaoRecuperada($arrObjExecucao)
    {
        if ($arrObjExecucao != null) {
            if ($arrObjExecucao[ 0 ]->getCdExecucao() != '') {
                $this->cd_execucao             = $arrObjExecucao[ 0 ]->getCdExecucao();
                $this->ds_nome_classe          = $arrObjExecucao[ 0 ]->getDsNomeClasse();
                $this->ds_path_classe          = $arrObjExecucao[ 0 ]->getDsPathClasse();
                $this->objIMExecucaoRecuperada = $arrObjExecucao[ 0 ];
            }
        }
    }

    /**
     * Registra o objeto de banco de dados
     * @param  imclass\banco_dados\IMDoctrine $objIMDoctrine [description]
     */
    public function registerDoctrine(\imclass\banco_dados\IMDoctrine $objIMDoctrine)
    {
        $this->objIMDoctrine = $objIMDoctrine;
    }


    /**
     * verifica se a execucao foi linkada
     * @return  array
     */
    public function verificarExecucaoLinkada()
    {
        if ($this->cd_execucao_anterior != '') {
            $this->recuperarExecucaoAnterior();
        }
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
    private function recuperarParametros(
        $verificador = false,
        $objiAppInterface = null,
        $objIMExecucoes = null
    ) {
        if ($verificador == true) {
            $arrInputs = $objiAppInterface
                ->getObjAppInputs()
                ->getArrInputs();

            foreach ($arrInputs as $input_id => $input_v) {
                $nome_campo = $input_v->getNome();

                $valor_campo = $this->recuperaParametroFromBase(
                    $objIMExecucoes,
                    $nome_campo
                );

                // seta o valor do campo
                $objiAppInterface
                    ->getObjAppInputs()
                    ->setInputValor($nome_campo, $valor_campo);
            }
        }
    }

    /**
     * Retorna o valor de um campo especificado
     * @param  [str] $nome_campo [description]
     * @return [str]             [description]
     */
    private function recuperaParametroFromBase($objIMExecucoes, $nome_campo)
    {
        foreach (
            $objIMExecucoes
                ->getExecucoesParametros() as $key => $value
        ) {
            if ($value->getDsNome() == $nome_campo) {
                return $value->getDsValor();
            }
        }

        return null;
    }

    /**
     * Recupera uma execução linkada que foi executada anteriormente
     * @param  [type] $cd_execucao [description]
     * @return [type]              [description]
     */
    public function recuperarExecucaoAnterior()
    {
        $arrObjIMExecucao = $this->recuperarExecucao(
            $this->cd_execucao_anterior
        );

        $this->objIMExecucaoLinkada = $arrObjIMExecucao[ 0 ];
        $ds_path_classe = $this->objIMExecucaoLinkada->getDsPathClasse();
        $ds_nome_classe = $this->objIMExecucaoLinkada->getDsNomeClasse();

        // cria a classe
        require_once(C_PATH_RAIZ . $ds_path_classe . '.php');
        $this->objiAppInterfaceLinkado = new $ds_nome_classe;

        // recupera os parametros
        $this->recuperarParametros(
            true,
            $this->objiAppInterfaceLinkado,
            $this->objIMExecucaoLinkada
        );

        $this->objiAppInterfaceLinkado
            ->executar();

        $valor = $this->objiAppInterfaceLinkado
            ->getResultado();
            

        $this->parseResultado(
            $this->ds_nome_campo, 
            $valor
        );

        // seta o valor do campo linkado
        /*$objiAppInterface
           ->setInputValor(
              $this->ds_nome_campo,
              $valor_campo
           );*/
    }

    // todo
    public function parseResultado($nome_campo, $valor)
    {
        switch (gettype($valor)) {
            case "array" :
            {
                $campo_key = $this->objiAppInterface
                    ->getObjAppInputs()
                    ->getInputKeyByName(
                        $this->ds_nome_campo
                    );


                if (is_numeric($campo_key)) {
                    $objInputSelectList = new InputSelectList();
                    $objInputSelectList->setNome($nome_campo);

                    foreach ($valor as $key => $value) {
                        $valor = array_pop($value);
                        $objInputSelectList->addValoresCampo($valor, $valor);
                    }


                    $this->objiAppInterface
                        ->getObjAppInputs()
                        ->setInputByKey(
                            $objInputSelectList,
                            $campo_key
                        );
                }
            }
            break;
        }
    }

}