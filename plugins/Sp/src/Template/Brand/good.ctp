<head>
    <?= $this->Html->css('sp/good.css') ?>
    <?= $this->Html->css('sp/flickity.min.css') ?>
    <?= $this->Html->script('sp/flickity.pkgd.min.js') ?>
    <?= $this->Html->script('sp/top.js') ?>
</head>
	<div id ="main">
		<section class="imageList">
	        <div class="main-gallery">
			  <?php foreach ($recodeDetails as $itemDetail): ?>
				  <?php foreach ($itemDetail -> good_details_files as $fileInfo): ?>
	                <div class="gallery-cell">
					  	<img src="/img/goods/<?= $goodsID; ?>/<?= $fileInfo->file_name; ?>" alt="<?= $recode->good_name; ?>">
					</div>
		          <?php endforeach; ?>
	          <?php endforeach; ?>
	        </div>
		</section>
		<section class="itemInfo">
			<p class="goodName">
				<?= $recode->good_name; ?>
			</p>
			<p class="goodPrice">
				¥<?= number_format($recode->price); ?>
				<span class="score star<?= round($recode->Review['SCORE']) ?>"></span>
			</p>
			<p class="otherLink"><a href="<?= $recode->page_url; ?>" class="blackBtn">公式サイトへ</a></p>
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
		</section>
		<!--
		<section class="reviewInfo">
			<p class="reviewRegist"><a href="#" class="blackBtn">レビューを投稿する</a></p>
		</section>
		-->
    </div>

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
