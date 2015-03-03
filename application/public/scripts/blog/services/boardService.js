// boardService.js

var service = angular.module ('erich0929.blogApp.service', ['ngResource']);

service.factory ('BoardService', ['$resource', function ($resource) {
	var url = 'http://blog.erich0929.com/index.php/boards';
	var boardResource = $resource (url, {},{ query : {method : 'GET', isArray : true}});
	return boardResource;
}]);

	