<head>
    <?= $this->Html->css('sp/top.css') ?>
    <?= $this->Html->css('sp/flickity.min.css') ?>
    <?= $this->Html->script('sp/flickity.pkgd.min.js') ?>
    <?= $this->Html->script('sp/top.js') ?>
</head>
    <section id="topTitle">
        <img src="img/sp/top_ico.png" alt="Welcome" class="topWelcome">
        <h1>ブランド、色、サイズから<br />
            ニトリやIKEAや無印良品の家具を検索できるサイトです
        </h1>
    </section>
    <section id="topItemList">
        <div class="main-gallery">
            <?php foreach ($recode as $item): ?>
                <div class="gallery-cell">
                    <a href="/brand/<?= $item->brands['brand_search'] ?>/<?= $item->id ?>">
                        <div class="img">
                            <img src="/img/goods/<?= $item->id ?>/<?= $item->good_details_files['file_name'] ?>" alt="<?= $item->brands['brand_name'] ?>(<?= $item->brands['brand_name_en'] ?>)の<?= $item->good_name ?>(<?= $item->categories['category_name'] ?>)" >
                        </div>
                        <div class="itemInfo">
                            <p class="itemName"><?= $item->good_name ?></p>
                            <p class="price">¥<?= number_format($item->price) ?><span class="score star<?= round($item->Review['SCORE']) ?>"></span></p>
                        <p class="brandName"><?= $item->brands['brand_name_en'] ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
    
    </section>

    <section id="searchList">
        <div id="searchCategory">
            <img src="/img/sp/category.png" alt="カテゴリから探す" width="24px">
            <p class="title">カテゴリから探す</p>
            <ul class="category">
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

        <div id="searchBrand">
            <img src="/img/sp/brand.png" alt="ブランドから探す" width="20px">
            <p>ブランドから探す</p>
            <div id="brandSelect" class="arrow_r">ブランドを選択</div>
        </div>
    </section>
    <section id="brandList" class="hide">
        <div class="brandSection">
            <div class="mordalTitle">
                <p class="brandTitle">ブランドから探す</p>
                <img src="/img/sp/close.png" alt="閉じる" id="modarClose" class="close">
            </div>
            <ul>
            <?php foreach ($appBrand as $appBrandItem): ?>
                <li class="arrow_r">
                    <a href="/search/brand/<?= $appBrandItem->brand_search ?>"><?= $appBrandItem->brand_name_en ?> (<?= $appBrandItem->brand_name ?>)</a>
                </li>
            <?php endforeach; ?>
            </ul>
        </div>
        <div id="bgBlack">
        </div>
    </section>
