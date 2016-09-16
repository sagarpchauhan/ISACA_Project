		function waitForMsg2(){
			 
			$.ajax({
			type: "GET",
			url: "ttpduecho.php",
			 
			async: true,
			cache: false,
			timeout:50000,
			 
			success: function(data){
			var result = $.parseJSON(data);
			print(result[0]);
			print1(result[1]);
			print2(result[2]);
			setTimeout(
			waitForMsg2,
			1000
			);
			},
			
			});
			};
			 
			$(document).ready(function(){
			 
			waitForMsg2();
			 
			});