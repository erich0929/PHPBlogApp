//articleService.js

service = angular.module ('erich0929.blogApp.service');

service.factory ('ArticleService', ['$resource', function ($resource) {

	var url = 'http://blog.erich0929.com/index.php/article/';
	var articleService = function (articleId) {
		var articleResource = $resource (url + articleId);
		return articleResource;	
	}
	return articleService;

}]);