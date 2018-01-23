/**
 * 
 */
$(function(){
	
	var str = '<div class="modal bounceIn animated" id="del" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">' + 
				'<div class="modal-dialog modal-sm">'+
				  '<div class="modal-content">'+
				      '<div class="modal-body modal-del">'+
				        '<div class="post text-center">数据删除无法恢复，确定删除？</div></div>'+
					      '<div class="modal-footer">'+
					        '<button type="button" class="btn btn-primary btn-sm J-del-true">删除</button>'+
					        '<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">取消</button>'+        
					      '</div>'+
				    '</div>'+
				  '</div>'+
				'</div>';

	$("body").append(str);
	
	var id = 0;
	$(".J-del").click(function(){
		id = $(this).attr("data-id");
	})

	$(".J-del-true").click(function(){
		var url = $("#J-del-url").val();
		$.ajax(url,{
			type:"post",
			dataType:"json",
			data:{ id:id },
			success:function(data){
				if(data.status==false){
					$("#myAlert").show().append(data.msg);
				}else{
					window.location.reload();					
				}
			}
		})
	});
})