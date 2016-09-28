<link rel="stylesheet" href="<?php echo SHOP_TEMPLATES_URL; ?>/newcss/dengluye.css"/>
<link rel="stylesheet" href="<?php echo SHOP_TEMPLATES_URL; ?>/newcss/header.css"/>
<div id="append_parent"></div>
<div>
 <div class="nav">
         <div class="nav-left">
			<a href="<?php echo C('new_index_url'); ?>">
            <img src="<?php echo SHOP_TEMPLATES_URL; ?>/newimg/indexlogo.png" alt=""/>
			</a>
            <div class="feileishousuo" id="feileishousuo">
               <span class="feilicon" id="feilicon"></span>
            </div>
         </div>
        <div class="nav-right">
            <div class="nav-ll">
             <span class="youmingtang">
                  <i>有名堂</i>
                  <div class="ymt-ziye">
                      <u></u>
                      <i><a href="<?php echo C('shop_site_url'); ?>/index.php?act=search&op=allpinpai" target="_blank">品牌</a></i>
                      <i><a href="<?php echo C('shop_site_url'); ?>/index.php?act=search&op=alljiangzao" target="_blank">匠造</a></i>
                  </div>
             </span>
             <span><a href="index.php?act=index&op=cms">艺圈</a></span>
             <span>
				<?php if ($_SESSION['is_login']) {?>
					
					<i class="yidenglu">
                     <div>
                         <img src="<?php echo getMemberAvatarForID($_SESSION['member_id']); ?>" alt=""/><u><?php echo $_SESSION['member_name'];?></u>
                     </div>
                     <div class="ab-out">
                         <u></u>
                         <i><a href="<?php echo urlShop('member','home');?>">关于我</a></i>
                         <i><a href="index.php?act=login&amp;op=logout">退出登录</a></i>
                     </div>
                 </i>
					
				<?php } else { ?>
					<i class="weidenglu"><a href="index.php?act=login&op=index">登录<a>/<a href="index.php?act=login&op=register">注册</a></i>
                 
				 <?php } ?>
             </span>
             <span class="gouwuche">
				<a href="index.php?act=cart">
                 <img src="<?php echo SHOP_TEMPLATES_URL; ?>/newimg/gouwuche.png" alt=""/>
				 <?php if ($output['cart_goods_num'] > 0) { ?>
                 <i><?php echo $output['cart_goods_num']; ?></i>
				 <?php } else { ?>
					
					<i>0</i>
				 <?php } ?>
				 </a>
             </span>
            </div>
            <div class="nav-rr">
               <span>商家登录</span>
               <span>关于玩艺</span>
            </div>
        </div>
        <div class="shousuo">
			<form method="get" action="<?php echo SHOP_SITE_URL; ?>">
					<span class="search">
						<input type="text" placeholder="请输入关键字" name="keyword" id="keyword" value="<?php echo $_GET['keyword']; ?>"  class="shousuo-input"/>
						<input type="hidden" value="search" id="search_act" name="act">
                        <input type="hidden" value="key" id="search_key" name="key">
						<i>
							<img src="<?php echo SHOP_TEMPLATES_URL; ?>/newimg/indexsuch.png" alt=""/>
							<button type="submit">搜索</button>
						</i>
					</span>
				</form>
            
            <div class="shousuo-guanjian">
                <i>adfsfasdf注册</i>
                <i>adfsfasdf注册</i>
                <i>adfsfasdf注册</i>
                <i>adfsfasdf注册</i>
            </div>
        </div>
        <div style="clear: both"></div>
        <div class="flss-main" id="flss-main">
            <div class="fenleiyi">
				<?php if(!empty($output['all_goods_class_array'])) { ?>
				<ul>
				<?php foreach($output['all_goods_class_array'] as $kAll => $vAll){ ?>
			
					<li onclick="getDownGoodsClass(<?php echo $vAll['gc_id']; ?>)">
						
							<?php echo $vAll['gc_name']; ?>
						
					</li>
		 
				<?php } ?>
				</ul>
				<?php } ?>
               <!-- <ul>
                    <li>女士用品</li>
                    <li>|</li>
                    <li>我爱我家</li>
                    <li>|</li>
                    <li>科技数码</li>
                    <li>|</li>
                    <li>艺术生活</li>
                    <li>|</li>
                    <li>男士用品</li>
                    <li>|</li>
                    <li>美味餐厨</li>
                    <li>|</li>
                    <li>欢乐办公</li>
                    <li>|</li>
                    <li>旅行必备</li>
                </ul> -->
            </div>
            <div style="clear: both"></div>
            <div id="down_goods_class_array" class="fenleier">
				
				<?php if(!empty($output['down_goods_class_array'])){ ?>
				<ul>
				<?php foreach($output['down_goods_class_array'] as $kDown => $vDown){ ?>
			
					<li>
						<a href="<?php echo C('shop_site_url'); ?>/index.php?act=search&op=index&cate_id=<?php echo $vDown['gc_id']; ?>" >
							<?php echo $vDown['gc_name']; ?>
						</a>
					</li>
		 
				<?php } ?>
				</ul>
				<?php } ?>
                 <!-- <ul>
                    <li>格调</li>
                    <li>卧室</li>
                    <li>卫浴</li>
                    <li>收纳</li>
                    <li>照明</li>
                    <li>家具</li>
                </ul> -->
            </div>
        </div>
    </div>
	<script >
      $(document).ready(function(){
        $(".shousuo-input").focus(function(){
            $(".shousuo").animate({width:'350px'},"slow");
        });
        var flss=document.getElementById("feileishousuo");
        var flssMain=document.getElementById("flss-main");
        var feilicon=document.getElementById("feilicon");
        flss.onclick=function(){
            flssMain.style.display=flssMain.style.display=="block"?"none":"block";
            flssMain.style.width = document.body.clientWidth+"px";
            feilicon.className=feilicon.className=="feilicon"?"feilicon hover":"feilicon";
        };
    });
	
	function getDownGoodsClass(id) {

		var url = <?php echo "'".C('shop_site_url')."'"; ?> + "/index.php?act=goods&op=getDownGoodsClass";
		
		$.ajax({
					
			type:"GET",
			url:url,
			data: {'gc_id':id},
			dataType:"json",
					
			success: function(data) {

				var info = data.info;
				
				var str = '';
				
				str += '<ul>';
				
				for(i=0; i<info.length; i++) {
					
					str += '<li>';
					str += '<a href="' + info[i]['a_href'] + '" >';
					str += info[i]['gc_name'];
					str += '</a>';
					str += '</li>';
				}
				
				str += '</ul>';

				$('#down_goods_class_array').html(str);
				//console.log(data);
						
			},
					
			error : function(e) {
						
				console.log("e");
						
			}
					
		});
					
	}
</script>