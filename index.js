$(function() {
   $( "#accordion" ).accordion({
      collapsible: true,
      active: 4,
      heightStyle: "content"
   });   
});

function mostraPainel( id )
{
   $( "#accordion" ).accordion( "option", { active: id } );
}

function limparPilha()
{
   $('#limpar_pilha').val('1');
   $('#form_pilha').submit();
}