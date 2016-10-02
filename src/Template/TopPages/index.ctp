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

$mebelTitle = 'インテリア比較/検索サイト：Mebel(メーベル)';
$mebelKeywords = 'mebel,メーベル,家具,インテリア,ソファ,テーブル,通販,比較,ニトリ,IKEA,イケア';
$mebelDescription = 'mebelはIKEAやニトリなどブランドの家具を比較できるサイトです。ソファやテーブル、照明器具などのインテリアをサイズやレビューから検索することができます。';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?= $mebelKeywords ?>" />
    <meta name="description" content="<?= $mebelDescription ?>" />
    <title>
        <?= $mebelTitle ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('common.css') ?>
    <?= $this->Html->css('pc/top.css') ?>
</head>
<body class="home">

    <section id="topTitle">
        <img src="img/pc/top_ico.png" alt="Welcome" class="topWelcome">
        <h1>ブランド、色、サイズそして★レビューから<br />
            ニトリやIKEAや無印良品の家具を検索できるサイトです
        </h1>
    </section>

    <section id="topItemList">
        <ul>
            <?php foreach ($recode as $item): ?>
            <li>
                <a href="/brand/<?= $item->brands['brand_search'] ?>/<?= $item->id ?>">
                    <div class="img">
                        <img src="/img/goods/<?= $item->id ?>/<?= $item->good_details_files['file_name'] ?>" alt="<?= $item->brands['brand_name'] ?>(<?= $item->brands['brand_name_en'] ?>)の<?= $item->good_name ?>(<?= $item->categorys['category_name'] ?>)" >
                    </div>
                    <div class="itemInfo">
                        <p class="itemName"><?= $item->good_name ?></p>
                        <p class="price">¥<?= number_format($item->price) ?><span class="score star<?= round($item->Review['SCORE']) ?>"></span></p>
                        <p class="brandName"><?= $item->brands['brand_name_en'] ?></p>
                        <p class="category"><?= $item->categorys['category_name'] ?> / <?= $item->category_children['category_child_name'] ?></p>
                    </div>
                </a>
            </li>
            <?php endforeach; ?>


            <li>
                <a href="">
                    <div class="img">
                        <img src="img/goods/1/1.jpg" >
                    </div>
                    <div class="itemInfo">
                        <p class="score">★★</p>
                        <p class="brandName">Journal Standart Funiture</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="">
                    <div class="img">
                        <img src="img/goods/1/1.jpg" >
                    </div>
                    <div class="itemInfo">
                        <p class="score">★★</p>
                        <p class="brandName">Journal Standart Funiture</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="">
                    <div class="img">
                        <img src="img/goods/1/1.jpg" >
                    </div>
                    <div class="itemInfo">
                        <p class="score">★★</p>
                        <p class="brandName">Journal Standart Funiture</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="">
                    <div class="img">
                        <img src="img/goods/1/1.jpg" >
                    </div>
                    <div class="itemInfo">
                        <p class="score">★★</p>
                        <p class="brandName">Journal Standart Funiture</p>
                    </div>
                </a>
            </li>
        </ul>
    </section>

</body>
</html>
