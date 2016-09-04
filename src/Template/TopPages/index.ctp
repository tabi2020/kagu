<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
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

$cakeDescription = 'インテリア比較/検索サイト：Mebel(メーベル)';
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
