var page = pagesize;
var t= getCookie("key");
var like_id= getQueryString("like_id");
var curpage = 1;
var hasmore = true;
var footer = false;
var myDate = new Date;
var searchTimes = myDate.getTime();
$(function () {

    get_like_list();
    get_list();
    
    $(window).scroll(function () {
        if ($(window).scrollTop() + $(window).height() > $(document).height() - 1) {
            get_list()
        }
    });
        			
    var a =  window.location.href;
    get_wx_shart(a);
	
});
function get_list() {
	
    $(".loading").remove();
    if (!hasmore) {
        return false
    }
    hasmore = false;
    param = {};
    param.page = page;
    param.curpage = curpage;
    param.key = t;

    $.getJSON(ApiUrl1 + "/index.php?act=micro&op=get_personal_list_wap_1_5" + window.location.search.replace("?", "&"), param,
        function (e) {

            if (!e) {
                e = [];
                e.datas = [];
                e.datas.goods_list = []
            }
            $(".loading").remove();
            curpage++;
            var inspiration_list_html = "";
            inspiration_list_html = template.render("inspiration_list_model", e);
            $("#inspiration_list").append(inspiration_list_html);
            hasmore = e.hasmore
        }
    )
}
/**
 * 红人榜
 * add by lizh 11:33 2016/7/19
 */
function get_like_list() {
    $.getJSON(ApiUrl1 + "/index.php?act=micro&op=getPersonalLike_wap_1_5",{'key':t},
        function (data) {

            if (!data) {
                data = [];
                data.datas = [];
                data.datas.goods_list = []
                data.datas.favorites_list = []
            }

            var favorite_list_html = "";
            favorite_list_html = template.render("favorite_list_model", data);
            $("#favorite_list").append(favorite_list_html);

            var showcase_list_html = "";
            showcase_list_html = template.render("showcase_list_model", data.datas);
            $("#tanchuk").append(showcase_list_html);

        }
    )
}

/**
 * 用户关注
 * add by lizh 14:14 2014/7/13
 */
function member_attention(obj,id,state) {
	
    var key = getCookie('key');
    //console.log(obj.previousElementSibling.children[0].innerHTML);

    if(key == null) {

        layer.tips('请先登录', obj, {
                tips: [1, '#0FA6D8'] //还可配置颜色
        });
        return;

    }
	
    $.ajax({

        type : 'GET',
        url : ApiUrl + '/index.php?act=sns_friend&op=add_follow',
        data : {'member_id':id,'key':key},
        dataType : 'json',

        success : function(data) {

            if(data.datas.result == 'true') {

                layer.tips(data.datas.message, obj, {
                    tips: [1, '#0FA6D8'] //还可配置颜色
                });

                var red_member_friend = $('#red_member_friend_'+id);
                if(typeof(red_member_friend) != "undefined") {
                    
                    red_member_friend.html('已关注');
                    red_member_friend.attr('onclick','member_del_follow(this,'+id+','+state+')');
                    $('#red_count_friend_'+id).html(data.datas.count_friend);
                }
                
                var member_friend = $('.member_friend_'+id);
                if(typeof(member_friend) != "undefined") {
                    
                    $('.member_friend_'+id).each(function(){
                        
                        $(this).html('已关注');
                        $(this).attr('onclick','member_del_follow(this,'+id+','+state+')');
                        
                    });
                    
                    $('.count_friend_'+id).each(function(){
                        
                        $(this).html('+' + data.datas.count_friend);
                        
                    });
                    
                    $('.count_friend_avatar_'+id).each(function(){
                        
                        var micro_like_data = data.datas.micro_like_data;
                        str = "";
                        if(micro_like_data.length > 0) {
                            
                            for(var i in micro_like_data) {
                            
                                str +=  "<li><img src=" + micro_like_data[i].member_avatar + " alt=''></li>";

                            }
                            
                        }
                        
                        $(this).html(str);
                        //$(this).html('+' + data.datas.count_friend);
                        
                    });
                    
                }
                

            } else {

                layer.tips(data.datas.message, obj, {
                    tips: [1, '#0FA6D8'] //还可配置颜色
                });
            }

//            if(state == 0) {
//
//                $(obj).prev().text(data.datas.count_friend);
//
//            }
//
//            if(state == 2) {
//                
//                 $(obj).parent().prev().find('u').html('+' + data.datas.count_friend);
//                //obj.previousElementSibling.children[0].innerHTML = '+' + data.datas.count_friend;
//
//            }

        },

        error : function(e) {

            console.log(e);

        }

    });
	
}

/**
 * 用户点赞
 * add by lizh 14:14 2014/7/13
 */
function member_like(obj,id) {
	
    var key = getCookie('key');
    if(key == null) {

        layer.tips('请先登录', obj, {
            tips: [1, '#0FA6D8'] //还可配置颜色
        });
        return;

    }
    $.ajax({

        type : 'GET',
        url : ApiUrl1 + '/index.php?act=micro_like&op=like_save',
        data : {'like_id':id,'key':key},
        dataType : 'json',

        success : function(data) {

            layer.tips(data.datas.message, obj, {
                tips: [1, '#0FA6D8'] //还可配置颜色
            });

            if(data.datas['result']) {

                obj.children[1].innerHTML = data.datas['like_count'];

            }

        },

        error : function(e) {

            console.log(e);

        }

    });
	
}
/*
 * 用户收藏窗口
 * add by lizh 14:19 2016/07/21
 */
