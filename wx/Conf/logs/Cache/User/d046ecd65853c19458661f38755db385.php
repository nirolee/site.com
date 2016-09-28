<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> <?php echo ($f_siteTitle); ?> <?php echo ($f_siteName); ?></title>
<meta name="keywords" content="<?php echo ($f_metaKeyword); ?>" />
<meta name="description" content="<?php echo ($f_metaDes); ?>" />
<meta http-equiv="MSThemeCompatible" content="Yes" />
<script>var SITEURL='';</script>
<script src="<?php echo RES;?>/js/common.js" type="text/javascript"></script>
<script src="<?php echo ($staticPath); ?>/tpl/static/newswelcome/js/jquery-1.10.2.min.js"  type="text/javascript"></script>
<script src="<?php echo STATICS;?>/jquery-1.4.2.min.js" type="text/javascript"></script>
<?php if($usertplid == 0){ ?>
    <link href="<?php echo ($staticPath); echo ltrim(RES,'.');?>/css/style.css?id=103" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); echo ltrim(RES,'.');?>/css/style_2_common.css?BPm" />
<?php }elseif($usertplid == 1){ ?>
    <link href="<?php echo ($staticPath); echo ltrim(RES,'.');?>/css/style-<?php echo ($usertplid); ?>.css?id=103" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); echo ltrim(RES,'.');?>/css/style_2_common.css?BPm" />
