// boardService.js

var service = angular.module ('erich0929.blogApp.service', ['ngResource']);

service.factory ('BoardService', ['$resource', function ($resource) {
	//var url = 'http://blog.erich0929.com/index.php/boards';
	//var boardResource = $resource (url, {},{ query : {method : 'GET', isArray : true}});
	//return boardResource;

	//static private :
	var url = 'http://blog.erich0929.com/index.php/boards';


	// constructor
	var boardService = function () {

		//private :
		//var url = url;
		//public :


	};

	// public method
	boardService.prototype = {

		getBoards : function () {
			var boardResource = $resource (url);
			return boardResource.query (function (data) {
				data.unshift ({name : 'All', description : '*'});
			});
		},
		getArticles : function (board, callback) {
			var success = callback || function (data) {};
			var url = 'http://blog.erich0929.com/index.php/boards/' + board.name;
			console.log (url);
			var boardResource = $resource (url);
			return boardResource.query (success);
		} 

	};

	return boardService;
}]);

	