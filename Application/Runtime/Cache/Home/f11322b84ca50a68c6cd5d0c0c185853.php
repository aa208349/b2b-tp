<?php if (!defined('THINK_PATH')) exit(); if(is_array($commentlist)): $i = 0; $__LIST__ = $commentlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="fn-mc-bk">
        <div class="bk-img">
          <div class="avatar_bg"><img src="<?php echo ((isset($v['head_pic']) && ($v['head_pic'] !== ""))?($v['head_pic']):'/Template/pc/soubao/Static/images/defaultface_user_small.png'); ?>" alt=""></div>
          <h3><?php if($v['is_anonymous'] == 0): ?>匿名用户
              <?php else: ?>
              <?php echo ($v['nickname']); endif; ?>
              </h3>
        </div>
        <div class="bk-r">
          <div class="ui_poptip_arrow poptip_left"><em></em>
            <span></span>
          </div>
          <div class="bk-title fix">
            <div class="fn-comment-star" data-star="5">
                <?php for($i = 0;$i < $v['goods_rank'];$i++){ echo "<i class='star-01'></i>"; } for($j = 0;$j < (5-$v['goods_rank']);$j++){ echo "<i class='star-02'></i>"; } ?>
            </div>
            <span class="bk-title-time"><?php echo (date("Y-m-d H:i:s",$v['add_time'])); ?></span>
          </div>
          <div class="bk-mc">
            <dl class="bk-mc-up">
                <dd>规　　格：</dd>
                <dt class="fix"><?php echo (htmlspecialchars_decode($v['spec_key_name'])); ?> </dt>
                <dd>体　　会：</dd>
                <dt class="fix"><?php echo (htmlspecialchars_decode($v['content'])); ?> </dt>
                <dd>印　　像：</dd>
                <dt class="fix">
                    <?php $impression_arr= explode(',',$v['impression']); if(empty($v['impression'])){ echo "<span>服务好</span><span>物美价廉</span>"; } foreach($impression_arr as $key) { echo "<span>".$key."</span>"; } ?> </dt>
                <dd>购买日期：</dd>
                <dt class="fix"><?php echo (date("Y-m-d H:i:s",$v['pay_time'])); ?></dt>
                <dt class="fix">

                    <br/>  <!--晒单-->
                    <?php if(is_array($v['img'])): foreach($v['img'] as $key=>$v2): ?><a href="<?php echo ($v2); ?>" target="_blank"><img alt="" src="<?php echo ($v2); ?>" width="80" height="80" /></a>&nbsp;&nbsp;<?php endforeach; endif; ?>
                </dt>
            </dl>
            <div class="fn-comment-ignite"><a href="javascript:void(0)" onclick="zan(this);" data-comment-id="<?php echo ($v['comment_id']); ?>"><i class="ignite"></i>赞（
              <span id="span_zan_<?php echo ($v['comment_id']); ?>" data-io="<?php echo ($v['zan_num']); ?>"><?php echo ($v['zan_num']); ?></span>）</a>
			        <a class="fn-answer" ><i class="ignite_noimg"></i>回复（<span><?php echo ($v['reply_num']); ?></span>）</a>
            </div>
          </div>
          <div class="reply-textarea J-reply-con hide">                                
            <div class="reply-arrow"><b class="layer1"></b><b class="layer2"></b></div>                                
            <div class="inner">                                    
              <textarea class="reply-input J-reply-input" data-id="replytext_<?php echo ($v['comment_id']); ?>" placeholder="回复 <?php echo ($v['nick_name']); ?>：" maxlength="120"></textarea>
              <div class="operate-box">                                        
                <span class="txt-countdown">还可以输入<em>120</em>字</span>                                        
                <a class="reply-submit J-submit-reply J-submit-reply-lz" href="javascript:void(0);" target="_self">提交</a>
              </div>                                
            </div>                            
          </div>
          <div class="comment-replylist">
              <?php if(is_array($v['parent_id'])): $i = 0; $__LIST__ = $v['parent_id'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$reply_list): $mod = ($i % 2 );++$i;?><div class="comment-reply-item hide" data-vender="0" data-name="<?php echo ($reply_list['user_name']); ?>" data-uid="" style="display: block;">
              <div class="reply-infor clearfix">
                <div class="main">                                                
                  <span class="user-name"><?php echo ($reply_list['user_name']); ?>
                      <?php if(strtoupper($reply_list['to_name']) != ''): ?>&nbsp;<font style="color: #1a2226">回复</font>&nbsp;<?php echo ($reply_list['to_name']); endif; ?>
                  </span> ：
                    <span class="words"><?php echo ($reply_list['content']); ?></span>
                </div>                                        
                <div class="side">                                            
                  <span class="date"><?php echo (date('Y-m-d H:i:s',$reply_list['reply_time'])); ?></span>
                </div>                                    
              </div>
              <div class="comment-operate">
                <a class="reply J-reply-trigger" href="#none" target="_self">回复</a>                                        
                <div class="reply-textarea J-reply-con hide">                                            
                  <div class="reply-arrow"><b class="layer1"></b><b class="layer2"></b></div>
                  <div class="inner">                                                
                    <textarea data-id="replytext_<?php echo ($v['comment_id']); ?>" class="reply-input J-reply-input" placeholder="回复<?php echo ($reply_list['user_name']); ?>：" maxlength="120"></textarea>
                    <div class="operate-box">                                                    
                      <span class="txt-countdown">还可以输入<em>120</em>字</span>     
                      <a class="reply-submit J-submit-reply" data-id="<?php echo ($reply_list["reply_id"]); ?>"  href="#none" target="_self">提交</a>
                    </div>                                            
                  </div>                                        
                </div>                                    
              </div>                                
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
              <?php if($v['reply_num'] > 5): ?><div class="view-all-reply show"><a href="<?php echo U('Home/Goods/reply',array('comment_id'=>$v['comment_id']));?>" class="view-link reply">查看全部回复</a></div><?php endif; ?>
          </div>

        </div>



