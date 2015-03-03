
// viewController.js

angular.module ('erich0929.blogApp.controller')
		.controller ('viewController', ['$scope', '$sce', 'article', function ($scope, $sce, article) {
			//var content = "<p>This blog post shows a few different types of content that's supported and styled with Bootstrap.	Basic typography, images, and code are all supported.</p><hr><p>$Cum sociis natoque penatibus et magnis <a href=\"#\">dis parturient montes</a>,nascetur ridiculus mus. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum Sed posuere consectetur est at lobortis. Cras mattis consectetur purus sit amet fermentum.</p>"
			
			var content = article.content;
			var contentHtml = $sce.trustAsHtml (content);
			$scope.article = {
							title : "Sample blog post",
							date : "January 1, 2014 by ",
							author : "Mark",
							content : contentHtml
						};			
		}]);