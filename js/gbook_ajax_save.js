$("#gname").focus(function(){
	$(".name").css("display","none");
});
$("#gcontent").focus(function(){
	$(".gcontent").css("display","none");
});
$('#submit').click(function(){
	var name = $("#gname").val();
	var id = $("#pid").val();
	var content = $("#gcontent").val();
	if (!name == "" && !content == "") {
		$.ajax({
			url: "./addgbook",
			type: "POST",
			dataTypes: "json",
			async: false,
			data: { gname : name , pid : id , gcontent : content },
			success: function(){
				$('#gbook_view').prepend('<ul class="form-control gview"><li> '+name+' 在 剛剛 說:</li><li>'+content+'</li></ul>');
				$("#form-control").find(":text,textarea").each(function() {
					$(this).val("");
				});
			},
		});
	}else{
		if(name == "" && !content == ""){
			$(".name").css("display","inline-block");
		}else if(!name == "" && content == ""){
			$(".gcontent").css("display","inline-block");
		}else{
			$(".required").css("display","inline-block");
		}
	};	
});
function del_g (gid) {
	$.confirm({
		text: "真的要刪掉這則留言嗎?",
		title: "等等!!",
		confirm: function(button) {
			$.ajax({
				url: "./del_gbook/"+gid,
				success: function(){
					$("#gid"+gid).css('display','none');
				}
			});
		},
		confirmButton: "刪掉吧",
		cancelButton: "不要好了",
		post: true
	});
};