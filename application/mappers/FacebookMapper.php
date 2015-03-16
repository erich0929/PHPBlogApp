<?php
	
	use Facebook\FacebookSession;
	use Facebook\FacebookRedirectLoginHelper;
	use Facebook\FacebookRequest;
	use Facebook\FacebookResponse;
	use Facebook\FacebookSDKException;
	use Facebook\FacebookRequestException;
	use Facebook\Helpers\FacebookJavaScriptLoginHelper;
	use Facebook\FacebookAuthorizationException;
	use Facebook\GraphObject;
	use Facebook\Entities\AccessToken;
	use Facebook\HttpClients\FacebookCurlHttpClient;
	use Facebook\HttpClients\FacebookHttpable;

	class FacebookMapper {

		private $accessToken;
		private $session;
		private $fbid;

		public function __construct ($appId, $appSecret, $accessToken) {
			FacebookSession::setDefaultApplication ($appId, $appSecret);
			$this -> accessToken = $accessToken;
			$this -> session = new FacebookSession($this -> accessToken);
			// TODO : !isset ($session) then throw Exception; 
		}

		public function getUser () {
			if (!isset($this -> session)) return false;
			$graphObject = $this -> graphRequest ('GET', '/me');
			$fbid = $graphObject -> getProperty ('id');
			$this -> fbid = $fbid;
			$username = $graphObject -> getProperty ('name');
			$email = $graphObject -> getProperty ('email');
			return array ('fbid' => $fbid, 'username' => $username, 'email' => $email);
		}

		public function postFeed ($comment, $link) {
			$request = new FacebookRequest($session, 'POST', "/" . $this -> fbid . "/feed",
   				 array (
    				'message' => $comment,
    				'link' => $link
  				)
			);
			$response = $request -> execute();
			$graphObject = $response -> getGraphObject();
			return $graphObject -> getProperty ('id');
		}

		private function graphRequest ($method, $endpoint) {
			$request = new FacebookRequest( $this -> session, $method, $endpoint);
			$response = $request -> execute();

  			// get response
			$graphObject = $response -> getGraphObject();
			return $graphObject;
		}


	}

?>