<head>
    <?= $this->Html->css('pc/good.css') ?>
    <?= $this->Html->script('pc/good.js') ?>
</head>
	<div id ="main">
		<nav>
			<ul id="pankuzu">
			　<li>
			　　<a href="/">
			　　　<span><img src="/img/pc/home_ico.png" alt="home" class="home"></span>
			　　</a>
			　</li>
			　<li>
			　　<a href="/search/brand/<?= $recode->brands['brand_search']; ?>">
				　<?= $recode->brands['brand_name']; ?>(<?= $recode->brands['brand_name_en']; ?>)の対象商品
			　　</a>
			　</li>
			　<li>
					<?= $recode->good_name; ?>
			　</li>
			</ul>
		</nav>

		<section class="leftColumn">

		 	<ul class="mainImage">
			  <?php $i=0; ?>
			  <?php foreach ($recodeDetails as $itemDetail): ?>
				  <?php $i++; ?>
				  <?php foreach ($itemDetail -> good_details_files as $fileInfo): ?>
				        <li class="item<?= $i; ?>">
				        	<img src="/img/goods/<?= $goodsID; ?>/<?= $fileInfo->file_name; ?>" alt="<?= $recode->good_name; ?>">
				        </li>
		          <?php endforeach; ?>
	          <?php endforeach; ?>
	      	</ul>

		 	<ul class="thumb">
			  <?php $i=0; ?>
			  <?php foreach ($recodeDetails as $itemDetail): ?>
				  <?php $i++; ?>
				  <?php foreach ($itemDetail -> good_details_files as $fileInfo): ?>
				        <li class="thumb<?= $i; ?>">
				        	<img src="/img/goods/<?= $goodsID; ?>/<?= $fileInfo->file_name; ?>" alt="<?= $recode->good_name; ?>">
				        </li>
		          <?php endforeach; ?>
	          <?php endforeach; ?>
	      	</ul>

		</section>
		<section class="rightColumn itemInfo">
			<div class="review">
				<span class="score star<?= round($recode->Review['SCORE']) ?>"></span>
			</div>
			<p class="goodName">
				<?= $recode->good_name; ?>
			</p>
			<p class="goodPrice">
				¥<?= number_format($recode->price); ?>	
			</p>
			<table id="detailInfo">
				<tr>
					<td class="title">カテゴリ</td>
					<td class="content"><?= $recode->categories['category_name']; ?> / <?= $recode->category_children['category_child_name']; ?></td>
				</tr>
				<tr>
					<td class="title">サイズ</td>
					<td class="content">W:<?= $recode->size_w; ?> / D: <?= $recode->size_l; ?> / H: <?= $recode->size_h; ?></td>
				</tr>
				<tr>
					<td class="title">カラー</td>
					<td class="content">
					  <?php foreach ($recodeDetails as $itemDetail): ?>
						  <?php foreach ($itemDetail->colors as $colorInfo): ?>
						  	<?= $colorInfo->color_name; ?>
				          <?php endforeach; ?>
			          <?php endforeach; ?>
					</td>
				</tr>
				<tr>
					<td class="title">ブランド</td>
					<td class="content"><?= $recode->brands['brand_name']; ?>(<?= $recode->brands['brand_name_en']; ?>)</td>
				</tr>
			</table>
			<p class="otherLink"><a href="<?= $recode->page_url; ?>" class="blackBtn">公式サイトへ</a></p>
		</section>

    </div>




