// app.js
	var app = angular.module ('erich0929.blogApp', ['ngRoute', 'erich0929.blogApp.controller',
													'erich0929.blogApp.service', 
													'erich0929.blogApp.directive']),
		controller = angular.module ('erich0929.blogApp.controller', []),
		service = angular.module ('erich0929.blogApp.service', ['ngResource']),
		directive = angular.module ('erich0929.blogApp.directive', []);

	app.config (['$routeProvider', function ($routeProvider) {
		$routeProvider
			.when (
				'/main', 
				{
					templateUrl : 'scripts/blog/templates/main.tmpl.html',
					controller : 'mainController',
					resolve : {
						mainArticles : function (BoardService, $route) {
							var boardService = new BoardService ();
							var boardName = $route.current.params.board || 'All';
							return boardService.getArticlesByPromise ({name : boardName}, null, 0, 5);
						}
					}
				})
			.when (
				'/write',
				{
					templateUrl : 'scripts/blog/templates/write.tmpl.html',
					controller : 'writeController'
				})
			.when ('/edit/:boardName/:articleId', 
				{
					templateUrl : "scripts/blog/templates/edit.tmpl.html",
					controller : 'editController',
					resolve : {
						article : function (BoardService, $route) {
							var boardService = new BoardService ();
							return boardService.getArticle ($route.current.params.boardName,
															$route.current.params.articleId);
						},
						boards : function (BoardService) {
							var boardService = new BoardService ();
							return boardService.getBoardsByPromise ();
						}
					}
				})
			.when ('/admin', 
				{
					templateUrl : 'scripts/blog/templates/admin.tmpl.html',
					controller : 'adminController'
				})
			.when ('/dashboard', 
				{
					templateUrl : 'scripts/blog/templates/dashboard.tmpl.html',
					controller : 'dashboardController'
				})
			.when ('/dashboard/:board', 
				{
					templateUrl : 'scripts/blog/templates/dashboard.tmpl.html',
					controller : 'dashboardController'
				})
			.when ('/view/:articleId', 
				{
					templateUrl : 'scripts/blog/templates/view.tmpl.html',
					controller : 'viewController',
					resolve : {
						article : function (ArticleService, $route) {
							console.log ($route.current.params);
							var articleService = new ArticleService ($route.current.params.articleId);
							return articleService.get ().$promise;
						}
					}
				})
			.otherwise ({ redirectTo : '/main'});
	}]);

	app.controller ('appController', ['$scope', 'BoardService', function ($scope, BoardService) {
		$scope.brand = 'erich0929';
		var boardService = new BoardService ();
		$scope.boards = boardService.getBoards ();
				
	}]);

	//app.directive ('');