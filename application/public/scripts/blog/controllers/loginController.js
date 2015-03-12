// loginController.js

	angular.module ('erich0929.blogApp.controller')
		.controller ('loginController', ['$scope', '$location', function ($scope) {
			$scope.facebookLogin = function () {
				FB.login (function (response) {
					if(response.authResponse){
						FB.init({
  							appId      : '529365033868003',
  							xfbml      : true,
  							version    : 'v2.1',
  							cookie     : true
						});
 						console.log (response.authResponse.accessToken);
         				window.location.href = "http://blog.erich0929.com/index.php/facebookLogin?access="+response.authResponse.accessToken;
        			}
				}, {scope : 'email'});
			}
		}]);