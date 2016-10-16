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
    <?= $this->Html->css('sp/general.css') ?>
    <?= $this->Html->script('jquery.js') ?>

</head>
<body>
    <header>
        <div id="gHeaderFixed">
            <p id="gHeaderIco">
                <img src="/img/sp/logo_ico.png" class="logImg" alt="Mebel(メーベル)">
            </p>
            <p id="gHeaderSerach">
                <a href="/search">
                    <img src="/img/sp/search_ico.png" class="searchIco" alt="検索する">
                </a>
            </p>
        </div>

    </header>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
        <div id="footer">
            <p id="footerIco">
                <img src="/img/sp/footer_ico.png" alt="mebel" width="40px">
            </p>
        </div>
    </footer>
</body>
</html>
