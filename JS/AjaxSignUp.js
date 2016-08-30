$(document).ready(function (){
	$("#btn").click(function () {
		$.ajax({
			url:"../index.php",
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
						alert(data);
						break;
					case "1"://用户信息有误
					case "2"://数据库已经有相同的信息了
					case "5": //服务器内部错误
						alert(data);
						break;
				}
			},
		});
	});
});