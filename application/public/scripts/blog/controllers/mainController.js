// mainController.js

	angular.module ('erich0929.blogApp.controller')
			.controller ('mainController', ['$scope', '$sce', 'mainArticles', 'BoardService', '$route', function ($scope, $sce, mainArticles, BoardService, $route) {

				var boardService = new BoardService ();
				var limitArticles = 5;
				// main articleContainer
				var articleContainer = [];
				var idMapToPage = [];
				var boardName = $route.current.params.board || "All";
				
				$scope.mainArticles = getSummary (mainArticles);
				
				$scope.frontId = 1;
				

				$scope.getNextPage = function (mainArticles) {
					var lastArticleId = mainArticles [limitArticles -1];
					var currentPage = idMapToPage [lastArticleId];
					var mainArticles = getArticles (boardName, currentPage + 1, id);
				};

				$scope.getPrevPage = function (mainArticles) {


				};

				function getArticles (boardName, page, id) {
					// find articles in a cache.
					if (articleContainer [page]) {
						return articleContainer [page];
					}
					// if not , request articles.
					return boardService.getArticles ({name : boardName}, null, id, limitArticles);
				}

				function getSummary (articles) {
					var imageTagRegex = /<img.*?>/i; //using lazy match.
					var htmlTag = /<.*?>/gm;
					var contentLimit = 370;
					
				
					for (var i=0; i < articles.length; i++) {
						var emptyString = /\s+/gi;
						emptyString.lastIndex = contentLimit - 10;

						var article = articles [i];
						article.image = article.content.match (imageTagRegex);
						//remove image tag.
						article.content = article.content.replace (imageTagRegex, '');
						//summary content.
						article.content = article.content.replace (htmlTag, '');
						//empty tag index
						var emptyMatch = emptyString.exec (article.content);
						
						var lastIndex = contentLimit;
						if (emptyMatch) {
							var index = emptyMatch ['index'];
							console.log (index);
							lastIndex = index + emptyMatch [0].length;
						}
						lastIndex = lastIndex > contentLimit + 30 ? contentLimit : lastIndex;
						
						article.content = $sce.trustAsHtml (article.content.substring (0, lastIndex) + ' <a>... more</a>');

					}

					return articles;
				}

			}]);