function member_favorites_window(obj,id){
    var key = getCookie('key');
    if(key == null) {

        layer.tips('请先登录', obj, {
            tips: [1, '#0FA6D8'] //还可配置颜色
        });

        return false;
    }

    document.getElementById("tanchuk").style.display="block";
    document.getElementById("set_personal_id").value=id;	

}

/*
 * 用户收藏
 * add by lizh 14:33 2016/07/21
 */
function member_favorites(obj,id){
	
    personal_id = $('#set_personal_id').val();
    if(personal_id == 0) {

        layer.tips('异常操作', obj, {
            tips: [1, '#0FA6D8'] //还可配置颜色
        });

        return false;

    }
	
    var key = getCookie('key');
    if(key == null) {

        layer.tips('请先登录', obj, {
            tips: [1, '#0FA6D8'] //还可配置颜色
        });

        return false;
    }
	
    $.ajax({

        type : 'GET',
        url : ApiUrl + '/index.php?act=member_favorites_class&op=favorites_add',
        data : {'personal_id':personal_id,'key':key,'favorites_class_id':id},
        dataType : 'json',

        success : function(data) {

            layer.tips(data.datas.message, obj, {
                tips: [1, '#0FA6D8'] //还可配置颜色
            });

        },

        error : function(e) {

            console.log(e);

        }

    });
 
}

/*
 * 跳转新建橱窗
 * add by lizh 14:56 2016/07/21
 */
function create_favorites_class(obj,id){
	
    personal_id = $('#set_personal_id').val();
    if(personal_id == 0) {

        layer.tips('异常操作', obj, {
            tips: [1, '#0FA6D8'] //还可配置颜色
        });

        return false;

    }
	
    var key = getCookie('key');
    if(key == null) {

        layer.tips('请先登录', obj, {
            tips: [1, '#0FA6D8'] //还可配置颜色
        });

        return false;
    }

    window.location.href = WapSiteUrl + '/tmpl/new_showcase.html?personal_id='+personal_id;
 
}

/**
 * 用户取消关注
 */
function member_del_follow(obj,id,state) {
	
    var key = getCookie('key');
    if(key == null) {

        layer.tips('请先登录', obj, {
            tips: [1, '#0FA6D8'] //还可配置颜色
        });
        return;

    }
	
    $.ajax({

        type : 'GET',
        url : ApiUrl + '/index.php?act=sns_friend&op=del_follow',
        data : {'member_id':id,'key':key},
        dataType : 'json',

        success : function(data) {

            if(data.datas.result == 1) {

                layer.tips(data.datas.message, obj, {
                    tips: [1, '#0FA6D8'] //还可配置颜色
                });
                
                 var red_member_friend = $('#red_member_friend_'+id);
                if(typeof(red_member_friend) != "undefined") {
                    
                    red_member_friend.html('关注');
                    red_member_friend.attr('onclick','member_attention(this,'+id+','+state+')');
                    $('#red_count_friend_'+id).html(data.datas.count_friend);
                }
                
                var member_friend = $('.member_friend_'+id);
                if(typeof(member_friend) != "undefined") {
                    
                    $('.member_friend_'+id).each(function(){
                        
                        $(this).html('+关注');
                        $(this).attr('onclick','member_attention(this,'+id+','+state+')');
                        
                    });
                    
                    $('.count_friend_'+id).each(function(){
                        
                        $(this).html('+' + data.datas.count_friend);
                        
                    });
                    
                    $('.count_friend_avatar_'+id).each(function(){
                        
                        var micro_like_data = data.datas.micro_like_data;
                        str = "";
                        if(micro_like_data.length > 0) {
                            
                            for(var i in micro_like_data) {
                            
                                str +=  "<li><img src=" + micro_like_data[i].member_avatar + " alt=''></li>";

                            }
                            
                        }
                        
                        $(this).html(str);
                        //$(this).html('+' + data.datas.count_friend);
                        
                    });
                    
                }

//                if(state == 2) {
//                    
//                    $(obj).html('+关注');
//                    
//                }
//                
//                if(state == 0) {
//                    
//                    $(obj).html('关注');
//                    
//                }
                
                 //$(obj).attr('onclick','member_attention(this,'+id+','+state+')');

            } else {

                layer.tips(data.datas.message, obj, {
                    tips: [1, '#0FA6D8'] //还可配置颜色
                });
            }

//            if(state == 0) {
//
//                $(obj).prev().text(data.datas.count_friend);
//
//            }
//
//            if(state == 2) {
//
//                $(obj).parent().prev().find('u').html('+' + data.datas.count_friend);
//
//            }
        
        },

        error : function(e) {

            console.log(e);

        }

    });
	
}
