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
				Handler:     $("#Handler").val(),
			},
			success:function(data) {
				switch(data) {
					case "1":
					case "2":
					case "5": 
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

