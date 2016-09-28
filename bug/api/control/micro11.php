<?php

/**
 * 活动
 *
 *
 *
 * * */
defined('InShopNC') or exit('Access Invalid!');

class microControl extends apiHomeControl {

    /**
     * 单个活动信息页
     */
    public function get_personal_listOp() {
        $model_personal = Model('micro_personal');
         $order = 'like_count desc';
        $page = $_GET['page'];
        $condition['microshop_commend'] = 1;
        if($_GET['keyword']){
        $condition['commend_message'] = array('like', '%' . $_GET['keyword'] . '%');
        }
        $field = 'micro_personal.*,member.member_name,member.member_truename,member.member_avatar,member_areainfo';
        $list = $model_personal->getListWithUserInfo($condition, $this->page, $order, $field);
        $page_count = $model_personal->gettotalpage();
        foreach ($list as $key => $value) {
           if($list[$key]['commend_image']){
                        $file_name = str_replace('.', '_'.'tiny'.'.', $list[$key]['commend_image']);
                        $file_name_list = str_replace('.', '_'.'list'.'.', $list[$key]['commend_image']);
            $list[$key]['commend_image'] = UPLOAD_SITE_URL.DS.ATTACH_MICROSHOP.DS.$list[$key]['commend_member_id'].'/'.$list[$key]['commend_image'];
             $list[$key]['commend_image_tiny'] = UPLOAD_SITE_URL.DS.ATTACH_MICROSHOP.DS.$list[$key]['commend_member_id'].DS.$file_name  ;
             $list[$key]['commend_image_list'] = UPLOAD_SITE_URL.DS.ATTACH_MICROSHOP.DS.$list[$key]['commend_member_id'].DS.$file_name_list  ;
             }
            $list[$key]['member_avatar'] =  getMemberAvatarForID($list[$key]['commend_member_id']);
            $list[$key]['image_width'] = getimagesize($list[$key]['commend_image'])[0];
            $list[$key]['image_height'] = getimagesize($list[$key]['commend_image'])[1];
        
        }
        output_data($list,  mobile_page($page_count));
    }

    /**
     * 单个活动信息页
     */
    public function get_personal_list_wapOp() {
        $model_personal = Model('micro_personal');
        $order = 'like_count desc';
        $page = $_GET['page'];
        $condition['microshop_commend'] = 1;
        if($_GET['keyword']){
            $condition['commend_message'] = array('like', '%' . $_GET['keyword'] . '%');
        }
        $field = 'micro_personal.*,member.member_name,member.member_truename,member.member_avatar,member_areainfo';
        $list = $model_personal->getListWithUserInfo($condition, $this->page, $order, $field);
        $page_count = $model_personal->gettotalpage();
        foreach ($list as $key => $value) {
            if($list[$key]['commend_image']){
                $file_name = str_replace('.', '_'.'tiny'.'.', $list[$key]['commend_image']);
                $file_name_list = str_replace('.', '_'.'list'.'.', $list[$key]['commend_image']);
                $list[$key]['commend_image'] = UPLOAD_SITE_URL.DS.ATTACH_MICROSHOP.DS.$list[$key]['commend_member_id'].'/'.$list[$key]['commend_image'];
                $list[$key]['commend_image_tiny'] = UPLOAD_SITE_URL.DS.ATTACH_MICROSHOP.DS.$list[$key]['commend_member_id'].DS.$file_name  ;
                $list[$key]['commend_image_list'] = UPLOAD_SITE_URL.DS.ATTACH_MICROSHOP.DS.$list[$key]['commend_member_id'].DS.$file_name_list  ;
            }
            $list[$key]['member_avatar'] =  getMemberAvatarForID($list[$key]['commend_member_id']);
            $list[$key]['image_width'] = @getimagesize($list[$key]['commend_image'])[0];
            $list[$key]['image_height'] = @getimagesize($list[$key]['commend_image'])[1];

        }
        $list_wap['goods_list'] = $list;
        output_data($list_wap,  mobile_page($page_count));
    }
    
        /**
     * 评论列表
     * */
  public function comment_listOp() {
        $comment_id = intval($_GET['comment_id']);
        $model_comment = Model('micro_comment');
        $page = intval($_GET['page']);
        if($comment_id > 0) {
            $condition = array();
            $condition['comment_object_id'] = $comment_id;
            $comment_type = 2;
            if(!empty($comment_type)) {
                $condition['comment_type'] = $comment_type; 
                $field = 'micro_comment.*,member.member_name,member.member_truename,member.member_avatar';
                $comment_list = $model_comment->getListWithUserInfo($condition,$page,'comment_time desc',$field);
                foreach ($comment_list as $key => $value) {
                    $comment_list[$key]['member_avatar'] =  getMemberAvatarForID($comment_list[$key]['comment_member_id']);
                     $comment_list[$key]['comment_message'] = json_decode($comment_list[$key]['comment_message']);
                   if($comment_list[$key]['comment_image']){
                        $file_name = str_replace('.', '_'.'tiny'.'.', $comment_list[$key]['comment_image']);
                        $file_name_list = str_replace('.', '_'.'list'.'.', $comment_list[$key]['comment_image']);
                     $comment_list[$key]['comment_image'] =     UPLOAD_SITE_URL.DS.ATTACH_MICROSHOP_COMMENT.DS.$comment_list[$key]['comment_member_id'].DS.$comment_list[$key]['comment_image'];
                    $comment_list[$key]['comment_image_tiny'] = UPLOAD_SITE_URL.DS.ATTACH_MICROSHOP_COMMENT.DS.$comment_list[$key]['comment_member_id'].DS.$file_name  ;
                    $comment_list[$key]['comment_image_list'] = UPLOAD_SITE_URL.DS.ATTACH_MICROSHOP_COMMENT.DS.$comment_list[$key]['comment_member_id'].DS.$file_name_list  ;
                    }
                }
                output_data($comment_list);
            }
        }
    }

}
