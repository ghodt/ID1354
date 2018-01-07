
$(document).ready(function(){
	
	$("form#write-comment").submit(function(e){
		
		var storeUrl = "storecomment.php";
		var recipe = $("#recipe").val();
		
		if($("#comment-box").val() === ""){
			alert("You should write something first.")
		} else{
			$.ajax({
			   type: "POST",
			   url: storeUrl,
			   data: $("form#write-comment").serialize(),
			   success: function(data)
			   {
				   alert(data); // show if comment was sent or not
				   $("#comment-box").val("");
				   readComments(recipe);

			   }
			});
		}
		
		e.preventDefault(); // avoid to actually submit the form.
			
	});
	
});

function readComments(recipe){
	$.ajax({
		type: "POST",
		url: "loadcomments.php",
		data: {'recipe':recipe},
		success: function(comments){   

			$("#comments").html(comments);
			//alert(comments);
		}
	});
}