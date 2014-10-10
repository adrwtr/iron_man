<?php
namespace test\imclass\apps\inputs;

use imclass\apps\inputs\InputSelectList;


/**
 * TODO adriano
 * esta classe encontra-se com um erro no teste na opção addvalorescampos
 */


class InputSelectListTest extends \PHPUnit_Framework_TestCase
{
    var $objInputSelectListTest;

    // cria a classe mockada
    public function setUp()
    {
        $this->objInputSelectListTest = new InputSelectList();
    }

    public function testGetTipo()
    {
        return $this->assertEquals(
            $this->objInputSelectListTest->getTipo(),
            'InputSelectList'
        );
    }

    public function testGetSetArrayValores()
    {
        $label = 'label';
        $valor = 'valor';

        $arrTest = array(
            $valor => $label
        );

        $this->objInputSelectListTest->addValoresCampo($label, $valor);

        $this->assertEquals(
            $arrTest,
            $this->objInputSelectListTest
                ->getArrValores()
        );
    }

    public function testGetComponente()
    {
        $nome = 'nome';
        $label = 'label';
        $valor = 'valor';

        $arrTest = array(
            $valor => $label,
            $valor => $label,
        );
        
        $this->objInputSelectListTest->setNome($nome);
        $this->objInputSelectListTest->setLabel($label);
        $this->objInputSelectListTest->setValor($valor);
        $this->objInputSelectListTest->addValoresCampo($label, $valor);
        $this->objInputSelectListTest->addValoresCampo($label, $valor);

        $componente = $this->getComponente(
            $nome,
            $label,
            $valor
        );

        $this->assertEquals(
            $componente,
            $this->objInputSelectListTest
                ->getComponente()
        );
    }

    private function getComponente($nome, $label, $valor)
    {
        $campo = '
        <div class="input-group">
        <span class="input-group-addon">'.$label.'</span>

        <div class="list-group">
            <a href="javascript:setValornome( \''. $valor .'\' );setSelecionadonome( \''. $valor .'\' );"
            class="list-group-item active lista_'.$nome.'"
            lista_valor="'. $valor .'">
            '. $label .'</a></div><input type="hidden"
         name="' . $nome .'"
         id="' . $nome .'"
         value="valor" /></div>
        <script language="javascript">
        function setValor'. $nome .'( valor )
        {
            $(\'#'. $nome .'\').val( valor );
        }

        function setSelecionadonome( valor )
        {
            $(\'.lista_'. $nome .'\').each(function()
            {
                $(this).attr(
                    \'class\',
                    \'list-group-item lista_'. $nome .'\'
                );

                if ( $(this).attr(\'lista_valor\') == valor )
                {
                    $(this).attr(
                        \'class\',
                        \'list-group-item active lista_'. $nome .'\'
                    );
                }
            });
        }
        </script>
        ';

        return $campo;
    }


}