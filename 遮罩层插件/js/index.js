requirejs.config({
	shim:{
		'jquery.lightbox':['jquery']
	}
});
require(['jquery','jquery.lightbox'],function($){
	var $nav=$('#nav'),
	$navIcon = $('.nav-icon',$nav),
	$navCloseIcon = $('.nav-close-icon'),
	$navMenuBox = $('.nav-menu-box',$nav);
	$navIcon.on('click',function(){
		$navMenuBox.animate({top:0});
	});
	$navCloseIcon.on('click',function(){
		$navMenuBox.animate({top:-192});
	});
	// protfolio
	$('#protfolio li').hover(function(){
		$(this).children('img').stop().animate({
			width:305,
			height:200,
			marginLeft:-10,
			marginTop:-7
		});
		$(this).children('.mask').stop().show().animate({
			opacity:0.84
		});
	},function(){
		$(this).children('img').stop().animate({
			width:285,
			height:180,
			marginLeft:0,
			marginTop:0
		});
		$(this).children('.mask').stop().animate({
			opacity:0
		},300,function(){
			$(this).hide();
		}).lightbox();
		
	});
});
