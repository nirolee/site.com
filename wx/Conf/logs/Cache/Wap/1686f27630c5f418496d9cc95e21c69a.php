<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta name="applicable-device" content="mobile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo ($staticPath); ?>/tpl/static/frontpage/css/stylefrontnew.css"  type="text/css" rel="stylesheet"/>
<link href="<?php echo ($staticPath); ?>/tpl/static/frontpage/css/annimatefront.css"  type="text/css" rel="stylesheet"/>
<script src="<?php echo ($staticPath); ?>/tpl/static/frontpage/js/jquery-1.7.2.js"></script>
<script src="<?php echo ($staticPath); ?>/tpl/static/frontpage/js/index.js"></script>
<style>
.sex div{   padding: 15px 0;line-height: 0;}
.vido ul li {  line-height: 0;  padding: 13px 0;}
</style>
</head>
<body class="play_content body_h">
<?php if($memberNotice != ''): echo ($memberNotice); endif; ?>
<article class="make content">
    <section class="make_banner"><img src="<?php echo ($staticPath); ?>/tpl/static/frontpage/images/zhizuo_03.png" /></section>
    <section class="head_img">
        <div class="head_bor"></div>
        <div class="head_img_t zoomIn"><img src="<?php echo ($wecha_pic); ?>" /></div></section>
    <section>
        <div class="make_input">
            <input value="请输入姓名" onfocus="if(value==&#39;请输入姓名&#39;) {this.value=&#39;&#39;; this.style.color=&#39;#26e8a9&#39;}" onblur="if(value==&#39;&#39;) {this.value=&#39;请输入姓名&#39;;this.style.color=&#39;#26e8a9&#39;}" name="frontpage_name" style="color:#26e8a9"/>
        </div>
		<div  class="check clearfix">
            <div class="check_left" ><span>
                <input type="radio" id="define_news" name="news_type" value="1">
                <label name="nba" class="checked" for="define_news"> </label>
                </span>随机生成事件</div>
            <div class="check_right" ><span>
                <input type="radio" id="custom_news" name="news_type" value="2">
                <label name="nba" class=" " for="custom_news"> </label>
                </span>自定义事件</div>
        </div>
        <div class="make_text" style="display:none;">
            <div class="make_list clearfix">
                <div class="make_list_t">标题</div>
				<input value="不超过10个字" onfocus="if(value==&#39;不超过10个字&#39;) {this.value=&#39;&#39;; this.style.color=&#39;#26e8a9&#39;}" onblur="if(value==&#39;&#39;) {this.value=&#39;不超过10个字&#39;;this.style.color=&#39;#26e8a9&#39;}" name="news_title" style="color:#26e8a9;margin-left:9px;"/>
            </div>
            <div class="make_list clearfix">
                <div class="make_list_t">内容</div>
				<textarea value="" name="news_txt" style="color:#26e8a9" id="news_txt"/>不超过200个字</textarea>
 
            </div>
        </div>
		<div class="sex clearfix">
		    <div class="sex_m sex_curn" per="1">男</div>
		    <div class="sex_w" per="0">女</div>
        </div>
        <div class="make_button">
		<?php if($notice_content != '' && $notice_content == 'no_follow'): ?><button class="pulse" onclick="anchor_follow();">生成头条新闻</button>
		<?php elseif($notice_content != '' && $notice_content == 'no_register'): ?>
		<button class="pulse" onclick="anchor();">生成头条新闻</button>
		<?php else: ?>
		 <button class="pulse" id="makenews">生成头条新闻</button><?php endif; ?>
        </div>
    </section>
