;(function($){
	$.fn.extend({
		lightbox:function(){
			this.on('click',function(){
				// $img = $('<img class="lightbox-img"/>');
				// $img.attr('src',$(this).data('src'));
				// $img.on('load'function(){

				// })；

				var oImg = new Image();
				oImg.className = 'lightbox-img';
				oImg.onload = function(){
					this.style.left = ($(window).width()-this.width)/2+'px';
					this.style.top = ($(window).height()-this.height)/2+'px';

				};
				oImg.src = this.getAttribute('data-src');
				document.body.appendChild(oImg);

			});
		}
	});
})(jQuery);