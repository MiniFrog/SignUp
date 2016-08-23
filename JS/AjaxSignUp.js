alert(111);
$(document).ready(function (){
	$("#btn").click(function () {
		$.ajax({
			url:"../index.php",
			type:"post",
			data:
			{
				Name:        		$("#Name").val(),
				Sex:     	 		$("#Sex").val(),
				Birthday:    		$("#Birthday").val(),
				ClassNumber: 		$("#ClassNumber").val(),
				Dormitory:   		$("#Dormitory").val(),
				Room:     			$("#Room").val(),
				PhoneNumber:     	$("#PhoneNumber").val(),
				ShortPhoneNumber:   $("#ShortPhoneNumber").val(),
				QQNumber:     		$("#QQNumber").val(),
				FirstChoice:    	$("#FirstChoice").val(),
				SecondChoice:       $("#SecondChoice").val(),
				AceptSwap:     		$("#AceptSwap").val(),
				Interest:     		$("#Interest").val(),
				SelfConception:     $("#SelfConception").val(),
				SectorAwareness:    $("#SectorAwareness").val(),
				Experience:     	$("#Experience").val(),
				Handler:			$("#Handler").val(),
			},
			success:function(data) {
				switch(data) {
					case "0" 
						alert(data);
						break;
					case "1":
					case "2":
					case "5": 
						alert(data);
						break;
				}
			},
			error:function() {
				alert("strange");
			},
		});
	});
});