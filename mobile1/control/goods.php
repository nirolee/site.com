<?php

/**
 * 商品
 *
 * by www.shopnc.cn ShopNc
 *
 *
 */
//by www.shopnc.cn //use Shopnc\Tpl;

defined('InShopNC') or exit('Access Invalid!');

class goodsControl extends mobileHomeControl {

    public function __construct() {
        parent::__construct();
    }

    /**
     * 商品列表
     */
    public function goods_listOp() {
        $model_goods = Model('goods');
        $model_search = Model('search');

        //查询条件
        $condition = array();

        if (!empty($_GET['gc_id']) && intval($_GET['gc_id']) > 0) {
            $condition['gc_id'] = $_GET['gc_id'];
            if (!empty($_GET['keyword'])) {
                $condition['goods_name'] = array('like', '%' . $_GET['keyword'] . '%');
            }
        } elseif (!empty($_GET['keyword'])) {
            $condition['goods_name'] = array('like', '%' . $_GET['keyword'] . '%');
            if (cookie('his_sh') == '') {
                $his_sh_list = array();
            } else {
                $his_sh_list = explode('~', cookie('his_sh'));
            }
            if (strlen($_GET['keyword']) <= 30 && !in_array($_GET['keyword'], $his_sh_list)) {
                if (array_unshift($his_sh_list, $_GET['keyword']) > 8) {
                    array_pop($his_sh_list);
                }
            }
            setNcCookie('his_sh', implode('~', $his_sh_list), 2592000); //添加历史纪录
        } elseif (!empty($_GET['barcode'])) {
            $condition['goods_barcode'] = $_GET['barcode'];
        } elseif (!empty($_GET['b_id']) && intval($_GET['b_id'] > 0)) {
            $condition['brand_id'] = intval($_GET['b_id']);
        }
        //所需字段
        $fieldstr = "goods_id,goods_commonid,store_id,goods_name,goods_price,goods_promotion_price,goods_promotion_type,goods_marketprice,goods_image,goods_salenum,evaluation_good_star,evaluation_count,like_count,goods_click";

        // 添加3个状态字段
        $fieldstr .= ',is_virtual,is_presell,is_fcode,have_gift,goods_jingle,store_id,store_name,is_own_shop';


        //排序方式
        $order = $this->_goods_list_order($_GET['key'], $_GET['order']);

        //优先从全文索引库里查找
        list($indexer_ids, $indexer_count) = $model_search->indexerSearch($_GET, $this->page);
        if (is_array($indexer_ids)) {
            //商品主键搜索
            $goods_list = $model_goods->getGoodsOnlineList(array('goods_id' => array('in', $indexer_ids)), $fieldstr, 0, $order, $this->page, null, false);

            //如果有商品下架等情况，则删除下架商品的搜索索引信息
            if (count($goods_list) != count($indexer_ids)) {
                $model_search->delInvalidGoods($goods_list, $indexer_ids);
            }
            pagecmd('setEachNum', $this->page);
            pagecmd('setTotalNum', $indexer_count);
        } else {

            $goods_list = $model_goods->getGoodsListByColorDistinct($condition, $fieldstr, $order, $this->page);
        }
        $page_count = $model_goods->gettotalpage();
        //处理商品列表(抢购、限时折扣、商品图片)
        $goods_list = $this->_goods_list_extend($goods_list);

        output_data(array('goods_list' => $goods_list), mobile_page($page_count));
    }

    /**
     * 搜索提示
     */
    public function keywordOp() {
        $model_goods = Model('goods');
        $condition['goods_name'] = array('like', $_GET['keyword'] . '%');
        $keyword_list = $model_goods->getGoodsOnlineList($condition, 'goods_name', '10');
        foreach ($keyword_list as $key => $value) {
            $keyword_list[$key] = $value['goods_name'];
        }
        output_data($keyword_list);
    }

    /**
     * 商品列表排序方式
     */
    private function _goods_list_order($key, $order) {
        $result = 'is_own_shop desc,goods_id desc';
        if (!empty($key)) {

            $sequence = 'desc';
            if ($order == 1) {
                $sequence = 'asc';
            }

            switch ($key) {
                //销量
                case '1' :
                    $result = 'goods_salenum' . ' ' . $sequence;
                    break;
                //浏览量
                case '2' :
                    $result = 'goods_click' . ' ' . $sequence;
                    break;
                //价格
                case '3' :
                    $result = 'goods_price' . ' ' . $sequence;
                    break;
                //点赞数
                case '4';
                    $result = 'like_count' . ' ' . $sequence;
                    break;
            }
        }
        return $result;
    }

    /**
     * 处理商品列表(抢购、限时折扣、商品图片)
     */
    private function _goods_list_extend($goods_list) {
        //获取商品列表编号数组
        $commonid_array = array();
        $goodsid_array = array();
        foreach ($goods_list as $key => $value) {
            $commonid_array[] = $value['goods_commonid'];
            $goodsid_array[] = $value['goods_id'];
        }

        //促销
        $groupbuy_list = Model('groupbuy')->getGroupbuyListByGoodsCommonIDString(implode(',', $commonid_array));
        $xianshi_list = Model('p_xianshi_goods')->getXianshiGoodsListByGoodsString(implode(',', $goodsid_array));
        foreach ($goods_list as $key => $value) {
            //抢购
            if (isset($groupbuy_list[$value['goods_commonid']])) {
                $goods_list[$key]['goods_price'] = $groupbuy_list[$value['goods_commonid']]['groupbuy_price'];
                $goods_list[$key]['group_flag'] = true;
            } else {
                $goods_list[$key]['group_flag'] = false;
            }

            //限时折扣
            if (isset($xianshi_list[$value['goods_id']]) && !$goods_list[$key]['group_flag']) {
                $goods_list[$key]['goods_price'] = $xianshi_list[$value['goods_id']]['xianshi_price'];
                $goods_list[$key]['xianshi_flag'] = true;
            } else {
                $goods_list[$key]['xianshi_flag'] = false;
            }

            //商品图片url
            $goods_list[$key]['goods_image_url'] = cthumb($value['goods_image'], 360, $value['store_id']);

            unset($goods_list[$key]['store_id']);
            unset($goods_list[$key]['goods_commonid']);
            unset($goods_list[$key]['nc_distinct']);
        }

        return $goods_list;
    }

