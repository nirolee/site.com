var key = getCookie("key");
var name = getQueryString('n');
var member_id = getQueryString('m');
var time = getQueryString('t');

$(function() {
	
	get_goods_info();

	
});

function get_goods_info() {
	
	$.ajax({
		
		type : 'GET',
		url : ApiUrl + '/index.php?act=get_greeting_cards&op=get_goods_info',
		data : {'m':member_id,'t':time},
		dataType : 'json',
		
		success : function(data) {
			
			if (!data) {
				data.datas = [];
				data.datas.goods_id = "";
				data.datas.goods_name = "";
				data.datas.goods_spec = "";
				data.datas.goods_image = "";
			}
			
			if(data.datas.status == 0) {
				
				$.sDialog({
					skin: "red",
					content: "无效商品",
					okBtn: true,
					cancelBtn: true,
					okFn: function () {
						jump_comfig_page('querenjieshou.html');
					},
					cancelFn: function () {
						jump_comfig_page('querenjieshou.html');
					}
					
				})
				
			}
			
			
			var goods_info_html = "";
			goods_info_html = template.render("goods_info_model", data.datas);
			$("#goods_info").prepend(goods_info_html);
	
			$("#varea_info").click(
				function() {
					$.areaSelected({
						success: function(e) {
							city_id = e.area_id_2 == 0 ? e.area_id_1: e.area_id_2;
							area_id = e.area_id;
							area_info = e.area_info;
							$("#varea_info").find('i[class="suozaidiqu"]').text(e.area_info);
							$("#varea_info").find('input[name="area"]').val(e.area_info);
						}
					})
				}
			);

		}
	});
	
}

//设置订单地址
function check_order_address() {
	
	if($('#check_reciver_name').val() == null || $('#check_reciver_name').val() == "") {
		
		$('#error_info').text('*姓名不能为空');
		return false;
		
	}
	
	if($('#check_mob_phone').val() == null || $('#check_mob_phone').val() == "") {
		
		$('#error_info').text('*电话不能为空');
		return false;
		
	}
	
	if($('#check_area').val() == null || $('#check_area').val() == "") {
		
		$('#error_info').text('*地区不能为空');
		return false;
		
	}
	
	if($('#check_address').val() == null || $('#check_address').val() == "") {
		
		$('#error_info').text('*地址不能为空');
		return false;
		
	}
	
	$('#error_info').text('');
	
	$.sDialog({
		skin: "red",
		content: "确认提交发货吗？",
		okBtn: true,
		cancelBtn: true,
		okFn: function () {
			send_order_address();
		}
	})
		
}

function send_order_address() {
	
	var from_data = $('#send_address').serialize();
	from_data += '&m='+member_id+'&t='+time;
	
	$.ajax({
		
		type : 'POST',
		url : ApiUrl + '/index.php?act=get_greeting_cards&op=update_order_address',
		data : from_data,
		dataType : 'json',
		
		success : function(data) {
			
			if(data.datas.status == 1) {
				
				$('#comfig_model').css('display','block');
				
			}

		}
	});
	
}

function jump_comfig_page(html) {
	var name = $('#check_reciver_name').val();
	var src = $('#goods_image_src').attr("src");
	window.location.href = WapSiteUrl + '/gift/' + html + '?name='+name+'&src='+src+'&m='+member_id+'&t='+time;
	
}