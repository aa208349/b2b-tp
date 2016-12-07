<?php
/**
 * tpshop
 * ============================================================================
 * 版权所有 2015-2027 深圳搜豹网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.tp-shop.cn
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author: 当燃
 * Date: 2016-05-28
 */

namespace Mobile\Controller;

use Home\Logic\StoreLogic;
use Think\Controller;
use Think\Page;

class StoreController extends Controller {
	public $store = array();
	public $navigation = null;
	
	public function _initialize() {
		$store_id = I('store_id');
		if(empty($store_id)){
			$this->error('参数错误,店铺系列号不能为空',U('Index/index'));
		}
		$store = M('store')->where(array('store_id'=>$store_id))->find();
		// dump($store);exit;
		if($store){
			if($store['store_state'] == 0){
				$this->error('该店铺不存在或者已关闭', U('Index/index'));
			}
			$store['mb_slide'] = explode(',', $store['mb_slide']);
			$store['mb_slide_url'] = explode(',', $store['mb_slide_url']);
			$this->store = $store;
			$this->assign('store',$store);
			$this->navigation = M('store_navigation')->field('sn_content', true)->where(array('sn_store_id' => $store_id, 'sn_is_show' => 1))->select();//店铺导航
			// dump($this->navigation);exit;
			//店铺内部分类
        	$goods_class = M('store_goods_class')->where(array('store_id' => $store_id,'is_nav_show'=>'1','is_show'=>'1'))->select();
			 $this->assign('navigation',$this->navigation);
			 $this->assign('goods_class',$goods_class);
			 $this->assign('storeid',$this->store['store_id']);
		}else{
			$this->error('该店铺不存在或者已关闭',U('Index/index'));
		}
		if (session('?user')) {
			$user = session('user');
			$this->user_id = $user['user_id'];
			$this->assign('user', $user); //存储用户信息
		}

		 	// zhoufei
            C('VIEW_PATH','./Merchants_tpl/mobile/');//模板路径
            $tplconfig = include('./Merchants_tpl/pc/'.M('store')->where(array('store_id' => $store_id))->getField('tpl').'/config.php');
            C('DEFAULT_THEME',$tplconfig['mtpl']);//模板名称


            define('STYLE',substr(C('VIEW_PATH').C('DEFAULT_THEME'),1));
            C('DOMAIN','http://'.$_SERVER['HTTP_HOST']);
            // zhoufei
	}
	
	public function index()
	{
		//热门商品排行
		$hot_goods = M('goods')->field('goods_content',true)->where(array('store_id'=>$this->store['store_id']))->order('sales_sum desc')->limit(9)->select();
		// dump($hot_goods);exit;
		//新品
		$new_goods = M('goods')->field('goods_content',true)->where(array('store_id'=>$this->store['store_id'],'is_new'=>1))->order('goods_id desc')->limit(9)->select();
		//推荐商品
		$recomend_goods = M('goods')->field('goods_content',true)->where(array('store_id'=>$this->store['store_id'],'is_recommend'=>1))->order('goods_id desc')->limit(9)->select();
		//所有商品
		$total_goods = M('goods')->where(array('store_id'=>$this->store['store_id'],'is_on_sale'=>1))->count();


		$this->assign('hot_goods',$hot_goods);
		$this->assign('new_goods',$new_goods);
		$this->assign('recomend_goods',$recomend_goods);
		$this->assign('total_goods',$total_goods);
		$total_goods = M('goods')->where(array('store_id'=>$this->store['store_id'],'is_on_sale'=>1))->count();
		$this->assign('total_goods',$total_goods);
		$this->display('/index');
	}
	
	public function goods_list(){
        $store_id = I('store_id', 1);
        $cat_id = I('cat_id', 0);
        $key = I('key', 'is_new');
        $sort = I('sort', 'desc');
        $keyword = urldecode(trim(I('keyword','')));
        $map = array('store_id' => $store_id, 'is_on_sale' => 1);
        $keyword && $map['goods_name']  = array('like','%'.$keyword.'%');

        $cat_name = "全部商品";
        if ($cat_id > 0) {
            $map['_string'] = "store_cat_id1=$cat_id OR store_cat_id2=$cat_id";
            $cat_name = M('store_goods_class')->where(array('cat_id' => $cat_id))->getField('cat_name');
        }
        $filter_goods_id = M('goods')->where($map)->cache(true)->getField("goods_id", true);
        $count = count($filter_goods_id);
        $Page = new \Think\Page($count, 20);
        if ($count > 0) {
            $goods_list = M('goods')->where("goods_id in (" . implode(',', $filter_goods_id) . ")")->order("$key $sort")->limit($Page->firstRow . ',' . $Page->listRows)->select();
            $filter_goods_id2 = get_arr_column($goods_list, 'goods_id');
            if ($filter_goods_id2) {
                $goods_images = M('goods_images')->where("goods_id in (" . implode(',', $filter_goods_id2) . ")")->cache(true)->select();
            }
        }

        $sort = ($sort == 'desc') ? 'asc' : 'desc';
        $this->assign('sort', $sort);
        $this->assign('keys', $key);
        $link_arr = array(
            array('key' => 'is_new', 'name' => '新品', 'url' => U('Store/goods_list', array('store_id' => $store_id, 'key' => 'is_new', 'sort' => $sort, 'cat_id'=>$cat_id, 'keyword'=>$keyword))),
            array('key' => 'shop_price', 'name' => '价格', 'url' => U('Store/goods_list', array('store_id' => $store_id, 'key' => 'shop_price', 'sort' => $sort, 'cat_id'=>$cat_id,'keyword'=>$keyword))),
            array('key' => 'sales_sum', 'name' => '销量', 'url' => U('Store/goods_list', array('store_id' => $store_id, 'key' => 'sales_sum', 'sort' => $sort, 'cat_id'=>$cat_id, 'keyword'=>$keyword))),
            array('key' => 'collect_sum', 'name' => '收藏', 'url' => U('Store/goods_list', array('store_id' => $store_id, 'key' => 'collect_sum', 'sort' => $sort, 'cat_id'=>$cat_id, 'keyword'=>$keyword))),
            array('key' => 'is_recommend', 'name' => '人气', 'url' => U('Store/goods_list', array('store_id' => $store_id, 'key' => 'is_recommend', 'sort' => $sort, 'cat_id'=>$cat_id, 'keyword'=>$keyword)))
        );
        $this->assign('link_arr', $link_arr);
        $this->assign('goods_list', $goods_list);
        $this->assign('goods_images', $goods_images);  //相册图片
        $this->assign('cat_name', $cat_name);
        $page_show = $Page->show();// 分页显示输出
        $this->assign('page_show', $page_show);// 赋值分页输出
        $this->assign('keyword',$keyword);
        $this->display('/goods_list');
	}
	