    /**
     * 商品评价页
     */
    /* public function goods_evaluateOp() {

      $goods_id = intval($_GET['goods_id']);
      $goods_evaluate_info = Model('evaluate_goods')->getEvaluateGoodsInfoByGoodsID($goods_id);
      $this->_get_comments($goods_id, $_GET['type'], 10);
      } */

    /**
     * 商品评价
     */
    public function goods_evaluateOp() {
        $goods_id = intval($_GET['goods_id']);
        if ($goods_id <= 0) {
            output_error('产品不存在');
        }

        $goods_evaluate_info = Model('evaluate_goods')->getEvaluateGoodsInfoByGoodsID($goods_id);
        $goodsevallist = $this->_get_comments($goods_id, $_GET['type'], $this->page);
        foreach ($goodsevallist as $key => $value) {
            $goodsevallist[$key]['geval_image'] = explode(',', $goodsevallist[$key]['geval_image']);
            date_default_timezone_set("PRC");
            $goodsevallist[$key]['geval_addtime'] = date("Y-m-d H:i", $goodsevallist[$key]['geval_addtime']);
            if ($value['geval_image']) {
                foreach ($goodsevallist[$key]['geval_image'] as $k => $v) {
                    $goodsevallist[$key]['geval_image'][$k] = UPLOAD_SITE_URL . DS . ATTACH_EVALUATE . DS . $value['geval_frommemberid'] . DS . $v;
                }
            }
        }

        $model_evaluate_goods = Model("evaluate_goods");
        $page_count = $model_evaluate_goods->gettotalpage();
        output_data(array('goods_eval_list' => $goodsevallist), mobile_page($page_count));
    }

    private function _get_comments($goods_id, $type, $page) {
        $condition = array();
        $condition['geval_goodsid'] = $goods_id;
        switch ($type) {
            case '1':
                $condition['geval_scores'] = array('in', '5,4');
                Tpl::output('type', '1');
                break;
            case '2':
                $condition['geval_scores'] = array('in', '3,2');
                Tpl::output('type', '2');
                break;
            case '3':
                $condition['geval_scores'] = array('in', '1');
                Tpl::output('type', '3');
                break;
        }
        //查询商品评分信息
        $model_evaluate_goods = Model('evaluate_goods');
        $goodsevallist = $model_evaluate_goods->getEvaluateGoodsList($condition, $page);

        foreach ($goodsevallist as $key => $val) {
            $goodsevallist[$key]['geval_avatar'] = getMemberAvatarForID($goodsevallist[$key]['geval_frommemberid']);
        }
        return $goodsevallist;
        output_data($goodsevallist);
    }

