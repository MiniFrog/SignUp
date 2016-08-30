$(document).ready(function (){
	$("#btn").click(function () {
		$.ajax({
			url:"../index.php",
			type:"post",
			data:
			{
				Name:        $("#Name").val(),
				Dormitory:   $("#Dormitory").val(),
				Room:        $("#Room").val(),
				//hidden value:Inquiry
				Handler:     $("#Handler").val(),
			},
			success:function(data) {
				switch(data) {
					case "1"://数据有误
					case "2"://查询不到
					case "5": //服务器内部错误
						alert(data);
						break;
					default:
						var result = eval(data);
						//It is just an example
						alert(result[0].Name);
						break;
				}
			},
			error:function() {
				alert("strange");
			},
		});
	});
});

