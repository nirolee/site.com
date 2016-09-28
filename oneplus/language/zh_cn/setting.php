<?php
defined('InShopNC') or exit('Access Invalid!');
/**
 * 设置 语言包
 */

$lang['update_cycle_only_number'] = '更新周期 必须为数字类型';
$lang['user_info_del_ok']     = '清除成功！';
$lang['user_info_del_fail']   = '清除失败！';
$lang['test_email']           = '测试邮件';
$lang['this_is_to']           = '这是一封来自';
$lang['test_email_set_ok']    = '的测试邮件，证明您所邮件设置正常';
$lang['test_email_send_fail'] = '测试邮件发送失败，请重新配置邮件服务器';
$lang['test_email_send_ok']   = '测试邮件发送成功';
$lang['site_tel400']                         = '前台客服电话';
$lang['icp_number_notice400']                  = '显示在网站的底部';
$lang['site_bank_weixinerwei']                  = '微信二维码';


$lang['web_set']        = '站点设置';
$lang['account_syn']     = '账号同步';
$lang['sys_set']        = '系统设置';
$lang['basic_info']     = '基本信息';
$lang['upload_set']		= '上传设置';
$lang['default_thumb']	= '默认图片';
$lang['upload_set_ftp'] = '远程图片';
$lang['upload_service']	= '图片服务器';
$lang['upload_param']	= '上传参数';
$lang['point_set']		= '积分设置';
$lang['user_auth'] 		= '用户权限';
$lang['dis_dump']   	= '防灌水设置';
$lang['open_store_set'] = '店铺设置';
$lang['credit']         = '信用评价';
$lang['domain']         = '二级域名';
$lang['ucenter_integration']   = '会员整合';
$lang['goldSettings']   = '金币设置';
$lang['ztcSettings']   = '直通车';
$lang['qqSettings']   = 'QQ互联';
$lang['qqSettings_notice'] = '开启后可使用QQ账号登录商城系统';
$lang['sinaSettings']   = '新浪微博';
$lang['wxSettings']   = '微信';
$lang['loginSettings']   = '登录主题图片';
$lang['login_set_help1']   	= '设置登录页左侧主题图片';
$lang['login_click_open']   = '点击打开';
$lang['ftp_set_help1']   	= 'FTP设置测试通过后，请更改data/config/confi.ini.php中 $config[\'thumb\'][\'save_type\'] = 3';
$lang['ftp_set_help2']   	= '如果服务器已配置NFS等网络文件系统，建议关闭FTP存储，使用NFS等文件系统实现图片共享。';
$lang['pointssettings']   = '积分规则';


$lang['user_info_del']           = '会员信息清除';
$lang['click_clear']             = '点击清除';
$lang['user_info_clear']         = '会员信息清除，其拥有的店铺和商品也会被清除，您确定要清除吗?';
$lang['first_integration']       = '<span>如果是第一次整合Ucenter，</span><span style=" color: #F00;">需要</span><span style=" color: #F00;">清除商城会员</span><span>信息，清除前建议您备份数据</span>';
$lang['click_bak']               = '点击备份';
$lang['ucenter_type']            = '请选择整合的社区系统';
$lang['ucenter_uc_discuz']       = 'Ucenter';
$lang['ucenter_application_id']  = '应用ID';
$lang['ucenter_help_url']		 = '点击查看会员整合教程';
$lang['ucenter_address']         = '访问地址';
$lang['ucenter_key']             = '通讯密钥';
$lang['ucenter_ip']              = 'IP地址';
$lang['ucenter_mysql_server']    = '数据库地址';
$lang['ucenter_mysql_username']  = '数据库用户名';
$lang['ucenter_mysql_passwd']    = '数据库密码';
$lang['ucenter_mysql_name']      = '数据库名';
$lang['ucenter_mysql_pre']       = '表前缀';

$lang['ucenter_application_id_tips'] 	= '商城系统在若整合Ucenter中的应用ID';
$lang['ucenter_address_tips'] 			= '若整合Ucenter，需要填写Ucenter的访问地址';
$lang['ucenter_ip_tips'] 				= '需要整合应用的IP地址';
$lang['ucenter_mysql_server_tips'] 		= '需要整合应用的数据库地址';
$lang['ucenter_mysql_username_tips'] 	= '需要整合应用的数据库访问账号';
$lang['ucenter_mysql_passwd_tips'] 		= '需要整合应用的数据库访问密码';
$lang['ucenter_mysql_name_tips'] 		= '需要整合应用的数据库名称';
$lang['ucenter_mysql_pre_tips'] 		= '需要整合应用的表前缀';

