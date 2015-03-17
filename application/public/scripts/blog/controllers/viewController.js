
// viewController.js

angular.module ('erich0929.blogApp.controller')
		.controller ('viewController', ['domain', '$location', '$rootScope', '$route', '$scope', '$sce', 'article', function (domain, $location, $rootScope, $route, $scope, $sce, article) {
			
			$rootScope.metadata = { 
		  		url : domain + '/application/public/index.html#' + $location.path ().replace (/\/$/,''), 
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

			$scope.comments = [
				{
					comment : '기성용 오늘은 못햇다 공도 자주 뺏기고 몸이 엉청 무거워 보엿슴 감독의 판간은 옳앗다',
					author : 'erich0929',
					date : date (),
					class : 'comment-body'
				}

			];


		}]);