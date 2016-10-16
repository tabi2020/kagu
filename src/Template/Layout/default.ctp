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
    <?= $this->Html->css('pc/general.css') ?>
    <?= $this->Html->script('jquery.js') ?>
</head>
<body>
    <header>
        <div id="siteTitle">
            <p id="siteLogo">
                <img src="/img/pc/mebel.png" alt="Mebel" height="20px">
            </p>
        </div>
        <section id="headerSerch">
            <ul class="clearfix menu">
                <li>
                    <img src="/img/pc/search_ico.png" alt="検索する" height="20px" id="gSearchIco">
                    検索する
                </li>
                <li class="menu__multi">
                    <a href="#" class="init-bottom">
                        カテゴリ
                        <img src="/img/pc/triangle.png" alt="もっと見る" class="gMore">
                    </a>
                    <ul class="menu__second-level">
                        <?php foreach ($appCategoryquerys as $appCategory): ?>
                            <li>
                                <a href="/search/category/<?=$appCategory->category_search ?>" class="init-right">
                                     <?=$appCategory->category_name ?>
                                </a>
                                <ul class="menu__third-level">
                                    <?php foreach ($appCategory->category_children as $appSubCategory): ?>
                                        <li>
                                            <a href="/search/category/<?=$appCategory->category_search ?>/<?=$appSubCategory->category_child_search ?>" class="init-right">
                                                <?=$appSubCategory->category_child_name ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class="menu__multi">
                    <a href="#" class="init-bottom">
                        ブランド
                        <img src="/img/pc/triangle.png" alt="もっと見る" class="gMore">
                    </a>
                    <ul class="menu__second-level">
                    <?php foreach ($appBrand as $appBrandItem): ?>
                        <li>
                            <a href="/search/brand/<?= $appBrandItem->brand_search ?>" class="init-right"><?= $appBrandItem->brand_name_en ?> (<?= $appBrandItem->brand_name ?>)</a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </li>
                <li class="menu__multi">
                    <a href="#" class="init-bottom">
                        価格
                        <img src="/img/pc/triangle.png" alt="もっと見る" class="gMore">
                        <ul class="menu__second-level">
                        <?php foreach ($appColor as $appColorItem): ?>
                            <li>
                                <a href="/search/?p_prie=4999" class="init-right">5,000円未満の商品</a>
                            </li>
                            <li>
                                <a href="/search/?p_pris=5001&p_prie=10000" class="init-right">5,000~10,000円の商品</a>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </a>
                </li>
                <li class="menu__multi">
                    <a href="#" class="init-bottom">
                        カラー
                        <img src="/img/pc/triangle.png" alt="もっと見る" class="gMore">
                    </a>
                    <ul class="menu__second-level">
                    <?php foreach ($appColor as $appColorItem): ?>
                        <li>
                            <a href="/search/?p_cid=<?= $appColorItem->id ?>" class="init-right"><?= $appColorItem->color_name_en ?> (<?= $appColorItem->color_name ?>)</a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
        </section>

    </header>

    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
        <div id="footer">
            <p id="footerIco">
                <img src="/img/pc/footer_ico.png" alt="mebel" width="40px">
            </p>
        </div>
    </footer>
</body>
</html>
