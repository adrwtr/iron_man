<?php
namespace imclass\apps\inputs;

use imclass\apps\inputs\Iinput;

/**
 * Cria uma lista de seleção com o mouse como se fosse uma tabela
 */
class InputSelectList implements Iinput
{

    var $nome;
    var $label;
    var $arrValores;

    public function setNome($valor)
    {
        $this->nome = $valor;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setLabel($valor)
    {
        $this->label = $valor;
    }

    public function getLabel()
    {
        return $this->label;
    }

    public function getTipo()
    {
        return 'InputSelectList';
    }

    public function setValor($valor)
    {
        $this->valor = $valor;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function addValoresCampo($label, $valor)
    {
        $this->arrValores[ $valor ] = $label;
    }

    public function getArrValores()
    {
        return $this->arrValores;
    }

    /**
     * Retorna o nome correto da função utilizada pelo campo
     * @param  pode receber o valor de algum item selecionado, e neste caso atribui ao
     * valor do campo
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
            $(this).attr(\'class\', \'list-group-item lista_' . $this->getNome() . '\' );
            
            if ( $(this).attr(\'lista_valor\') == valor )
            {
               $(this).attr(\'class\', \'list-group-item active lista_' . $this->getNome() . '\' );
            }
         });         
      }      
      </script>
      ';

        return $retorno;
    }

    /**
     * Cria todos os valores que serão impressos na tela
     * @return [type] [description]
     */
    private function criaValoresCampo()
    {
        foreach ($this->getArrValores() as $key => $opcao) {
            $javascript1 = 'javascript:' . $this->getNomeFuncaoJavascriptValor('\'' . $opcao . '\'') . ';';
            $javascript2 = $this->getNomeFuncaoJavascriptSelected('\'' . $opcao . '\'') . ';';

            $retorno .= '
         <a href="' . $javascript1 . $javascript2 . '"
            class="list-group-item ' . ($this->getValor() == $key ? "active" : "") . ' lista_' . $this->getNome() . '"
            lista_valor="' . $opcao . '">
         ';

            $retorno .= $opcao;
            $retorno .= '</a>';
        }

        return $retorno;
    }

    /**
     * Retorna o componente pronto
     * @return [type] [description]
     */
    public function getComponente()
    {
        $retorno = '
      <div class="input-group">
      <span class="input-group-addon">' . $this->getLabel() . '</span>
      
      <div class="list-group">
      ';

        $retorno .= $this->criaValoresCampo();

        $retorno .= '</div>';
        $retorno .= '<input type="hidden"
         name="' . $this->getNome() . '"
         id="' . $this->getNome() . '"
         value="' . $this->getValor() . '" />';
        $retorno .= '</div>';

        $retorno .= $this->getJavaScript();

        return $retorno;
    }

}

?>