<?
namespace imclass\apps\link;

/**
 * Interface de um app que possui links
 */
interface iAppLink
{   
   // quais campos estarão linkados?
   public function setLinkCampos();

   // quais campos serao retornados linkados?
   public function setLinkRetornos();
}
?>