<head>
    <?= $this->Html->css('pc/top.css') ?>
</head>

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
        </ul>
    </section>