</div><?php endforeach; endif; else: echo "" ;endif; ?>
    <!-- /.fn-comment-list -->
    <div class="fn-page-css-1" style="display: block;">
      <div class="fn-page-css-1 pagintion fix" style="display: block;">
      	<!--
        <ul>
          <li class="pg-prev pg-off"><a href="javascript:void(0)"><i></i>上一页</a></li>
          <li class="pg-on pg-index" data-page-index="1"><a href="javascript:void(0)" class="on">1</a></li>
          <li pg-index="" data-page-index="2"><a href="javascript:void(0)">2</a></li>
          <li pg-index="" data-page-index="3"><a href="javascript:void(0)">3</a></li>
          <li pg-index="" data-page-index="4"><a href="javascript:void(0)">4</a></li>
          <li pg-index="" data-page-index="5"><a href="javascript:void(0)">5</a></li>
          <li pg-index="" data-page-index="6"><a href="javascript:void(0)">6</a></li>
          <li class="pg-next" data-page-index="2"><a href="javascript:void(0)">下一页</a></li>
          <li class="pg-num-top">到第</li>
          <li class="pg-num">
            <input type="text" class="jump_index">
          </li>
          <li class="pg-num-bot">页</li>
          <li class="pg-btn"><a href="javascript:void(0);" class="btn_jump">确定</a></li>
        </ul>-->
        <?php echo ($page); ?>
      </div>
    </div>
<script>
    // 点击分页触发的事件
    $("#ajax_comment_return .pagination  a").click(function(){
        cur_page = $(this).data('p');
        ajaxComment(commentType,cur_page);
    });
    /**
     * 点赞ajax
     * dyr
     * @param obj
     */
    function zan(obj) {
        var comment_id = $(obj).attr('data-comment-id');
        var zan_num = parseInt($("#span_zan_" + comment_id).text());
        $.ajax({
            type: "POST",
            data: {comment_id: comment_id},
            dataType: 'json',
            url: "/index.php?m=Home&c=user&a=ajaxZan",//
            success: function (res) {
                if (res.success) {
                    $("#span_zan_" + comment_id).text(zan_num + 1);
                } else {
                    alert('只能点赞一次哟~');
                }
            },
            error : function(res) {
                if( res.status == "200"){ // 兼容调试时301/302重定向导致触发error的问题
                    alert("请先登录!");
                    return;
                }
                alert("请求失败!");
                return;
            }
        });
    }

    reply_text = null;
    //回复
    $(document).ready(function() {
      $('.fn-comment-ignite .fn-answer').click(function() {
          $(this).parents('.bk-mc').siblings('.reply-textarea').toggleClass('hide');
      });  
      $(document).on('click','.comment-operate .reply', function() {
        $(this).siblings('.reply-textarea').toggle();
      });
      $(document).on('click','.operate-box .reply-submit',function() {
        var content = $(this).parents('.inner').find('.reply-input').val();
        var comment_id = $(this).parents('.inner').find('.reply-input').attr('data-id').substr(10);
        var comment_name = $(this).parents('.comment-operate').siblings('.reply-infor').find('.main .user-name').text();
        var reply_id = $(this).attr('data-id');
        submit_reply(comment_id,content,comment_name,reply_id);
//        $(this).parents('.comment-replylist').append('<div class="comment-reply-item hide" data-vender="0" data-name="中国管理" data-uid="" style="display: block;"> <div class="reply-infor clearfix"> <div class="main"> <span class="user-name">中国管理</span> ：<span class="words"> 此处添加内容 </span> </div> <div class="side"> <span class="date">2016.08.08</span> </div> </div> <div class="comment-operate"> <a class="reply J-reply-trigger" href="#none" target="_self">回复</a> <div class="reply-textarea J-reply-con hide"> <div class="reply-arrow"><b class="layer1"></b><b class="layer2"></b></div> <div class="inner"> <textarea class="reply-input J-reply-input" placeholder="回复中国管理：" maxlength="120"></textarea> <div class="operate-box"> <span class="txt-countdown">还可以输入<em>120</em>字</span> <a class="reply-submit J-submit-reply" href="#none" target="_self">提交</a> </div> </div> </div> </div> </div>')
        $(this).parents('.reply-textarea').toggleClass('hide');
      });
    });
    //字数限制
    $(document).on('keyup', '.reply-input', function() {
      var curLength=$(this).val().length; 
      if(curLength>120) { 
        var num=$(this).val().substr(0,120); 
        $(this).val(num); 
        alert("超过字数限制！" ); 
      } else { 
        $(this).siblings('.operate-box').find('.txt-countdown em').text(120-$(this).val().length); 
      } 
    });

    function submit_reply(comment_id,content,to_name,reply_id)
    {
        $.ajax({
            type: 'post',
            dataType: 'json',
            data: {comment_id: comment_id,content:content,to_name:to_name,reply_id:reply_id,goods_id:'<?php echo ($goods_id); ?>'},
            url: "<?php echo U('Home/User/reply_add');?>",
            success: function (res) {
                if (res.success) {
                    // layer.msg('回复已提交', {icon: 1});
                    alert('回复已提交');
                } else {
                    alert(res.msg);
                }
            },
            error : function(res) {
                if( res.status == "200"){ // 兼容调试时301/302重定向导致触发error的问题
                    alert("请先登录!");
                    return;
                }
                alert("请求失败!");
            }
        });
    }
</script>