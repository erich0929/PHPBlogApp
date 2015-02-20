// app.js
	var app = angular.module ('erich0929.blogApp', ['ngRoute', 'erich0929.blogApp.controller']),
		controller = angular.module ('erich0929.blogApp.controller', []),
		service = angular.module ('erich0929.blogApp.service', []);

	app.config (['$routeProvider', function ($routeProvider) {
		$routeProvider
			.when (
				'/main', 
				{
					templateUrl : 'scripts/blog/templates/main.tmpl.html',
					controller : 'mainController'
				})
			.when (
				'/write',
				{
					templateUrl : 'scripts/blog/templates/write.tmpl.html',
					controller : 'writeController'
				})
			.otherwise ({ redirectTo : '/main'});
	}]);

	app.controller ('appController', ['$scope', function ($scope) {
		$scope.brand = 'erich0929';
	
	}]);

	//app.directive ('');