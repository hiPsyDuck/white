/**
 * @file X.js
 * @author youranreus
 */

//移动端Hover补偿
var mobileHover = function () {
    $('*').on('touchstart', function () {
        $(this).trigger('hover');
    }).on('touchend', function () {
        $(this).trigger('hover');
    });
};

//pjax 刷新
$(document).pjax('a:not(a[target="_blank"], a[no-pjax])', {
		container: '#pjax-container',
		fragment: '#pjax-container',
		timeout: 8000
}).on('pjax:send',function () {pjax_send();}).on('pjax:complete',function() {pjax_complete();}).on('pjax:click',function() {pjax_click();});

function pjax_click(){
	//结束aplayer进程
	if (typeof aplayers !== 'undefined'){
    for (var i = 0; i < aplayers.length; i++) {
        try {aplayers[i].destroy()} catch(e){}
    }
	}
}

function pjax_send(){
	$("#M").addClass("opacity-disappear");
}

function pjax_complete(){
	//Prism重启
	if (typeof Prism !== 'undefined') {
		Prism.highlightAll(true,null);
	}
	//Meting重启
	var isFunction =false;
	try{
  isFunction = typeof(eval('loadMeting'))=="function";
	}catch(e){}
		if(isFunction) {
  	loadMeting();
	}else{}


	//显示主页面
	$("#M").addClass("opacity-show");
	PreFancybox();
	ajaxc();
}

function PreFancybox(){
	$("#post img").each(function(){
				$(this).wrap(function(){
					if($(this).is(".bq"))
					{
						 return '';
					}
					if($(this).is("#feedme-content img"))
					{
						return '';
					}
				return '<a data-fancybox="gallery" no-pjax data-type="image" href="' + $(this).attr("src") + '" class="light-link"></a>';
		 })
	});
}

function show_site_runtime(bdate){
	window.setTimeout("show_site_runtime('" +bdate + "')",1000);
	X=new Date(bdate);
	Y=new Date();
	T=(Y.getTime()-X.getTime());
	i=24*60*60*1000;
	d=T/i;
	D=Math.floor(d);
	h=(d-D)*24;
	H=Math.floor(h);
	m=(h-H)*60;
	M=Math.floor(m);
	s=(m-M)*60
	S=Math.floor(s);
	site_runtime.innerHTML= D + "<span>天</span>" + H + "<span>小时</span>" + M + "<span>分</span>" + S + "<span>秒</span>"
}

//赞赏按钮
function feedme_show(){
	if($("#feedme-content").css("display")=='none'){
		 $("#feedme-content").slideDown();
	}else{
		 $("#feedme-content").slideUp();
	 }
}
//OwO设置
Smilies = {
    dom: function(id) {
        return document.getElementById(id);
    },
    grin: function(tag) {
        tag = ' ' + tag + ' ';
        myField = this.dom("textarea");
        document.selection ? (myField.focus(), sel = document.selection.createRange(), sel.text = tag, myField.focus()) : this.insertTag(tag);
    },
    insertTag: function(tag) {
        myField = Smilies.dom("textarea");
        myField.selectionStart || myField.selectionStart == "0" ? (startPos = myField.selectionStart, endPos = myField.selectionEnd, cursorPos = startPos, myField.value = myField.value.substring(0, startPos) + tag + myField.value.substring(endPos, myField.value.length), cursorPos += tag.length, myField.focus(), myField.selectionStart = cursorPos, myField.selectionEnd = cursorPos) : (myField.value += tag, myField.focus());
    }
}
//OwO开关
function OwO_show(){
	if($("#OwO-container").css("display")=='none'){
		 $("#OwO-container").slideDown();
	}else{
		 $("#OwO-container").slideUp();
	 }
}


function gototop(){

	$('body,html').animate({scrollTop:0},500);
	return false;
}




