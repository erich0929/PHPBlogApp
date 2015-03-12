// authService.js

	angular.module ('erich0929.blogApp.service')
		.factory ('AuthService', ['$resource', '$cookies', function ($resource, $cookies) {
			
			// constructor
			var authService = function () {};

			// public api
			authService.prototype.authorize = function (securityFlag) {
				if (!securityFlag) return true;
				if (securityFlag == 'admin') {
					if ($cookies.isGranted) return true;
				}
				return false;
			};

			return authService;
		}]);