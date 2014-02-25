<?
/**
 * Interface bсsica para qualquer app
 * essa interface indica o que toda app deve ter para funcionar juntamente 
 * com o layout padrao
 */
interface iAppInterface
{
   // toda classe app deve ter uma descriчуo do que ela faz
   public function setDescricao( $str_descricao='' );   
   public function getDescricao();
  
   // toda classe app deve definir seus inputs
   public function setInput( $nome );
   public function getArrInputs();
   public function setInputValor( $nome, $valor );
   public function getInputValor( $nome );

   // toda classe app deve executar alguma coisa
   public function executar();
}
?>