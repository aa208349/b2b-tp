<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我要入驻-初始协议</title>
<link href="/Template/pc/soubao/Static/css/qt_style.css" rel="stylesheet" type="text/css" />
<link href="/Template/pc/soubao/Static/css/common.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Public/js/jquery-1.8.2.min.js"></script>
<style>
.store-joinin-apply {
    filter: progid:DXImageTransform.Microsoft.gradient(enabled='true', startColorstr='#D8FFFFFF', endColorstr='#D8FFFFFF');
    background: #fff;
    opacity: 0.85;
    width: 790px;
    padding: 20px 100px;
    margin: 20px auto;
}
.main {
    width: 790px;
    border-radius: 4px;
}
.main .explain {
    font: 16px/32px "microsoft yahei";
    color: #777;
    margin: 10px 0 100px 0;
}

.main .bottom, .apply-agreement .bottom, .joinin-pay .bottom {
    text-align: center;
    height: 30px;
    margin: 30px 0 10px 0;
}
/*操作温馨提示*/
.operat-tips{ color: #666; background: rgba(93,178,255,.1); border: 1px solid #BCE8F1; padding: 20px;margin-top: 20px;}
.operat-tips h4{font-size: 14px; font-weight: normal; line-height: 20px; height: 20px;}
.operat-tips h4 i{background-position: -384px -224px;height: 26px;margin-right: 10px}
.operat-tips ul.operat-panel{ padding: 10px 0px 0px 20px;}
.operat-tips ul.operat-panel li { line-height: 20px; margin-bottom: 2px; list-style-type: disc; padding-left: 3px; list-style-position: outside; font-size: 8px;}
.operat-tips ul.operat-panel li span{ font-size: 12px; color: #999;}

ul, ol, li {
    list-style-image: none;
    list-style-type: none;
}
/*成功提示*/
.operat-tips.success h4,.operat-tips.lose h4{ font-weight:600; height:30px; font-size:15px; line-height:30px;}
.operat-tips.success h4 i,.operat-tips.lose h4 i{background: url(../images/apply/joinin_pic.png) no-repeat -216px -150px;width: 30px;height: 30px;}
.operat-tips.lose h4 i{ background-position:-135px -150px;}
.operat-tips p,.operat-tips .bottom{ text-align:left; padding: 10px 0px 0px 20px;}
.operat-tips p.handle{ margin-top:20px;}
.operat-tips p.handle span.line{ color:#999; margin:0px 20px}
.bottom {text-align: left;padding: 10px 0px 0px 20px;margin-top: 20px;}
.bottom .btn {margin-right: 5px;}
a.btn-primary, .btn-primary {background-color: #df3434;color: #fff; border-color: #df3434;}
.btn {
    font-family: "Microsoft Yahei", "Lucida Grande", Verdana, Lucida, Helvetica, Arial, sans-serif;
    display: inline-block;
    padding: 0 10px;
    height: 32px;
    line-height: 30px;
    color: #666;
    min-width: 80px;
    cursor: pointer;
    text-align: center;
    font-size: 12px;
    font-weight: 400;
    box-sizing: border-box;
    vertical-align: middle;
    -webkit-appearance: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    outline: 0;
    text-decoration: none;
    background-image: none;
    background-color: #f6f6f6;
    border: 1px solid #ccc;
    border-radius: 2px;
}
.btn-link {color: #0579c6;}
.operat-tips a:hover{color: #E31939;text-decoration: none;cursor: pointer;}
.ad-box, .ad-box a {width:100%;margin: 40px auto 10px;}
.ad-box .ad-img {max-width: 100%;max-height: 100%;}
a.btn-primary:hover, .btn-primary:hover {color: #fff;background-color: #ee3f36;border-color: #ee3f36;}
</style>
</head>
<body>
<div class="m-top-bar editable" moduleid="1539923" style="position:relative;min-height:25px;">
  <div class="container">
    <ul class="fl">
      <?php if($user[user_id] > 0): ?><li class="fl J_login_status"><a href="<?php echo U('Home/user/index');?>" alt="" title="" target="_self"><?php echo ($user['nickname']); ?></a>
      	<a  href="<?php echo U('Home/user/logout');?>" style="margin:0 10px;" title="退出" target="_self">退出</a></li>
      </li>
      <?php else: ?>
      	<li class="fl J_login_status"><a class="menu-item fl J_do_login J_chgurl" href="<?php echo U('Home/user/login');?>">
        <span>Hi，请登录</span> </a><a class="menu-item fl ht" href="<?php echo U('Home/user/reg');?>">免费注册</a><?php endif; ?>
      <li class="fl sep"></li>
      <li class="fl select-city dropdown">
        <span class="menu-item">
        <span>送货至：</span>
        <a title="" alt="" href="" class="J_cur_place"></a><i class="dd"></i></span>
      </li>
    </ul>
    <ul class="fr bar-right">
      <li class="fl dropdown my-feiniu"><a class="menu-item" target="_blank" href="">
        <span>我的商城</span><i class="dd"></i></a>
        <ul class="sub-panel">
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/Home/User/order_list');?>">我的订单</a></li>
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/Home/User/account');?>">我的积分</a></li>
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/Home/User/coupon');?>">我的优惠券</a></li>
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/Home/User/goods_collect');?>">我的收藏夹</a></li>
          <li><a class="J_chgurl" target="_blank" href="<?php echo U('/Home/User/comment');?>">我的评论</a></li>
        </ul>
      </li> 
      <li class="fl sep"></li>
      <li class="fl dropdown mobile-feiniu"><a class="menu-item" href=""><i class="fl ico"></i>
        <span class="fl">手机TPshop网</span>
        <i class="dd"></i></a>
        <div class="sub-panel m-lst">
          <p>扫一扫，下载TPshop客户端</p>
          <dl>
            <dt class="fl mr10"><a target="_blank" href=""><img height="80" width="80" src="/Template/pc/soubao/Static/images/qrcode_vmall_app01.png"></a></dt>
            <dd class="fl mb10"><a target="_blank" href=""><i class="andr"></i> Andiord</a></dd>
            <dd class="fl"><a target="_blank" href=""><i class="iph"></i> iPhone</a></dd>
          </dl>
        </div>
      </li>
      <li class="fl sep"></li>
      <li class="fl"><a class="menu-item" href="" target="_blank">
        <span>帮助中心</span>
        </a></li>
      <li class="fl sep"></li>
      <li class="fl about-us"><a class="txt fl" style="line-height:unset;" href="">关注我们：</a></li>
      <li class="fl dropdown weixin"><a href="" class="fl ico"></a>
        <div class="sub-panel wx-box">
          <span class="arrow-b">◆</span>
          <span class="arrow-a">◆</span>
          <p class="n"> 扫描二维码 <br>	关注TPshop网官方微信 </p>
          <img src="/Template/pc/soubao/Static/images/qrcode_vmall_app01.png"></div>
      </li>
    </ul>
  </div>
</div> 
<div class="gome-wrap bg">
	<div style="position: relative;top: -40px;left: 190px;">
    	<a href="/" target="_blank" class="item fl"><img height="60" width="160" src="<?php echo ($tpshop_config['shop_info_store_logo']); ?>"></a>
    </div>
	<div class="gome-layout-area">
        <ul class="gome-nav">
            <li><a href="<?php echo U('Newjoin/index');?>" target="_blank">招商首页</a></li>
        	<?php
 $md5_key = md5("select * from `__PREFIX__article_cat` where parent_id=2"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from `__PREFIX__article_cat` where parent_id=2"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><li><a href="<?php echo U('Newjoin/question',array('cat_id'=>$v[cat_id]));?>" target="_blank"><?php echo ($v["cat_name"]); ?></a></li><?php endforeach; ?>
        </ul>
    </div>
</div>
<div class="gome-layout-area pb50 clearfix">
    	<ul class="steps clearfix">
        	<li class="first prev ok"><b>1</b><span class="going"></span><em class="f">入驻须知</em></li>
        	<li class="prev ok"><b>2</b><span class="going"></span><em class="f">填写公司信息</em></li>
        	<li class="prev ok"><b>3</b><span class="going"></span><em class="f">填写店铺信息</em></li>
        	<li class="prev ok"><b>4</b><span class="going"></span><em class="f">资质上传</em></li>
        	<li class="last"><b>5</b><em class="f">等待审核</em></li>
        </ul>
<div class="store-joinin-apply">
  <div class="main">
    <div class="main">
		<div class="explain"><i></i>
		<?php if($apply[apply_state] == 0): ?><p style="text-align:center;">入驻申请已经提交，请等待管理员审核</p>
			<?php if($apply[paying_amount] > 0): ?><span>请缴纳入驻费：<?php echo ($apply["paying_amount"]); ?> 元</span>	
			<form name="" method="post" enctype="multipart/form-data">
         		<input type="text" name="paying_amount_cert" id="paying_amount_cert" class="input260" value="<?php echo ($apply["paying_amount_cert"]); ?>">
                <input type="button" class="gome-btn-red" onClick="GetUploadify(1,'paying_amount_cert','seller','')"  value="上传付款凭证"/>
               	<input type="submit" class="gome-btn-gray"  value="提交"/>
               	<?php if(!empty($apply["paying_amount_cert"])): ?><div style="width: 640px;height: 320px;">
                    	<img height="320" src="<?php echo ($apply["paying_amount_cert"]); ?>" nc_type="store_label">
     				</div><?php endif; ?>
         	</form><?php endif; ?>
		<?php elseif($apply[apply_state] == 1): ?>
			<div class="operat-tips success">
				<h4>
					<i></i>恭喜您的申请审核通过，店铺创建成功！
				</h4>
				<ul class="operat-panel">
					<li>
						<span>现在您可以去经营您的店铺了，赶紧去发布商品吧；</span>
					</li>
					<li>
						<span>
							您也可以登录
							<a class="btn-link" href="<?php echo U('Seller/Admin/login');?>">商家入驻中心</a>
							及时查看审核状态；
						</span>
					</li>
					<li>
						<span> 如有疑问请联系网站客服。 </span>
					</li>
				</ul>
		
				<div class="bottom">
					<a class="btn btn-primary" href="<?php echo U('Seller/Admin/login');?>">进入卖家中心 </a>
					<a class="btn" href="<?php echo U('Index/index');?>">返回首页 </a>
				</div>
				<p class="handle">
					您还可以：
					<a class="btn-link" href="<?php echo U('Seller/Admin/login');?>">进入卖家中心，完善店铺信息</a>
				</p>
			</div>
		<?php else: ?>
			<p style="color:red;">抱歉，您的申请没有通过，<?php echo ($apply["review_msg"]); ?></p>
			<div class="operat-tips success">
				<div class="bottom">
					<a class="btn btn-primary" href="<?php echo U('Newjoin/basic_info');?>">修改申请资料 </a>
					<a class="btn" href="<?php echo U('Index/index');?>">返回首页 </a>
				</div>
			</div><?php endif; ?>
		</div>
		<div class="bottom"></div>
	</div>
  </div>
</div>
</div>
<!-- footer start [[-->
<div class="foot">
          <div class="foot-box container fn-clear fixed">
    <dl class="foot-item foot-phone">
              <dt><?php echo ($tpshop_config['shop_info_phone']); ?></dt>
              <!--<dd>CEO邮箱：ceo@tp-shop.cn</dd>-->
              <dd>客服邮箱：673964249@qq.com</dd>
            </dl>
	    <?php
 $md5_key = md5("select * from `__PREFIX__article_cat` where parent_id = 2"); $result_name = $sql_result_v = S("sql_".$md5_key); if(empty($sql_result_v)) { $Model = new \Think\Model(); $result_name = $sql_result_v = $Model->query("select * from `__PREFIX__article_cat` where parent_id = 2"); S("sql_".$md5_key,$sql_result_v,1); } foreach($sql_result_v as $k=>$v): ?><dl class="foot-item foot-list">
              <dt class=""><?php echo ($v[cat_name]); ?></dt>
              <?php
 $md5_key = md5("select * from `__PREFIX__article` where cat_id = $v[cat_id]"); $result_name = $sql_result_v2 = S("sql_".$md5_key); if(empty($sql_result_v2)) { $Model = new \Think\Model(); $result_name = $sql_result_v2 = $Model->query("select * from `__PREFIX__article` where cat_id = $v[cat_id]"); S("sql_".$md5_key,$sql_result_v2,1); } foreach($sql_result_v2 as $k2=>$v2): ?><dd><a target="_blank" href="<?php echo U('Home/Article/detail',array('article_id'=>$v2[article_id]));?>"><?php echo ($v2[title]); ?></a></dd><?php endforeach; ?>
	        </dl><?php endforeach; ?>  
    <dl class="foot-item foot-attention">
              <dd>
        <div class="att-weixin"> <img src="/Template/pc/soubao/Static/images/weixin.png" width="85" height="85"> </div>
        <p>TPshop网微信</p>
      </dd>
              <dd>
        <div class="att-client"> <img src="/Template/pc/soubao/Static/images/app.png" width="85" height="85"> </div>
        <p>TPshop网客户端</p>
      </dd>
            </dl>
  </div>
  <div class="foot-info container">
    <p>Copyright <em>©</em> 2016-2025 <?php echo ($tpshop_config['shop_info_store_name']); ?>  版权所有 保留一切权利 备案号:<?php echo ($tpshop_config['shop_info_record_no']); ?></p> 
    <ul class="foot-chop">
              <!--			<li class="icbc">
							<a href="" target="_blank"></a>
						</li>
						<li class="alipay">
							<a href="" target="_blank"></a>
						</li>
						<li class="unionpay">
							<a href="" target="_blank"></a>
						</li>
						<li class="tenpay">
							<a href="" target="_blank"></a>
						</li>-->
              <li class="gongshang"> <a href="" target="_blank"></a> </li>
              <li class="sh-letter"> <a href="" target="_blank"></a> </li>
              <li class="honesty"> <a href="" target="_blank"></a> </li>
              <li> <a href="" target="_blank"> <img src="/Template/pc/soubao/Static/images/time_cnnic.jpg"> </a> </li>
              <li> <a href="" target="_blank"> <img src="/Template/pc/soubao/Static/images/aqlm.jpg"> </a> </li>
            </ul>
  </div>
</div>
<script type="text/javascript" src="/Template/pc/soubao/Static/js/jquery.lazyload.js"></script>
<script src="/Public/js/global.js"></script>
<script type="text/javascript" src="/Template/pc/soubao/Static/js/common.js"></script>
<!-- footer end ]]--> 
</body>
</html>