$lang['email_set']		= '邮件设置';
//zmr>>>
$lang['mobile_set']		= '短信平台设置';
$lang['email_tpl']		= '其它模板';
$lang['message_tpl']	= '站内信模板';
$lang['message_tpl_state']	= '消息模板状态更改';
$lang['seller_tpl']     = '商家消息模板';
$lang['seller_tpl_edit']     = '编辑商家消息模板';
$lang['member_tpl']     = '用户消息模板';
$lang['member_tpl_edit']= '编辑用户消息模板';

$lang['time_zone_set']         = '默认时区';
$lang['set_sys_use_time_zone'] = '设置系统使用的时区，中国为';
$lang['default_product_pic']   = '默认商品图片';
$lang['default_store_logo']    = '默认店铺标志';
$lang['default_user_pic']      = '默认会员头像';
$lang['flow_static_code']      = '第三方流量统计代码';
$lang['flow_static_code_notice']     = '前台页面底部可以显示第三方统计';
$lang['image_dir_type']		= '图片存放类型';
$lang['image_dir_type_0']	= '按照文件名存放 (例:/店铺id/图片)';
$lang['image_dir_type_1']	= '按照年份存放 (例:/店铺id/年/图片)';
$lang['image_dir_type_2']	= '按照年月存放 (例:/店铺id/年/月/图片)';
$lang['image_dir_type_3']	= '按照年月日存放 (例:/店铺id/年/月/日/图片)';
$lang['image_width']	= '宽';
$lang['image_height']	= '高';
$lang['image_typeerror']	= '上传图片格式不正确';
$lang['image_thumb_tool']	= '压缩工具';
$lang['image_thumb_tool_tips']	= '商城默认使用GD库生成缩略图，GD使用广泛但占用系统资源较多，ImageMagick速度快系统资源占用少，但需要服务器有执行命令行命令的权限。可到 http://www.imagemagick.org 下载安装，如改用ImageMagick，可编辑data/config/config.ini.php文件(用EditPlus): <br/>$config[\'thumb\'][\'cut_type\'] = \'im\';<br/>$config[\'thumb\'][\'impath\'] = \'ImageMagick下convert工具所在路径\'; 如：<br/>$config[\'thumb\'][\'impath\'] = \'/usr/local/ImageMagick/bin\';';

