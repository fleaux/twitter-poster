<?php
   
$CONSUMER_KEY='2TkC4Rto21DAGJCK3zUhzRVvs';
$CONSUMER_SECRET='qcJkxGKxwSTmuIURn9lyr4qs9RYt3RAMQ6a98Ca0vWMkVvWp5S';
$OAUTH_CALLBACK='http://florian-chapon.fr/pages/realisations/twitter_post/callback.php';


require_once 'twitter_library/twitteroauth.php';

session_start();

 
    $connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $_SESSION['request_token'], $_SESSION['request_token_secret']);
    $access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
    if($access_token)
    {
        $connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
        $params =array();
        $params['include_entities']='false';
        $content = $connection->get('account/verify_credentials',$params);
		
 
        if($content && isset($content->screen_name) && isset($content->name))
        {
            $_SESSION['name']=$content->name;
            $_SESSION['image']=$content->profile_image_url;
            $_SESSION['twitter_id']=$content->screen_name;
			
			$_SESSION['token'] = $access_token['oauth_token'];
			$_SESSION['tokensecret'] = $access_token['oauth_token_secret'];
			
            //redirect to main page. Your own
            header('Location: index.php'); 
 
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