    public function goods_detailOp() {
        $goods_id = intval($_GET ['goods_id']);

        // 商品详细信息
        $model_goods = Model('goods');
        $goods_detail = $model_goods->getGoodsDetail($goods_id);
        if (empty($goods_detail)) {
            output_error('商品不存在');
        }

        $model_store = Model('store');
        $hot_sales = $model_store->getHotSalesList($goods_detail['goods_info']['store_id'], 6);
        $goods_commend_list = array();
        foreach ($hot_sales as $value) {
            $goods_commend = array();
            $goods_commend['goods_id'] = $value['goods_id'];
            $goods_commend['goods_name'] = $value['goods_name'];
            $goods_commend['goods_price'] = $value['goods_price'];
            $goods_commend['goods_image_url'] = cthumb($value['goods_image'], 240);
            $goods_commend_list[] = $goods_commend;
        }
        $goods_detail['goods_commend_list'] = $goods_commend_list;
        $store_info = $model_store->getStoreInfoByID($goods_detail['goods_info']['store_id']);
        $goods_detail['store_info']['store_id'] = $store_info['store_id'];
        $goods_detail['store_info']['store_name'] = $store_info['store_name'];
        $goods_detail['store_info']['member_id'] = $store_info['member_id'];
        //显示QQ及旺旺 ShopNc
        $goods_detail['store_info']['store_qq'] = $store_info['store_qq'];
        $goods_detail['store_info']['store_ww'] = $store_info['store_ww'];
        $goods_detail['store_info']['store_phone'] = $store_info['store_phone'];
        $goods_detail['store_info']['member_name'] = $store_info['member_name'];
        $goods_detail['store_info']['avatar'] = getStoreLogo($store_info['store_avatar'], 'store_avatar');
        if ($store_info['sc_id'] = array('in', "2,11")) {
            $goods_detail['store_info']['sc_name'] = '品牌';
        } else {
            $goods_detail['store_info']['sc_name'] = '匠造';
        }

        $goods_detail['goods_hair_info'] = array('content' => '免运费', 'if_store_cn' => '有货', 'if_store' => true, 'area_name' => '全国');
        $goods_detail['goods_evaluate_info'] = array('good' => 0, 'normal' => 0, 'bad' => 0, 'all' => 0, 'img' => 0, 'good_percent' => 100, 'normal_percent' => 0, 'bad_percent' => 0, 'good_star' => 5, 'star_average' => 5);
        $goods_detail['goods_eval_list'] = '';

        if ($store_info['is_own_shop']) {
            $goods_detail['store_info']['store_credit'] = array(
                'store_desccredit' => array(
                    'text' => '描述',
                    'credit' => 5,
                    'percent' => '----',
                    'percent_class' => 'equal',
                    'percent_text' => '平',
                ),
                'store_servicecredit' => array(
                    'text' => '服务',
                    'credit' => 5,
                    'percent' => '----',
                    'percent_class' => 'equal',
                    'percent_text' => '平',
                ),
                'store_deliverycredit' => array(
                    'text' => '物流',
                    'credit' => 5,
                    'percent' => '----',
                    'percent_class' => 'equal',
                    'percent_text' => '平',
                ),
            );
        } else {
            $storeCredit = array();
            $percentClassTextMap = array(
                'equal' => '平',
                'high' => '高',
                'low' => '低',
            );
            foreach ((array) $store_info['store_credit'] as $k => $v) {
                $v['percent_text'] = $percentClassTextMap[$v['percent_class']];
                $storeCredit[$k] = $v;
            }
            $goods_detail['store_info']['store_credit'] = $storeCredit;
        }
        //商品详细信息处理
        $goods_detail = $this->_goods_detail_extend($goods_detail);

        //v3-b11 抢购商品是否开始
        $goods_info = $goods_detail['goods_info'];
        //print_r($goods_info);
        $IsHaveBuy = 0;
        if (!empty($_GET['key'])) {
            $model_mb_user_token = Model('mb_user_token');
            $mb_user_token_info = $model_mb_user_token->getMbUserTokenInfoByToken($_GET['key']);
            $model_member = Model('member');
            $this->member_info = $model_member->getMemberInfoByID($mb_user_token_info['member_id']);
            $buyer_id = $this->member_info['member_id'];
            $memberId = $this->member_info['member_id'];
            $promotion_type = $goods_info["promotion_type"];

            if ($promotion_type == 'groupbuy') {
                //检测是否限购数量
                $upper_limit = $goods_info["upper_limit"];
                if ($upper_limit > 0) {
                    //查询些会员的订单中，是否已买过了
                    $model_order = Model('order');
                    //取商品列表
                    $order_goods_list = $model_order->getOrderGoodsList(array('goods_id' => $goods_id, 'buyer_id' => $buyer_id, 'goods_type' => 2));
                    if ($order_goods_list) {
                        //取得上次购买的活动编号(防一个商品参加多次团购活动的问题)
                        $promotions_id = $order_goods_list[0]["promotions_id"];
                        //用此编号取数据，检测是否这次活动的订单商品。
                        $model_groupbuy = Model('groupbuy');
                        $groupbuy_info = $model_groupbuy->getGroupbuyInfo(array('groupbuy_id' => $promotions_id));
                        if ($groupbuy_info) {
                            $IsHaveBuy = 1;
                        } else {
                            $IsHaveBuy = 0;
                        }
                    }
                }
            }
            $goods_detail['IsHaveBuy'] = $IsHaveBuy;
            //v3-b11 end

            if ($goods_detail) {
                $model_goods_browse = Model('goods_browse')->addViewedGoods($goods_id, $memberId, $this->member_info['store_id']); //加入浏览历史数据库
            }
        }
        output_data($goods_detail);
    }