<?php }else{ ?>
    <script src="<?php echo ($staticPath); ?>/tpl/static/new/js/jquery-2.1.1.js"></script>
    <link href="<?php echo ($staticPath); echo ltrim(RES,'.');?>/css/style-<?php echo ($usertplid); ?>.css?id=103" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo ($staticPath); echo ltrim(RES,'.');?>/css/style_2_common_2.css?BPm" />
    <link href="<?php echo ($staticPath); ?>/tpl/static/new/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo ($staticPath); ?>/tpl/static/new/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo ($staticPath); ?>/tpl/static/new/css/style.css" rel="stylesheet">
        <style>
    .animated {
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        margin-left: 13px;
        margin-right: 5px;
    }
    @-webkit-keyframes fadeInRight {
        0% {
            opacity: 0;
            -webkit-transform: translateX(200px);
            transform: translateX(200px);
        }

        100% {
            opacity: 1;
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }
    }
    .fadeInRight {
        -webkit-animation-name: fadeInRight;
    }

    .alink a:link {color: #fff}
    .alink a:hover {color: #000}
    .pace-done{min-width:1345px;overflow-x:auto;}
    .alert h4 {color: #000;}
    </style>
<?php } ?>
<style type="text/css">
  .welcome1{
    border: 1px solid #EAEAEA;
    position: relative;
  }
  .welcome1 li{
    float: left;  
    height: 50px;
    width: 12.323%; 
    text-align:center;
    /*font-weight: bold;*/
    position: relative;
    font-size: 1.25em;
    border: 1px solid #DFDFDF;
    background: #F3F3F3;
  }
  .welcome1 ul{
    /*max-width: 981px;*/
  }
  .welcome1 li a{
    line-height:3.5;
  }
  .welcome1 li.tab-current{
    border-right:0;   
    border-left:0;
    border-bottom:0;
    background: none;
  }
  .content1{
    margin:80px auto;
    top:80px;
  }
  .img1{
    margin: 60px 29px 0px 29px;
    width:120px;
    height:150px;
    float: left;
    text-align: center;
  }
  .img1 a {
    line-height: 50px;
  }
  .img1 a:hover{
    text-decoration:none;  
  } 
   .content ul li.guanzhu {
  color: #fff;
    float: left;
    height: 96px;
    margin-right: 1px;
    overflow: hidden;
    width: 24.8%;
    background:#7cbae5;
  }

 .content ul li.huiyuanka {
  color: #fff;
    float: left;
    height: 96px;
    margin-right: 1px;
    overflow: hidden;
    width: 24.8%;
    background:#cec0f4;
  }
 .content ul li.liulan {
  color: #fff;
    float: left;
    height: 96px;
    margin-right: 1px;
    overflow: hidden;
    width: 24.8%;
    background:#81d2cf;
  }
 .content ul li.fangke {
  color: #fff;
    float: left;
    height: 96px;
    margin-right: 1px;
    overflow: hidden;
    width: 24.8%;
    background:#92bf77;
  }
 .content ol li{
  float: left;
    height:120px;
    overflow: hidden;
    width:120px;
  padding:0px 15px;
  }
 .content ul li.guanzhu a,
 .content ul li.huiyuanka a,
 .content ul li.liulan a,
 .content ul li.fangke a
 {
    color: #fff;
    display: block;
    font-size:22px;
    height: 96px;
    overflow: hidden;
    /*width: 224px;*/
    padding-top:10px;
  text-align:center;
}
 .content ul li a:hover {
  text-decoration:none;
}
</style>
<style>
.topbg{background:url(<?php echo ($staticPath); ?>/tpl/static/newskin/images/top.gif) repeat-x; height:101px; /*box-shadow:0 0 10px #000;-moz-box-shadow:0 0 10px #000;-webkit-box-shadow:0 0 10px #000;*/}
.top {
    margin: 0px auto; width: 988px; height: 101px;
}
.toplink{ height:30px; line-height:27px; color:#999; font-size:12px;}
.toplink .welcome{ float:left;}
.toplink .memberinfo{ float:right;}
.toplink .memberinfo a{ color:#999;}
.toplink .memberinfo a:hover{ color:#F90}
.toplink .memberinfo a.green{ background:none; color:#0C0}

.logo { color: #333; height:70px; font-size:16px;}
h1{ font-size:25px;float:left; width:230px; margin:0; padding:0; margin-top:6px; }
.navr {width:auto;overflow:hidden;}
.navr li {text-align:center; float: left; height:25px; font-size:1em; width:12%; margin-right:5px;}
.navr li a {width:100%; line-height:25px; float: left;height:100%; color: #333; font-size: 1em; text-decoration:none;}
.navr li a:hover { background:#1ab394;}
.navr li.menuon {background:#1ab394; display:block; width:12%;}
.navr li.menuon a{color:#333;}
.navr li.menuon a:hover{color:#333;}
.banner{height:200px; text-align:center; border-bottom:2px solid #ddd;}
.hbanner{ background: url(img/h2003070126.jpg) center no-repeat #B4B4B4;}
.gbanner{ background: url(img/h2003070127.jpg) center no-repeat #264C79;}
.jbanner{ background: url(img/h2003070128.jpg) center no-repeat #E2EAD5;}
.dbanner{ background: url(img/h2003070129.jpg) center no-repeat #009ADA;}
.nbanner{ background: url(img/h2003070130.jpg) center no-repeat #ffca22;}
</style>
</head>
<?php
<?php if($usertplid == 2){ ?>
<body style="background-color:#2f4050;">
<?php
    <![if lt IE 9]>
      <div class="alert alert-danger">您正在使用 <strong>过时的</strong> 浏览器. 是时候 <a href="http://browsehappy.com/">更换一个更好的浏览器</a> 来提升用户体验.</div>
    <![endif]>
<?php
<div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header" style="height: 90px;">
                        <div class="dropdown profile-element"> <span>
                            &nbsp;&nbsp;&nbsp;<a href="<?php echo U('Function/welcome',array('token'=>$token));?>"><img src="<?php echo ($wecha["headerpic"]); ?>" width="60" height="60" class="img-circle"/></a>
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <font face="微软雅黑"><?php echo ($wecha["wxname"]); ?></font>
                             </span> <span class="text-muted text-xs block"> 套餐使用 <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs" style="  margin-left: -5%;">
                              <li><a href="#"><strong>微信号：</strong><?php echo ($wecha["weixin"]); ?></a></a></li>
                                <li><a href="#"><strong>VIP有效期：</strong><?php echo (date("Y-m-d",$thisUser["viptime"])); ?></a></a></li>
                                <li><a href="#"><strong>图文自定义：</strong><?php echo ($thisUser["diynum"]); ?>/<?php echo ($userinfo["diynum"]); ?></a></li>
                                <li><a href="#"><strong>活动创建数：</strong><?php echo ($thisUser["activitynum"]); ?>/<?php echo ($userinfo["activitynum"]); ?></a></li>
                                <li><a href="#"><strong>请求数：</strong><?php echo ($thisUser["connectnum"]); ?>/<?php echo ($userinfo["connectnum"]); ?></a></li>
                                <li><a href="#"><strong>请求数剩余：</strong><?php echo ($userinfo['connectnum']-$_SESSION['connectnum']); ?></a></li>
                                <li><a href="#"><strong>已使用：</strong><?php echo $_SESSION['diynum']; ?></a></li>
                                <li><a href="#"><strong>当月赠送请求数：</strong><?php echo ($userinfo["connectnum"]); ?></a></li>
                                <li><a href="#"><strong>当月剩余请求数：</strong><?php echo $userinfo['connectnum']-$thisUser['connectnum']; ?></a></li>
                                <li class="divider"></li>
                                <li><a href="/#" onclick="Javascript:window.open('<?php echo U('System/Admin/logout');?>','_blank')" ><b><center>退 出</center></b></a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            <b>管理<br />中心</b>
                        </div>
                    </li>
<?php
     </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg dashbard-1" style="background-color:#f3f3f3;">
        <div class="row border-bottom">
        <div class="footer">
            <div style="float:left;">
            </div>
            <div  class="pull-right" style="float:left;">
                <?php echo ($f_siteName); ?>(c)版权所有 <a href="http://www.miibeian.gov.cn" target="_blank"><?php echo C('ipc');?></a>
    技术支持：<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($f_qq); ?>&site=qq&menu=yes"><i class="fa fa-qq"><?php echo ($f_qq); ?></i></a>
            </div>
    </div>
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0;height: 70px;">
        <div class="logo">
        <div class="navbar-header" style="width:10%;height:30px;float:left;">
              <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#" style="padding:10px 15px;height:15px;"><i class="fa fa-bars"></i> </a>
          </div>
        <div style="float:right;">
        <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">欢迎使用<?php echo ($f_siteName); ?>!</span>
                </li>
                <li class="dropdown">
                    <a class="count-info" href="<?php echo U('SiteMessage/index', array('token'=>$token));?>">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning"><?php if($messageCount == 0): ?>0<?php else: echo ($messageCount); endif; ?></span>
                    </a>
                </li>
                <?php if($_SESSION[uid]==false): ?><li><a href="<?php echo U('Index/login');?>"><font color="#888" size="2">登录</font></a>&nbsp;&nbsp;|&nbsp;&nbsp;
                  <a href="<?php echo U('Index/login');?>"><font color="#888" size="2">注册</font></a></li>
                  <?php else: ?>
                  <li>
                  <a href="/#" onclick="Javascript:window.open('<?php echo U('System/Admin/logout');?>','_blank')" >
                      <font color="#888" size="2"><i class="fa fa-sign-out"></i> 退 出
                  </font></a></li>
                  &nbsp;&nbsp;&nbsp;
                  <li><a href="<?php echo U('Home/Index/index');?>">
                      <font color="#888" size="2"><i class="fa fa-mail-reply"></i> 返回首页
                  </font></a></li>
                  &nbsp;&nbsp;&nbsp;
                  <li><a href="<?php echo U('User/Index/index');?>">
                      <font color="#888" size="2"><i class="fa fa-mail-reply"></i> 返回管理中心
                  </font></a></li><?php endif; ?>
            </ul>
            </div>
          </div>
        </nav>
        <?php  function convertUrlQuery($query){ $queryParts = explode('&', $query); $params = array(); foreach ($queryParts as $param){ $item = explode('=', $param); $params[$item[0]] = $item[1]; } return $params; } function getUrlQuery($array_query){ $tmp = array(); foreach($array_query as $k=>$param){ $tmp[] = $k.'='.$param; } $params = implode('&',$tmp); return $params; } $str = $_SERVER['REQUEST_URI']; $arr = parse_url($str); $arr_query = convertUrlQuery($arr['query']); $m = $arr_query['m']; $a = $arr_query['a']; $model = array( '欢迎页' =>array('Function' => '功能展示'), '基础设置' =>array('Areply' => '关注时回复与帮助','Home' => '首页回复设置','Text' => '微信-文本回复','Img' => '微信-图文回复','Voiceresponse' => '微信-语音回复','Message' => '微信－群发消息','TemplateMsg' => '微信－模板消息','Company' => 'LBS商家连锁','Diymen' => '自定义菜单','Auth' => '自动获取粉丝信息','Assistente' => '店员管理','Other' => '回答不上来的配置'), '微网站' =>array('Classify' => '分类管理','Essay' => '自定义内容','Tmpls' => '静态模板管理','CustomTmpls' => 'H5动态自定义模板','Flash' => '首页幻灯片','Catemenu' => '底部导航菜单','Live' => '微场景'), '游戏&贺卡' =>array('Game' => '游戏','Card' => '贺卡'), 'PC网站[独立]' =>array('Web' => 'PC站'), '手机网站[独立]' =>array('Phone' => '手机站'), '云打包' =>array('Yundabao' => 'APP打包'), '百度直达号' =>array('Zhida' => '百度直达号'), '微场景' =>array('SeniorScene' => '高级场景'), '微互动' =>array('Person_card' => '微名片','Reply' => '留言板','Forum' => '微论坛','Photo' => '3G图集(相册)','Vote' => '3G微投票','Voteimg' => '图文投票','Custom' => '微预约(万能表单,报名)','Research' => '微调研','Share' => '分享管理','Invite' => '邀请函'), '行业应用' =>array('Numqueue' => '微排号','Repast' => '微餐饮','DishOut' => '微外卖','MicroBroker' => '全民经纪人','Estate' => '楼盘房产','School' => '微教育','Hotels' => '酒店宾馆','Panorama' => '360°全景','Wedding' => '微婚庆（喜帖）','Car' => '微汽车','Medical' => '微医疗','Host' => '通用订单(酒吧KTV)','Business' => '行业应用'), '摇一摇.周边' =>array('Shakearound' => '摇一摇.周边'), '微现场' =>array('Signin' => '微信签到','Shake' => '摇一摇','Wall' => '微信墙','Scene' => '现场活动'), '电商系统' =>array('Alipay_config' => '在线支付设置','Alipay_cert' => '微信支付证书','Platform' => '平台支付对帐','WeixinBill' => '微信支付账单','Groupon' => '微信团购系统','Store' => '商城','Market' => '微商圈','Crowdfunding' => '微众筹','Unitary' => '一元夺宝','Unitary' => '一元夺宝','Seckill' => '微秒杀','LivingCircle' => '微信生活圈','Bargain' => '微砍价','Cutprice' => '降价拍'), '微店系统' =>array('Micrstore' => '微店'), '微粉丝管理CRM' =>array('Wechat_group' => '粉丝管理','Wechat_behavior' => '粉丝行为分析','Fuwu' => '服务窗粉丝管理'), '微硬件' =>array('Router' => '微信wifi设置','Hardware' => '打印机'), '微渠道' =>array('Recognition' => '渠道二维码','RecognitionData' => '二维码扫描分析'), '微客服' =>array('ServiceUser' => '微信人工客服','Service' => '网页客服管理'), '微活动' =>array('CoinTree' => '摇钱树','Hongbao' => '微信合体红包','Helping' => '分享助力','Sentiment' => '谁是情圣','Popularity' => '人气冲榜','Lottery' => '幸运大转盘','Jiugong' => '幸运九宫格','Coupon' => '优惠券','Guajiang' => '刮刮卡','LuckyFruit' => '幸运水果机','GoldenEgg' => '砸金蛋','AppleGame' => '走鹊桥','Lovers' => '摁死小情侣','Autumn' => '中秋吃月饼','Autumns' => '拆礼盒','Problem' => '一战到底','Red_packet' => '微信红包','Punish' => '惩罚台','Test' => '趣味测试'), '会员卡' =>array('Member_card' => '会员卡'), '数据魔方' =>array('Requerydata' => '请求数详情'), '二次开发' =>array('Api' => '融合第三方'), ); foreach ($model as $key => $value) { if (array_key_exists($m,$value)) { $c = $key; } foreach ($value as $k => $v) { if ($m == $k) { $mod =$v; } } } ?>
        
        <div class="row wrapper border-bottom white-bg page-heading" style="margin-left: 0px;height:30px;">
                <div class="col-lg-10" style="margin-top:8px;">
                    <h2 style="font-size: 24px;"><?php echo $mod; ?></h2>
                </div>
            </div>
        <div>
        <div class="animated fadeInRight" style="margin-bottom: 80px;background-color: #fff;margin-top:10px;border: 1px solid rgba(155, 155, 155, 0.36);border-top:5px solid rgba(155, 155, 155, 0.36);">
        <div style="margin-left:1%;margin-right:1%;margin-top:20px;">
<?php }else{ ?>
<body id="nv_member" class="pg_CURMODULE">
<div id="wp" class="wp">
<style>
a.a_upload,a.a_choose{border:1px solid #3d810c;box-shadow:0 1px #CCCCCC;-moz-box-shadow:0 1px #CCCCCC;-webkit-box-shadow:0 1px #CCCCCC;cursor:pointer;display:inline-block;text-align:center;vertical-align:bottom;overflow:visible;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;vertical-align:middle;background-color:#f1f1f1;background-image: -webkit-linear-gradient(bottom, #CCC 0%, #E5E5E5 3%, #FFF 97%, #FFF 100%); background-image: -moz-linear-gradient(bottom, #CCC 0%, #E5E5E5 3%, #FFF 97%, #FFF 100%); background-image: -ms-linear-gradient(bottom, #CCC 0%, #E5E5E5 3%, #FFF 97%, #FFF 100%); color:#000;border:1px solid #AAA;padding:2px 8px 2px 8px;text-shadow: 0 1px #FFFFFF;font-size: 14px;line-height: 1.5;
}

.pages{padding:3px;margin:3px;text-align:center;}
.pages a{border:#eee 1px solid;padding:2px 5px;margin:2px;color:#036cb4;text-decoration:none;}
.pages a:hover{border:#999 1px solid;color:#666;}
.pages a:active{border:#999 1px solid;color:#666;}
.pages .current{border:#036cb4 1px solid;padding:2px 5px;font-weight:bold;margin:2px;color:#fff;background-color:#036cb4;}
.pages .disabled{border:#eee 1px solid;padding:2px 5px;margin:2px;color:#ddd;}
</style>

 <?php if(session('isQcloud') == true): ?><link type="text/css" rel="stylesheet" href="http://qzonestyle.gtimg.cn/qcloud/app/open/v1/css/wxcloud.min.css" />


<style>
.px {
  background:#fff;

  border-color:#c9c9c9;

}


input[type=radio] {

  border-radius:55px;

  border: none;

}
.btnGreen {
  border:1px solid #FFFFFF;
  box-shadow:0 1px 1px #0A8DE4;
  -moz-box-shadow:0 1px 1px #0A8DE4;
  -webkit-box-shadow:0 1px 1px #0A8DE4;
  padding:5px 20px;
  cursor:pointer;
  display:inline-block;
  text-align:center;
  vertical-align:bottom;
  overflow:visible;
  border-radius:3px;
  -moz-border-radius:3px;
  -webkit-border-radius:3px;
*zoom:1;
  background-color:#5ba607;
  background-image:linear-gradient(bottom, #107BAD  3%, #18C2D1 97%, #18C2D1 100%);
  background-image:-moz-linear-gradient(bottom, #107BAD  3%, #0A8DE40 97%, #18C2D1 100%);
  background-image:-webkit-linear-gradient(bottom, #107BAD  3%,#0A8DE4 97%, #18C2D1 100%);
  color:#fff; font-size:14px; line-height: 1.5;
}
.btnGreen:hover {
  background-color:#5ba607;
  background-image:linear-gradient(bottom, #2F8BC9 3%, #2F8BC9 97%, #6AA2D6  100%);
  background-image:-moz-linear-gradient(bottom, #2F8BC9 3%, #2F8BC9 97%, #6AA2D6  100%);
  background-image:-webkit-linear-gradient(bottom, #2F8BC9 3%, #2F8BC9 97%, #6AA2D6  100%);
  color:#fff
}
.btnGreen:active {
  background-color:#5ba607;
  background-image:linear-gradient(bottom, #69b310 3%, #3d810c 97%, #fff 100%);
  background-image:-moz-linear-gradient(bottom, #69b310 3%, #3d810c 97%, #fff 100%);
  background-image:-webkit-linear-gradient(bottom, #69b310 3%, #3d810c 97%, #fff 100%);
  color:#fff
}

.btnGreen{border:1px solid #3d810c;box-shadow:0 1px 1px #aaa;-moz-box-shadow:0 1px 1px #aaa;-webkit-box-shadow:0 1px 1px #aaa;padding:5px 20px;cursor:pointer;display:inline-block;text-align:center;vertical-align:bottom;overflow:visible;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;*zoom:1;background-color:#5ba607;background-image:linear-gradient(bottom,#4d910c 3%,#69b310 97%,#fff 100%);background-image:-moz-linear-gradient(bottom,#4d910c 3%,#69b310 97%,#fff 100%);background-image:-webkit-linear-gradient(bottom,#4d910c 3%,#69b310 97%,#fff 100%);color:#fff;font-size:14px;line-height:1.5;}.btnGreen:hover{background-color:#5ba607;background-image:linear-gradient(bottom,#3d810c 3%,#69b310 97%,#fff 100%);background-image:-moz-linear-gradient(bottom,#3d810c 3%,#69b310 97%,#fff 100%);background-image:-webkit-linear-gradient(bottom,#3d810c 3%,#69b310 97%,#fff 100%);color:#fff}.btnGreen:active{background-color:#5ba607;background-image:linear-gradient(bottom,#69b310 3%,#3d810c 97%,#fff 100%);background-image:-moz-linear-gradient(bottom,#69b310 3%,#3d810c 97%,#fff 100%);background-image:-webkit-linear-gradient(bottom,#69b310 3%,#3d810c 97%,#fff 100%);color:#fff}

</style><?php endif; ?>
<!--对接独立样式27-->
<?php if ($_SESSION['is_syn'] != 0): ?>
<style>
.tableContent {
  background:none !important;
}
  <?php if ($_SESSION['is_syn'] == 1): ?>
  .tableContent .content {
    border-left: 0;
    padding: 5px 10px;
    background-color: #FFFFFF;
    width:820px;
    min-height: inherit;
  }
  .tableContent .content .px {
    width:300px !important;
  }
  <?php endif;?>
  <?php if ($_SESSION['is_syn'] == 2): ?>
  .tableContent .content {
    border-left: 0;
    padding: 5px 10px;
    background-color: #FFFFFF;
    width:95%;
    min-height: inherit;
    margin:0;
    float:left;
  }
  <?php endif;?>
.tableContent .content .bgfc {
  padding:5px;
}
</style>
<script type="text/javascript">
$(function () {
  $('.tableContent form').removeAttr('target');
});
</script>
<?php endif;?>

<!--对接隐藏头部和公用菜单-->
<?php
<?php
<div class="topbg">
<div class="top">
<div class="toplink">
<style>
<?php if($usertplid != 0): ?>.topbg{background:url(<?php echo ($staticPath); ?>/tpl/static/newskin/images/top.gif) repeat-x; height:101px; /*box-shadow:0 0 10px #000;-moz-box-shadow:0 0 10px #000;-webkit-box-shadow:0 0 10px #000;*/}
.top {
    margin: 0px auto; width: 988px; height: 101px;
}

.top .toplink{ height:30px; line-height:27px; color:#999; font-size:12px;}
.top .toplink .welcome{ float:left;}
.top .toplink .memberinfo{ float:right;}
.top .toplink .memberinfo a{ color:#999;}
.top .toplink .memberinfo a:hover{ color:#F90}
.top .toplink .memberinfo a.green{ background:none; color:#0C0}

.top .logo {width: 990px; color: #333; height:70px; font-size:16px;}
.top h1{ font-size:25px;float:left; width:230px; margin:0; padding:0; margin-top:6px; }
.top .navr {WIDTH:750px; float:right; overflow:hidden;}
.top .navr ul{ width:850px;}
.navr li {text-align:center; float: right; height:70px; font-size:1em; width:103px; margin-right:5px;}
.navr li a {width:103px; line-height:70px; float: left; height:100%; color: #333; font-size: 1em; text-decoration:none;}
.navr li a:hover { background:#ebf3e4;}
.navr li.menuon {background:#ebf3e4; display:block; width:103px;}
.navr li.menuon a{color:#333;}
.navr li.menuon a:hover{color:#333;}
.banner{height:200px; text-align:center; border-bottom:2px solid #ddd;}
.hbanner{ background: url(img/h2003070126.jpg) center no-repeat #B4B4B4;}
.gbanner{ background: url(img/h2003070127.jpg) center no-repeat #264C79;}
.jbanner{ background: url(img/h2003070128.jpg) center no-repeat #E2EAD5;}
.dbanner{ background: url(img/h2003070129.jpg) center no-repeat #009ADA;}
.nbanner{ background: url(img/h2003070130.jpg) center no-repeat #ffca22;}
<?php else: ?>

.topbg{BACKGROUND-IMAGE: url(<?php echo ($staticPath); echo ltrim(RES,'.');?>/images/top.png);BACKGROUND-REPEAT: repeat-x; height:124px; box-shadow:0 0 10px #000;-moz-box-shadow:0 0 10px #000;-webkit-box-shadow:0 0 10px #000;}
.top {
    MARGIN: 0px auto; WIDTH: 988px; HEIGHT: 124px;
}

.top .toplink{ height:27px; line-height:27px; color:#999; font-size:12px;}
.top .toplink .welcome{ float:left;}
.top .toplink .memberinfo{ float:right;}
.top .toplink .memberinfo a{ color:#999;}
.top .toplink .memberinfo a:hover{ color:#F90}
.top .toplink .memberinfo a.green{ background:none; color:#0C0}

.top .logo {WIDTH: 990px;COLOR: #333; height:70px;  FONT-SIZE:16px; PADDING-TOP:25px}
.top h1{ font-size:25px; margin-top:20px; float:left; width:230px; margin:0; padding:0;}
.top .navr {WIDTH:750px; float:right; overflow:hidden; margin-top:10px;}
.top .navr ul{ width:850px;}
.navr LI {TEXT-ALIGN:center;FLOAT: left;HEIGHT:32px;FONT-SIZE:1em;width:103px; margin-right:5px;}
.navr LI A {width:103px;TEXT-ALIGN:center; LINE-HEIGHT:30px; FLOAT: left;HEIGHT:32px;COLOR: #333; FONT-SIZE: 1em;TEXT-DECORATION: none
}
.navr LI A:hover {BACKGROUND: url(<?php echo ($staticPath); echo ltrim(RES,'.');?>/images/navhover.gif) center no-repeat;color:#009900;}
.navr LI.menuon {BACKGROUND: url(<?php echo ($staticPath); echo ltrim(RES,'.');?>/images/navon.gif) center no-repeat; display:block;width:103px;HEIGHT:32px;}
.navr LI.menuon a{color:#FFF;}
.navr LI.menuon a:hover{BACKGROUND: url(img/navon.gif) center no-repeat;}
.banner{height:200px; text-align:center; border-bottom:2px solid #ddd;}
.hbanner{ background: url(img/h2003070126.jpg) center no-repeat #B4B4B4;}
.gbanner{ background: url(img/h2003070127.jpg) center no-repeat #264C79;}
.jbanner{ background: url(img/h2003070128.jpg) center no-repeat #E2EAD5;}
.dbanner{ background: url(img/h2003070129.jpg) center no-repeat #009ADA;}
.nbanner{ background: url(img/h2003070130.jpg) center no-repeat #ffca22;}<?php endif; ?>
</style>
<div class="welcome"></div>
    <div class="memberinfo"  id="destoon_member">   
        <?php if($_SESSION[uid]==false): ?><a href="<?php echo U('Index/login');?>">登录</a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a href="<?php echo U('Index/login');?>">注册</a>
            <?php else: ?>
            你好,<a href="/#" hidefocus="true"  ><span style="color:red"><?php echo (session('uname')); ?></span></a>（uid:<?php echo (session('uid')); ?>）
            <a href="/#" onclick="Javascript:window.open('<?php echo U('System/Admin/logout');?>','_blank')" >退出</a><?php endif; ?>   
    </div>
</div>
    <div class="logo">
        <div style="float:left"><h1><a href="/" title="多用户微信营销服务平台"><img src="<?php echo ($f_logo); ?>" height="55" /></a></h1></div>
            
            <div class="navr">
            <ul id="topMenu">
                <li style="width:85px"></li>
                <?php if($typsz['help'] == 1): if(is_array($zdydh)): $i = 0; $__LIST__ = $zdydh;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pigvo): $mod = ($i % 2 );++$i; if($pigvo['type'] == 6): ?><li <?php if((ACTION_NAME) == "help"): ?>class="menuon"<?php endif; ?> <?php if($pigvo['dspl'] == 1): ?>style="display:none;"<?php endif; ?>>
                    <a <?php if($pigvo['open'] == '1'): ?>target="_blank"<?php endif; ?> href="<?php if($pigvo['url'] == ''): echo U('Home/Index/help'); else: echo ($pigvo['url']); endif; ?>"><?php if($pigvo['name'] == ''): ?>帮助中心<?php else: echo ($pigvo['name']); endif; ?></a>
                </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                <?php else: ?>
                <li <?php if((ACTION_NAME) == "help"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/help');?>">帮助中心</a></li><?php endif; ?>
                <?php if($typsz['login'] == 1): if(is_array($zdydh)): $i = 0; $__LIST__ = $zdydh;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pigvo): $mod = ($i % 2 );++$i; if($pigvo['type'] == 5): ?><li <?php if((GROUP_NAME) == "User"): ?>class="menuon"<?php endif; ?> <?php if($pigvo['dspl'] == 1): ?>style="display:none;"<?php endif; ?>>
                        <a <?php if($pigvo['open'] == '1'): ?>target="_blank"<?php endif; ?> href="<?php if($pigvo['url'] == ''): echo U('User/Index/index'); else: echo ($pigvo['url']); endif; ?>"><?php if($pigvo['name'] == ''): ?>管理中心<?php else: echo ($pigvo['name']); endif; ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                <?php else: ?>
                    <li <?php if((GROUP_NAME) == "User"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('User/Index/index');?>">管理中心</a></li><?php endif; ?>
                <?php if($typsz['common'] == 1): if(is_array($zdydh)): $i = 0; $__LIST__ = $zdydh;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pigvo): $mod = ($i % 2 );++$i; if($pigvo['type'] == 4): ?><li <?php if((ACTION_NAME) == "common"): ?>class="menuon"<?php endif; ?> <?php if($pigvo['dspl'] == 1): ?>style="display:none;"<?php endif; ?>>
                        <a <?php if($pigvo['open'] == '1'): ?>target="_blank"<?php endif; ?> href="<?php if($pigvo['url'] == ''): echo U('Home/Index/common'); else: echo ($pigvo['url']); endif; ?>"><?php if($pigvo['name'] == ''): ?>产品案例<?php else: echo ($pigvo['name']); endif; ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                <?php else: ?>
                    <li <?php if((ACTION_NAME) == "common"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/common');?>">产品案例</a></li><?php endif; ?>
                <?php if($typsz['prize'] == 1): if(is_array($zdydh)): $i = 0; $__LIST__ = $zdydh;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pigvo): $mod = ($i % 2 );++$i; if($pigvo['type'] == 3): ?><li <?php if((ACTION_NAME) == "price"): ?>class="menuon"<?php endif; ?> <?php if($pigvo['dspl'] == 1): ?>style="display:none;"<?php endif; ?>>
                        <a <?php if($pigvo['open'] == '1'): ?>target="_blank"<?php endif; ?> href="<?php if($pigvo['url'] == ''): echo U('Home/Index/price'); else: echo ($pigvo['url']); endif; ?>"><?php if($pigvo['name'] == ''): ?>资费说明<?php else: echo ($pigvo['name']); endif; ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                <?php else: ?>
                    <li <?php if((ACTION_NAME) == "price"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/price');?>">资费说明</a></li><?php endif; ?>
                <?php if($typsz['about'] == 1): if(is_array($zdydh)): $i = 0; $__LIST__ = $zdydh;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pigvo): $mod = ($i % 2 );++$i; if($pigvo['type'] == 2): ?><li <?php if((ACTION_NAME) == "about"): ?>class="menuon"<?php endif; ?> <?php if($pigvo['dspl'] == 1): ?>style="display:none;"<?php endif; ?>>
                        <a <?php if($pigvo['open'] == '1'): ?>target="_blank"<?php endif; ?> href="<?php if($pigvo['url'] == ''): echo U('Home/Index/about'); else: echo ($pigvo['url']); endif; ?>"><?php if($pigvo['name'] == ''): ?>关于我们<?php else: echo ($pigvo['name']); endif; ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                <?php else: ?>
                    <li <?php if((ACTION_NAME) == "about"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/about');?>">关于我们</a></li><?php endif; ?>
                <?php if($typsz['fc'] == 1): if(is_array($zdydh)): $i = 0; $__LIST__ = $zdydh;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pigvo): $mod = ($i % 2 );++$i; if($pigvo['type'] == 1): ?><li <?php if((ACTION_NAME) == "fc"): ?>class="menuon"<?php endif; ?> <?php if($pigvo['dspl'] == 1): ?>style="display:none;"<?php endif; ?>>
                        <a <?php if($pigvo['open'] == '1'): ?>target="_blank"<?php endif; ?> href="<?php if($pigvo['url'] == ''): echo U('Home/Index/fc'); else: echo ($pigvo['url']); endif; ?>"><?php if($pigvo['name'] == ''): ?>功能介绍<?php else: echo ($pigvo['name']); endif; ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>     
                <?php else: ?>
                    <li <?php if((ACTION_NAME) == "fc"): ?>class="menuon"<?php endif; ?>><a href="<?php echo U('Home/Index/fc');?>">功能介绍</a></li><?php endif; ?>                
                <li <?php if((ACTION_NAME == 'index') and (GROUP_NAME == 'Home')): ?>class="menuon"<?php endif; ?> ><a href="/">首页</a></li>       
            </ul>
        </div>
        </div>
    </div>
</div>
<div id="aaa"></div>
<?php
  <div class="topbg">
<div class="top">
<div class="toplink">
<style>
<?php if($usertplid == 1): ?>.topbg{background:url(<?php echo ($staticPath); ?>/tpl/static/newskin/images/top.gif) repeat-x; height:32px; /*box-shadow:0 0 10px #000;-moz-box-shadow:0 0 10px #000;-webkit-box-shadow:0 0 10px #000;*/}
.top {
    margin: 0px auto; width: 988px; height: 101px;
}

.top .toplink{ height:30px; line-height:27px; color:#999; font-size:12px;}
.top .toplink .welcome{ float:left;}
.top .toplink .memberinfo{ float:right;}
.top .toplink .memberinfo a{ color:#999;}
.top .toplink .memberinfo a:hover{ color:#F90}
.top .toplink .memberinfo a.green{ background:none; color:#0C0}

.top .logo {width: 990px; color: #333; height:70px; font-size:16px;}
.top h1{ font-size:25px;float:left; width:230px; margin:0; padding:0; margin-top:6px; }
.top .navr {WIDTH:750px; float:right; overflow:hidden;}
.top .navr ul{ width:850px;}
.navr li {text-align:center; float: left; height:70px; font-size:1em; width:103px; margin-right:5px;}
.navr li a {width:103px; line-height:70px; float: left; height:100%; color: #333; font-size: 1em; text-decoration:none;}
.navr li a:hover { background:#ebf3e4;}
.navr li.menuon {background:#ebf3e4; display:block; width:103px;}
.navr li.menuon a{color:#333;}
.navr li.menuon a:hover{color:#333;}
.banner{height:200px; text-align:center; border-bottom:2px solid #ddd;}
.hbanner{ background: url(img/h2003070126.jpg) center no-repeat #B4B4B4;}
.gbanner{ background: url(img/h2003070127.jpg) center no-repeat #264C79;}
.jbanner{ background: url(img/h2003070128.jpg) center no-repeat #E2EAD5;}
.dbanner{ background: url(img/h2003070129.jpg) center no-repeat #009ADA;}
.nbanner{ background: url(img/h2003070130.jpg) center no-repeat #ffca22;}
<?php else: ?>

.topbg{BACKGROUND-IMAGE: url(<?php echo ($staticPath); echo ltrim(RES,'.');?>/images/top.png);BACKGROUND-REPEAT: repeat-x; height:40px; box-shadow:0 0 10px #000;-moz-box-shadow:0 0 10px #000;-webkit-box-shadow:0 0 10px #000;}
.top {
	MARGIN: 0px auto; WIDTH: 988px; HEIGHT: 40px;
}

.top .toplink{ height:27px; line-height:27px; color:#999; font-size:12px;}
.top .toplink .welcome{ float:left;}
.top .toplink .memberinfo{ float:right;}
.top .toplink .memberinfo a{ color:#999;}
.top .toplink .memberinfo a:hover{ color:#F90}
.top .toplink .memberinfo a.green{ background:none; color:#0C0}

.top .logo {WIDTH: 990px;COLOR: #333; height:70px;  FONT-SIZE:16px; PADDING-TOP:25px}
.top h1{ font-size:25px; margin-top:20px; float:left; width:230px; margin:0; padding:0;}
.top .navr {WIDTH:750px; float:right; overflow:hidden; margin-top:10px;}
.top .navr ul{ width:850px;}
.navr LI {TEXT-ALIGN:center;FLOAT: left;HEIGHT:32px;FONT-SIZE:1em;width:103px; margin-right:5px;}
.navr LI A {width:103px;TEXT-ALIGN:center; LINE-HEIGHT:30px; FLOAT: left;HEIGHT:32px;COLOR: #333; FONT-SIZE: 1em;TEXT-DECORATION: none
}
.navr LI A:hover {BACKGROUND: url(<?php echo ($staticPath); echo ltrim(RES,'.');?>/images/navhover.gif) center no-repeat;color:#009900;}
.navr LI.menuon {BACKGROUND: url(<?php echo ($staticPath); echo ltrim(RES,'.');?>/images/navon.gif) center no-repeat; display:block;width:103px;HEIGHT:32px;}
.navr LI.menuon a{color:#FFF;}
.navr LI.menuon a:hover{BACKGROUND: url(img/navon.gif) center no-repeat;}
.banner{height:200px; text-align:center; border-bottom:2px solid #ddd;}
.hbanner{ background: url(img/h2003070126.jpg) center no-repeat #B4B4B4;}
.gbanner{ background: url(img/h2003070127.jpg) center no-repeat #264C79;}
.jbanner{ background: url(img/h2003070128.jpg) center no-repeat #E2EAD5;}
.dbanner{ background: url(img/h2003070129.jpg) center no-repeat #009ADA;}
.nbanner{ background: url(img/h2003070130.jpg) center no-repeat #ffca22;}<?php endif; ?>
</style>
<div class="welcome"> </div>
    <div class="memberinfo"  id="destoon_member">	
		<?php if($_SESSION['staff_id']==false && $_SESSION['staff_username']==false): ?><a href="<?php echo U('Index/staff_login');?>">登录</a>&nbsp;&nbsp;|&nbsp;&nbsp;
			<?php else: ?>
			你好,<a href="/#" hidefocus="true"  ><span style="color:red"><?php echo (session('staff_username')); ?></span></a>&nbsp;&nbsp;&nbsp;
			<a href="javascript:;" onclick="window.location.href = '<?php echo U('Home/Users/staff_logout',array('token'=>$_SESSION['token']));?>'" >退出</a><?php endif; ?>	
	</div>
</div>
    </div>
</div>
<?php } ?>
  <!--中间内容-->

  <div class="contentmanage"<?php if (isset($_SESSION['isQcloud'])){?> style="width:100%"<?php }?>>
  <?php
    <div class="developer">
       <div class="appTitle normalTitle2">
        <div class="vipuser">


<div class="logo">
<a href="<?php echo U('Function/welcome',array('token'=>$token));?>"><img src="<?php echo ($wecha["headerpic"]); ?>" width="100" height="100" /></a>
</div>

<div id="nickname">
<strong><a href="<?php echo U('Function/welcome',array('token'=>$token));?>"><?php echo ($wecha["wxname"]); ?></a></strong><a href="#" target="_blank" class="vipimg vip-icon<?php echo $userinfo['taxisid']-1; ?>" title=""></a></div>
<div id="weixinid"> 
  微信号:<?php echo ($wecha["weixin"]); ?>  
  <?php
  <?php if($messageCount > 0 ): ?><a href="<?php echo U('SiteMessage/index', array('token'=>$token));?>" style="color:red;margin-left:5px;"><?php echo ($messageCount); ?>条未读消息</a>
  <?php else: ?>
    <a href="<?php echo U('SiteMessage/index', array('token'=>$token, 'status'=>'1'));?>" style="color:green;margin-left:5px;">消息</a><?php endif; ?>
</div>
</div>

        <div class="accountInfo">
<table class="vipInfo" width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
<td><strong>VIP有效期：</strong><?php echo (date("Y-m-d",$thisUser["viptime"])); ?></td>
<td><strong>图文自定义：</strong><?php echo ($thisUser["diynum"]); ?>/<?php echo ($userinfo["diynum"]); ?></td>
<td><strong>活动创建数：</strong><?php echo ($thisUser["activitynum"]); ?>/<?php echo ($userinfo["activitynum"]); ?></td>
<td><strong>请求数：</strong><?php echo ($thisUser["connectnum"]); ?>/<?php echo ($userinfo["connectnum"]); ?></td>
</tr>
<tr>
<td><strong>请求数剩余：</strong><?php echo ($userinfo['connectnum']-$_SESSION['connectnum']); ?></td>
<td><strong>已使用：</strong><?php echo $_SESSION['diynum']; ?></td>
<td><strong>当月赠送请求数：</strong><?php echo ($userinfo["connectnum"]); ?></td>
<!-- <td><strong>当月剩余请求数：</strong><?php echo $userinfo['connectnum']-$_SESSION['connectnum']; ?></td> -->
<td><strong>当月剩余请求数：</strong><?php echo $userinfo['connectnum']-$thisUser['connectnum']; ?></td>
</tr>

</table>
    </div>
        <div class="clr"></div>
      </div>
      <!--左侧功能菜单-->

<?php } ?>
<?php } ?>
<style type="text/css">
#sideBar{
border-right: 0px solid #D3D3D3 !important;
float: left;
padding: 0 0 10px 0;
width: 170px;
background: #fff;
}
.tableContent {
background: none repeat scroll 0 0 #f5f6f7;
padding: 0;
}
.tableContent .content {
border-left: 1px solid #D7DDE6 !important;
}
ul#menu, ul#menu ul {
  list-style-type:none;
  margin: 0;
  padding: 0;
  background: #fff;
}

ul#menu a {
  display: block;
  text-decoration: none;
}

ul#menu li {
  margin: 1px;
}
ul#menu li ul li{
  margin: 1px 0;
}
ul#menu li a {
  background: #EBEEF1;
  color: #464D6A;
  padding: 0.5em;
}
ul#menu li .nav-header{
font-size:14px;
border-bottom: 1px solid #D7DDE6;
}
ul#menu li .nav-header:hover {
  background: #DDE4EB;
}

ul#menu li ul li a {
  background: #FCFCFC;
  color: #8288A4;
  padding-left: 20px;
}
ul#menu li ul li:last-child {
    border-bottom: 1px solid #D7DDE6;
}
ul#menu li ul li a:hover {
  background: #fff;
  border-left: 5px #4A98E0 solid;

}
ul#menu li.selected a{
  background: #fff;
  border-left: 5px #4A98E0 solid;
  padding-left: 15px;
  color: #4A98E0;
}
.code { border: 1px solid #ccc; list-style-type: decimal-leading-zero; padding: 5px; margin: 0; }
.code code { display: block; padding: 3px; margin-bottom: 0; }
.code li { background: #ddd; border: 1px solid #ccc; margin: 0 0 2px 2.2em; }
.indent1 { padding-left: 1em; }
.indent2 { padding-left: 2em; }
/*.tableContent .content{min-height: 1328px;}*/

a.nav-header{background:url(/tpl/static/images/arrow_click.png) center right no-repeat;cursor:pointer}
a.nav-header-current{background:url(/tpl/static/images/arrow_unclick.png) center right no-repeat;}

</style>
<style type="text/css">
  .welcome1{
    width:981px;
    border: 1px solid #EAEAEA;
    position: relative;
  }
  .welcome1 li{
    float: left;  
    height: 50px;
    width: 12.323%; 
    text-align:center;
    font-weight: bold;
    position: relative;
    font-size: 1.25em;
    border: 1px solid #DFDFDF;
    background: #F3F3F3;
  }
  .welcome1 ul{
    max-width: 981px;
  }
  .welcome1 li a{
    line-height:3.5;
  }
  .welcome1 li.tab-current{
    border-right:0;   
    border-left:0;
    border-bottom:0;
    background: none;
  }
  .content1{
    margin:80px auto;
    width:900px;
    top:80px;
  }
  .img1{
    margin: 60px 30px 0px 30px;
    width:120px;
    height:150px;
    float: left;
    text-align: center;
  }
  .img1 a {
    line-height: 50px;
  }
  .img1 a:hover{
    text-decoration:none;  
  } 
</style>
<?php
      <div class="tableContent">
<?php if($_SESSION['is_syn']== 0): if (!isset($_SESSION['isQcloud'])){ ?>
        <!--左侧功能菜单-->
 <div  class="sideBar" id="sideBar">
<div class="catalogList">
<ul id="menu">
<?php

<div style="clear:both"></div>
</ul>
</div>
</div>
<?php
<script type="text/javascript">

  $(document).ready(function(){
    $(".nav-header").mouseover(function(){
      $(this).addClass('navHover');
    }).mouseout(function(){
      $(this).removeClass('navHover');
    }).click(function(){
      $(this).toggleClass('nav-header-current');
      $(this).next('.ckit').slideToggle();
    })
  });

</script>
<?php } ?>


<link rel="stylesheet" type="text/css" href="./tpl/User/default/common/css/cymain.css" />
<div class="tab">
<ul>
<li class="<?php if(ACTION_NAME == 'index'): ?>current<?php endif; ?> tabli" id="tab0"><a href="<?php echo U('Medical/index',array('token'=>$token,'addtype'=>'medical'));?>">挂号设置</a></li>
<li class="<?php if(ACTION_NAME == 'reser_manage'): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Medical/reser_manage',array('token'=>$token));?>">预约管理</a></li>
<!-- <li class="<?php if(ACTION_NAME == 'housetype'): ?>current<?php endif; ?> tabli" id="tab2"><a href="<?php echo U('Medical/searchMedical',array('token'=>$token));?>">预约查询</a></li>
<li class="<?php if(ACTION_NAME == 'album'): ?>current<?php endif; ?> tabli" id="tab5"><a href="<?php echo U('Medical/totalMedical',array('token'=>$token));?>">预约统计</a></li> -->
<li class="<?php if(ACTION_NAME == 'aboutus'): ?>current<?php endif; ?> tabli" id="tab5"><a href="<?php echo U('Medical/aboutus',array('token'=>$token));?>">医院简介</a></li>
<li class="<?php if(ACTION_NAME == 'setIndex'): ?>current<?php endif; ?> tabli" id="tab5"><a href="<?php echo U('Medical/setIndex',array('token'=>$token));?>">首页配置</a></li>
</ul>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo Common;?>/default_user_com.css" media="all">
<script src="./tpl/User/default/common/js/date/WdatePicker.js"></script>
<script src="/tpl/static/artDialog/jquery.artDialog.js?skin=default"></script>
<script src="/tpl/static/artDialog/plugins/iframeTools.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo Common;?>/daterangepicker/daterangepicker-bs3.css" />
<script type="text/javascript" src="<?php echo Common;?>/daterangepicker/moment.js"></script>
<script type="text/javascript" src="<?php echo Common;?>/daterangepicker/daterangepicker.js"></script>

<link rel="stylesheet" href="<?php echo STATICS;?>/jQValidationEngine/css/validationEngine.jquery.css" type="text/css"/>
<script src="http://libs.baidu.com/jquery/1.9.0/jquery.js"></script>
<script src="<?php echo STATICS;?>/jQValidationEngine/js/languages/jquery.validationEngine-zh_CN.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo STATICS;?>/jQValidationEngine/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
 <script>
    jQuery(document).ready(function(){
      jQuery("#formID").validationEngine();
    });
    </script>
<style>
    .tooltips span {
display: none;
}
    .tooltips:hover span {
        text-align:left;
        display: block;
        position: absolute;
        margin:0 auto;
        width: 310px;
        border: 1px solid #CCC;
        background-color: #fff;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
        border-radius: 6px;
        padding: 10px;
        font-size: 12px;
        line-height: 22px;
        color: #333;
    }

</style>
<div class="content">
<div class="cLineB">
  <h4>挂号设置</h4><a href="javascript:history.go(-1);return false;" class="right btnGrayS vm" style="margin-top:-27px">返回</a>
 </div>
  <div class="msgWrap bgfc">
  <form action="" method="post" id="formID" class="form-horizontal form-validate" novalidate="novalidate">
 <input type="hidden" name="rid" id="rid" value="123"/>
 <?php if($reslist['id'] != ''): ?><input type="hidden" name="id" id="id" value="<?php echo ($reslist['id']); ?>"/><?php endif; ?>
    <div class="control-group">
        <label for="title" class="control-label">图文消息标题：</label>
        <div class="controls">
           <input type="text" placeholder="请输入图文消息标题" name="title" id="title" class="span4"  data-validation-engine="validate[required,minSize[2],maxSize[25]]" data-errormessage-value-missing="必填项"  value="<?php echo ($reslist['title']); ?>" schoolSet /><span class="maroon">*</span><span class="help-inline">尽量简单，不要超过25字</span>
        </div>
    </div>

    <div class="control-group">
        <label for="coverurl" class="control-label">图文封面：</label>
       <div class="controls">
      <img class="thumb_img" id="picurl_src" src="<?php echo (($reslist['picurl'])?($reslist['picurl']):'tpl/User/default/common/images/medical_default.png'); ?>" style="max-height:100px;">
      <input id="picurl" type="text" class="span4" name="picurl" class="input-xlarge"  schoolSet  value="<?php echo (($reslist['picurl'])?($reslist['picurl']):'tpl/User/default/common/images/medical_default.png'); ?>" data-validation-engine="validate[required,custom[url]]"
                    data-errormessage-value-missing="必须上传图片!"  data-errormessage-custom-error="如果是手动填写,正确的网址,如: http://www.baidu.com/images/demo.png"/>
          <span class="help-inline">
               <script src="<?php echo STATICS;?>/upyun.js"></script><a href="###" onclick="upyunPicUpload('picurl',720,400,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('picurl')">预览</a>
              <span class="help-inline">建议尺寸：宽720像素，高400像素</span>
          </span>
       </div>
    </div>

      <div class="control-group">
         <label for="project_brief" class="control-label">挂号页头部图片:</label>
          <div class="controls">
             <img class="thumb_img" id="headpic_src" src="<?php echo (($reslist['headpic'])?($reslist['headpic']):'tpl/User/default/common/images/medical_default.png'); ?>" style="max-height: 100px;">
              <input id="headpic"type="text"class="input-large" name="headpic" class="span4 px"  schoolSet data-rule-url="true" value="<?php echo (($reslist['headpic'])?($reslist['headpic']):'tpl/User/default/common/images/medical_default.png'); ?>" data-validation-engine="validate[required,custom[url]]"
                    data-errormessage-value-missing="必须上传图片!"  data-errormessage-custom-error="如果是手动填写,正确的网址,如: http://www.baidu.com/images/demo.png"/>
            <span class="maroon">*</span>
            <span class="help-inline">
            <a href="###" onclick="upyunPicUpload('headpic',640,109,'<?php echo ($token); ?>')" class="a_upload">上传</a> <a href="###" onclick="viewImg('headpic')">预览</a>
            <span class="help-inline">建议尺寸：宽640像素，高109像素</span>
         </div>
        <script>
function setlatlng(longitude,latitude){
  art.dialog.data('longitude', longitude);
  art.dialog.data('latitude', latitude);
  art.dialog.open('<?php echo U('Map/setLatLng',array('token'=>$token,'id'=>$id));?>',{lock:false,title:'设置经纬度',width:600,height:400,yesText:'关闭',background: '#000',opacity: 0.87});
}
</script>
     <div class="control-group">
                                <label for="address" class="control-label">医院详细地址:</label>
                                <div class="controls">
                                    <input type="text" name="address" id="address" class="span4"  value="<?php echo ($reslist['address']); ?>" schoolSet  placeholder="请输入接待预约用户的地址" data-validation-engine="validate[required,minSize[5]]" data-errormessage-value-missing="必填项" /><span class="maroon">*</span><span class="help-inline">如合肥市政务区南二环路3818号某某医院</span>
                                </div>
                             </div>
    <div class="control-group">
    <label for="suggestId" class="control-label">地图标识：</label>
         <div class="controls">
          <span class="maroon">注意：这个只是模糊定位，准确位置请地图上标注！</span><br />
                经度 <input type="text" id="longitude"  name="lng" size="14" class="span4" value="<?php echo ($reslist['lng']); ?>" />
                纬度 <input type="text"  name="lat" size="14" id="latitude" class="span4" value="<?php echo ($reslist['lat']); ?>" />
                <a href="###" onclick="setlatlng($('#longitude').val(),$('#latitude').val())">在地图中查看/设置</a>
         </div>
    </div>

<div class="control-group">
         <label for="estate_desc" class="control-label">医院电话：</label>
         <div class="controls">
             <input type="text" name="tel" id="tel" class="span4" value="<?php echo ($reslist['tel']); ?>"
             data-validation-engine="validate[required,custom[tel]]" data-errormessage-value-missing="必填项"   placeholder="请输入接收预约的电话号码"/><span class="maroon">*</span><span class="help-inline">如 0551-65371998</span>
         </div>
     </div>

     </div>
     <div class="control-group">
        <label for="traffic_desc" class="control-label">图文简介：</label>
        <div class="controls">
          <textarea class="px" id="info" name="info" style="width:560px;height:75px"  data-validation-engine="validate[required,minSize[5]]" data-errormessage-value-missing="必填项"  placeholder="显示在图文封面下方，文字请尽量的简洁"><?php echo ($reslist['info']); ?></textarea>
        </div>
    </div>
<div class="control-group">
         <label for="estate_desc" class="control-label">预约费用：</label>
         <div class="controls">
             <input type="text" name="price" id="price" class="span4" value="<?php echo ($reslist['price']); ?>"
             data-validation-engine="validate[custom[number],min[0]]"  placeholder="例如:12"/><span class="maroon">*</span><span class="help-inline">如果没有该项可以不填写,默认即可(单位:元)</span>
         </div>
     </div>
<div class="control-group">
      <label for="typename" class="control-label">预约信息设置：</label>
       <div class="controls">
           <input type="text" class="span4" name="typename" value="<?php echo (($reslist['typename'])?($reslist['typename']):'我的挂号订单'); ?>" id="typename" schoolSet />
    <span class="maroon">*</span><span class="help-inline">修改用户手机中“我的订单”栏目的名称，您可以将其修改成诸如“挂号订单”、“我的订单”等</span>
       </div>
</div>
<div class="control-group" style="display: none;">
 <label for="typename2" class="control-label">重命名订单说明：</label>
<div class="controls">
    <input type="text" class="span4" name="typename2" value="<?php echo (($reslist['typename2'])?($reslist['typename2']):'订单说明'); ?>" id="typename2"/>
     <span class="maroon">*</span><span class="help-inline">用户修改用户手机中“订单说明”栏目的名称，您可以将其修改成诸如“预约说明”、“试驾说明”等</span>
 </div>
</div>
<div class="control-group" style="display: none;">
    <label for="typename3" class="control-label">预约信息设置：</label>
    <div class="controls">
         <input type="text" class="span4" name="typename3" value="<?php echo (($reslist['typename3'])?($reslist['typename3']):'订单电话'); ?>" id="typename3"/>
         <span class="maroon">*</span><span class="help-inline">用户修改用户手机中“订单电话”栏目的名称，您可以将其修改成诸如“预约电话”、“试驾电话”等</span>
     </div>
</div>




    <script type="text/javascript">
    $(function () {
         $("input[type='radio']").click(function () {
            var $this = $(this), $val = $this.val(), $div = $this.parents(".control-group");
            if ($val == 1) {
                $div.next().show();
                $div.next().next().hide();
                $("#type1").show();
                $("#type2").hide();
                $("#type3").hide();
            } else {
                $div.next().next().show();
                $div.next().hide();
                if($val == 2){
                    $("#type2").show();
                    $("#type1").hide();
                    $("#type3").hide();
                }else{
                    $("#type3").show();
                    $("#type1").hide();
                    $("#type2").hide();
                }
            }
         })
            </script>

<script>
function dodelit(i) {
   document.getElementById("txt" + i).value = "";
   document.getElementById("value" + i).value = "";
   if (i != 1) {
       document.getElementById("trtxt" + i).style.display = "none";
       document.getElementById("add" + i).style.display = "";
   }
}
   function doaddit(i) {

    document.getElementById('trtxt' + i).style.display = "";
   document.getElementById('add' + i).style.display = "none";
}

function sdodelit(i) {

    document.getElementById("select" + i).value = "";
    document.getElementById("svalue" + i).value = "";
    if (i != 1) {
        document.getElementById("strtxt" + i).style.display = "none";
       document.getElementById("sadd" + i).style.display = "";
    }
}
function sdoaddit(i) {

     document.getElementById('strtxt' + i).style.display = "";
     document.getElementById('sadd' + i).style.display = "none";
}
  </script>

<div class="control-group" >
        <label for="tel" class="control-label">订单内容设置：</label>
        <div class="controls">
            <span class="help-inline">填写你要收集的内容！订单默认选项不可以修改删除！<font color="red">如果手动添加的项想删除,把[字段名称]\[初始内容]里的值清空提交即可.</font></span>
<table id="listTable" class="ListProduct table table-bordered table-hover dataTable">
    <thead>
        <tr>
            <th>字段类型</th>
             <th>字段名称</th>
             <th>初始内容</th>

            <th>操作</th>
        </tr>
    </thead>
<tbody>
    <tr>
        <td>单行文字：</td>
        <td>
            <input  type="button" disabled="disabled" value="患者姓名" readonly="readonly"></td>
        <td>
            <input   type="button" disabled="disabled"  value="请输入您的名字" readonly="readonly"></td>

        <td>
            <label class="checkbox">
                <input type="checkbox"     checked="checked" name="name_show" value="1">是否显示
             </label>
        </td>
     </tr>
    <tr>
        <td>单行文字：</td>
        <td>
             <input type="button" disabled="disabled"  value="联系电话" readonly="readonly"></td>
        <td>
            <input  type="button" disabled="disabled" value="请输入您的电话" readonly="readonly"></td>

        <td>
            <label class="checkbox">
                <input type="checkbox"  checked="checked"   name="tel_show" value="1">是否显示
            </label>
        </td>
    </tr>
    <tr>
        <td>日期选择：</td>
        <td>
            <input  type="button" disabled="disabled"  value="预约日期" ></td>
        <td>
            <input  type="button" disabled="disabled" value="请输入预约日期"></td>

        <td>
            <label class="checkbox">
                <input type="checkbox"   checked="checked" name="date_show" value="1">是否显示
            </label>
         </td>
    </tr>
     <tr style="display: none;">
        <td>时间选择：</td>
        <td>
             <input name=" " type="text" disabled="disabled" class="px wizard-ignore" value="预约时间" onchange="$('odid').value='请输入'+this.value;"></td>
        <td>
            <input name="add[order][]" type="text" disabled="disabled" id="odid" class="px wizard-ignore" value="请输入预约时间"></td>

        <td>
            <label class="checkbox">
                <input type="checkbox"  checked="checked" name="time_show" value="1">是否显示
             </label>
        </td>
    </tr>
    <tr>
    <td>单行文字：</td>
    <td>
        <input type="button" disabled="disabled"   value="患者性别"></td>
    <td>
        <!--input name="value1" class="px" id="value1" type="text" value="<?php echo ($reslist['value1']); ?>"-->
        <select name="value1" >
            <option value="1">男</option>
            <option value="2">女</option>
        </select>
    </td>

    <td>

    </td>
  </tr>
<tr    >
    <td>单行文字：</td>
    <td>
        <input type="button" disabled="disabled" value="患者年龄"></td>
    <td>
        <input disabled="disabled" type="button" value="请输入您的年龄"></td>

    <td>

    </td>
</tr>
<tr id="trtxt1" >
<td>单行文字：</td>
<td>
    <input type="text" class="px" name="txt3" id="txt1" value="<?php echo ($reslist['txt3']); ?>"></td>
<td>
    <input name="value3" class="px" id="value1" type="text" value="<?php echo ($reslist['value3']); ?>"></td>

<td>
<p><?php if($reslist['txt4'] == ''): ?><a class="btnGrayS vm" id="add2" href="javascript:doaddit(2)">添加</a><?php endif; ?>　<a href="javascript:dodelit(1)">删除</a><span class="tooltips"><img src="/tpl/Home/pigcms/common/images/price_help.png" align="absmiddle"><span>                 <font color='red'>如果添加的项想删除,<br/>把[字段名称]\[初始内容]里的值清空<br/>提交即可</font>
                </span></span></p>
</td> </tr>
                                            <tr id="trtxt2" <?php if($reslist['txt4'] == ''): ?>style="display: none"<?php endif; ?> >
                                                <td>单行文字：</td>
                                                <td>
                                                    <input type="text" class="px" name="txt4" id="txt2" value="<?php echo ($reslist['txt4']); ?>"></td>
                                                <td>
                                                    <input name="value4" class="px" id="value2" type="text" value="<?php echo ($reslist['value4']); ?>"></td>
                                                <td>
                                                    <p><?php if($reslist['txt5'] == ''): ?><a class="btnGrayS vm" id="add3" href="javascript:doaddit(3)">添加</a><?php endif; ?>　<a href="javascript:dodelit(2)">删除</a> <span class="tooltips"><img src="/tpl/Home/pigcms/common/images/price_help.png" align="absmiddle"><span>                 <font color='red'>如果添加的项想删除,<br/>把[字段名称]\[初始内容]里的值清空<br/>提交即可</font>
                </span></span></p>
                                                </td>
                                            </tr>
                                            <tr id="trtxt3"  <?php if($reslist['txt5'] == ''): ?>style="display: none"<?php endif; ?>>
                                                <td>单行文字：</td>
                                                <td>
                                                    <input type="text" class="px" name="txt5" id="txt3" value="<?php echo ($reslist['txt5']); ?>"></td>
                                                <td>
                                                    <input name="value5" class="px" id="value3" type="text" value="<?php echo ($reslist['value5']); ?>"></td>

                                                <td>
                                                    <p><a href="javascript:dodelit(3)">删除</a><span class="tooltips"><img src="/tpl/Home/pigcms/common/images/price_help.png" align="absmiddle"><span>                 <font color='red'>如果添加的项想删除,<br/>把[字段名称]\[初始内容]里的值清空<br/>提交即可</font>
                </span></span></p>
                                                </td>
                                            </tr>
<tr>
     <td width="120">科室选择：</td>
     <td>
        <input type="text" class="px" name="select1" value="<?php echo (($reslist['select1'])?($reslist['select1']):'预约科室'); ?>" ></td>
     <td>
         <input name="svalue1" class="px"  type="text" value="<?php echo ($reslist['svalue1']); ?>" placeholder="选项之间以英文“|”分割"></td>

    <td>

    </td>
</tr>
<tr >
    <td>专家选择：</td>
    <td>
         <input type="text" class="px" name="select2"  value="<?php echo (($reslist['select2'])?($reslist['select2']):'预约专家'); ?>"></td>
    <td>
        <input name="svalue2" class="px"  type="text" value="<?php echo ($reslist['svalue2']); ?>" placeholder="选项之间以英文“|”分割"></td>

    <td>

    </td>
</tr>

<tr  >
    <td>病种选择：</td>
    <td>
        <input type="text" class="px" name="select3" value="<?php echo (($reslist['select3'])?($reslist['select3']):'预约病种'); ?>"></td>
    <td>
         <input name="svalue3" class="px" type="text" value="<?php echo ($reslist['svalue3']); ?>" placeholder="选项之间以英文“|”分割"></td>

     <td>
         <p></p>
    </td>
 </tr>
                                            <tr id="strtxt1"  >
                                                <td>下拉框1：</td>
                                                <td>
                                                    <input type="text" class="px" name="select4" id="select1" value="<?php echo ($reslist['select4']); ?>"></td>
                                                <td>
                                                    <input name="svalue4" class="px" id="svalue" type="text" value="<?php echo ($reslist['svalue4']); ?>" placeholder="选项之间以英文“|”分割"></td>

                                                <td>
                                                    <p><?php if($reslist['select5'] == ''): ?><a class="btnGrayS vm" id="sadd2" href="javascript:sdoaddit(2)">添加</a><?php endif; ?>　<a href="javascript:sdodelit(1)">删除</a><span class="tooltips"><img src="/tpl/Home/pigcms/common/images/price_help.png" align="absmiddle"><span>                 <font color='red'>如果添加的项想删除,<br/>把[字段名称]\[初始内容]里的值清空<br/>提交即可</font>
                </span></span></p>
                                                </td>
                                            </tr>
                                            <tr id="strtxt2" <?php if($reslist['select5'] == ''): ?>style="display: none"<?php endif; ?>>
                                                <td>下拉框2：</td>
                                                <td>
                                                    <input type="text" name="select5" class="px" id="select2" value="<?php echo ($reslist['select5']); ?>"></td>
                                                <td>
                                                    <input name="svalue5" id="svalue2" class="px" type="text" value="<?php echo ($reslist['svalue5']); ?>" placeholder="选项之间以英文“|”分割"></td>

                                                <td>
                                                    <p><a href="javascript:sdodelit(2)">删除</a><span class="tooltips"><img src="/tpl/Home/pigcms/common/images/price_help.png" align="absmiddle"><span>                 <font color='red'>如果添加的项想删除,<br/>把[字段名称]\[初始内容]里的值清空<br/>提交即可</font>
                </span></span></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>多行文字：</td>
                                                <td>
                                                    <input name="datename" class="px" type="text" value="<?php echo (($reslist['datename'])?($reslist['datename']):'留言信息'); ?>"></td>
                                                <td>
                                                    <input name="add[order][]" class="px" type="text" disabled="disabled" value="请输入备注信息" readonly="readonly"></td>

                                                <td>订单默认项</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                                </div>
                                            </div>
                                <div class="control-group" style="display:none">
                                    <label for="" class="control-label">商家通知设置：</label>
                                    <input type="hidden" name="take" value="1" />
                                    <div class="controls">
                                        <div class="row-fluid margin-bm10">
                                            订单通知邮箱：<input type="text" class="input-large" data-rule-email="true" name="email" value="<?php echo ($reslist['email']); ?>"><span class="help-inline"><label class="checkbox inline">
                                                <input type="checkbox" name="open_email" value="1" <?php if($reslist['open_email'] == 1): ?>checked="checked"<?php endif; ?>>
                                                开启
                                            </label>
                                            </span>
                                        </div><p style="margin-left:83px;">当有新订单时，发送邮件到此邮箱</p>
                                    </div>
                                     <div class="controls">
                                        <div class="row-fluid">
                                            订单短信通知：<input type="text" class="input-large" data-rule-mobile="true" name="sms" value="<?php echo ($reslist['sms']); ?>"><span class="help-inline" ><label class="checkbox inline">
                                                <input type="checkbox" name="open_sms" value="1" <?php if($reslist['open_sms'] == 1): ?>checked="checked"<?php endif; ?>>
                                                开启
                                            </label>
                                            </span>
                                        </div><p style="margin-left:83px;">当有新订单时，发送短信到此手机</p>
                                    </div>
                                </div>
                                <div class="form-actions">
            <button id="bsubmit" type="submit" data-loading-text="提交中..." class="btnGreen">保存</button>　<button type="button" class="btnGray vm">取消</button>
        </div>
                        </div>

</form>
  </div>
 <script>
 $("#check_form").validationEngine();
 </script>

        </div>

</div>

</div>

</div>

</div>

</div>

</div>

<?php if($_SESSION['is_syn']== 0): ?><style>

.IndexFoot {

	BACKGROUND-COLOR: #333; WIDTH: 100%; HEIGHT: 39px

}

.foot{ width:988px; margin:0px auto; font-size:12px; line-height:39px;}

.foot .foot_page{ float:left; width:600px;color:white;}

.foot .foot_page a{ color:white; text-decoration:none;}

#copyright{ float:right; width:380px; text-align:right; font-size:12px; color:#FFF;}

.alert-success{color: #993300;background-color: #fcf8e3;border-color: #faebcc;}

</style>



<?php
 if($ischild == 1){ if($usertplid == 2){ $usertplid =1; } } ?>

<?php if($usertplid != 2): ?><div class="IndexFoot" style="height:120px;clear:both">

<div class="foot" style="padding-top:20px;">

<div class="foot_page" >

<a href="<?php echo ($f_siteUrl); ?>"><?php echo ($f_siteName); ?>,微信公众平台营销</a><br/>

帮助您快速搭建属于自己的营销平台,构建自己的客户群体。

</div>

<div id="copyright" style="color:white;">

	<?php echo ($f_siteName); ?>(c)版权所有 <br/>

	技术支持：广州壹正信息科技有限公司



</div>

    </div>

</div><?php endif; ?>

<!-- 帮助悬浮开始 -->

<?php  $data_g=GROUP_NAME; $server = getUpdateServer(); $users=M('Users')->where(array('id'=>$_SESSION['uid']))->find(); if(C('close_help') == 1 && $users['sysuser'] == 0){ $data_g='notingh'; }else{ $textHelp=0; } ?>     

<?php if($usertplid == 2): if(C('close_help') != 1){ $data = array( 'key' => C('server_key'), 'domain' => C('server_topdomain'), 'is_text' => $textHelp, 'data_g' => $data_g, 'data_m' => MODULE_NAME, 'data_a' => ACTION_NAME ); if(!C('emergent_mode')): if(function_exists('curl_init')){ $ch = curl_init(); curl_setopt($ch, CURLOPT_TIMEOUT, 4); curl_setopt($ch, CURLOPT_URL, 'http://sharp2008.vhost024.dns345.cn/up/admin.php?m=help&c=view&a=get_list&'.http_build_query($data)); curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); curl_setopt($ch, CURLOPT_HEADER, 0); $content = curl_exec($ch);curl_close($ch); }else{ $opts = array( 'http'=>array( 'method'=>'GET', 'timeout'=>4, ) ); $fp= stream_context_create($opts); $content = file_get_contents( 'http://sharp2008.vhost024.dns345.cn/up/admin.php?m=help&c=view&a=get_list&'.http_build_query($data), false, $fp); fpassthru($fp); } endif; $content = json_decode($content,true); } ?>

</div>

</div>

<style>

	.tab ul li{padding:0 11px}

	.alert h4 {color: #000;}

	#tags .btnGreen{background-color: #44b549;}

	#tags .btnGreen:hover,#tags .btnGreen:focus,#tags .btnGreenactive{background-color: #44b549;border-color: #44b549;color: #FFFFFF;}

	.mini-navbar .nav > li:nth-last-child(13) ul{margin-top: -421px;}

	.mini-navbar .nav > li:nth-last-child(3) ul{margin-top: -159px;}

	.mini-navbar .nav > li:nth-last-child(4) ul{margin-top: -427px;}

	.mini-navbar .nav > li:nth-last-child(10) ul{margin-top: -85px;}

	#js_editform{width:618px;}

	.lianjie{background: #44b549;color: #fff;margin: 0px 15px;padding: 5px 10px;border-radius: 6px;font-size: 11px;line-height: 14px;margin-top: 3px;}

	.lianjie a:link{color: #fff;}

	.lianjie a:hover {color: #000;}

</style>

<div class="small-chat-box fadeInRight animated" style="margin-right: 100px;margin-bottom:100px;">

        <div class="heading" draggable="true">

             <center><a style="height: auto;width: auto;display: initial;background:#2f4050;padding: 0px 0px 0px 50px;text-align:center;color:#fff;border-radius:0;margin-right:0px;margin-bottom: 0px;" class="open-small-chat">相关帮助&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;X</a></center>	

        </div>

        <div class="content" style="height:220px;">

		<span class="help_content"></span>

			<span class="loading" >

				<img  style="margin-left:50px;" src="./tpl/static/cutprice/js/artDialog/skins/icons/loading.gif" /> 正在加载帮助教程...

			</span>

        </div>

        <a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($f_qq); ?>&site=qq&menu=yes" target="_blank"><div class="form-chat btn btn-primary" style="  text-align: center;">

        在线客服

        </div></a>

    </div>

    <div id="small-chat">

        <span class="badge badge-warning pull-right">不懂就点我</span>

        <a class="open-small-chat">

            <i class="fa fa-weixin" style="width:70px;font-size:40px;"></i>帮助

        </a>

    </div>

</div>

<script type="text/javascript">

		var oDiv1 = document.getElementById('small-chat');

		oDiv1.onclick = function(){

		var flag = true;

			if(flag) {

				$.ajax({

					type : 'GET',

					url : '<?php echo U('User/Index/ajax_help', array('group'=>GROUP_NAME,'module'=>MODULE_NAME, 'action'=>ACTION_NAME)); ?>',

					dataType : 'html',

					success : function (data) {

						if (data) {

							$('.help_content').html(data);

						}

						flag = false;

						$('.loading').hide();

					}

				});

			}

		}

		function openwin(url,iHeight,iWidth){

			var iTop = (window.screen.availHeight-30-iHeight)/2,iLeft = (window.screen.availWidth-10-iWidth)/2;

			window.open(url, "newwindow", "height="+iHeight+", width="+iWidth+", toolbar=no, menubar=no,top="+iTop+",left="+iLeft+",scrollbars=yes, resizable=no, location=no, status=no");

		}

	</script>

    <script src="<?php echo ($staticPath); ?>/tpl/static/new/js/bootstrap.min.js"></script>

    <script src="<?php echo ($staticPath); ?>/tpl/static/new/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <script src="<?php echo ($staticPath); ?>/tpl/static/new/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="<?php echo ($staticPath); ?>/tpl/static/new/js/inspinia.js"></script>

    <script src="<?php echo ($staticPath); ?>/tpl/static/new/js/plugins/pace/pace.min.js"></script>

<?php else: ?>

	<?php if(C('close_help') == 0): ?>

	<link href="<?php echo ($staticPath); ?>/tpl/static/help_xuanfu/css/zuoce.css" type="text/css" rel="stylesheet"/>

	<div class="zuoce zuoce_clear">

		<div id="Layer1">

			<a href="javascript:"><img src="<?php echo ($staticPath); ?>/tpl/static/help_xuanfu/images/ou_03.png"/></a>

		</div>

		<div id="Layer2" style="display:none;height:400px;overflow-y:scroll;">

			<p class="xiangGuan zuoce_clear">相关帮助</p>

			<span class="help_content"></span>

			<span class="loading" >

				<img  style="margin-left:50px;" src="./tpl/static/cutprice/js/artDialog/skins/icons/loading.gif" /> 正在加载帮助教程...

			</span>

			

			<!--p class="anNiuo clear"><a href="#">进入帮助中心27</a></p-->

			<p class="anNiut zuoce_clear"><a href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($f_qq); ?>&site=qq&menu=yes" target="_blank">在线客服</a></p>

		</div>

	</div>

	<script type="text/javascript">

		window.onload = function(){

			var oDiv1 = document.getElementById('Layer1');

			var oDiv2 = document.getElementById('Layer2');

			var flag = true;

			oDiv1.onclick = function(){

				oDiv2.style.display = oDiv2.style.display == 'block' ? 'none' : 'block';

				if(flag) {

					$.ajax({

						type : 'GET',

						url : '<?php echo U('User/Index/ajax_help', array('group'=>GROUP_NAME,'module'=>MODULE_NAME, 'action'=>ACTION_NAME)); ?>',

						dataType : 'html',

						success : function (data) {

							if (data) {

								$('.help_content').html(data);

							}

							flag = false;

							$('.loading').hide();

						}

					});

				}

			}

		}

		function openwin(url,iHeight,iWidth){

			var iTop = (window.screen.availHeight-30-iHeight)/2,iLeft = (window.screen.availWidth-10-iWidth)/2;

			window.open(url, "newwindow", "height="+iHeight+", width="+iWidth+", toolbar=no, menubar=no,top="+iTop+",left="+iLeft+",scrollbars=yes, resizable=no, location=no, status=no");

		}

	</script>

	<?php endif; endif; ?>

<!-- 帮助悬浮结束 -->

<div style="display:none">

<?php echo ($alert); ?> 

<?php echo base64_decode(C('countsz'));?>

</div><?php endif; ?>

</body>



<?php if(MODULE_NAME == 'Function' && ACTION_NAME == 'welcome'){ ?>

<script src="<?php echo ($staticPath); ?>/tpl/static/myChart/js/echarts-plain.js"></script>



<script type="text/javascript">





    var myChart = echarts.init(document.getElementById('main')); 

   



    var option = {

        title : {

            text: '<?php if($charts["ifnull"] == 1): ?>本月关注和文本请求数据统计示例图(您暂时没有数据)<?php else: ?>本月关注和文本请求数据统计<?php endif; ?>',

            x:'left'

        },

        tooltip : {

            trigger: 'axis'

        },

        legend: {

            data:['文本请求数','关注数'],

            x: 'right'

        },

        toolbox: {

            show : false,

            feature : {

                mark : {show: false},

                dataView : {show: false, readOnly: false},

                magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},

                restore : {show: false} ,

                saveAsImage : {show: true}

            }

        },

        calculable : true,

        xAxis : [

            {

                type : 'category',

                boundaryGap : false,

                data : [<?php echo ($charts["xAxis"]); ?>]

            }

        ],

        yAxis : [

            {

                type : 'value'

            }

        ],

        series : [

            {

                name:'文本请求数',

                type:'line',

                tiled: '总量',

                data: [<?php echo ($charts["text"]); ?>]

            },    

            {

                "name":'关注数',

                "type":'line',

                "tiled": '总量',

                data:[<?php echo ($charts["follow"]); ?>]

            }

       



        ]



    };                   



    myChart.setOption(option); 





    var myChart2 = echarts.init(document.getElementById('pieMain')); 

               

    var option2 = {

        title : {

            text: '<?php if($pie["ifnull"] == 1): ?>7日内粉丝行为分析示例图(您暂时没有数据)<?php else: ?>7日内粉丝行为分析<?php endif; ?>',

            x:'center'

        },

        tooltip : {

            trigger: 'item',

            formatter: "{a} <br/>{b} : {c} ({d}%)"

        },

        toolbox: {

            show : false,

            feature : {

                mark : {show: true},

                dataView : {show: true, readOnly: false},

                restore : {show: true},

                saveAsImage : {show: true}

            }

        },

        calculable : true,

        series : [

            {

                name:'粉丝行为统计',

                type:'pie',

                radius : ['50%', '70%'],

                itemStyle : {

                    normal : {

                        label : {

                            show : false

                        },

                        labelLine : {

                            show : false

                        }

                    },

                    emphasis : {

                        label : {

                            show : true,

                            position : 'center',

                            textStyle : {

                                fontSize : '18',

                                fontWeight : 'bold'

                            }

                        }

                    }

                },

                data:[ 

                    <?php echo ($pie["series"]); ?>

                

                ]

            }

        ]

    };

     myChart2.setOption(option2,true); 





    var myChart3 = echarts.init(document.getElementById('pieMain2')); 

    var option3 = {

        title : {

            text: '<?php if($sex_series["ifnull"] == 1): ?>会员性别统计示例图(您暂时没有数据)<?php else: ?>会员性别统计<?php endif; ?>',

            x:'center'

        },

        tooltip : {

            trigger: 'item',

            formatter: "{a} <br/>{b} : {c} ({d}%)"

        },

        toolbox: {

            show : false,

            feature : {

                mark : {show: true},

                dataView : {show: true, readOnly: false},

                restore : {show: true},

                saveAsImage : {show: true}

            }

        },

        calculable : true,

        series : [

            {

                name:'会员性别统计',

                type:'pie',

                radius : ['50%', '70%'],

                itemStyle : {

                    normal : {

                        label : {

                            show : false

                        },

                        labelLine : {

                            show : false

                        }

                    },

                    emphasis : {

                        label : {

                            show : true,

                            position : 'center',

                            textStyle : {

                                fontSize : '18',

                                fontWeight : 'bold'

                            }

                        }

                    }

                },

                data:[

                  <?php echo ($sex_series['series']); ?>

                ]

            }

        ]

    };                     



  myChart3.setOption(option3,true); 







    </script>

<?php } ?>



<?php if(MODULE_NAME == 'RecognitionData' && ACTION_NAME == 'index'){?>

	<script src="<?php echo ($staticPath); ?>/tpl/static/myChart/js/echarts-plain.js"></script>



	<script type="text/javascript">

	<?php if($_GET['rid'] != ''){?>

		var myChart = echarts.init(document.getElementById('main')); 

	   



		var option = {

			title : {

				//text: '<?php if($charts["ifnull"] == 1): ?>【<?php echo ($rname); ?>】本月每日扫描次数和人数统计示例图（没有数据）<?php else: ?>【<?php echo ($rname); ?>】本月每日扫描次数和人数统计<?php endif; ?>',

				x:'left'

			},

			tooltip : {

				trigger: 'axis'

			},

			legend: {

				data:['每日扫描次数','每日扫描人数'],

				x: 'right'

			},

			toolbox: {

				show : false,

				feature : {

					mark : {show: false},

					dataView : {show: false, readOnly: false},

					magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},

					restore : {show: false} ,

					saveAsImage : {show: true}

				}

			},

			calculable : true,

			xAxis : [

				{

					type : 'category',

					boundaryGap : false,

					data : [<?php echo ($charts["xAxis"]); ?>]

				}

			],

			yAxis : [

				{

					type : 'value'

				}

			],

			series : [

				{

					name:'每日扫描次数',

					type:'line',

					tiled: '总量',

					data: [<?php echo ($charts["cishu"]); ?>]

				},    

				{

					"name":'每日扫描人数',

					"type":'line',

					"tiled": '总量',

					data:[<?php echo ($charts["renshu"]); ?>]

				}

		   



			]



		};                   



		myChart.setOption(option); 

	<?php }else{?>

		var myChart2 = echarts.init(document.getElementById('pieMain')); 

				   

		var option2 = {

			title : {

				//text: '<?php if($cishu["ifnull"] == 1): ?>本月扫描次数分析示例图（没有数据）<?php else: ?>本月扫描次数分析图<?php endif; ?>',

				x:'center'

			},

			tooltip : {

				trigger: 'item',

				formatter: "{a} <br/>{b} : {c} ({d}%)"

			},

			toolbox: {

				show : false,

				feature : {

					mark : {show: true},

					dataView : {show: true, readOnly: false},

					restore : {show: true},

					saveAsImage : {show: true}

				}

			},

			calculable : true,

			series : [

				{

					name:'本月扫描次数统计',

					type:'pie',

					radius : ['50%', '70%'],

					itemStyle : {

						normal : {

							label : {

								show : false

							},

							labelLine : {

								show : false

							}

						},

						emphasis : {

							label : {

								show : true,

								position : 'center',

								textStyle : {

									fontSize : '18',

									fontWeight : 'bold'

								}

							}

						}

					},

					data:[ 

						<?php echo ($cishu["series"]); ?>

					

					]

				}

			]

		};

		 myChart2.setOption(option2,true); 

		 

		 

		

		var myChart3 = echarts.init(document.getElementById('pieMain2')); 

		var option3 = {

			title : {

				//text: '<?php if($renshu["ifnull"] == 1): ?>本月扫描人数分析示例图（没有数据）<?php else: ?>本月扫描人数分析图<?php endif; ?>',

				x:'center'

			},

			tooltip : {

				trigger: 'item',

				formatter: "{a} <br/>{b} : {c} ({d}%)"

			},

			toolbox: {

				show : false,

				feature : {

					mark : {show: true},

					dataView : {show: true, readOnly: false},

					restore : {show: true},

					saveAsImage : {show: true}

				}

			},

			calculable : true,

			series : [

				{

					name:'本月扫描人数统计',

					type:'pie',

					radius : ['50%', '70%'],

					itemStyle : {

						normal : {

							label : {

								show : false

							},

							labelLine : {

								show : false

							}

						},

						emphasis : {

							label : {

								show : true,

								position : 'center',

								textStyle : {

									fontSize : '18',

									fontWeight : 'bold'

								}

							}

						}

					},

					data:[

					  <?php echo ($renshu['series']); ?>

					]

				}

			]

		};                     



	  myChart3.setOption(option3,true); 

	<?php }?>

	</script>

<?php }?>

</html>