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

	$facebookHandler = new Handler ();
	$facebookHandler -> rules (array ('/^facebookLogin$/'))
	-> handler (function () {
		$HG = getInstance (); 		
		FacebookSession::setDefaultApplication ('529365033868003', '09b5bd7785b5ec90b231136b4bd7b9da');
		$appid      = "529365033868003";
    	$appsecret  = "09b5bd7785b5ec90b231136b4bd7b9da";
    	$session = new FacebookSession($_GET['access']);

		try {
		//	$session = $helper -> getSession ();
		// echo $_GET ['access'];
		} catch (FacebookRequestExcpetion $e) {
			echo $e -> getMessage ();
		} catch (Exception $e) {

		}
		// see if we have a session
		if ( isset( $session ) ) {
			// graph api request for user data
			$request = new FacebookRequest( $session, 'GET', '/me' );
			$response = $request -> execute();

  			// get response
			$graphObject = $response -> getGraphObject();
     		$fbid = $graphObject -> getProperty('id');         // To Get Facebook ID
    		$fbfullname = $graphObject -> getProperty('name'); // To Get Facebook full name
   			$femail = $graphObject -> getProperty('email');    // To Get Facebook email ID

    		/* ---- Session Variables -----*/
    		$_SESSION['FBID'] = $fbid;          
    		$_SESSION['FULLNAME'] = $fbfullname;
   	 		$_SESSION['EMAIL'] =  $femail;
  			
  			$result = array ('id' => $fbid, 'name' => $fbfullname, 'email' => $femail);
  			//checkuser($fuid,$ffname,$femail);
  			$HG -> setContentType ('application/json');
    		echo json_encode($result);
		} else {
			echo 'error : no facebook session';
		}
	});

	$HG =& getInstance ();
	$HG -> get ($facebookHandler -> build ());
?>