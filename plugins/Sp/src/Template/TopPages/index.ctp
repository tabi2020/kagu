<?php

use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('common.css') ?>
    <?= $this->Html->css('sp/top.css') ?>
    <?= $this->Html->css('sp/flickity.min.css') ?>
    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('sp/flickity.pkgd.min.js') ?>
    <?= $this->Html->script('sp/top.js') ?>
</head>
<body class="home">

    <section id="topTitle">
        <img src="img/sp/top_ico.png" alt="Welcome" class="topWelcome">
        <h1>ブランド、色、サイズそして★レビューから<br />
            ニトリやIKEAや無印良品の家具を検索できるサイトです
        </h1>
    </section>
    <section id="topItemList">
        <div class="main-gallery">
            <?php foreach ($recode as $item): ?>
                <div class="gallery-cell">
                    <a href="/brand/<?= $item->brands['brand_search'] ?>/<?= $item->id ?>">
                        <div class="img">
                            <img src="/img/goods/<?= $item->id ?>/<?= $item->good_details_files['file_name'] ?>" alt="<?= $item->brands['brand_name'] ?>(<?= $item->brands['brand_name_en'] ?>)の<?= $item->good_name ?>(<?= $item->categorys['category_name'] ?>)" >
                        </div>
                        <div class="itemInfo">
                            <p class="score star<?= round($item->Review['SCORE']) ?>"></p>
                            <p class="brandName"><?= $item->brands['brand_name_en'] ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
            <div class="gallery-cell">
                <a href="">
                    <div class="img">
                        <img src="img/goods/1/1.jpg" >
                    </div>
                    <div class="itemInfo">
                        <p class="score">★★</p>
                        <p class="brandName">Journal Standart Funiture</p>
                    </div>
                </a>
            </div>
            <div class="gallery-cell">
                <a href="">
                    <div class="img">
                        <img src="img/goods/1/1.jpg" >
                    </div>
                    <div class="itemInfo">
                        <p class="score">★★</p>
                        <p class="brandName">Journal Standart Funiture</p>
                    </div>
                </a>
            </div>

        </div>
    </section>

    <section id="searchList">
        <div id="searchCategory">
            <img src="/img/sp/category.png" alt="カテゴリから探す" width="24px">
            <p class="title">カテゴリから探す</p>
            <ul class="category">
                <?php foreach ($appCategoryquerys as $appCategory): ?>
                <?php //echo($appCategory); ?>
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
                <img src="/img/sp/close.png" alt="閉じる" id="modarClose">
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

</body>
</html>
