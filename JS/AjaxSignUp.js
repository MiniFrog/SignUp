function ajaxCheckOut() {
	$(document).ready(function (){
				$.ajax({
					url:"index.php",
					type:"post",
					data:
					{
						Name:        		$("#Name").val(),
						Sex:     	 		$(".Sex").val(),
						Birthday:    		$("#Birthday").val(),
						ClassNumber: 		$("#ClassNumber").val(),
						Dormitory:   		$("#Dormitory").val(),
						Room:     			$("#Room").val(),
						PhoneNumber:     	$("#PhoneNumber").val(),
						ShortPhoneNumber:   $("#ShortPhoneNumber").val(),
						QQNumber:     		$("#QQNumber").val(),
						FirstChoice:    	$("#FirstChoice").val(),
						SecondChoice:       $("#SecondChoice").val(),
						AceptSwap:     		$(".AceptSwap").val(),
						Interest:     		$("#Interest").val(),
						SelfConception:     $("#SelfConception").val(),
						SectorAwareness:    $("#SectorAwareness").val(),
						Experience:     	$("#Experience").val(),
						//hidden value:SignUp
						Handler:			$("#Handler").val(),
					},
					success:function(data) {
						switch(data) {
							case "0"://ok
								alert('报名成功！');
								break;
							case "1"://用户信息有误
								alert('输入信息有误!');
								break;
							case "2"://数据库已经有相同的信息了
								alert('请勿重复报名!');
								break;
							case "5": //服务器内部错误
								alert('未知的系统错误，请稍候再试!');
								break;
						}
					},
				});
	});	
};
