<style>
#notification_count
{
padding: 0px 3px 3px 7px;
background: #cc0000;
color: #ffffff;
font-weight: bold;
margin-left: 85px;
border-radius:9px;
-moz-border-radius: 9px;
-webkit-border-radius: 9px;
position: absolute;
margin-top: -5px;
font-size: 10px;
}

#notification{
			  background-color: #EAF0F3;
				color: #061f2d;
				padding: 1% 1%;
				border: none;
				border-radius: 2%;
				cursor: pointer;
				box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
			}
</style>
 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
 
function addmsg(type, msg){
 
$('#notification_count').html(msg);
 
}
 
function waitForMsg(){
 
$.ajax({
type: "GET",
url: "select.php",
 
async: true,
cache: false,
timeout:50000,
 
success: function(data){
addmsg("new", data);
setTimeout(
waitForMsg,
1000
);
},
error: function(XMLHttpRequest, textStatus, errorThrown){
addmsg("error", textStatus + " (" + errorThrown + ")");
setTimeout(
waitForMsg,
15000);
}
});
};
 
$(document).ready(function(){
 
waitForMsg();
 
});
 
</script>
<span id="notification_count"></span>
<a href="showmsg.php"><input type="button" id="notification" value="Messages"></a>
<div id="HTMLnoti" style="textalign:center"></div>