<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<!-- saved from url=(0055)http://www.zqianqian.cn/index.php/Club/user/invite.html -->
<!DOCTYPE html PUBLIC "" "">
<HTML>
<HEAD>
<META content="IE=10.000" 
http-equiv="X-UA-Compatible">
<META charset="utf-8">
<TITLE>红包藏宝图</TITLE>
<META name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
<META name="apple-mobile-web-app-capable" content="yes">
<META name="apple-mobile-web-app-status-bar-style" content="black">
<LINK 
href="tpl/static/adcms/font-awesome.min.css" rel="stylesheet" type="text/css">
<LINK href="tpl/static/Hongbaoqiye/mui.min.css" rel="stylesheet">
<SCRIPT src="tpl/static/Hongbaoqiye/jquery-1.10.2.min.js" type="text/javascript"></SCRIPT>
<LINK href="tpl/static/Hongbaoqiye/style.css" rel="stylesheet">
<META name="GENERATOR" content="MSHTML 10.00.9200.16660">
</HEAD>
<!--<body oncontextmenu="return false" onselectstart="return false">-->

<BODY>
<DIV class="mui-content" style="background:black">
  <DIV class="notice" style="padding: 15px;"> 
    <!--<P>复制以下链接发送给好友注册：</P><TEXTAREA style="border: currentColor; height:120px">http://<?php echo $_SERVER['HTTP_HOST'] ?>/index.php?g=Wap&m=Adcms&a=index&token=<?php echo ($token); ?>&invite1=<?php echo ($fans["wecha_id"]); ?></TEXTAREA>-->
    <?php if($info == '' ): ?><button   class="mui-btn mui-badge-warning mui-btn-block">
    <a style="color:white" href="index.php?g=Wap&m=Hongbaoqiye&a=cbt&token=<?php echo ($token); ?>&wecha_id=<?php echo ($wecha_id); ?>">点击查看我的红包藏宝图</a>
    </button>
   <?php else: ?>
    <button   class="mui-btn mui-badge-warning mui-btn-block">长按图片保存到手机</button>
    <img style="width: 100%; max-width: 100%;" src="<?php echo ($info); ?>" />
    <button   class="mui-btn mui-badge-warning mui-btn-block">将您的红包藏宝图分享给您的好友</button><?php endif; ?>
  </DIV>
</DIV>
</BODY>
</HTML>