<?
use imclass\apps\AppConcreto;
use imclass\apps\inputs\InputText;
use imclass\apps\inputs\InputConexoesMysql;
use imclass\conversores\IMArrayToHTMLTable;
use imclass\uteis\base\IMGetConexaoBancoFromNome;

/**
 * Recupera alunos de uma instituição de ensino
 */
class getAlunosFromIE extends AppConcreto {

   /**
    * Construtor
    */
   public function __construct()
   {      
      $this->setDescricao('Recupera alunos de uma instituição de ensino');      
      $this->setCampos();
   }

   /**
    * Cria os campos necessários
    */
   public function setCampos()
   {
      $objInputText = new InputText();
      $objInputText->setNome('cd_instituicao');
      $objInputText->setLabel('Código da Instituição');

      $this->setInput( $objInputText );


      $objInputConexoesMysql = new InputConexoesMysql();
      $objInputConexoesMysql->setNome('nm_obj_conexao');

      $this->setInput( $objInputConexoesMysql );
   }

   /**
    * Executa a função
    */
   public function executar()
   {     
      $retorno        = '';
      $cd_instituicao = $this->getInputValor( 'cd_instituicao' );
      $nm_obj_conexao = $this->getInputValor( 'nm_obj_conexao' );
      
      $objIMConexaoBancoDados = IMGetConexaoBancoFromNome::getConexao( $nm_obj_conexao );

      if ( $objIMConexaoBancoDados != null )
      {         
         $query = '
            select
               uni_p.cd_pessoa,
               uni_p.nm_pessoa
            from
               pessoas as uni_p

               INNER JOIN estnc_instituicoes_pessoas as nc_ip ON (
                  nc_ip.cd_pessoa = uni_p.cd_pessoa
               )
            where
               nc_ip.cd_instituicao = '. $cd_instituicao .' and
               nc_ip.cd_grupo = 2
            order by
               uni_p.nm_pessoa
            asc limit 100
         ';


         $objIMPDOStatement = $objIMConexaoBancoDados->query( $query );
         $objIMArrayToHTMLTable = new IMArrayToHTMLTable();
          
         vl( $objIMPDOStatement->getArrValores()  );

         $arr = $objIMArrayToHTMLTable->convertTabelaHorizontal( 
           $objIMPDOStatement->getArrValores() 
         );

         vl($arr);

         return $arr;
      }
   }
}
?>