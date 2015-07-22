<head>
<meta charset="UTF-8"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>


<div id="twittersignin"></div>






<?

require_once 'twitter_library/twitteroauth.php';

session_start();

if(isset($_SESSION['name']))
	
{
	
echo "<div style='width:650px;text-align:center;margin-bottom:20px;padding-top:20px;'><u><b>TWITTER</u>:</b><br/><br/><a href='logout.php'><img src='img/twitter_logout.png'></img></a></div>";
	

?>

<script type="text/javascript">
function open_win(){
	
var facebook = document.getElementById('description').value ;
var twitter = document.getElementById('description').value;
var twitterencoded = encodeURI(twitter);
var image = document.getElementById('imageurl').value;

var steam = document.getElementById('description').value;

window.open('twitter_library/twitter.php?message='+twitterencoded+'&image='+image, '_blank', 'width=500, height=220 left=400 top=10');

}

</script>



<div style="width:650px;text-align:center;">
<div style="text-align:center;width:300px;height:50px; margin:auto;margin-bottom:5px;">
	<div style="float:left;height:50px;line-height:50px;"><u>Compte</u>: <font style="color:#207cca;"><b><? echo $_SESSION['name'];?></b></font></div>
	<div style="float:right;height:50px;"><img src="<? echo $_SESSION['image']; ?>"></img></div>
</div>
<textarea name="description" id="description" placeholder="Message du tweet" style="width:300px; height:100px; padding:5px 10px 15px 5px;"></textarea><br/>

<p id="textcount" style="width:455px; padding: 0px 10px 0px 5px;margin-top:-15px; font-size:11px;text-align:right;"></p>
<input type="text" name="imageurl" id="imageurl" style="width:300px; height:25px; padding: 0px 10px 0px 5px;" placeholder="Image URL"></input><br/>
<input type="submit" onclick="open_win()" style="width:300px; height:25px; border:none;margin-top:7px;margin-bottom:20px;background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#3c92d8), color-stop(50%,#3c92d8), color-stop(51%,#207cca), color-stop(51%,#207cca), color-stop(52%,#207cca), color-stop(100%,#207cca));
  background: -webkit-linear-gradient(top, #3c92d8 0%,#3c92d8 50%,#207cca 51%,#207cca 51%,#207cca 52%,#207cca 100%);
  background: -o-linear-gradient(top, #3c92d8 0%,#3c92d8 50%,#207cca 51%,#207cca 51%,#207cca 52%,#207cca 100%);
  background: -ms-linear-gradient(top, #3c92d8 0%,#3c92d8 50%,#207cca 51%,#207cca 51%,#207cca 52%,#207cca 100%);
  background: linear-gradient(to bottom, #3c92d8 0%,#3c92d8 50%,#207cca 51%,#207cca 51%,#207cca 52%,#207cca 100%);
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3c92d8', endColorstr='#207cca',GradientType=0 );color:#ffffff; font-weight:bold;cursor:pointer"></input>
<!--</a>-->

</div>







<script type="text/javascript">


setInterval(function(){

var imagelength = document.getElementById('imageurl').value.length;

if ( imagelength === 0)
{
	var tweet = "140";
}

else
{
	var tweet = "117";
}

var description = document.getElementById('description');
description.setAttribute('maxLength', tweet);
var twitterlength = document.getElementById('description').value.length;



var descriptionvalue = document.getElementById('description').value;
var twitter = descriptionvalue.substring(0, tweet);
description.value = twitter;



document.getElementById('textcount').innerHTML = twitterlength+"/"+tweet;
},50);



</script>


<?


}

else {
	//LIEN DE CONNECTION QUI S'AFFICHE SI VOUS ETES DECONNECTE.
	echo '<script type="text/javascript">$("#twittersignin").load("login.php");</script><br/><br/>';
	
}



?>
