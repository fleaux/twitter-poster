<meta charset="UTF-8"/>

<?PHP

session_start();


$message = $_GET['message'];
$url_image = $_GET['image'];
$token = $_SESSION['token'];
$tokensecret = $_SESSION['tokensecret'];

require_once 'twitteroauth.php';

define("CONSUMER_KEY", "2TkC4Rto21DAGJCK3zUhzRVvs");
define("CONSUMER_SECRET", "qcJkxGKxwSTmuIURn9lyr4qs9RYt3RAMQ6a98Ca0vWMkVvWp5S");
define("OAUTH_TOKEN", $token);
define("OAUTH_SECRET", $tokensecret);


$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, OAUTH_TOKEN, OAUTH_SECRET);
$content = $connection->get('account/verify_credentials');

// $connection->post('statuses/update', array('status' => $message));

// $imagetmp = 'tmp/'.uniqid().'.png';
$imagetmp = 'tmp/image.png';

echo "Tweet envoyé:<br/><br/>";
echo $message;






file_put_contents($imagetmp, file_get_contents($url_image));
$image = realpath($imagetmp);


$url = 'https://upload.twitter.com/1.1/media/upload.json';
$method = 'POST';
$parameters = array(
    'media' => base64_encode(file_get_contents($image)),
);
$request = OAuthRequest::from_consumer_and_token($connection->consumer, $connection->token, $method, $url, $parameters);
$request->sign_request($connection->sha1_method, $connection->consumer, $connection->token);

$response = $connection->http($request->get_normalized_http_url(), $method, $request->to_postdata());
if ($connection->format === 'json' && $connection->decode_json) {
    $response = json_decode($response);
	
}
$mediaid = $response->media_id_string;

if ($url_image == null)
{
$connection->post('statuses/update', array('status' => $message));
echo "<br/><br/>Post SANS image<br/><br/>";
}

else

{
$connection->post('statuses/update', array('status' => $message, 'media_ids' => $mediaid));

echo "<br/><img src=".$imagetmp." width='650px' height='auto'></img>";
}



?>