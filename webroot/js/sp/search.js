
({
	init:function(){
	  $('#seachItem li .img').imagefit({
	    mode: 'outside',   //トリミング or 縮小して画像全表示
	    force : 'false',   //画像指定サイズより小さい時にどうするか…
	    halign : 'center', //左寄せ or 中央 or 右寄せ
	    valign : 'middle'  //上寄せ or 中央 or 下寄席
	  });
  }
}).init();
