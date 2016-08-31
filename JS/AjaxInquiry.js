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
						alert('您输入的数据有误!');
						break;
					case "2"://查询不到
						alert('查询不到对应的报名信息!');
						break;
					case "5": //服务器内部错误
						alert('服务器内部错误!');
						break;
					default:
						var result = eval(data);
						//It is just an example
						alert(result[0].Name+'同学已经报名成功!');
						break;
				}
			},
		});
	});
});

