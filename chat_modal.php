<style type="text/css">
	.chat_modal{
		position: fixed;
		right: 0;
		bottom: 0;
		z-index: 699;
		width: 345px;
		height: 500px;
	}
	.chat_wrap{
		width: 100%;
		height: 100%;
		position: relative;
	}
</style>

<div class="chat_modal" style="display: none;">
	<div class="chat_wrap">
		<script type="text/javascript">
			$.get("./php_chat_1/index.php",function(data){
				$(".chat_modal").append(data);
			});
			$(document).ready(function(){
				var flag = 0;
				$(document).on("click",".chat_toggle",function(){
					if(flag == 0){
						$('#sidepanel').stop().fadeIn();
						$(this).html('<i class="fas fa-sign-out-alt"></i> 닫기');
						flag = 1;
					}else{
						$('#sidepanel').stop().fadeOut();
						$(this).text("큐레이터 검색");
						flag = 0;
					}
				});
				$(document).on("click",".close_btn",function(){
					$(".chat_modal").stop().fadeOut();
				});
				$(document).on("click",".minus_btn",function(){
					$(".chat_modal").stop().fadeOut();
					$(".chat_window_toggle").stop().fadeIn();
				});
				$(document).on("click",".chat_window_toggle",function(){
					$(".chat_modal").stop().fadeIn();
					$(".chat_window_toggle").stop().fadeOut();
				});
				
			});
		</script>
	</div>
	
</div>
<div class="chat_window_toggle" style="display: none;">
	<i class="fa fa-paper-plane" aria-hidden="true"></i>
</div>