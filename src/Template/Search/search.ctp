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


if ($SerchTypeID == 1){
	//カテゴリ

}else{
	//ブランド
}

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
    <?= $this->Html->css('common.css') ?>
    <?= $this->Html->css('pc/search.css') ?>
    <?= $this->Html->css('pc/general.css') ?>
</head>
<body class="home">
	<div id ="main">
		<nav>
			<ul id="pankuzu">
			　<li>
			　　<a href="/">
			　　　<span><img src="/img/pc/home_ico.png" alt="home" class="home"></span>
			　　</a>
			　</li>
		      <?php foreach ($search as $key): ?>
		      	<?php $pankuzu = $pankuzu."/".$key->url_name; ?>
				　<li>
				　　<a href="<?= $pankuzu ?>">
				　　　<span><?= $key->name; ?></span>
				　　</a>
				　</li>
		        <?php endforeach; ?>
			　<li>&nbsp;対象商品</li>
			</ul>
		</nav>

s	    <section id="searchTitle">
	    	<h1>
	    		<?= $title ?>
	    	</h1>
	    	<h2>
	    		<?php echo($recode->count()); ?><span class="item">items</span>
	    	</h2>
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
	        </ul>
	    </section>
	    <section id="pager">
		    <?= $this->Paginator->prev("<img src='/img/pc/back.png' alt='戻る'>", array("escape" => false)); ?>
		    <ul id="numbers">
			    <?= $this->Paginator->numbers(); ?>
			</ul>
		    <?= $this->Paginator->next("<img src='/img/pc/next.png' alt='戻る'>", array("escape" => false)); ?>
	    </section>
	</div>
</body>
</html>
