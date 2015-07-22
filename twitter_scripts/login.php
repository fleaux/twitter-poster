<?php
 
$CONSUMER_KEY='ENTER_YOUR_KEY';
$CONSUMER_SECRET='ENTER_YOUR_CONSUMER_SECRET';
$OAUTH_CALLBACK='ENTER_YOUR_CALLBACK_URL';


require_once '../twitter_library/twitteroauth.php';

$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET);
$request_token = $connection->getRequestToken($OAUTH_CALLBACK); //get Request Token
 
if( $request_token)
{
    $token = $request_token['oauth_token'];
	session_start();
    $_SESSION['request_token'] = $token ;
    $_SESSION['request_token_secret'] = $request_token['oauth_token_secret'];
 
    switch ($connection->http_code) 
    {
        case 200:
            $url = $connection->getAuthorizeURL($token);
            echo "<div style='width:650px;text-align:center;margin-bottom:20px;padding-top:20px;'><u><b>TWITTER</u>:</b><br/><br/><a href='".$url."'><img src='img/twitter_login.png'></img></a></div>";
			//redirect to Twitter .
            // header('Location: ' . $url); 
            break;
        default:
            echo "Connection with twitter Failed";
            break;
    }
 
}
else //error receiving request token
{
    echo "Error Receiving Request Token";
}
?>