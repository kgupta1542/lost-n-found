$(document).ready(function(){
	    $("#menu").click(function(){
	        if($("#geoffrey").css("margin-left") == "-225px"){
		    	$("#geoffrey").css("margin-left","0px");
	        }
			else{
				$("#geoffrey").css("margin-left","-225px");
		    }
		});
	    $("#dropdown").click(function(){
			$("#personal").toggleClass("display").toggleClass("inline");
	    });
	    $(".joe").click(function(){
	    	var id = $(this).data("id");
	    	$(this).siblings("#desc-" + id).toggleClass("display");
	    	$(this).siblings("#desc1-" + id).toggleClass("display");
		    
	    	  $("#joe" + id).text() == $("#joe" + id).data("text-swap") 
	    	    ? $("#joe" + id).text($("#joe" + id).data("text-original")) 
	    	    : $("#joe" + id).text($("#joe" + id).data("text-swap"));
		});
	    $(".flag").click(function(){
	    	var id = $(this).data("id");
	    	
	    	  $("#flag" + id).css("color") == "rgb(0, 0, 0)" 
	    	    ? $("#flag" + id).css("color","rgb(255, 0, 0)") 
	    	    : $("#flag" + id).css("color","rgb(0, 0, 0)");
		});
	    $(".expand").click(function(){
	    	var id = $(this).data("id");
		    
	    	$("#expand" + id).css("color") == "rgb(0, 0, 0)" 
    	    	? $("#expand" + id).css("color","rgb(255, 0, 0)") 
    	    	: $("#expand" + id).css("color","rgb(0, 0, 0)");
		});
	});

	function myFunction(){
		$('#bobby').replaceWith('#bob');
	}
	function setCookie(cname,cvalue){
	    document.cookie = cname + "=" + cvalue + ';expires= ;';
	}

	var screen_res = screen.width;

	setCookie("screen_res",screen_res);
	
