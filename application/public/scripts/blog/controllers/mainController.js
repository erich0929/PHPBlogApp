// mainController.js

	angular.module ('erich0929.blogApp.controller')
			.controller ('mainController', ['$scope', '$sce', 'mainArticles', function ($scope, $sce, mainArticles) {
				$scope.mainArticles = getSummary (mainArticles);
				
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