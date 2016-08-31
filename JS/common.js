/*index.html*/

window.onload = function() {	
	$("body").css("height", window.innerHeight + "px");
	$(".icon").show(1000).animate({
		"top": "250px",
	}, 1000, function() {
		$(this).animate({
			"left": "20%",
		}, 500, function() {
			$(".para1").show(500);
		});
	});

	$(".icon").mouseup(function() {
		$(".para2").css("top", $(".icon").css("top"));
		$(".para1").hide(500, function() {
			$(".icon").animate({
				"left": "20%",
			},function () {
				$(".para2").show(500).delay(1000).hide(500, function() {
					$(".icon").animate({
						"left": "40%",
					});
				});
			});
		});
	});
	
	$(".up-signup").click(function() {
		window.location.href = "SignUp.html";
	});
	$(".down-inquiry").click(function() {
		$(".para1").hide();
		$("para2").hide();
		$(".icon").animate({
			"left": "40%",
			"top": "200px",
		});
		$(".down-inquiry").parent(".down-left").parent(".down-double").animate({
			"marginLeft": "-100%",
		});
	});
	
	$("#Dormitory").focus(function() {
		$(this).attr("value", "c");
	});
	
	$(".line-grow").animate({
		width: "100%",
	}, 1000);
	
	$("input").each(function() {
		$(this).blur(function() {
			if($(this).val() != "") {
				$(this).addClass("input-valued");
				$(this).parent("div").children("label").addClass("label-color");
			}
			else {
				$(this).removeClass("input-valued");
				$(this).parent("div").children("label").removeClass("label-color");
			}
		});
	});
	
  	$('.datepicker').pickadate({
   	 	selectMonths: true, // Creates a dropdown to control month
    	selectYears: 50 // Creates a dropdown of 15 years to control year
  	});

/*下拉表单*/

	function dischoice(first, second, govern, tech) {
		$(first).click(function() {
			if($(first).val()>4) {
				$(tech).attr("disabled", "disabled");
				$(second).children(govern).children("option").each(function() {
					$(this).removeAttr("disabled");
				});
			} else {
				$(second).children(govern).children("option").each(function() {
					$(this).removeAttr("disabled");
					if($(this).index() == $(first).val() - 1) {
						$(this).attr("disabled", "disabled");
					}
				});
				$(tech).removeAttr("disabled");
			}
		});
	}
	
	dischoice("#FirstChoice", "#SecondChoice", ".govern", ".tech" );
	dischoice("#SecondChoice", "#FirstChoice", ".first-govern", ".first-tech" );
	
	
//	$("#FirstChoice, #SecondChoice").click(function() {
//		if($("#FirstChoice").val()>4) {
//			$(".tech").attr("disabled", "disabled");
//			
//		} else {
//			$("#SecondChoice").children(".govern").children("option").each(function() {
//				$(this).removeAttr("disabled");
//				if($(this).index() == $("#FirstChoice").val() - 1) {
//					$(this).attr("disabled", "disabled");
//				}
//			});
//			$(".tech").removeAttr("disabled");
//		}
//	});
	
	/*表单验证*/
	function inputnull() {
		
	}
	function isTel(str) {
		var reg = /^1[3|4|5|7|8]\d{9}$/;
		return reg.exec(str);
	}

	function isDorm(str) {
		var reg = /^[c|C][4|8]$|^[c|C]12$/;
		return reg.exec(str);
	}
	
	function isQQ(str) {
		var reg = /^[1-9]\d{4,9}$/;
		return reg.exec(str);
	}
	var clickxhr = function () {
		
		$("#btn").click(function() {
		
		if(!$("#Name").val()) {
			alert("请填写姓名！");
			return false;
		}
		if(!isTel($("#PhoneNumber").val())) {
			alert("请填写正确的手机号！");
			return false;
		}
		
		if(!isDorm($("#Dormitory").val())) {
			alert("请填写正确的宿舍楼！");
			return false;
		}
		
		if(!isQQ($("#QQNumber").val())) {
			alert("请填写正确的QQ号！");
			return false;
		}
		
	});
	};
}
