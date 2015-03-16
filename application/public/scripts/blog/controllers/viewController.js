
// viewController.js

angular.module ('erich0929.blogApp.controller')
		.controller ('viewController', ['$location', '$rootScope', '$route', '$scope', '$sce', 'article', function ($location, $rootScope, $route, $scope, $sce, article) {
			
			$rootScope.metadata = { 
		  		url : 'http://localhost/application/public/index.html#' + $location.path ().replace (/\/$/,''), 
		  		title : article.title,
		  		description : ''
			};

			var content = article.content;
			var contentHtml = $sce.trustAsHtml (content);
			$scope.article = {
				title : article.title,
				date : article.date,
				author : article.author,
				content : contentHtml,
				articleId : article.articleId
			};


		}]);