    /**
     * 新版本的商品详情页
     * add by lizh 11:51 2016/7/14
     */
    public function goods_detail_1_5Op() {

        $goods_id = intval($_GET ['goods_id']);

        // 商品详细信息
        $model_goods = Model('goods');
        $goods_detail = $model_goods->getGoodsDetail($goods_id);
        if (empty($goods_detail)) {
            output_error('商品不存在');
        }

        $model_store = Model('store');
        $hot_sales = $model_store->getHotSalesList($goods_detail['goods_info']['store_id'], 6);
        $goods_commend_list = array();
        foreach ($hot_sales as $value) {
            $goods_commend = array();
            $goods_commend['goods_id'] = $value['goods_id'];
            $goods_commend['goods_name'] = $value['goods_name'];
            $goods_commend['goods_price'] = $value['goods_price'];
            $goods_commend['goods_image_url'] = cthumb($value['goods_image'], 240);
            $goods_commend_list[] = $goods_commend;
        }


        $goods_detail['goods_commend_list'] = $goods_commend_list;
        $store_info = $model_store->getStoreInfoByID($goods_detail['goods_info']['store_id']);
        $goods_class = Model('goods_class')->getGoodsClass($store_info['store_id']);
        foreach ($goods_class as $key => $value) {
            if (empty($goods_detail['store_info']['gc_name'])) {
                $goods_detail['store_info']['gc_name'] = $value['gc_name'];
            } else {
                $goods_detail['store_info']['gc_name'] .= ',' . $value['gc_name'];
            }
        }
        $goods_detail['store_info']['store_id'] = $store_info['store_id'];
        $goods_detail['store_info']['store_name'] = $store_info['store_name'];
        $goods_detail['store_info']['member_id'] = $store_info['member_id'];
        $goods_detail['store_info']['member_name'] = $store_info['member_name'];
        $goods_detail['store_info']['avatar'] = getMemberAvatarForID($store_info['member_id']);

        $goods_detail['goods_hair_info'] = array('content' => '免运费', 'if_store_cn' => '有货', 'if_store' => true, 'area_name' => '全国');
        $goods_detail['goods_evaluate_info'] = array('good' => 0, 'normal' => 0, 'bad' => 0, 'all' => 0, 'img' => 0, 'good_percent' => 100, 'normal_percent' => 0, 'bad_percent' => 0, 'good_star' => 5, 'star_average' => 5);
        $goods_detail['goods_eval_list'] = '';

        if ($store_info['is_own_shop']) {
            $goods_detail['store_info']['store_credit'] = array(
                'store_desccredit' => array(
                    'text' => '描述',
                    'credit' => 5,
                    'percent' => '----',
                    'percent_class' => 'equal',
                    'percent_text' => '平',
                ),
                'store_servicecredit' => array(
                    'text' => '服务',
                    'credit' => 5,
                    'percent' => '----',
                    'percent_class' => 'equal',
                    'percent_text' => '平',
                ),
                'store_deliverycredit' => array(
                    'text' => '物流',
                    'credit' => 5,
                    'percent' => '----',
                    'percent_class' => 'equal',
                    'percent_text' => '平',
                ),
            );
        } else {
            $storeCredit = array();
            $percentClassTextMap = array(
                'equal' => '平',
                'high' => '高',
                'low' => '低',
            );
            foreach ((array) $store_info['store_credit'] as $k => $v) {
                $v['percent_text'] = $percentClassTextMap[$v['percent_class']];
                $storeCredit[$k] = $v;
            }
            $goods_detail['store_info']['store_credit'] = $storeCredit;
        }

        //商品详细信息处理
        $goods_detail = $this->_goods_detail_extend($goods_detail);

        //商品收藏数
        $favorites_model = Model('favorites');
        $favorites_count = $favorites_model->getGoodsFavoritesCountByGoodsId($goods_id, 0);
        $goods_detail['goods_info']['favorites_count'] = $favorites_count;

        //v3-b11 抢购商品是否开始
        $goods_info = $goods_detail['goods_info'];

        //商品图文详情
        $goods_detail_info = $model_goods->getGoodsInfoByID($goods_id, 'goods_commonid');
        $goods_common_info = $model_goods->getGoodeCommonInfoByID($goods_detail_info['goods_commonid']);
        $goods_common_info['goods_body'] = preg_replace('/ (?:height|width)=(\'|").*?\\1/', '', $goods_common_info['goods_body']);
        $goods_common_info['goods_body'] = '<style>img{width:100%;}</style>' . $goods_common_info['goods_body'];
        $goods_detail['goods_common_info'] = $goods_common_info;

        /**
         * @guess_like:为你推荐
         * @favorites:店铺关注
         */
        $model_goods_browse = Model('goods_browse');
        $favorites = Model('favorites');
        if (!empty($_GET['key'])) {

            $model_mb_user_token = Model('mb_user_token');
            $mb_user_token_info = $model_mb_user_token->getMbUserTokenInfoByToken($_GET['key']);
            $model_member = Model('member');
            $member_info = $model_member->getMemberInfoByID($mb_user_token_info['member_id']);
            $guess_like = $model_goods_browse->getViewedGoodsList($member_info['member_id'], 2);
            foreach ($guess_like as $key => $value) {
                $guess_like[$key]['goods_image'] = thumb($value);
            }

            if (!empty($store_info['store_id'])) {

                $store_favorites_list = $favorites->getStoreFavoritesList(array('member_id' => $member_info['member_id'], 'fav_id' => $store_info['store_id']));
                if (!empty($store_favorites_list)) {

                    $goods_detail['store_info']['store_favorites_state'] = 1;
                } else {

                    $goods_detail['store_info']['store_favorites_state'] = 0;
                }
            } else {

                $goods_detail['store_info']['store_favorites_state'] = 0;
            }
        } else {

            $condition = array();
            $guess_like = $model_goods->getGoodsListByColorDistinct($condition, 'goods_id,goods_name,goods_promotion_price,goods_price,goods_image', 'goods_id desc', '2');
            foreach ($guess_like as $key => $value) {
                $guess_like[$key]['goods_image'] = thumb($value);
            }

            $goods_detail['store_info']['store_favorites_state'] = 0;
        }

        $goods_detail['guess_like'] = $guess_like;

        $favorites = Model('favorites');
        $favorites_condition = array(fav_id => $goods_id, fav_type => 'goods');
        $favorites_data = $favorites->getFavoritesList($favorites_condition, 'member_id', 0, 'log_id desc', 4);

        if (!empty($favorites_data)) {

            foreach ($favorites_data as $k => $v) {

                $favorites_data[$k]['member_avatar'] = getMemberAvatarForID($v['member_id']);
            }
        }

        $goods_detail['favorites_data'] = $favorites_data;

        $IsHaveBuy = 0;
        if (!empty($_GET['key'])) {

            $model_mb_user_token = Model('mb_user_token');
            $mb_user_token_info = $model_mb_user_token->getMbUserTokenInfoByToken($_GET['key']);
            $model_member = Model('member');
            $this->member_info = $model_member->getMemberInfoByID($mb_user_token_info['member_id']);
            $buyer_id = $this->member_info['member_id'];
            $memberId = $this->member_info['member_id'];
            $promotion_type = $goods_info["promotion_type"];

            if ($promotion_type == 'groupbuy') {
                //检测是否限购数量
                $upper_limit = $goods_info["upper_limit"];
                if ($upper_limit > 0) {
                    //查询些会员的订单中，是否已买过了
                    $model_order = Model('order');
                    //取商品列表
                    $order_goods_list = $model_order->getOrderGoodsList(array('goods_id' => $goods_id, 'buyer_id' => $buyer_id, 'goods_type' => 2));
                    if ($order_goods_list) {
                        //取得上次购买的活动编号(防一个商品参加多次团购活动的问题)
                        $promotions_id = $order_goods_list[0]["promotions_id"];
                        //用此编号取数据，检测是否这次活动的订单商品。
                        $model_groupbuy = Model('groupbuy');
                        $groupbuy_info = $model_groupbuy->getGroupbuyInfo(array('groupbuy_id' => $promotions_id));
                        if ($groupbuy_info) {
                            $IsHaveBuy = 1;
                        } else {
                            $IsHaveBuy = 0;
                        }
                    }
                }
            }
            $goods_detail['IsHaveBuy'] = $IsHaveBuy;

            if ($goods_detail) {

                $model_goods_browse = Model('goods_browse')->addViewedGoods($goods_id, $memberId, $this->member_info['store_id']); //加入浏览历史数据库
            }
        }

        output_data($goods_detail);
    }

