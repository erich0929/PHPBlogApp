// app.js
	var app = angular.module ('erich0929.blogApp', ['ngRoute', 'erich0929.blogApp.controller',
													'erich0929.blogApp.service']),
		controller = angular.module ('erich0929.blogApp.controller', ['erich0929.blogApp.service']),
		service = angular.module ('erich0929.blogApp.service', ['ngResource']);

		service.factory ('BoardService', ['$resource', function ($resource) {
			var url = 'http://blog.erich0929.com/index.php/boards';
			var boardResource = $resource (url, {},{ query : {method : 'GET', isArray : true}});
			return boardResource;
		}]);

	app.config (['$routeProvider', function ($routeProvider) {
		$routeProvider
			.when (
				'/main', 
				{
					templateUrl : 'scripts/blog/templates/main.tmpl.html',
					controller : 'mainController',
			/*		resolve : {
						boards : function (BoardService) {
							return BoardService.query ().$promise;
						}
					}*/
				})
			.when (
				'/write',
				{
					templateUrl : 'scripts/blog/templates/write.tmpl.html',
					controller : 'writeController'
				})
			.otherwise ({ redirectTo : '/main'});
	}]);

	app.controller ('appController', ['$scope', 'BoardService', function ($scope, BoardService) {
		$scope.brand = 'erich0929';
		$scope.boards = BoardService.query ();
	
	}]);

	//app.directive ('');