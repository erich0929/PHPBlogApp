// boardService.js

var service = angular.module ('erich0929.blogApp.service', ['ngResource']);

service.factory ('BoardService', ['$resource', function ($resource) {
	//var url = 'http://blog.erich0929.com/index.php/boards';
	//var boardResource = $resource (url, {},{ query : {method : 'GET', isArray : true}});
	//return boardResource;

	//static private :
	var url = 'http://blog.erich0929.com/index.php/boards';

	function getArticlesResource (board, id, limit) {
		
		var url = 'http://blog.erich0929.com/index.php/boards/' + board.name;
		var idParam = 'id=' + id;
		var limitParam = 'limit=' + limit;
		if (id) {
			url += '?' + idParam;
			if (limit) url += '&' + limitParam;
		} else {
			if (limit) url += '?' + limitParam;
		}
		console.log (url);
		var boardResource = $resource (url);
		return boardResource;
	}

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

		getBoardsByPromise : function () {
			var boardResource = $resource (url);
			return boardResource.query (function (data) {
				data.unshift ({name : 'All', description : '*'});
			}).$promise;
		},

		getArticle : function (boardName, articleId, callback) {
			var success = callback || function (data) {};
			var url = 'http://blog.erich0929.com/index.php/boards/' + boardName + '/' + articleId;
			console.log (url);
			var boardResource = $resource (url);
			return boardResource.get (success).$promise;
		},

		getArticles : function (board, callback, id, limit) {
			var boardResource = getArticlesResource (board, id, limit);
			var success = callback || function (data) {};
			return boardResource.query (success);
		},

		getArticlesByPromise : function (board, callback, id, limit) {
			var boardResource = getArticlesResource (board, id, limit);
			var success = callback || function (data) {};
			return boardResource.query (success).$promise;
		},

		deleteArticle : function (boardName, articleId, callback) {
			var success = callback || function (data) {};
			var url = "http://blog.erich0929.com/index.php/delete/" + boardName + "/" + articleId;
			var boardResource = $resource (url);
			return boardResource.get (success);
		}
	};

	return boardService;
}]);

	