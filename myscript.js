			function waitForMsg(){
			 
			$.ajax({
			type: "GET",
			url: "pducount.php",
			async: true,
			
			success: function(){
			setTimeout(
			waitForMsg,
			5000
			);
			}
			 
			});
			};
			 
			 
			 
			$(document).ready(function(){
			 
			waitForMsg();
			
			});