//ajax评论
function ajaxc(){
		var replyTo = '',   //回复评论时候的ID
		submitButton = $(".submit").eq(0),  //提交评论按钮
		commentForm = $("#comment-form"),   //评论表单
		newCommentId = "";   //新评论的ID
		var bindButton = function () {
			$(".comment-reply a").click(function () {
					replyTo = $(this).parent().parent().parent().attr("id");
			});
			$(".cancel-comment-reply a").click(function () { replyTo = ''; });
	};
		bindButton();

		/**
		 * 发送前的处理
		 */
		function beforeSendComment() {
			NProgress.start();
			$(".submit").fadeOut();
			$("#OwO-container").slideUp();
		}

		/**
		 * 发送后的处理
		 * @param {boolean} ok
		 */
		function afterSendComment(ok) {
				if (ok) {
					$("#textarea").val('');
					replyTo = '';
				}
				bindButton();
		}
		$("#comment-form").submit(function () {
				commentData = $(this).serializeArray();
				// replyAuthor = $("#comment-" + commentData[3]['value']).find(".comment-inner").find(".comment-author").find('span').find('a').html();
				// commentData[1]['value'] = '@' + replyAuthor + ' ' + commentData[1]['value'];
				beforeSendComment();
				$.ajax({
						type: $(this).attr('method'),
						url: $(this).attr('action'),
						data: commentData,
						error: function (e) {
								NProgress.done();
								console.log('Ajax Comment Error');
								window.location.reload();
						},
						success: function (data) {
								if (!$('#comments', data).length) {
										NProgress.done();
										var msg = $('title').eq(0).text().trim().toLowerCase() === 'error' ? $('.container', data).eq(0).text() : '评论提交失败！';
										toastr.warning(msg, 'QAQ', {"iconClass": 'customer-warn'});
										$(".submit").fadeIn();
										afterSendComment(false);
										return false;
								}

								$("input,textarea", commentForm).attr('disabled', false);
								$("#textarea").val('');

								var newComment;
								newCommentId = $(".comment-list", data).html().match(/id=\"?comment-\d+/g).join().match(/\d+/g).sort(function (a, b) { return a - b }).pop();
								if('' === replyTo) {
										if(!$('.comment-list').length) {
												newComment  = $("#li-comment-" + newCommentId, data);
												$('.comments-header').after('<ol class="comment-list"></ol>');
												$('.comment-list').first().prepend((newComment).addClass('animated fadeInUp'));
										}
										else if($('.prev').length) {
												$('#page-nav ul li a').eq(1).click();
										}
										else {
												newComment  = $("#li-comment-" + newCommentId, data);
												$('.comment-list').first().prepend((newComment).addClass('animated fadeInUp'));
										}
										var response = $('#response');
										if (response.length) {
											var responseTop = response.offset().top;
											$('html,body').animate({scrollTop: responseTop - 100},1000);
										}
								}
								else {
										newComment = $("#li-comment-" + newCommentId, data);
										if ($('#' + replyTo).find('.comment-children').length) {
												$('#' + replyTo + ' .comment-children .comment-list').first().prepend((newComment).addClass('animated fadeInUp'));
												TypechoComment.cancelReply();
										}
										else {
												$('#' + replyTo).append('<div class="comment-children"><ol class="comment-list"></ol></div>');
												$('#' + replyTo + ' .comment-children .comment-list').first().prepend((newComment).addClass('animated fadeInUp'));
												TypechoComment.cancelReply();
										}
								}
								NProgress.done(true);
								afterSendComment(true);

						},
						error:function(){
							NProgress.done();
							$(".submit").fadeIn();
						},
						complete:function(){
							NProgress.done();
							$(".submit").fadeIn();
						}
				});
				return false;
		});
}

$(window).scroll(function(){if($(this).scrollTop()>200){$("#m_top").fadeIn(100)}else{$("#m_top").fadeOut(200)}});

console.info(" %c made by psyDuck %c https://psyduck.liujiayang.cn/",'color: #fadfa3; background: #030307; padding:5px 0;', 'color: #fadfa3; background: #fadfa3; padding:5px 0;');