$lang['allowed_visitors_consult']           = '允许游客咨询';
$lang['allowed_visitors_consult_notice']    = '允许游客在商品的详细展示页面，对当前商品进行咨询';
$lang['open_pseudo_static']                 = '启用伪静态';
$lang['open_kefu'] = '启用在线客服';
$lang['open_kefu_yes'] = '是';
$lang['open_kefu_no'] = '否';
$lang['promotion_allow'] = '商品促销';
$lang['promotion_notice'] = '启用商品促销功能后，商家可以通过限时打折、满即送、优惠套装和推荐展位活动，对店铺商品进行促销';
$lang['open_pointshop_isuse'] = '积分中心';
$lang['open_pointshop_isuse_notice'] = '积分中心和积分同时启用后，网站将增加积分中心频道';
$lang['open_pointprod_isuse'] = '积分兑换';
$lang['open_pointprod_isuse_notice'] = '积分兑换、积分功能以及积分中心启用后，平台发布礼品，会员的积分在达到要求时可以在积分中心中兑换礼品';
$lang['points_isuse_notice'] = '积分系统启用后，可设置会员的注册、登录、购买商品送一定的积分';
$lang['open_predeposit_isuse'] = '预存款';
$lang['open_predeposit_isuse_notice'] = '预存款启用后，会员可以给自己帐户充值进行交易，当交易支付到平台时，预存款不可以关闭';
$lang['voucher_allow'] = '代金券';
$lang['voucher_allow_notice'] = '代金券功能、积分功能、积分中心启用后，商家可以申请代金券活动；会员积分达到要求时可以在积分中心兑换代金券；<br>拥有代金券的会员可在代金券所属店铺内购买商品时，选择使用而得到优惠';
$lang['groupbuy_allow'] = '抢购';
$lang['groupbuy_isuse_notice']    = '抢购功能启用后，商家通过活动发布抢购商品，进行促销';
$lang['complain_time_limit'] = '投诉时效';
$lang['complain_time_limit_desc'] = '单位为天，订单完成后开始计算，多少天内可以发起投诉，根据具体情况卖家和买家都可发起投诉';
$lang['update_cycle_hour']                  = '更新周期(小时)';
$lang['web_name']                           = '网站名称';
$lang['web_name_notice']					= '网站名称，将显示在前台顶部欢迎信息等位置';
$lang['site_description']                   = '网站描述';
$lang['site_description_notice']			= '网站描述，出现在前台页面头部的 Meta 标签中，用于记录该页面的概要与描述';
$lang['site_keyword']                       = '网站关键字';
$lang['site_keyword_notice']                = '网站关键字，出现在前台页面头部的 Meta 标签中，用于记录该页面的关键字，多个关键字间请用半角逗号 "," 隔开';
$lang['site_logo']                          = '网站Logo';
$lang['member_logo']                        = '会员中心Logo';
$lang['member_logo_notice']                 = '默认为网站Logo，在会员中心头部显示，建议使用180px * 50px';
$lang['icp_number']                         = 'ICP证书号';
$lang['icp_number_notice']                  = '前台页面底部可以显示 ICP 备案信息，如果网站已备案，在此输入你的授权码，它将显示在前台页面底部，如果没有请留空';
$lang['site_phone']                         = '平台客服联系电话';
$lang['site_phone_notice']                  = '商家中心右下侧显示，方便商家遇到问题时咨询，多个请用半角逗号 "," 隔开';
$lang['site_bank_account']                  = '平台汇款账号';
$lang['site_bank_account_notice']           = '用半角逗号","分隔项目，用半角冒号":"分隔标题和内容，例："银行:中国银行,币种:人民币,账号:xxxxxxxxxxx,姓名:abc,开户行:中国银行XX分行"';
$lang['site_email']                         = '电子邮件';
$lang['site_email_notice']                  = '商家中心右下侧显示，方便商家遇到问题时咨询';
$lang['site_state']                         = '站点状态';
$lang['site_state_notice']                  = '可暂时将站点关闭，其他人无法访问，但不影响管理员访问后台';
$lang['closed_reason']                      = '关闭原因';
$lang['closed_reason_notice']               = '当网站处于关闭状态时，关闭原因将显示在前台';
$lang['hot_search']                         = '热门搜索';
$lang['field_notice']                       = '热门搜索，将显示在前台搜索框下面，前台点击时直接作为关键词进行搜索，多个关键词间请用半角逗号 "," 隔开';
$lang['email_type_open']                    = '邮件功能开启';
$lang['email_type']                         = '邮件发送方式';
$lang['use_other_smtp_service']             = '采用其他的SMTP服务';
$lang['use_server_mail_service']            = '采用服务器内置的Mail服务';
$lang['if_choose_server_mail_no_input_follow'] = '如果您选择服务器内置方式则无须填写以下选项';
$lang['smtp_server']             = 'SMTP 服务器';
$lang['set_smtp_server_address'] = '设置 SMTP 服务器的地址，如 smtp.163.com';
$lang['smtp_port']               = 'SMTP 端口';
$lang['set_smtp_port']           = '设置 SMTP 服务器的端口，默认为 25';
$lang['sender_mail_address']     = '发信人邮件地址';
$lang['if_smtp_authentication']  = '使用SMTP协议发送的邮件地址，如 abc@163.com';
$lang['smtp_user_name']          = 'SMTP 身份验证用户名';
$lang['smtp_user_name_tip']      = '如 abc';
$lang['smtp_user_pwd']           = 'SMTP 身份验证密码';
$lang['smtp_user_pwd_tip']       = 'abc@163.com邮件的密码，如 123456';
$lang['test_mail_address']       = '测试接收的邮件地址';
$lang['test']                    = '测试';
$lang['open_checkcode']          = '使用验证码';
$lang['front_login']             = '前台登录';
$lang['front_goodsqa']           = '商品咨询';
$lang['front_regist']            = '前台注册';
$lang['allow_open_store']        = '开店申请';
$lang['setting_store_creditrule']        = '店铺信用';
$lang['setting_store_creditrule_grade']        = '等级';
$lang['setting_store_creditrule_gradenum']        = '信用介于';


$lang['default_img_wrong']       = '图片限于png,gif,jpeg,jpg格式';