    /**
     * 新版本的商品详情页
     * add by lbb 11:00 2016/9/21
     */
    public function goods_detail_1_5_4Op() {

        $goods_id = intval($_GET ['goods_id']);

        // 商品详细信息
        $model_goods = Model('goods');
        $goods_detail = $model_goods->getGoodsDetail($goods_id);
        if (empty($goods_detail)) {
            output_error('商品不存在');
        }

        $model_store = Model('store');
        $hot_sales = $model_store->getHotSalesList($goods_detail['goods_info']['store_id'], 6);
        $goods_commend_list = array();
        foreach ($hot_sales as $value) {
            $goods_commend = array();
            $goods_commend['goods_id'] = $value['goods_id'];
            $goods_commend['goods_name'] = $value['goods_name'];
            $goods_commend['goods_price'] = $value['goods_price'];
            $goods_commend['goods_image_url'] = cthumb($value['goods_image'], 240);
            $goods_commend_list[] = $goods_commend;
        }


        $goods_detail['goods_commend_list'] = $goods_commend_list;
        $store_info = $model_store->getStoreInfoByID($goods_detail['goods_info']['store_id']);
/*       优惠券列表
        $goods_detail['coupon_list'] = $model_store->getStoreCouponListById($store_info['store_id']);

 */
        $goods_class = Model('goods_class')->getGoodsClass($store_info['store_id']);
        foreach ($goods_class as $key => $value) {
            if (empty($goods_detail['store_info']['gc_name'])) {
                $goods_detail['store_info']['gc_name'] = $value['gc_name'];
            } else {
                $goods_detail['store_info']['gc_name'] .= ',' . $value['gc_name'];
            }
        }
        $goods_detail['store_info']['store_id'] = $store_info['store_id'];
        $goods_detail['store_info']['store_name'] = $store_info['store_name'];
        $goods_detail['store_info']['store_collect'] = $store_info['store_collect']; //店铺收藏数
        $goods_detail['store_info']['area_info'] = htmlspecialchars_decode($store_info['area_info']); //店铺地址
        if (empty($store_info['store_introduction'])) {


            $goods_detail['store_info']['store_introduction'] = '暂无介绍';
        } else {



            $goods_detail['store_info']['store_introduction'] = htmlspecialchars_decode($store_info['store_introduction']);
        }
        // $goods_detail['store_info']['store_introduction'] = htmlspecialchars_decode($store_info['store_introduction']);
        $goods_detail['store_info']['member_id'] = $store_info['member_id'];
        $goods_detail['store_info']['member_name'] = $store_info['member_name'];
        $goods_detail['store_info']['avatar'] = getMemberAvatarForID($store_info['member_id']);

        $goods_detail['goods_hair_info'] = array('content' => '免运费', 'if_store_cn' => '有货', 'if_store' => true, 'area_name' => '全国');
        $goods_detail['goods_evaluate_info'] = array('good' => 0, 'normal' => 0, 'bad' => 0, 'all' => 0, 'img' => 0, 'good_percent' => 100, 'normal_percent' => 0, 'bad_percent' => 0, 'good_star' => 5, 'star_average' => 5);
        $goods_detail['goods_eval_list'] = '';

        if ($store_info['is_own_shop']) {
            $goods_detail['store_info']['store_credit'] = array(
                'store_desccredit' => array(
                    'text' => '描述',
                    'credit' => 5,
                    'percent' => '----',
                    'percent_class' => 'equal',
                    'percent_text' => '平',
                ),
                'store_servicecredit' => array(
                    'text' => '服务',
                    'credit' => 5,
                    'percent' => '----',
                    'percent_class' => 'equal',
                    'percent_text' => '平',
                ),
                'store_deliverycredit' => array(
                    'text' => '物流',
                    'credit' => 5,
                    'percent' => '----',
                    'percent_class' => 'equal',
                    'percent_text' => '平',
                ),
            );
        } else {
            $storeCredit = array();
            $percentClassTextMap = array(
                'equal' => '平',
                'high' => '高',
                'low' => '低',
            );
            foreach ((array) $store_info['store_credit'] as $k => $v) {
                $v['percent_text'] = $percentClassTextMap[$v['percent_class']];
                $storeCredit[$k] = $v;
            }
            $goods_detail['store_info']['store_credit'] = $storeCredit;
        }

        //商品详细信息处理
        $goods_detail = $this->_goods_detail_extend($goods_detail);

        //商品收藏数
        $favorites_model = Model('favorites');
        $favorites_count = $favorites_model->getGoodsFavoritesCountByGoodsId($goods_id, 0);
        $goods_detail['goods_info']['favorites_count'] = $favorites_count;

        //v3-b11 抢购商品是否开始
        $goods_info = $goods_detail['goods_info'];

        //商品图文详情
        $goods_detail_info = $model_goods->getGoodsInfoByID($goods_id, 'goods_commonid');
        $goods_common_info = $model_goods->getGoodeCommonInfoByID($goods_detail_info['goods_commonid']);
        $goods_common_info['goods_body'] = preg_replace('/ (?:height|width)=(\'|").*?\\1/', '', $goods_common_info['goods_body']);
        $goods_common_info['goods_body'] = '<style>img{width:100%;}</style>' . $goods_common_info['goods_body'];
        $goods_detail['goods_common_info'] = $goods_common_info;

        /**
         * @guess_like:为你推荐
         * @favorites:店铺关注
         */
        $model_goods_browse = Model('goods_browse');
        $favorites = Model('favorites');
        if (!empty($_GET['key'])) {

            $model_mb_user_token = Model('mb_user_token');
            $mb_user_token_info = $model_mb_user_token->getMbUserTokenInfoByToken($_GET['key']);
            $model_member = Model('member');
            $member_info = $model_member->getMemberInfoByID($mb_user_token_info['member_id']);
            $guess_like = $model_goods_browse->getViewedGoodsList($member_info['member_id'], 2);

            foreach ($guess_like as $key => $value) {
                $guess_like[$key]['goods_image'] = thumb($value);

                $where = array();
                $where['member_id'] = $member_info['member_id'];
                $where['goods_name'] = $value['goods_name'];

                $collected = $favorites->isExist($where);  //查询当前用户是否已收藏该商品
                if ($collected) {
                    $guess_like[$key]['is_collect'] = 1;   //已收藏
                } else {
                    $guess_like[$key]['is_collect'] = 0;   //未收藏
                }
            }

            if (!empty($store_info['store_id'])) {

                $store_favorites_list = $favorites->getStoreFavoritesList(array('member_id' => $member_info['member_id'], 'fav_id' => $store_info['store_id']));
                if (!empty($store_favorites_list)) {

                    $goods_detail['store_info']['store_favorites_state'] = 1;
                } else {

                    $goods_detail['store_info']['store_favorites_state'] = 0;
                }
            } else {

                $goods_detail['store_info']['store_favorites_state'] = 0;
            }
        } else {

            $condition = array();
            $guess_like = $model_goods->getGoodsListByColorDistinct($condition, 'goods_id,goods_name,goods_promotion_price,goods_price,goods_image', 'goods_id desc', '2');
            foreach ($guess_like as $key => $value) {
                $guess_like[$key]['goods_image'] = thumb($value);
            }

            $goods_detail['store_info']['store_favorites_state'] = 0;
        }

        $goods_detail['guess_like'] = $guess_like;

        $favorites = Model('favorites');
        $favorites_condition = array(fav_id => $goods_id, fav_type => 'goods');
        $favorites_data = $favorites->getFavoritesList($favorites_condition, 'member_id', 0, 'log_id desc', 4);

        if (!empty($favorites_data)) {

            foreach ($favorites_data as $k => $v) {

                $favorites_data[$k]['member_avatar'] = getMemberAvatarForID($v['member_id']);
            }
        }

        $goods_detail['favorites_data'] = $favorites_data;

        $IsHaveBuy = 0;
        if (!empty($_GET['key'])) {

            $model_mb_user_token = Model('mb_user_token');
            $mb_user_token_info = $model_mb_user_token->getMbUserTokenInfoByToken($_GET['key']);
            $model_member = Model('member');
            $this->member_info = $model_member->getMemberInfoByID($mb_user_token_info['member_id']);
            $buyer_id = $this->member_info['member_id'];
            $memberId = $this->member_info['member_id'];
            $promotion_type = $goods_info["promotion_type"];

            if ($promotion_type == 'groupbuy') {
                //检测是否限购数量
                $upper_limit = $goods_info["upper_limit"];
                if ($upper_limit > 0) {
                    //查询些会员的订单中，是否已买过了
                    $model_order = Model('order');
                    //取商品列表
                    $order_goods_list = $model_order->getOrderGoodsList(array('goods_id' => $goods_id, 'buyer_id' => $buyer_id, 'goods_type' => 2));
                    if ($order_goods_list) {
                        //取得上次购买的活动编号(防一个商品参加多次团购活动的问题)
                        $promotions_id = $order_goods_list[0]["promotions_id"];
                        //用此编号取数据，检测是否这次活动的订单商品。
                        $model_groupbuy = Model('groupbuy');
                        $groupbuy_info = $model_groupbuy->getGroupbuyInfo(array('groupbuy_id' => $promotions_id));
                        if ($groupbuy_info) {
                            $IsHaveBuy = 1;
                        } else {
                            $IsHaveBuy = 0;
                        }
                    }
                }
            }
            $goods_detail['IsHaveBuy'] = $IsHaveBuy;

            if ($goods_detail) {

                $model_goods_browse = Model('goods_browse')->addViewedGoods($goods_id, $memberId, $this->member_info['store_id']); //加入浏览历史数据库
            }
        }
        //获取该商品最新订单信息
        $model_order = Model('order');
        $order_where = array();
        $order_where['goods_id'] = $goods_id;
        $order_info = $model_order->getOrderAndOrderGoodsList($order_where, 'order.buyer_id,order.add_time');
        $order_time = time() - $order_info[0]['add_time'];
        $model_member = Model('member');
        $order_data = $model_member->getMemberInfoByID($order_info[0]['buyer_id'], 'member_name,member_areainfo');
        $goods_detail['order_new_info']['address'] = $order_data['member_areainfo'];
        $goods_detail['order_new_info']['member_name'] = $order_data['member_name'];
        $goods_detail['order_new_info']['time'] = $order_time;

        output_data($goods_detail);
    }

