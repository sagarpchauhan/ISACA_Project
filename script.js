		function waitForMsg1(){
			 
			$.ajax({
			type: "GET",
			url: "select.php",
			 
			async: true,
			cache: false,
			timeout:50000,
			 
			success: function(data){
			addmsg("new", data);
			setTimeout(
			waitForMsg1,
			1000
			);
			},
			error: function(XMLHttpRequest, textStatus, errorThrown){
			addmsg("error", textStatus + " (" + errorThrown + ")");
			setTimeout(
			waitForMsg1,
			15000);
			}
			});
			};
			 
			$(document).ready(function(){
			 
			waitForMsg1();
			 
			});