	public function about(){
		$total_goods = M('goods')->where(array('store_id'=>$this->store['store_id'],'is_on_sale'=>1))->count();
		$this->assign('total_goods',$total_goods);
		$this->display('/about');
	}
	
	public function store_goods_class(){
		$store_goods_class_list = M('store_goods_class')->where(array('store_id'=>$this->store['store_id']))->select();
		if($store_goods_class_list){
			$sub_cat = $main_cat = array();
			foreach ($store_goods_class_list as $val){
			    if ($val['parent_id'] == 0) {
                    $main_cat[] = $val;
                } else {
                    $sub_cat[$val['parent_id']][] = $val;
                }
			}
			$this->assign('main_cat',$main_cat);
			$this->assign('sub_cat',$sub_cat);
		}
		$this->display('/store_goods_class');
	}





	public function store_news()
	{
		$sn_id = I('sn_id');
		if(is_numeric($sn_id)){
	    $news = M('store_navigation')->where(array('sn_store_id' => $this->store['store_id'], 'sn_id' => $sn_id))->find();
        $this->assign('news', $news);
        $this->display('/store_news');
		}else{
			$this->_empty();
		}
		
	}




    public function newsList(){

        $storeid = $this->store['store_id'];
        $sn_id = (empty($_GET['sn']))?0:(int)$_GET['sn'];
        $_GET['p'] = isset($_GET['p'])?$_GET['p']:0;
        if(is_numeric($sn_id)){
	        $news = M('store_art')->where('store = '.$storeid.' and sn_id in (0,'.$sn_id.')')->page($_GET['p'].',15')->select();
	        $count = M('store_art')->where('store = '.$storeid.' and sn_id in (0,'.$sn_id.')')->count();
	        $page = new \Think\Page($count,15);
	        $this->assign('sn_id',$sn_id);
	        $this->assign('page',$page->show());
	        $newslist = M('store_navigation')->where(array('store_id'=>$storeid,'sn_id'=>$sn_id))->find();
	        $this->assign('news',$news);
	        $this->assign('newslist',$newslist);
	        $this->display('/newslist');
    	}else{
    		$this->_empty();
    	}
    }
   
    public function newscontent(){
    	$article = M('store_art');
        $storeid = $this->store['store_id'];
        $sn_id = (empty($_GET['sn']))?0:(int)$_GET['sn'];
        $text = (empty($_GET['text']))?0:(int)$_GET['text'];
        if(!$text){echo "<script>window.history.go(-1);</script>";}
        $news = $article->where('store = '.$storeid.' and id = '.$text)->find();


        $where['id'] = array('gt',$news['id']);
        $where['store'] = $storeid;
        $where['sn_id'] = $news['sn_id'];
        $where['is_show'] = 1;
        $next = $article->where($where)->find();//下一篇
        unset($where['id']);
        $where['id'] = array('lt',$news['id']);
        $pre = $article->where($where)->find();//上一篇

        $banner = M('store')->where(array('store_id' => $this->store['store_id']))->getField('store_banner');
        $this->assign('banner', $banner);

        $this->assign('pre',$pre);
        $this->assign('next',$next);
        $this->assign('sn_id',$sn_id);
        $this->assign('news',$news);
        $this->display('/news');
    }




    public function search()
    {
        $keywords = I('keywords');
        $cat_id = I('get.store_id');
        if(!$keywords || !$cat_id){$this->redirect('Index/index'); }
        $map['store_id'] = array('eq',$cat_id);
        $where['goods_name'] = array('like','%'.$keywords.'%');
        $where['keywords'] = array('like','%'.$keywords.'%');
        $where['goods_remark'] = array('like','%'.$keywords.'%');
        $where['_logic'] = 'or';
        $map['_complex'] = $where;
        $m = M('goods');
        $goods = $m->where($map)->select();
        $this->assign('goods_list',$goods);
        $this->display('/goods_list');
    }


	public function _empty()
	{
		$this->display('/404');
	}

}