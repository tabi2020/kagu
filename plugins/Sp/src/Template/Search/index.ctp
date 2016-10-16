<head>
    <?= $this->Html->css('sp/search_index.css') ?>
    <?= $this->Html->script('sp/search_index.js') ?>
</head>
	<div id ="main">
		<h1>
			<img src="/img/sp/search_small.png" alt="検索する">
			<span class="title">アイテムを探す</span>
		</h1>
	</div>
	<section id="searchChoice">
		<ul id="searchList">
			<li><a href="#" id="searchBrand"><img src="/img/sp/brand.png" alt="ブランド" class="brandIco">ブランド</a></li>
			<li><a href="#" id="searchCategory"><img src="/img/sp/category.png" alt="カテゴリ" class="categoryIco">カテゴリ</a></li>
			<li><a href="#" id="searchPrice"><img src="/img/sp/money.png" alt="価格" class="moneyIco">価格</a></li>
			<li><a href="#" id="searchColor"><img src="/img/sp/color.png" alt="カラー" class="colorIco">カラー</a></li>
		</ul>
	</section>

	<nav>
		<ul id="pankuzu">
		　<li>
		　　<a href="/">
		　　　<span><img src="/img/pc/home_ico.png" alt="home" class="home"></span>
		　　</a>
		　</li>
		　<li>
			　詳細検索
		　</li>
		</ul>
	</nav>

   <section id="categoryList" class="hide">
        <div class="categorySection">
            <div class="mordalTitle">
                <p class="categoryTitle">カテゴリーから探す</p>
                <img src="/img/sp/close.png" alt="閉じる" id="modarCategoryClose" class="close">
            </div>
            <ul>
                <?php foreach ($appCategoryquerys as $appCategory): ?>
                    <li>
                        <p class="trigger arrow_r">
                         <?=$appCategory->category_name ?>
                        </p>
                        <ul class="subCategory hide">
                            <?php foreach ($appCategory->category_children as $appSubCategory): ?>
                                <li class="arrow_r">
                                    <a href="/search/category/<?=$appCategory->category_search ?>/<?=$appSubCategory->category_child_search ?>">
                                        <?=$appSubCategory->category_child_name ?>
                                    </a>
                                </li>
                            <?php //echo($appSubCategory); ?>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="bgBlack">
        </div>
    </section>


   <section id="brandList" class="hide">
        <div class="brandSection">
            <div class="mordalTitle">
                <p class="brandTitle">ブランドから探す</p>
                <img src="/img/sp/close.png" alt="閉じる" id="modarBrandClose"  class="close">
            </div>
            <ul>
            <?php foreach ($appBrand as $appBrandItem): ?>
                <li class="arrow_r">
                    <a href="/search/brand/<?= $appBrandItem->brand_search ?>"><?= $appBrandItem->brand_name_en ?> (<?= $appBrandItem->brand_name ?>)</a>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
        <div class="bgBlack">
        </div>
    </section>

   <section id="moneyList" class="hide">
        <div class="moneySection">
            <div class="mordalTitle">
                <p class="moneyTitle">価格から探す</p>
                <img src="/img/sp/close.png" alt="閉じる" id="modarMoneyClose" class="close">
            </div>
	        <div class="moneyForm">
	        	<form method="get" action="/search">
	        		<div class="moneyInput">
		        		<input type="number" name="p_pris" class="lowPrice">
		        		<p>〜</p>
						<input type="number" name="p_prie" class="highPrice">
					</div>
					<div class="formBtn">
						<input type="submit" value="検索する" class="blackBtn">
					</div>
	        	</form>
	        </div>
        </div>
        <div class="bgBlack">
        </div>
    </section>

   <section id="colorList" class="hide">
        <div class="colorSection">
            <div class="mordalTitle">
                <p class="brandTitle">カラーから探す</p>
                <img src="/img/sp/close.png" alt="閉じる" id="modarColorClose" class="close">
            </div>
            <ul>
                <?php foreach ($appColor as $appColorItem): ?>
                    <li>
                        <a href="/search/?p_cid=<?= $appColorItem->id ?>" class="init-right"><?= $appColorItem->color_name_en ?> (<?= $appColorItem->color_name ?>)</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="bgBlack">
        </div>
    </section>