$lang['upload_image_filesize']	= '图片文件大小';
$lang['image_allow_ext']	= '图片扩展名';
$lang['image_allow_ext_notice']	= '图片扩展名，用于判断上传图片是否为后台允许，多个后缀名间请用半角逗号 "," 隔开。';
$lang['image_allow_ext_not_null']	= '图片扩展名不能为空';
$lang['upload_image_file_size']	= '大小';
$lang['upload_image_filesize_is_number']    = '图片文件大小仅能为数字';
$lang['image_max_size_tips'] = '当前服务器环境，最大允许上传'.ini_get('upload_max_filesize').'B 的文件，您的设置请勿超过该值。';
$lang['upload_image_size_c_num'] = '图片像素最多四位数';
$lang['image_max_size_only_num'] = '图片文件大小仅能为数字';
$lang['image_max_size_c_num'] = '图片文件大小最多四位数';

$lang['gold_isuse']    = '金币';
$lang['gold_isuse_notice']    = '金币功能启用后，店主可通过平台提供的交易方式进行购买，金币可用来购买广告、直通车等';
$lang['gold_isuse_open']    = '开启';
$lang['gold_isuse_close']    = '关闭';
$lang['gold_rmbratio']    = '金币市值';
$lang['gold_rmbratiodesc_1']    = '人民币一元兑换';
$lang['gold_rmbratiodesc_2']    = '枚金币';
$lang['gold_isuse_check']    = '请选择是否启用金币功能';
$lang['gold_rmbratio_isnum']    = '金币市值必须为正整数';
$lang['gold_rmbratio_min']    = '金币市值最小为1';
$lang['edit_gold_set_ok']       = '编辑金币设置成功。';
$lang['edit_gold_set_fail']     = '编辑金币设置失败。';

$lang['ztc_isuse']    = '直通车状态';
$lang['ztc_isuse_open']    = '开启';
$lang['ztc_isuse_close']    = '关闭';
$lang['ztc_dayprod']    = '直通车单价';
$lang['ztc_unit']    = '金币/天';
$lang['ztc_isuse_check']    = '请选择是否启用直通车';
$lang['ztc_isuse_notice']    = '直通车功能启用后，店主用金币来购买，申请的商品在列表中会靠前';
$lang['ztc_dayprod_isnum']    = '直通车单价必须为正整数';
$lang['ztc_dayprod_min']    = '直通车单价最小为1';

$lang['qq_isuse']   			= '是否启用QQ互联功能';
$lang['qq_isuse_open']    	 	= '开启';
$lang['qq_isuse_close']    	 	= '关闭';
$lang['qq_apply_link']    	 	= '立即在线申请';
$lang['qq_appcode']    	 		= '域名验证信息';
$lang['qq_appid']    	 		= '应用标识';
$lang['qq_appkey']    	 		= '应用密钥';
$lang['qq_appid_error']    	 	= '请添加应用标识';
$lang['qq_appkey_error']    	= '请添加应用密钥';
$lang['qq_ucenter_error']    	 	= '请关闭会员整合，才可启用QQ互联功能';

$lang['sina_isuse']   			= '新浪微博登录功能';
$lang['sina_isuse_open']    	= '开启';
$lang['sina_isuse_close']    	= '关闭';
$lang['sina_apply_link']    	= '立即在线申请';
$lang['sina_appcode']    	 		= '域名验证信息';
$lang['sina_wb_akey']    	 	= '应用标识';
$lang['sina_wb_skey']    	 	= '应用密钥';
$lang['sina_wb_akey_error']    	= '请添加应用标识';
$lang['sina_wb_skey_error']    	= '请添加应用密钥';
$lang['sina_function_fail_tip'] = '该功能需要在  php.ini 中 开启 php_curl 扩展，才能使用。';

$lang['wx_isuse']   			= '是否启用微信登陆功能';
$lang['wx_isuse_open']    	 	= '开启';
$lang['wx_isuse_close']    	 	= '关闭';
$lang['wx_apply_link']    	 	= '立即在线申请';
$lang['wx_appcode']    	 		= '域名验证信息';
$lang['wx_appid']    	 		= '应用标识';
$lang['wx_appkey']    	 		= '应用密钥';
$lang['wx_appid_error']    	 	= '请添加应用标识';
$lang['wx_appkey_error']    	= '请添加应用密钥';
$lang['wx_ucenter_error']    	 = '请关闭会员整合，才可启用微信登陆功能';

