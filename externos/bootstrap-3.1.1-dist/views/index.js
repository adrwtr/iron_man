/**
 * Inicia a aplicação em angular
 * define a app e o controler
 */
var app = angular.module('angular_projetos_procurar', []);
app.controller('angular_projetos_controller', angular_projetos_controller );


/**
 * Define o escopo inicial, que são as apps
 */
function angular_projetos_controller($scope) 
{   
   $scope.Apps = null;
};


app.controller( 
   'angular_projetos_controller', 
   [ '$scope', function($scope) {

      $scope.addApp = function( vnome, vpath ) 
      { 
         var valor = [ { nome : vnome, path : vpath } ];

         if ( $scope.Apps == null )
         {
            $scope.Apps = valor;
         }
         else
         {
            $scope.Apps.push( valor ); 
         }

         $scope.$apply();
       };
    }
   ]
);   


