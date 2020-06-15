$(function(){
	//for user Registration
	$("#regSubmit").click(function(){
		var fullName = $("#fullName").val();
		var userName = $("#userName").val();
		var password = $("#password").val();
		var email = $("#email").val();
		var dataString = 'fullName='+fullName+'&userName='+userName+'&password='+password+'&email='+email;
		$.ajax({
			type:"POST",
			url:"getregister.php",
			data:dataString,
			success:function(data){
				$("#state").html(data);
				setTimeout(function(){
					$("#state").fadeOut();
				}, 3000);
			}
		});
		return false;
	});

	//for user Login
	$("#loginSubmit").click(function(){
		var email = $("#email").val();		
		var password = $("#password").val();

		var dataString = 'email='+email+'&password='+password;
		$.ajax({
			type:"POST",
			url:"getlogin.php",
			data:dataString,
			success:function(data){
				if ($.trim(data) == "empty") {
					$(".empty").show();
					setTimeout(function(){
						$(".empty").fadeOut();
					}, 3000);
				}else if($.trim(data) == "disable"){
					$(".disable").show();
					setTimeout(function(){
						$(".disable").fadeOut();
					}, 3000);
				}else if($.trim(data) == "error"){
					$(".error").show();
					setTimeout(function(){
						$(".error").fadeOut();
					}, 3000);
				}else{
					window.location="exam.php";
				}
			}
		});
		return false;
	});

	//for user profile updating
	$("#updateBtn").click(function(){
		var fullName = $("#fullName").val();
		var userName = $("#userName").val();
		var email = $("#email").val();
		var dataString = 'fullName='+fullName+'&userName='+userName+'&email='+email;
		$.ajax({
			type:"POST",
			url:"getprofileupdate.php",
			data:dataString,
			success:function(data){
				$("#state").html(data);
				setTimeout(function(){
					$("#state").fadeOut();
				}, 3000);
			}
		});
		return false;
	});

	
});