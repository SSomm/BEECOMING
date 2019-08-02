<?php
?>

<!DOCTYPE html>
<html>
<head>
	<title>테스트 할거에요. </title>
	<link rel="stylesheet" type="text/css" href="font.css">
	<script type="text/javascript" src="../libs/jquery-3.3.1.min.js"></script>
	<script>
$(document).ready(function(){
	$(document).on("click",".test", function(){
		// alert("aa");
			var find_user="admin";
				// alert(find_user);
			$.ajax({
					type:"POST",
					url:"../php/search_member.php",
					data:{find_user:find_user},
					dataType:"json",
					success:function(response){
						// alert(response.member);
						// alert("aa");
						$.each(response.member, function(key, value){
							alert(value.curator);
						});	
						// alert(response.member);

		}
	})
	});

});
	</script>
</head>
<body>
	<div class="userbox">
	<p class="test">
	 	json test
	</p>
	</div>
</body>
</html>