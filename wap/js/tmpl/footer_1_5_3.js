$(function () {
    var a = getCookie("key");
    var e = '<div class="nctouch-footer-wrap posr">';


    e += '<div class="footer">'
        + '<ul>'
        + '<a href="' + WapSiteUrl + '/index.html">'
        + '<li>'
        + '<dl class="footer-one">'
        + '<dt><i><img src="/wap/img/home1.png" alt=""/></i></dt>'
        + '<dd>首页</dd>'
        + '</dl>'
        + '</li>'
        + '</a>'
        + '<a href="' + WapSiteUrl + '/tmpl/window_shopping.html">'
        + '<li>'
        + '<dl class="footer-two">'
        + '<dt><i><img src="/wap/img/diqiu1.png" alt=""/></i></dt>'
        + '<dd>发现</dd>'
        + '</dl>'
        + '</li>'
        + '</a>'
        + '<a href="' + WapSiteUrl + '/tmpl/cart_list.html">'
        + '<li>'
        + '<dl class="footer-for">'
        + '<dt><i><img src="/wap/img/hand1.png" alt=""/></i></dt>'
        + '<dd>购物袋</dd>'
        + '</dl>'
        + '</li>'
        + '</a>'
        + '<a href="' + WapSiteUrl + '/tmpl/member/member.html">'
        + '<li>'
        + '<dl class="footer-fir">'
        + '<dt><i><img src="/wap/img/pepol1.png" alt=""/></i></dt>'
        + '<dd>我的</dd>'
        + '</dl>'
        + '</li>'
        + '</a>'
        + '</ul>'
        + '<div style="clear: both;"></div>'
        + '</div>'


    $("#footer").html(e);
    var urlstr = window.location.pathname;
    if (urlstr.indexOf("index.html") >= 0 || urlstr == "/wap/" || urlstr.indexOf("find_1.html") >= 0) {
        $(".footer-one dt i img").attr("src","/wap/img/home2.png");
    } else if (urlstr.indexOf("find.html") >= 0 || urlstr.indexOf("window_shopping.html") >= 0 || urlstr.indexOf("window_shopping_cat.html") >= 0
        || urlstr.indexOf("shopping.html") >= 0) {
        $(".footer-two dt i img").attr("src","/wap/img/diqiu2.png");
    } else if (urlstr.indexOf("happy_send.html") >= 0 || urlstr.indexOf("art_make.html") >= 0) {
        $(".footer-thr dt i img").attr("src","/wap/img/wan2.png");
    } else if (urlstr.indexOf("cart_list.html") >= 0 || urlstr.indexOf("art_life.html") >= 0 || urlstr.indexOf("by_ingenuity.html") >= 0) {
        $(".footer-for dt i img").attr("src","/wap/img/hand2.png");
    } else if (urlstr.indexOf("/member/") >= 0) {
        $(".footer-fir dt i img").attr("src","/wap/img/pepol2.png");
    }


    var a = getCookie("key");
    $("#logoutbtn").click(function () {
        var a = getCookie("username");
        var e = getCookie("key");
        var i = "wap";
        $.ajax({
            type: "get",
            url: ApiUrl + "/index.php?act=logout",
            data: {username: a, key: e, client: i},
            success: function (a) {
                if (a) {
                    delCookie("username");
                    delCookie("key");
                    location.href = WapSiteUrl
                }
            }
        })
    })
});
