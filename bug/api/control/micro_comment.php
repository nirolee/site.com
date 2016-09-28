<?php

/**
 * 达人秀评论
 *
 *
 *
 * * */
defined('InShopNC') or exit('Access Invalid!');

class micro_commentControl extends apiMemberControl {

    public function __construct() {
        parent::__construct();
    }

    /*
     * 评论图片上传
     */
    public function comment_image_uploadOp() {
        $data = array();
        $data['status'] = 'success';
        if (isset($this->member_info['member_id'])) {
            if (!empty($_FILES['file']['name'])) {
                $upload = new UploadFile();
                $upload->set('default_dir', ATTACH_MICROSHOP_COMMENT . DS . $this->member_info['member_id']);
                $upload->set('thumb_width', '60,240');
                $upload->set('thumb_height', '5000,50000');
                $upload->set('thumb_ext', '_tiny,_list');

                $result = $upload->upfile('file');
                if (!$result) {
                    $data['status'] = 'fail';
                    $data['error'] = $upload->error;
                }
                $data['file'] = $upload->getSysSetPath() . $upload->file_name;
            }
        } else {
            $data['status'] = 'fail';
            $data['error'] = '未登录';
        }
        output_data($data);
    }

    /**
     * 评论保存
     * */
    public function comment_saveOp() {

        $data = array();
        $data['result'] = 'true';
        $comment_id = intval($_POST['comment_id']);
        $comment_type = 2;
        if ($comment_id <= 0 || empty($comment_type) || empty($_POST['comment_message']) || mb_strlen($_POST['comment_message']) > 140) {
            $data['result'] = 'false';
            $data['message'] = '参数错误';
            ;
        }

        if (!empty($this->member_info['member_id'])) {
            $param = array();
            $param['comment_type'] = 2;
            $param["comment_object_id"] = $comment_id;
            if (strtoupper(CHARSET) == 'GBK') {
                $param['comment_message'] = Language::getGBK(str_replace("\\", "\\\\", json_encode($_POST['comment_message'])));
            } else {
                $param['comment_message'] = str_replace("\\", "\\\\", json_encode($_POST['comment_message']));
            }
            $param['comment_member_id'] = $this->member_info['member_id'];
            $param['comment_image'] = trim($_POST['comment_image']);
            $param['comment_time'] = time();
            $model_comment = Model('micro_comment');
            $result = $model_comment->save($param);
            if ($result) {

                //评论计数加1
                $model = Model();
                $update = array();
                $update['comment_count'] = array('exp', 'comment_count+1');
                $condition = array();
                $condition["personal_id"] = $comment_id;
                $model->table("micro_personal")->where($condition)->update($update);

                //返回信息
                $data['result'] = 'true';
                $data['member_name'] = $this->member_info['member_name'] . '：';
                $data['member_avatar'] = getMemberAvatar($this->member_info['member_avatar']);
//                $data['member_link'] = MICROSHOP_SITE_URL . '/index.php?act=home&member_id=' . $_SESSION['member_id'];
                $data['comment_message'] = parsesmiles(stripslashes($param['comment_message']));
                $data['comment_time'] = date('Y-m-d H:i:s', $param['comment_time']);
                $data['comment_id'] = $result;

//                //分享内容
//                if (isset($_POST['share_app_items'])) {
//                    $condition = array();
//                    $condition[$comment_type['type_key']] = $_POST['comment_id'];
//                    if ($_GET['type'] == 'store') {
//                        $info = $model->getOneWithStoreInfo($condition);
//                    } else {
//                        $info = $model->getOne($condition);
//                    }
//                    $info['commend_message'] = $param['comment_message'];
//                    $info['type'] = $_GET['type'];
//                    $info['url'] = MICROSHOP_SITE_URL . DS . "index.php?act={$_GET['type']}&op=detail&{$_GET['type']}_id=" . $_POST['comment_id'] . '#widgetcommenttitle';
//                    self::share_app_publish('comment', $info);
//                }
            } else {
                $data['result'] = 'false';
                $data['message'] = '发送失败';
            }
        } else {
            $data['result'] = 'false';
            $data['message'] = '未登录';
        }
        output_data($data);
    }

