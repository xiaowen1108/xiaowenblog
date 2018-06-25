function buffer(a, b, c) {
	var d;
	return function() {
		if (d) return;
		d = setTimeout(function() {
			a.call(this),
			d = undefined
		},
		b)
	}
} (function() {
	function e() {
		var d = document.body.scrollTop || document.documentElement.scrollTop;
		d > b ? (a.className = "div1 div2", c && (a.style.top = d - b + "px")) : a.className = "div1"
	}
	var a = document.getElementById("float");
	if (a == undefined) return ! 1;
	var b = 0,
	c, d = a;
	while (d) b += d.offsetTop,
	d = d.offsetParent;
	c = window.ActiveXObject && !window.XMLHttpRequest;
	if (!c || !0) window.onscroll = buffer(e, 150, this)
})();

//评论js
jQuery(document).ready(function($) {
	$body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
	$(document).on('click', '#comments-navi a',
	function(e) {
		e.preventDefault();
		$.ajax({
			type: "GET",
			url: $(this).attr('href'),
			beforeSend: function() {
				$('#comments-navi').remove();
				$('.comment-list').remove();
				$('#loading-comments').slideDown()
			},
			dataType: "html",
			success: function(out) {
				result = $(out).find('.comment-list');
				nextlink = $(out).find('#comments-navi');
				$('#loading-comments').slideUp(550);
				$('#loading-comments').after(result.fadeIn(800));
				$('.comment-list').after(nextlink)
			}
		})
	})
});

//文章子目录
$(document).ready(function() {
	$("#show-index").click(function() {
		if ($("#show-index").html() == "[ 隐藏 ]") {
			$("#index-ul").fadeOut("normal");
			$("#show-index").html("[ 展开 ]")
		} else if ($("#show-index").html() == "[ 展开 ]") {
			$("#index-ul").fadeIn("normal");
			$("#show-index").html("[ 隐藏 ]")
		} else {
			return false
		}
	})
});



//菜单特效
jQuery(document).ready(function($) {
	$('#nav li').hover(function() {
		$('.sub-menu', this).slideDown(100)
	},
	function() {
		$('.sub-menu', this).slideUp(100)
	});
});

//返回顶部
jQuery(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 500,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

});


// SearchForm
$(function(){
	$("#mo-so").click(function(){
		$(".mini_search").slideToggle("fast");
	});
})

/*jQuery(document).ready(function(jQuery) {
	jQuery.fn.postLike = function() {
		if (jQuery(this).hasClass('done')) {
			alert("您已经赞过啦:-)");
			return false;
		} else {
			jQuery(this).addClass('done');
			var id = jQuery(this).data("id"),
			action = jQuery(this).data('action'),
			rateHolder = jQuery(this).children('.count');
			var ajax_data = {
				action: "bigfa_like",
				um_id: id,
				um_action: action
			};
			jQuery.post("/wp-admin/admin-ajax.php", ajax_data,
			function(data) {
				jQuery(rateHolder).html(data);
			});
			return false;
		}
	};
	jQuery(document).on("click", ".favorite",
	function() {
		jQuery(this).postLike();
	});
}); */

/*
jQuery(document).on("click", "#fa-loadmore", function($) {
    var _self = jQuery(this),
        _postlistWrap = jQuery('.posts'),
        _button = jQuery('#fa-loadmore'),
        _data = _self.data();
    if (_self.hasClass('is-loading')) {
        return false
    } else {
        _button.html('<i class="icon-spin6 animate-spin"></i> 加载中...');
        _self.addClass('is-loading');
        jQuery.ajax({
            url: "/wp-admin/admin-ajax.php",//注意该文件路径
            data: _data,
            type: 'post',
            dataType: 'json',
            success: function(data) {
                if (data.code == 500) {
                    _button.data("paged", data.next).html('加载更多');
                    alert('服务器正在努力找回自我  o(∩_∩)o')
                } else if (data.code == 200) {
                    _postlistWrap.append(data.postlist);
                    if( jQuery.isFunction(jQuery.fn.lazyload) ){
                        jQuery("img.lazy").lazyload({ effect: "fadeIn",});
                    }
                    if (data.next) {
                        _button.data("paged", data.next).html('加载更多')
                    } else {
                        _button.remove()
                    }
                }
                _self.removeClass('is-loading')
            },
            error:function(data){
                console.log(data.responseText);
                console.log(data);
            }
        })
    }
});*/
