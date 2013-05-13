<?
class TestOfIMSql extends BaseUnitTest {
   
   private $obj;

   public function __construct()
   {  
      require_once( C_PATH_CLASS . 'banco_dados/IMSql.class.php' );       
      $this->obj = new IMSql();
   }


   public function testOfgetset()
   {
      $obj = $this->obj;

      $this->obj->set('teste');
      $texto = $this->obj->get();
      
      $this->assertTrue( $texto == 'teste', 'get e set - Erro no getters e setters' );      
   }  

   public function testOfgetsetTabela()
   {
      $obj = $this->obj;

      $this->obj->setTabela('teste');
      $texto = $this->obj->getTabela();
      
      $this->assertTrue( $texto == 'teste', 'get e set - Erro no getters e setters de tabela' );      
   }

   public function testOfclear()
   {
      $this->obj->clear();
      $this->assertTrue( $this->obj->get() == '', 'Clear - Erro de clear' );      
   }

   public function testOfCampos()
   {
      $arrCampos = array(
         'campo1', 'campo2'
      );

      $this->obj->setCampos( $arrCampos );

      $this->assertTrue( $arrCampos == $this->obj->getCampos(), 'get e set - Erro no getters e setters de campos' );        

      $this->obj->addCampo( 'campo3' );
      $arrCampos[] = 'campo3'; 

      $this->assertTrue( $arrCampos == $this->obj->getCampos(), 'get e set - Erro no getters e setters de campos' );    

      $this->obj->clearCampos();

      $this->assertTrue( array() == $this->obj->getCampos(), 'clearCampos falhou' );            
   }

   public function testOfmontaSelect()
   {
      $arrCampos = array(
         'id', 'nm_pessoa'
      );

      $this->obj->setCampos( $arrCampos );
      $this->obj->montaSelect( 'pessoas' );

      $this->assertTrue( $this->obj->get() == 'SELECT id, nm_pessoa from pessoas', 'Monta SELECT - Erro no montar select 1' );        

      $this->obj->clear();
      $this->obj->setCampos(array());
      $this->obj->montaSelect( 'pessoas' );

      $this->assertTrue( $this->obj->get() == 'SELECT  *  from pessoas', 'Monta SELECT - Erro no montar select 2' );        
   }

   
}
?>