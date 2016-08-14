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
            家具を検索できるサイトです
        </h1>
    </section>

    <section id="topItemList">
        <div class="main-gallery">
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
        <div id="searchBrand">
            <p>ブランドから検索</p>
            <div id="brandSelect">ブランドを選択</div>
        </div>

        <div id="searchCategory">
            <p>カテゴリから検索</p>
        </div>

    </section>
</body>
</html>
