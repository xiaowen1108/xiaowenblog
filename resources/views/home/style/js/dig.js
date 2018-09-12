function dig(refer) {
    var time       = gettime(); //js获取当前时间
    var url        = geturl(); //js获取客户端当前url
    var refer      = refer || getrefer(); //js获取客户端当前页面的上级页面的url
    var user_agent = getuser_agent(); //js获取客户端类型
    var param = {
        time:time,
        url:url,
        refer:refer,
        user_agent
    }
    $.get('http://dig.az1314.cn/dig.gif',param)
}
function gettime(){
    var nowDate = new Date();
    return nowDate.toLocaleString();
}
function geturl(){
    return window.location.href;
}
function getrefer(){
    return document.referrer;
}
function getuser_agent(){
    return navigator.userAgent;
}