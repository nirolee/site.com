<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>关于我们</title>
<link href="<?php echo RES;?>/images/main.css" type="text/css" rel="stylesheet">
<script src="<?php echo STATICS;?>/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo STATICS;?>/function.js" type="text/javascript"></script>
<meta http-equiv="x-ua-compatible" content="ie=7" />
</head>
<body class="warp">
<div id="artlist">
	<div class="mod kjnav">
		<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo U($action.'/'.$vo['name'],array('pid'=>$_GET['pid'],'level'=>3,'title'=>urlencode ($vo['title'])));?>"><?php echo ($vo['title']); ?></a>
		<?php if(($action == 'Article') or ($action == 'Img') or ($action == 'Text') or ($action == 'Voiceresponse')): break; endif; endforeach; endif; else: echo "" ;endif; ?>
	</div>   	
</div>
<div class="cr"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="0" id="alist">
      <tr>

        <td>标题</td>
        <td>管理操作（仅支持添加一项）</td>
      </tr>
<?php if($list != ''): ?><tr>
                <!-- <td align='center'><?php echo ($list['id']); ?></td> -->
                <td ><?php echo ($list['title']); ?></td>

                <td align='center'>
                    <a href="<?php echo U('Aboutus/edit/',array('id'=>$list['id'],'pid'=>$pid));?>">修改</a>
                    | <?php if(($list["username"]) == "admin"): ?><font color="#cccccc">删除</font><?php else: ?><a href="javascript:void(0)" onclick="return confirmurl('<?php echo U('Aboutus/del/',array('id'=>$list['id'],'pid'=>$pid));?>','确定删除该信息吗?')">删除</a><?php endif; ?>
                </td>
            </tr><?php endif; ?>
        <style>
            .current{border: 0;padding: 1px 9px;color: #fff;background: #3F8EF3 url(main/pageh.png) no-repeat;}
        </style>
     <tr bgcolor="#FFFFFF">

     <!--  <td colspan="8"><div class="listpage"><?php echo ($page); ?></div></td> -->

    </tr>

</table>



</body>
</html>