$(function() {
	$('.main-gallery').flickity({
	  // options
	  cellAlign: 'center',
	  wrapAround: true,
	  imagesLoaded: true
	});

});

({
	init:function(){
		var _this=this;
		$(function(){
			_this.showModal();
		});
	},
	/*-------------------------------------
		ブランドリストのモーダル
	-------------------------------------*/
	showModal:function(){
		var _this=this;
		$showModal = $('#brandSelect');
		$hideModal = $('#modarClose');

		$showModal.on('click',function(){
		     $('#brandList').removeClass('hide');
		     $('#brandList').animate({opacity:1},"slow");
		});

		$hideModal.on('click',function(){
		     $('#brandList').addClass('hide');
		     $('#brandList').animate({opacity:0},"slow");
		});

	}
}).init();

