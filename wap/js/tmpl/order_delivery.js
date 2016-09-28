$(function() {
    var e = getCookie("key");
    if (!e) {
        window.location.href = WapSiteUrl + "/tmpl/member/login.html";
        return
    }
    var r = getQueryString("order_id");
    $.ajax({
        type: "get",
        url: ApiUrl + "/index.php?act=member_order&op=get_express",
        data: {
            key: e,
            order_id: r
        },
        dataType: "json",
        success: function(e) {
        	console.log(e);
            checkLogin(e.login);
            var r = e && e.datas;
            if (!r) {
                r = {};
                r.err = "暂无物流信息"
            }
            var t = template.render("order-delivery-tmpl", r);
            $("#order-delivery").html(t)
        }
    })
});

