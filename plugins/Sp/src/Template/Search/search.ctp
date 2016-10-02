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
    <?= $this->Html->css('sp/search.css') ?>
    <?= $this->Html->css('sp/general.css') ?>
    <?= $this->Html->script('jquery.js') ?>
    <?= $this->Html->script('sp/imagefit.js') ?>
    <?= $this->Html->script('sp/search.js') ?>

</head>
<body class="home">
	<div id ="main">
	    <section id="searchTitle">
	    	<h1>
	    		<?= $title ?>
	    	</h1>
	    	<h2>
	    		<?php echo($recode->count()); ?><span class="item">items</span>
	    	</h2>
	    </section>
	    <section id="topItemList">
	        <ul id="seachItem">
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
		    <?= $this->Paginator->next("<img src='/img/pc/next.png' alt='戻る'>", array("escape" => false)); ?>
		    <p id="pager_logo"><img src="/img/sp/search_logo.png" alt="mebel"></p>
		    <ul id="numbers">
			    <?= $this->Paginator->numbers(); ?>
			</ul>
	    </section>

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

	</div>
</body>
</html>
