var tiposModulo = angular.module('tiposModulo', []);

tiposModulo.controller("tiposController" , function ($scope, $http){

  $scope.listarTipos = function() {
		$http({ method: 'GET', url: urlTipos }).then(function successCallback(response) {
   			$scope.tipos = response.data;
 		}, function errorCallback(error) {
   			console.log(error, 'falha no consumo do serviço')
 		});
	}

  $scope.selecionaTipo = function ( tipoSelecionado ) {

		$scope.tipo = tipoSelecionado;
	}

  $scope.limparCampos = function () {

		$scope.tipo = null;
	}

});