    /**
     * 商品详细信息处理
     */
    private function _goods_detail_extend($goods_detail) {
        //整理商品规格
        unset($goods_detail['spec_list']);
        $goods_detail['spec_list'] = $goods_detail['spec_list_mobile'];
        unset($goods_detail['spec_list_mobile']);

        //整理商品图片
        unset($goods_detail['goods_image']);
        $goods_detail['goods_image'] = implode(',', $goods_detail['goods_image_mobile']);
        unset($goods_detail['goods_image_mobile']);

        //商品链接
        $goods_detail['goods_info']['goods_url'] = urlShop('goods', 'index', array('goods_id' => $goods_detail['goods_info']['goods_id']));

        //整理数据
        unset($goods_detail['goods_info']['goods_commonid']);
        unset($goods_detail['goods_info']['gc_id']);
        unset($goods_detail['goods_info']['gc_name']);
        unset($goods_detail['goods_info']['store_name']);
        unset($goods_detail['goods_info']['brand_id']);
        unset($goods_detail['goods_info']['brand_name']);
        unset($goods_detail['goods_info']['type_id']);
        unset($goods_detail['goods_info']['goods_image']);
        unset($goods_detail['goods_info']['goods_body']);
        unset($goods_detail['goods_info']['goods_state']);
        unset($goods_detail['goods_info']['goods_stateremark']);
        unset($goods_detail['goods_info']['goods_verify']);
        unset($goods_detail['goods_info']['goods_verifyremark']);
        unset($goods_detail['goods_info']['goods_lock']);
        unset($goods_detail['goods_info']['goods_addtime']);
        unset($goods_detail['goods_info']['goods_edittime']);
        unset($goods_detail['goods_info']['goods_selltime']);
        unset($goods_detail['goods_info']['goods_show']);
        unset($goods_detail['goods_info']['goods_commend']);
        unset($goods_detail['goods_info']['explain']);
        unset($goods_detail['goods_info']['cart']);
        unset($goods_detail['goods_info']['buynow_text']);
        unset($goods_detail['groupbuy_info']);
        unset($goods_detail['xianshi_info']);

        return $goods_detail;
    }

