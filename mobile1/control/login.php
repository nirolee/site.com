<?php
/**
 * 前台登录 退出操作
 *
 *
 *
 *
 * 
 */

use Shopnc\Tpl;

defined('InShopNC') or exit('Access Invalid!');

class loginControl extends mobileHomeControl {

	public function __construct(){
		parent::__construct();
	}

    private function isQQLogin(){
        return !empty($_GET[type]);
    }
    /**
     * 登录
     */
    public function indexOp(){

        if(!$this->isQQLogin()){
            if(empty($_POST['username']) || empty($_POST['password']) || !in_array($_POST['client'], $this->client_type_array)) {
                output_error('登录失败');
            }
        }
		$model_member = Model('member');
        $array = array();
        if($this->isQQLogin()){
            $array['member_qqopenid']	= $_SESSION['openid'];
        }else{
            $array['member_name']	= $_POST['username'];
            $array['member_passwd']	= md5($_POST['password']);
        }
        $member_info = $model_member->getMemberInfo($array);
        if(!empty($member_info)) {
            $token = $this->_get_token($member_info['member_id'], $member_info['member_name'], $_POST['client'],$_POST['device_tokens']);
            if($token){
                    if($this->isQQLogin()){
                        setNc2Cookie('username',$member_info['member_name']);
                        setNc2Cookie('key',$token);
                        header("location:".WAP_SITE_URL.'/tmpl/member/member.html?act=member');
                    }else{
                        output_data(array('username' => $member_info['member_name'], 'key' => $token));
                    }
            } else {
                output_error('登录失败');
            }
        } else {
            output_error('用户名密码错误');
        }
    }

    /**
     * 登录生成token
     */
    private function _get_token($member_id, $member_name, $client,$device_tokens) {
        $model_mb_user_token = Model('mb_user_token');
        $member = Model('member');
        //重新登录后以前的令牌失效
        //暂时停用
        //$condition = array();
        //$condition['member_id'] = $member_id;
        //$condition['client_type'] = $_POST['client'];
        //$model_mb_user_token->delMbUserToken($condition);

        //生成新的token
        $mb_user_token_info = array();
        $token = md5($member_name . strval(TIMESTAMP) . strval(rand(0,999999)));
        $mb_user_token_info['member_id'] = $member_id;
        $mb_user_token_info['member_name'] = $member_name;
        $mb_user_token_info['token'] = $token;
        $mb_user_token_info['login_time'] = TIMESTAMP;
        $mb_user_token_info['client_type'] = $_POST['client'] == null ? 'Android' : $_POST['client'] ;
        
        $result = $model_mb_user_token->addMbUserToken($mb_user_token_info);
        if(strtolower($mb_user_token_info['client_type']) == 'android' || strtolower($mb_user_token_info['client_type']) == 'ios') {
            $member_info = array();
            $member_info['device_tokens'] = $device_tokens;
            $member_info['member_login_time'] = $mb_user_token_info['login_time'];
            $member -> editMember(array(member_id => $mb_user_token_info['member_id']), $member_info);
            
        }
        
        if($result) {
            return $token;
        } else {
            return null;
        }

    }

	/**
	 * 注册 重复注册验证 
	 */
	public function registerOp(){
		 if (process::islock('reg')){
			output_error('您的操作过于频繁，请稍后再试');
		}
		
		$model_member	= Model('member');
        $register_info = array();
        $register_info['username'] = $_POST['username'];
        $register_info['password'] = $_POST['password'];
        $register_info['password_confirm'] = $_POST['password_confirm'];
        $register_info['email'] = $_POST['email'];
        $member_info = $model_member->register($register_info);
        if(!isset($member_info['error'])) {
            process::addprocess('reg');
            $token = $this->_get_token($member_info['member_id'], $member_info['member_name'], $_POST['client'],$_POST['device_tokens']);
            if($token) {
				
				if(!empty($_POST['key'])) {

					$card_check = Model('card_check');
					$card_combination = Model('card_combination');
					$data = $card_check -> getOne(array(sign => $_POST['key'],flag_state => 0, check_state => 0));

					if(!empty($data)) {
						
						$update_array['member_id'] = $member_info['member_id'];
						$update_array['flag_state'] = 1;
						$update_array['check_state'] = 1;
						$update_array['check_time'] = time();
						$card_check_rs = $card_check -> modify($update_array,array(sign => $_POST['key']));
						if($card_check_rs) {
							
							$combination_id = $data['combination_id']; 
							$rs = $card_combination -> modify(array(member_id => $member_info['member_id']),array(combination_id => $combination_id));
							
						}
						

					}
					
				}

                output_data(array('username' => $member_info['member_name'], 'key' => $token));
            } else {
                output_error('注册失败');
            }
        } else {
			output_error($member_info['error']);
        }

    }
}