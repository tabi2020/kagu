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
    <?= $this->Html->css('sp/search.css') ?>
    <?= $this->Html->css('sp/general.css') ?>
</head>
<body class="home">
	<div id ="main">
	    <section id="searchTitle">
	    	<h1>
	    		Journal Standard Furnitureの商品
	    	</h1>
	    	<h2>
	    		624<span class="item">items</span>
	    	</h2>
	    </section>
	    <section id="topItemList">
	        <ul>
	            <li>
	                <a href="">
	                    <div class="img">
	                        <img src="/img/goods/1/1.jpg" >
	                    </div>
	                    <div class="itemInfo">
	                        <p class="itemName">ROODEZ SOFA 2P DENIM</p>
	                        <p class="price">¥29,160<span class="score star5"></span></p>
	                        <p class="brandName">Journal Standart Funiture</p>
	                        <p class="category">ソファ / 2人用</p>
	                    </div>
	                </a>
	            </li>
	            <li>
	                <a href="">
	                    <div class="img">
	                        <img src="/img/goods/1/1.jpg" >
	                    </div>
	                    <div class="itemInfo">
	                        <p class="itemName">ROODEZ SOFA 2P DENIM</p>
	                        <p class="price">¥29,160<span class="score star5"></span></p>
	                        <p class="brandName">Journal Standart Funiture</p>
	                        <p class="category">ソファ / 2人用</p>
	                    </div>
	                </a>
	            </li>
	            <li>
	                <a href="">
	                    <div class="img">
	                        <img src="/img/goods/1/1.jpg" >
	                    </div>
	                    <div class="itemInfo">
	                        <p class="itemName">ROODEZ SOFA 2P DENIM</p>
	                        <p class="price">¥29,160<span class="score star5"></span></p>
	                        <p class="brandName">Journal Standart Funiture</p>
	                        <p class="category">ソファ / 2人用</p>
	                    </div>
	                </a>
	            </li>
	            <li>
	                <a href="">
	                    <div class="img">
	                        <img src="/img/goods/1/1.jpg" >
	                    </div>
	                    <div class="itemInfo">
	                        <p class="itemName">ROODEZ SOFA 2P DENIM</p>
	                        <p class="price">¥29,160<span class="score star5"></span></p>
	                        <p class="brandName">Journal Standart Funiture</p>
	                        <p class="category">ソファ / 2人用</p>
	                    </div>
	                </a>
	            </li>
	        </ul>
	    </section>

		<ul id="pankuzu">
		　<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		　　<a href="/" itemprop="url">
		　　　<span itemprop="title"><img src="/img/pc/home_ico.png" alt="home" width="18px"></span>
		　　</a>
		　</li>
		　<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">
		　　<a href="/brand/ikea" itemprop="url">
		　　　<span itemprop="title">ikea</span>
		　　</a>
		　</li>
		　<li>ikeaのソファのアイテム一覧</li>
		</ul>

	</div>
</body>
</html>
