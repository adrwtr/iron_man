<?php
namespace test\imclass\apps\inputs;

use imclass\apps\inputs\InputDateText;

class InputDateTextTest extends \PHPUnit_Framework_TestCase
{
    var $objInputDateTextTest;

    // cria a classe mockada
    public function setUp()
    {
        $this->objInputDateTextTest = new InputDateText();
    }

    public function dadosParaTeste()
    {
        return array( array( 'campo_texto' ) );
    }

    /**
     * @dataProvider dadosParaTeste
     */
    public function testgetComponente($nome)
    {
        $this->objInputDateTextTest->setLabel($nome);
        $this->objInputDateTextTest->setNome($nome);
        $this->objInputDateTextTest->setValor($nome);

        $valor = '<div class="input-group">
<span class="input-group-addon">' . $nome . '</span>
<input type="text" class="form-control"
    name="' . $nome . '" placeholder=""
    id="'. $nome .'"
    value="' . $nome. '">
</div><BR />
<script language="javascript">
    $(\'#'. $nome .'\').datepicker({
        format: \'dd/mm/yyyy\',
        language:"pt-br"
    });
</script>
      ';

        $this->assertEquals(
            $this->objInputDateTextTest
                ->getComponente(),
            $valor
        );
    }

    public function testgetTipo()
    {
        return $this->assertEquals(
            $this->objInputDateTextTest->getTipo(),
            'InputDateText'
        );
    }
}