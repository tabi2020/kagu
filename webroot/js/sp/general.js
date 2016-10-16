({
	init:function(){
		var _this=this;
		$(function(){
			_this.gShowModal();
		    _this.gShowCategoryList();

		});
	},
	/*-------------------------------------
		ブランドリストのモーダル
	-------------------------------------*/
	gShowModal:function(){
		var _this=this;
		$showModal = $('#headerModar');
		$hideModal = $('#headerModarClose');

		$showModal.on('click',function(){
		     $('#brandList').removeClass('hide');
		     $('#brandList').animate({opacity:1},"slow");
		});

		$hideModal.on('click',function(){
		     $('#brandList').addClass('hide');
		     $('#brandList').animate({opacity:0},"slow");
		});
	},

  gShowCategoryList:function(){
    var $showmore=$('.trigger');
	$showmore.on('click',function(){
      $(this).next('ul').slideDown("fast");
    });
  }


}).init();