</article>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	$("#makenews").click(function(){
		var frontpage_name = $(":input[name='frontpage_name']").val();
		var per = $(".sex_curn").attr('per');
		var news_type =  $(":input[name='news_type']:checked").val() ? $(":input[name='news_type']:checked").val() : 1; 
		var news_title = $(":input[name='news_title']").val(); 
		var news_txt = $(":input[name='news_txt']").val();
		if(frontpage_name == '请输入姓名' || frontpage_name == ""){
			alert('请输入姓名');
			return false;
		}
		if(news_type == 2){
			if(news_title == "" || news_title == '不超过10个字'){
				alert('新闻标题不能为空');
				return false;
			}else if(news_title.length > 10){
				alert('新闻标题不超过10个字');
				return false;
			}
			if(news_txt == "" || news_txt == '不超过200个字'){
				alert('新闻内容不能为空');
				return false;
			}else if(news_txt.length > 200){
				alert('新闻内容不超过200个字');
				return false;
			}
		}
		$.ajax({
			type:'POST',
			data:"frontpage_name="+frontpage_name+"&per="+per+"&news_type="+news_type+"&news_title="+news_title+"&news_txt="+news_txt+"&token=<?php echo ($token); ?>&userid=<?php echo ($userid); ?>&action_id=<?php echo ($action_id); ?>",
			url:"/index.php?g=Wap&m=FrontPage&a=MakeNews",
			beforeSend: function(){
				$(".pulse").attr("disabled","disabled");
				$(".pulse").text("生成中请稍后...");
			},
			success:function(json){
				obj = eval( '('+json+')');
				if(obj.status == 'success'){
					window.location.href='/index.php?g=Wap&m=FrontPage&a&a=loadingNews&newsid='+obj.msg+'&token=<?php echo ($token); ?>&id=<?php echo ($action_id); ?>&opentype=mynews';
				}else if(obj.status == 'error'){
					alert(obj.msg);
				}
			},
			complete:function(){ 
				$(".pulse").removeAttr("disabled");
				$(".pulse").text("生成头条新闻");
			}
		})
	});
	//隐藏提醒关注注册弹框
	$(".close").click(function(){
		$("#no_follow").hide();
	});
	
	$("#news_txt").focus(function(){
		if($(this).val() == '不超过200个字'){
			$("#news_txt").val('');
			$("#news_txt").text('');
		}
	});
	$("#news_txt").blur(function(){
		if($(this).val() == ""){
			$("#news_txt").val('不超过200个字');
			$("#news_txt").text('不超过200个字');
		}
	});
});

//锚点
function anchor(){
	$("#TopTipHolder").show();
	if($("#TopTipHolder").css('height') == '0px'){
		$("#TopTipClose").click();//执行关闭
		$("#TopTipHolder").css('height','35px');//弹出
	}
}
function anchor_follow(){
	$("#fly_page").show();
}
</script>
<script>
window.shareData = {  
	"moduleName":"FrontPage",
	"moduleID":"<?php echo ($actioninfo["id"]); ?>",
	"imgUrl": "<?php echo ($actioninfo["reply_pic"]); ?>", 
	"timeLineLink": "<?php echo ($f_siteUrl); echo U('FrontPage/index',array('token'=>$actioninfo['token'],'id'=>$actioninfo['id']));?>",
	"sendFriendLink": "<?php echo ($f_siteUrl); echo U('FrontPage/index',array('token'=>$actioninfo['token'],'id'=>$actioninfo['id']));?>",
	"weiboLink": "<?php echo ($f_siteUrl); echo U('FrontPage/index',array('token'=>$actioninfo['token'],'id'=>$actioninfo['id']));?>",
	"tTitle": "<?php echo (sharefilter($actioninfo['custom_sharetitle'])); ?>",
	"tContent": "<?php echo (sharefilter($actioninfo['custom_sharedsc'])); ?>",
	"fTitle": "<?php echo (sharefilter($actioninfo['custom_sharedsc'])); ?>",
	"isShareNum":1,
	"ShareNumData":"frontpage_action,id,<?php echo ($actioninfo["id"]); ?>,sharecount",
};
</script>
<?php echo ($shareScript); ?>