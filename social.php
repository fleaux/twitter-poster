<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

</head>




<script type="text/javascript">
function open_win(){
	
var facebook = document.getElementById('description').value ;
var twitter = document.getElementById('description').value;
var image = document.getElementById('imageurl').value;
var twitterencoded = encodeURI(twitter);
var steam = document.getElementById('description').value;

// window.open('http://twitter.com/home?status='+twitterencoded, '_blank', 'width=500, height=220 left=400 top=10');
window.open('twitter/twitter_library/twitter2.php?message='+twitterencoded+'&image='+image, '_blank', 'width=500, height=220 left=400 top=10');

}

</script>


<u><b>TWITCH</u>:</b><br/>



<u><b>TWITTERegez</u>:</b><br/><br/>

<div style="width:650px;text-align:center;">
<textarea name="description" id="description" maxlength="140" style="width:300px; height:100px; padding:5px 10px 15px 5px;"></textarea><br/>
<!--<a href="http://www.facebook.com/sharer.php?u=http://www.thelastoflegend.fr/?p=385&amp;t=[E3] Les news d’ubisoft !" target="_blank">
<a href="http://steamcommunity.com/groups/inflamegamingcommunity/announcements/create" target="_blank">-->

<p id="textcount" style="width:285px; padding: 0px 10px 0px 5px;margin-top:-15px; font-size:11px;text-align:right;"></p>
<input type="text" name="imageurl" id="imageurl" style="width:300px;padding: 0px 10px 0px 5px;" placeholder="Image URL"></input><br/>
<input type="submit" onclick="open_win()" style="width:300px;margin-top:7px;"></input>
<!--</a>-->

</div>






<br/><br/>
<u><b>STEAM</u>:</b><br/>


<div>
	<div style="height:400px;padding-top:10px;">
	<iframe src="http://steamcommunity.com/groups/inflamegamingcommunity/announcements/create" 
style=" clip:rect(209px,1100px,830px,70px); position: absolute; margin-top:-210px;margin-left:-70px;" scrolling="no" width="650px" height="630px" frameborder="none"></iframe>
	</div>
</div>


<!--
<iframe src="http://steamcommunity.com/groups/inflamegamingcommunity/announcements/create" 
style="top:-209px; left:-70px; overflow:hidden;position: absolute;" scrolling="no" width="650px" height="610px" frameborder="none"></iframe>

-->


<script type="text/javascript">


setInterval(function(){

// var image = document.getElementById('imageurl').value;

// if ( image === undefined || image === null)
// {
	// var tweet = "140";
// }

// else
// {
	// var tweet = "117";
// }

var twitterlength = document.getElementById('description').value.length;
document.getElementById('textcount').innerHTML = twitterlength+"/140";
},50);



</script>


