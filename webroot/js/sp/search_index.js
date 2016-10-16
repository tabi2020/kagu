({
	init:function(){
		var _this=this;
		$(function(){
			_this.showModal();
		    _this.showCategoryList();

		});
	},
	/*-------------------------------------
		ブランドリストのモーダル
	-------------------------------------*/
	showModal:function(){
		var _this=this;
		$showBrandModal = $('#searchBrand');
		$hideBrandModal = $('#modarBrandClose');

		$showCategoryModal = $('#searchCategory');
		$hideCategoryModal = $('#modarCategoryClose');

		$showPriceModal = $('#searchPrice');
		$hidePriceModal = $('#modarMoneyClose');

		$showColorModal = $('#searchColor');
		$hideColorModal = $('#modarColorClose');

		$showBrandModal.on('click',function(){
		     $('#brandList').removeClass('hide');
		     $('#brandList').animate({opacity:1},"slow");
		});

		$hideBrandModal.on('click',function(){
		     $('#brandList').addClass('hide');
		     $('#brandList').animate({opacity:0},"slow");
		});

		$showCategoryModal.on('click',function(){
		     $('#categoryList').removeClass('hide');
		     $('#categoryList').animate({opacity:1},"slow");
		});

		$hideCategoryModal.on('click',function(){
		     $('#categoryList').addClass('hide');
		     $('#categoryList').animate({opacity:0},"slow");
		});

		$showPriceModal.on('click',function(){
		     $('#moneyList').removeClass('hide');
		     $('#moneyList').animate({opacity:1},"slow");
		});

		$hidePriceModal.on('click',function(){
		     $('#moneyList').addClass('hide');
		     $('#moneyList').animate({opacity:0},"slow");
		});

		$showColorModal.on('click',function(){
		     $('#colorList').removeClass('hide');
		     $('#colorList').animate({opacity:1},"slow");
		});

		$hideColorModal.on('click',function(){
		     $('#colorList').addClass('hide');
		     $('#colorList').animate({opacity:0},"slow");
		});

	},

  showCategoryList:function(){
    var $showmore=$('.trigger');
	$showmore.on('click',function(){
      $(this).next('ul').slideDown("fast");
    });
  }


}).init();
