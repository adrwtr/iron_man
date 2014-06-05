/**
 * Inicia a aplicacao em angular
 * define a app e o controler
 */
var app = angular.module('angular_app_execucoes', []);
app.controller('angular_app_controller', angular_app_controller );


/**
 * Define o escopo inicial, que sao as apps
 */
function angular_app_controller($scope) 
{   
   $scope.arrExecucoes = null;
};


app.controller( 
   'angular_app_controller', 
   [ '$scope', function($scope) {

      $scope.addApp = function( vnome, vpath ) 
      { 
         var valor = [ { nome : vnome, path : vpath } ];

         if ( $scope.arrExecucoes == null )
         {
            $scope.arrExecucoes = valor;
         }
         else
         {
            $scope.arrExecucoes.push( valor ); 
         }

         $scope.$apply();
       };
    }
   ]
);   