    /**
     * 评论删除
     * */
    public function comment_dropOp() {
        $data['result'] = 'false';
        $data['message'] = '删除失败';
        $comment_id = intval($_POST['comment_id']);
        if ($comment_id > 0) {
            $model_comment = Model('micro_comment');
            $comment_info = $model_comment->getOne(array('comment_id' => $comment_id));
            $micro_personal = Model('micro_personal')->getOne(array('personal_id'=>$comment_info['comment_object_id']));
            if ($comment_info['comment_member_id'] == $this->member_info['member_id']||$micro_personal['commend_member_id'] ==$this->member_info['member_id']) {
                $result = $model_comment->drop(array('comment_id' => $comment_id));
                if ($result) {
                    //评论计数减1
                    $model = Model();
                    $update = array();
                    $update['comment_count'] = array('exp', 'comment_count-1');
                    $condition = array();
                    $condition['comment_object_id'] = $comment_info['comment_object_id'];
                    $model->table("micro_personal")->where($condition)->update($update);
                    $data['result'] = 'true';
                    $data['message'] = '删除成功';
                }
            }
        }
        output_data($data);
    }
	
	/**
     * 添加瞬间评论
     * add by lizh 11:47 2016/7/28
	 */
    public function comment_addOp() {
		
		if(isset($this->member_info['member_id'])) {
			
            $insert_add['comment_type'] = 2;
			$insert_add['comment_object_id'] = $_POST['personal_id'];
			 if (strtoupper(CHARSET) == 'GBK') {
                $insert_add['comment_message'] = Language::getGBK(str_replace("\\", "\\\\", json_encode($_POST['comment_message'])));
            } else {
                $insert_add['comment_message'] = str_replace("\\", "\\\\", json_encode($_POST['comment_message']));
            }
			$insert_add['comment_member_id'] = $this->member_info['member_id'];
			$insert_add['comment_time'] = time();
			
			$micro_comment = Model('micro_comment');
			$rs = $micro_comment -> save($insert_add);
			
			if($rs) {

				$field = "micro_comment.comment_id,micro_comment.comment_message,micro_comment.comment_time,member.member_id,member.member_name,member.member_avatar";
				$micro_comment_list = $micro_comment -> getListWithUserInfo(array(comment_id => $rs,comment_type => 2), 0, 'micro_comment.comment_id desc', $field);
				foreach($micro_comment_list as $k => $v) {
			
					$micro_comment_list[$k]['comment_time'] = date('Y/m/d',$v['comment_time']);
					$micro_comment_list[$k]['member_avatar'] = getMemberAvatar($v['member_avatar']);
					$micro_comment_list[$k]['like_count'] = 0;
					$micro_comment_list[$k]['comment_message'] = json_decode($micro_comment_list[$k]['comment_message']);
				
				}
				
				//用户头像
				$login_data = array();
				if(!empty($_POST['key'])) {

					$login_data['avatar'] = getMemberAvatarForID($this->member_info['member_id']);
					
				} else {
					
					$login_data['avatar'] = UPLOAD_SITE_URL.DS.defaultGoodsImage('360');
					
				}
				
				$data['status'] = '1';
				$data['message'] = '评论成功';
				$data['micro_comment_list'] = $micro_comment_list;
				$data['login_data'] = $login_data;
				
			} else {
				
				$data['status'] = '0';
				$data['message'] = '评论出错';
				
			}

        } else {
			
            $data['status'] = '0';
            $data['message'] = '未登录';
        
		}

		output_data($data);
	
    }
	
		
	/**
     * 评论点赞
	 * add by lizh 14:32 2016/7/28
     **/
    public function comment_likeOp() {
		
		$micro_comment = Model('micro_comment');
		$comment_id = $_POST['comment_id'];
		
		if(!isset($this->member_info['member_id'])) {
			
			output_error('未登录');
			
		}
		
		if(empty($comment_id)) {
			
			$data = $micro_comment -> getOne(array(comment_id => $comment_id));
			$like_count = $data['like_count'];
			output_data(array(like_count => $like_count, status => 0, message => '点赞失败'));
			
		}

		$check = $micro_comment -> isExist(array(comment_id => $comment_id));
		if(!$check) {
			
			$data = $micro_comment -> getOne(array(comment_id => $comment_id));
			$like_count = $data['like_count'];
			output_data(array(like_count => $like_count, status => 0, message => '点赞失败'));
			
		}

		$rs = $micro_comment -> modify(array(like_count => array('exp','like_count+1')), array(comment_id => $comment_id));
		
		$data = $micro_comment -> getOne(array(comment_id => $comment_id));
		$like_count = $data['like_count'];
		
        output_data(array(like_count => $like_count, status => 1, message => '点赞成功'));
		
    }

}