    /**
     * 商品图文详细页
     */
    public function goods_bodyOp() {
        $goods_id = intval($_GET ['goods_id']);

        $model_goods = Model('goods');
        $goods_info = $model_goods->getGoodsInfoByID($goods_id, 'goods_commonid');
        $goods_common_info = $model_goods->getGoodeCommonInfoByID($goods_info['goods_commonid']);
        $goods_common_info['goods_body'] = preg_replace('/ (?:height|width)=(\'|").*?\\1/', '', $goods_common_info['goods_body']);
        $goods_common_info['goods_body'] = '<style>img{width:100%;}</style>' . $goods_common_info['goods_body'];
        //  echo json_encode($goods_common_info['goods_body']);
        Tpl::output('goods_common_info', $goods_common_info);
        Tpl::showpage('goods_body');
    }

    /**
     * 手机商品详细页
     */
    public function wap_goods_bodyOp() {
        $goods_id = intval($_GET ['goods_id']);

        $model_goods = Model('goods');

        $goods_info = $model_goods->getGoodsInfoByID($goods_id, 'goods_id');
        $goods_common_info = $model_goods->getMobileBodyByCommonID($goods_info['goods_commonid']);
        $goods_common_info['goods_body'] = preg_replace('/ (?:height|width)=(\'|").*?\\1/', '', $goods_common_info['goods_body']);
        Tpl::output('goods_common_info', $goods_common_info);
        Tpl::showpage('goods_body');
    }

    public function auto_completeOp() {
        if ($_GET['term'] == '' && cookie('his_sh') != '') {
            $corrected = explode('~', cookie('his_sh'));
            if ($corrected != '' && count($corrected) !== 0) {
                $data = array();
                foreach ($corrected as $word) {
                    $row['id'] = $word;
                    $row['label'] = $word;
                    $row['value'] = $word;
                    $data[] = $row;
                }
                output_data($data);
            }
            return;
        }
    }

    /**
     * 商品详细页运费显示
     *
     * @return unknown
     */
    public function calcOp() {
        $area_id = intval($_GET['area_id']);
        $goods_id = intval($_GET['goods_id']);
        output_data($this->_calc($area_id, $goods_id));
    }

    public function _calc($area_id, $goods_id) {
        $goods_info = Model('goods')->getGoodsInfo(array('goods_id' => $goods_id), 'transport_id,store_id,goods_freight');
        $store_info = Model('store')->getStoreInfoByID($goods_info['store_id']);
        if ($area_id <= 0) {
            if (strpos($store_info['deliver_region'], '|')) {
                $store_info['deliver_region'] = explode('|', $store_info['deliver_region']);
                $store_info['deliver_region_ids'] = explode(' ', $store_info['deliver_region'][0]);
            }
            $area_id = intval($store_info['deliver_region_ids'][1]);
            $area_name = $store_info['deliver_region'][1];
        }
        if ($goods_info['transport_id'] && $area_id > 0) {
            $freight_total = Model('transport')->calc_transport(intval($goods_info['transport_id']), $area_id);
            if ($freight_total > 0) {
                if ($store_info['store_free_price'] > 0) {
                    if ($freight_total >= $store_info['store_free_price']) {
                        $freight_total = '免运费';
                    } else {
                        $freight_total = '运费：' . $freight_total . ' 元，店铺满 ' . $store_info['store_free_price'] . ' 元 免运费';
                    }
                } else {
                    $freight_total = '运费：' . $freight_total . ' 元';
                }
            } else {
                if ($freight_total === false) {
                    $if_store = false;
                }
                $freight_total = '免运费';
            }
        } else {
            $freight_total = $goods_info['goods_freight'] > 0 ? '运费：' . $goods_info['goods_freight'] . ' 元' : '免运费';
        }

        return array('content' => $freight_total, 'if_store_cn' => $if_store === false ? '无货' : '有货', 'if_store' => $if_store === false ? false : true, 'area_name' => $area_name ? $area_name : '全国');
    }

