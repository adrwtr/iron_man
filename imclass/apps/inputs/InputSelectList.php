<?php
namespace imclass\apps\inputs;

use imclass\apps\inputs\AbstractInput;

/**
 * Cria uma lista de seleção com o mouse como se fosse uma tabela
 */
class InputSelectList extends AbstractInput
{

    /**
     * array de valores que poderá ser selecionado
     * pelo usuario
     * @var array
     */
    var $arrValores;

    /**
     * Retorna o tipo do campo
     * @return string
     */
    public function getTipo()
    {
        return 'InputSelectList';
    }

    /**
     * Adiciona um valor
     * @param string
     * @param string
     */
    public function addValoresCampo($label, $valor)
    {
        $this->arrValores[ $valor ] = $label;
    }

    /**
     * Retorna o array de valores
     * @return array
     */
    public function getArrValores()
    {
        return $this->arrValores;
    }


    /**
     * Retorna o nome correto da função utilizada pelo campo
     * @param  pode receber o valor de algum item selecionado, e neste caso atribui ao
     * valor do campo
     * @return string html
     */
    private function getNomeFuncaoJavascriptValor($valor_campo = '')
    {
        if ($valor_campo == '') {
            $valor_campo = 'valor';
        }

        return 'setValor' . $this->getNome() . '( ' . $valor_campo . ' )';
    }

    /**
     * Retorna nome de funcao javscript
     * @return string html
     */
    private function getNomeFuncaoJavascriptSelected($valor_campo = '')
    {
        if ($valor_campo == '') {
            $valor_campo = 'valor';
        }

        return 'setSelecionado' . $this->getNome() . '( ' . $valor_campo . ' )';
    }

    /**
     * Retorna o javascript final
     * que será utilizado para manipular o valor do campo
     * e o campo a ser marcado quando for selecionado
     * @return string html
     */
    private function getJavaScript()
    {
        $retorno = '
        <script language="javascript">
        function ' . $this->getNomeFuncaoJavascriptValor() . '
        {
            $(\'#' . $this->getNome() . '\').val( valor );
        }

        function ' . $this->getNomeFuncaoJavascriptSelected() . '
        {
            $(\'.lista_' . $this->getNome() . '\').each(function()
            {
                $(this).attr(
                    \'class\',
                    \'list-group-item lista_' . $this->getNome() . '\'
                );

                if ( $(this).attr(\'lista_valor\') == valor )
                {
                    $(this).attr(
                        \'class\',
                        \'list-group-item active lista_' . $this->getNome() . '\'
                    );
                }
            });
        }
        </script>
        ';

        return $retorno;
    }

    /**
     * Cria todos os valores que serão impressos na tela
     * @return string html
     */
    private function criaValoresCampo()
    {
        foreach ($this->getArrValores() as $valor => $label) {
            
            $opcao_valor = '\'' . $valor . '\'';
            
            $nm_funcao_valor  = $this->getNomeFuncaoJavascriptValor(
                $opcao_valor
            );

            $nm_funcao_select  = $this->getNomeFuncaoJavascriptSelected(
                $opcao_valor
            );

            $javascript1 = 'javascript:' . $nm_funcao_valor . ';';
            $javascript2 = $nm_funcao_select . ';';
            
            $ativo = ($this->getValor() == $valor ? "active" : "");
            
            $retorno .= '
            <a href="' . $javascript1 . $javascript2 . '"
            class="list-group-item ' . $ativo . ' lista_' . $this->getNome() . '"
            lista_valor="' . $valor . '">
            ';

            $retorno .= $label;
            $retorno .= '</a>';
        }

        return $retorno;
    }

    /**
     * Retorna o componente pronto
     * @return string html
     */
    public function getComponente()
    {
        $retorno = '
        <div class="input-group">
        <span class="input-group-addon">' . $this->getLabel() . '</span>

        <div class="list-group">';

        if ( count($this->getArrValores()) > 0 ) {
            $retorno .= $this->criaValoresCampo();
        }

        $retorno .= '</div>';
        $retorno .= '<input type="hidden"
         name="' . $this->getNome() . '"
         id="' . $this->getNome() . '"
         value="' . $this->getValor() . '" />';
        $retorno .= '</div>';

        if ( count($this->getArrValores()) > 0 ) {
            $retorno .= $this->getJavaScript();
        }

        return $retorno;
    }
}