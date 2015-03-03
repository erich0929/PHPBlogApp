// mainController.js

	angular.module ('erich0929.blogApp.controller')
			.controller ('mainController', ['$scope', 'BoardService', function ($scope) {
				$scope.mainArticles = 
					[
						{
							title : "Sample blog post",
							date : "January 1, 2014 by ",
							author : "Mark",
							content : "<p>This blog post shows a few different types of content that's supported and styled with Bootstrap.	Basic typography, images, and code are all supported.</p><hr><p>$Cum sociis natoque penatibus et magnis <a href=\"#\">dis parturient montes</a>,nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>"
						},
						{
							title : "Sample blog post",
							date : "January 1, 2014 by ",
							author : "Mark",
							content : "<p>This blog post shows a few different types of content that's supported and styled with Bootstrap.	Basic typography, images, and code are all supported.</p><hr><p>$Cum sociis natoque penatibus et magnis <a href=\"#\">dis parturient montes</a>,nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>"
						},
						{
							title : "Sample blog post",
							date : "January 1, 2014 by ",
							author : "Mark",
							content : "<p>This blog post shows a few different types of content that's supported and styled with Bootstrap.	Basic typography, images, and code are all supported.</p><hr><p>$Cum sociis natoque penatibus et magnis <a href=\"#\">dis parturient montes</a>,nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>"
						}
					];
			}]);