    /**
     * 获取商品规格
     * add by lizh 16:52 2016/7/29
     */
    public function get_goods_specOp() {

        $goods_id = intval($_GET ['goods_id']);

        // 商品详细信息
        $model_goods = Model('goods');
        $goods_detail = $model_goods->getGoodsDetail($goods_id);
        $goods_data = $model_goods->getGoodsOnlineInfoForShare($goods_id);
        $data = array();
        $goods_info = $goods_detail['goods_info'];
        $data['goods_info']['goods_id'] = $goods_info['goods_id'];
        $data['goods_info']['goods_name'] = $goods_info['goods_name'];
        $data['goods_info']['goods_price'] = $goods_info['goods_promotion_price'];
        $data['goods_info']['goods_spec'] = $goods_info['goods_spec'];
        $data['goods_info']['spec_name'] = $goods_info['spec_name'];
        $data['goods_info']['spec_value'] = $goods_info['spec_value'];
        $data['goods_info']['goods_storage'] = $goods_info['goods_storage'];
        $data['goods_info']['goods_image'] = cthumb($goods_data['goods_image'], $goods_data['store_id']);

        $data['spec_list'] = array();
        $data['spec_image'] = array();
        $data['spec_list'] = $goods_detail['spec_list_mobile'];
        $data['spec_image'] = $goods_detail['spec_image'];

        /* $goods_list = array();
          $n = 0;
          foreach($goods_detail['spec_list_mobile'] as $k => $v) {

          $new_goods_data = array();
          $new_goods_data = $model_goods -> getGoodsInfo(array(goods_id => $v));
          $goods_list[$n]['goods_id'] = $new_goods_data['goods_id'];
          $goods_list[$n]['goods_price'] = $new_goods_data['goods_price'];
          $goods_list[$n]['goods_storage'] = $new_goods_data['goods_storage'];
          $goods_list[$n]['goods_image'] = cthumb($new_goods_data['goods_image'], 240);
          $n++;

          }
          $data['goods_list'] = $goods_list;
         */

        output_data($data);
    }

    /*
     * add by lbb 2016/9/24
     * 根据商品ID获取所有收藏者信息
     */

    public function like_goods_allOp() {
        $goods_id = $_GET['goods_id'];
        if (!empty($goods_id)) {
            $favorites = Model('favorites');
            $favorites_condition = array(fav_id => $goods_id, fav_type => 'goods');
            $favorites_data = $favorites->getFavoritesList($favorites_condition, 'member_id', 0, 'log_id desc');
            $key = $_GET['key'];
            $my_member_id = 0;
            if (!empty($key)) {

                $model_mb_user_token = Model('mb_user_token');
                $mb_user_token_info = $model_mb_user_token->getMbUserTokenInfoByToken($key);
                $my_member_id = $mb_user_token_info['member_id'];
            }
            $member = Model('member');
            if (!empty($favorites_data)) {
                $sns_friend = Model('sns_friend');
                foreach ($favorites_data as $k => $v) {
                    $member_id = $v['member_id'];
                    $all_favorites_data[$k] = $member->getMemberInfo(array(member_id => $member_id), 'member_id,member_name,member_truename,member_avatar');
                    $all_favorites_data[$k]['member_avatar'] = getMemberAvatar($all_favorites_data[$k]['member_avatar']);
                    $like_list = $sns_friend->getListFriend("friend_tomid =" . $member_id, 'friend_frommid');
                    if (!empty($like_list)) {
                        if ($my_member_id != 0) {

                            $data = $sns_friend->getListFriend("friend_tomid = $member_id and friend_frommid = $my_member_id");
                            if (empty($data)) {

                                $all_favorites_data[$k]['like_state'] = 0;
                            } else {

                                $all_favorites_data[$k]['like_state'] = 1;
                            }
                        } else {
                            $all_favorites_data[$k]['like_state'] = 0;
                        }
                        $all_favorites_data[$k]['like_count'] = $sns_friend->countFriend(array(friend_frommid => $member_id));
                        $all_favorites_data[$k]['like_my_count'] = $sns_friend->countFriend(array(friend_tomid => $member_id));
                        $all_favorites_data[$k]['showcase_count'] = $favorites->getShowcase_classFavoritesCountByBrandsId($member_id);
                    }
                }
            }
        }
        output_data($all_favorites_data, array(page_total => 100));
    }

    /*
     * 商品详情头部新闻信息
     * add by lbb 2016/9/27 10:50
     * 1.5.4
     */

    public function send_newsOp() {
        $model_member = Model('member');
        //随机获取1个会员头像
        $avatar_list = $model_member->getSomeMemberAvatar('1');
        foreach ($avatar_list as $k => $v) {
            $avatar_list[$k]['member_avatar'] = UPLOAD_SITE_URL . '/' . ATTACH_AVATAR . '/' . $v['member_avatar'];
        }
        //随机获取1个商品ID
        $model_goods = Model('goods');
        $goods_id_list = $model_goods->getSomeGoodsId('1');
        $text = array(
            '0' => '来自广州的小刘刚下了一个新订单',
            '1' => '来自上海的小海刚下了一个新订单',
            '2' => '来自深圳的小吴刚下了一个新订单',
            '3' => '来自苏州的小苏刚下了一个新订单',
            '4' => '来自武汉的小武刚下了一个新订单',
            '5' => '来自柳州的小柳刚下了一个新订单',
            '6' => '来自南京的小南刚下了一个新订单',
            '7' => '来自香港的小恳刚下了一个新订单',
            '8' => '来自福州的小福刚下了一个新订单',
            '9' => '来自成都的小成刚下了一个新订单',
            
        );


      
        $news = array('avatar'=>$avatar_list[0]['member_avatar'],'goods_id'=>$goods_id_list[0]['goods_id'],'text'=>$text[array_rand($text,1)]); 
        
        output_data($news);
    }

}