$lang['points_isuse']   		= '积分';
$lang['points_isuse_open']    	= '开启';
$lang['points_isuse_close']    	= '关闭';
$lang['points_ruletip']    		= '积分规则如下';
$lang['points_item']    	 	= '项目';
$lang['points_number']    	 	= '赠送积分';
$lang['points_number_reg']    	= '会员注册';
$lang['points_number_login']    = '会员每天登录';
$lang['points_number_comments']    = '订单商品评论';
$lang['points_tuijian']       = '设置推荐积分规则';
$lang['reg_tuijian']       = '推荐注册积分';
$lang['regtuijian']        = '会员注册时分给推荐人积分数';
$lang['points_number_order']    = '购物并付款';
$lang['points_number_orderrate']    = '消费额与赠送积分比例';
$lang['points_number_orderrate_tip']    = '例:设置为10，表明消费10单位货币赠送1积分';
$lang['points_number_ordermax']    = '每订单最多赠送积分';
$lang['points_number_ordermax_tip']    = '例:设置为100，表明每订单赠送积分最多为100积分';
$lang['points_update_success']    = '更新成功';
$lang['points_update_fail']    	= '更新失败';

$lang['open_yes']    	= '是';
$lang['open_no']    	= '否';

$lang['font_set'] = '水印字体';
$lang['font_help1'] = '如果图片空间中水印使用汉字则要下载并安装相应字体库。';
$lang['font_help2'] = '使用方法：将您下载到的字体库上传到网站根目录下\data\resource\font这个文件夹内，同时需要修改此文件夹下的font.info.php文件。例如：您下载了一个“宋体”字库simsun.ttf，将其放置于前面所述文件夹内，打开font.info.php文件在其中的$fontInfo = array(\'arial\'=>\'Arial\')数组后面添加宋体字库信息,“=>”符号左边是文件名，右边是您想在网站上显示的文字信息，添加后的样子是array(\'arial\'=>\'Arial\',\'simsun\'=>\'宋体\')';
$lang['font_info'] = '已经安装字体如下';

$lang['ftp_state'] = '图片远程存储';
$lang['ftp_ssl_state'] = '启用 SSL 连接';
$lang['ftp_server'] = 'FTP 服务器地址';
$lang['ftp_port'] = 'FTP 服务器端口';
$lang['ftp_username'] = 'FTP 帐号';
$lang['ftp_password'] = 'FTP 密码';
$lang['ftp_pasv'] 		= '被动模式(pasv)连接';
$lang['ftp_attach_dir'] = '远程附件目录';
$lang['ftp_access_url'] = '远程访问 URL';
$lang['ftp_timeout'] = 'FTP 传输超时时间';
$lang['ftp_test'] = '远程附件测试';

$lang['ftp_state_tip'] 	= '只有开启状态下以下配置才会生效';
$lang['ftp_ssl_tip'] 	= '只有服务器开启了SSL链接才可设置';
$lang['ftp_server_tip'] = '可以是FTP服务器的IP地址或域名';
$lang['ftp_port_tip'] 	= '默认端口是21';
$lang['ftp_username_tip'] 	= '该帐号必需具有以下权限：读取文件、写入文件、删除文件、创建目录、子目录继承';
$lang['ftp_pasv_tip'] 	= '一般情况下非被动模式即可，如果存在上传失败问题，可尝试打开此设置';
$lang['ftp_attach_dir_tip'] 	= '远程附件目录的绝对路径或相对于 FTP 主目录的相对路径，如果是根目录请填"/"，非根目录，请保证服务器端该目录已存在，结尾不需要"/"，如"/upload/ftp"';
$lang['ftp_access_url_tip'] = '支持 HTTP 和 FTP 协议，结尾不要加斜杠“/”；如果使用 FTP 协议，FTP 服务器必需支持 PASV 模式，为了安全起见，使用 FTP 连接的帐号不要设置可写权限和列表权限。如果是根目录，直接输入域名即可，如“http://www.xxx.com”，如果非根目录，需要填写域名+目录形式，如“http://www.xxx.com/upload/ftp';
$lang['ftp_timeout_tip'] = '单位：秒，0 为服务器默认';
$lang['ftp_test_tip'] 	= '无需保存设置即可测试，请在测试通过后再保存';

