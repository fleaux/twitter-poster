<?php
$CONSUMER_KEY='ENTER_YOUR_KEY';
$CONSUMER_SECRET='ENTER_YOUR_CONSUMER_SECRET';
$OAUTH_CALLBACK='ENTER_YOUR_CALLBACK_URL';

require_once '../twitter_library/twitteroauth.php';
session_start();

	// Connect to OAuth2
    $connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $_SESSION['request_token'], $_SESSION['request_token_secret']);
    $access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
	
	// Check if acces token exists or not.
    if($access_token)
    {
        $connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
        $params =array();
        $params['include_entities']='false';
        $content = $connection->get('account/verify_credentials',$params);
		
		// Save name, profil image, twitter ID and tokens as cookies.
        if($content && isset($content->screen_name) && isset($content->name))
        {
            $_SESSION['name']=$content->name;
            $_SESSION['image']=$content->profile_image_url;
            $_SESSION['twitter_id']=$content->screen_name;
			
			$_SESSION['token'] = $access_token['oauth_token'];
			$_SESSION['tokensecret'] = $access_token['oauth_token_secret'];
			
            // Redirect to main page. Your own.
            header('Location: ../index.php'); 
 
        }
        else
        {
               echo "<h4> Login Error </h4>";
        }
    }
	
 
	else
	{
		echo "<h4> Login Error </h4>";
	}
?>