$lang['ftp_error-100'] = '当前服务器 PHP 没有安装 FTP 扩展模块或 FTP 函数被禁用';
$lang['ftp_error-101'] = '远程附件功能未开启';
$lang['ftp_error-102'] = '尝试连接到 FTP 服务器失败，请检查 FTP 服务器地址和端口号设置是否正确';
$lang['ftp_error-103'] = '尝试登录到 FTP 服务器失败，请检查 FTP 帐号密码设置是否正确';
$lang['ftp_error-104'] = '尝试切换目录失败，请检查远程附件目录设置是否正确';
$lang['ftp_error-105'] = '尝试创建目录失败，请检查远程附件目录设置是否正确，并检查 FTP 帐号是否具有创建目录的权限';
$lang['ftp_error-106'] = '尝试上传文件失败，请检查站点附件目录是否具有上传文件的权限';
$lang['ftp_error-107'] = '尝试上传文件失败，请检查 FTP 帐号是否具有上传文件的权限，如果确认权限正常，请尝试使用被动模式(pasv)连接';
$lang['ftp_error_geterr'] = '尝试下载文件失败，请检查远程访问 URL 设置是否正确';
$lang['ftp_errord_elerr'] = '尝试删除文件失败，请检查 FTP 帐号是否具有删除文件的权限';
$lang['ftp_test_ok'] = '远程附件设置一切正常';

$lang['share_allow'] 	= '是否开启站外分享功能';
$lang['share_notice'] 	= '开启站外分享功能并设置站外分享绑定的相应接口后，SNS分享店铺和商品信息功能中将可以使用站外分享信息功能';


$lang['seo_set_index'] 		= '首页';
$lang['seo_set_group'] 		= '抢购';
$lang['seo_set_brand'] 		= '品牌';
$lang['seo_set_point'] 		= '积分中心';
$lang['seo_set_article'] 	= '文章';
$lang['seo_set_shop'] 		= '店铺';
$lang['seo_set_product'] 	= '商品';
$lang['seo_set_category'] 	= '商品分类';
$lang['seo_set_prompt'] 	= '插入的变量必需包括花括号“{}”，当应用范围不支持该变量时，该变量将不会在前台显示(变量后边的分隔符也不会显示)，留空为系统默认设置，SEO自定义支持手写。以下是可用SEO变量: <br/><a href="javascript:void(0);" id="toggmore">显示/隐藏全部提示...</a>';
$lang['seo_set_tips1'] 	= '站点名称 {sitename}，（应用范围：全站）';
$lang['seo_set_tips2'] 	= '名称 {name}，（应用范围：抢购名称、商品名称、品牌名称、文章标题、分类名称）';
$lang['seo_set_tips3'] 	= '文章分类名称 {article_class}，（应用范围：文章分类页）';
$lang['seo_set_tips4'] 	= '店铺名称 {shopname}，（应用范围：店铺页）';
$lang['seo_set_tips5'] 	= '关键词 {key}，（应用范围：商品关键词、文章关键词、店铺关键词）';
$lang['seo_set_tips6'] 	= '简单描述 {description}，（应用范围：商品描述、文章摘要、店铺关键词）';
$lang['seo_set_tips7'] 	= '<a>提交保存后，需要到 工具 -> 清理缓存 清理SEO，新的SEO设置才会生效</a>';
$lang['seo_set_group_content'] 		= '抢购内容';
$lang['seo_set_brand_list'] 		= '某一品牌商品列表';
$lang['seo_set_point_content'] 		= '积分中心商品内容';
$lang['seo_set_atricle_list'] 		= '文章分类列表';
$lang['seo_set_atricle_content'] 	= '文章内容';
$lang['seo_set_insert_tips'] 		= '可用的代码，点击插入';

$lang['memory_set_opt']		= '性能优化';
$lang['memory_set_prompt1']		= '启用内存优化功能将会大幅度提升程序性能和服务器的负载能力，内存优化功能需要服务器系统以及PHP扩展模块支持';
$lang['memory_set_prompt2']		= '目前支持的内存优化接口有Redis、Memcache、eAccelerator、Alternative PHP Cache(APC)和Xcache，系统将会依据当前服务器环境选用接口';
$lang['memory_set_prompt3']		= '内存接口的主要设置位于 config.ini.php 当中，您可以使用EditPlus（禁止使用记事本、写字板）通过编辑 config.ini.php 进行高级设置';
$lang['memory_set_prompt4']		= '内存优化功能设置的内容，只有开启内存缓存后才会生效，更改缓存详细参数需编辑 config.ini.php 文件';
$lang['memory_set_cur_status']	= '当前工作状态';
$lang['memory_set_type']		= '缓存类型';
$lang['memory_set_php']			= 'PHP 扩展环境';
$lang['memory_set_config']		= 'Config 设置';
$lang['memory_set_cls']			= '清理';
$lang['memory_set_opt_moduleset']	= '内存优化功能设置';
$lang['memory_set_opt_module']	= '功能模块';
$lang['memory_set_opt_ifopen']	= '是否开启';
$lang['memory_set_opt_ttl']		= '缓存周期(秒)';