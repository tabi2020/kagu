<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Goods Reviews'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Goods'), ['controller' => 'Goods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Good'), ['controller' => 'Goods', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="goodsReviews form large-9 medium-8 columns content">
    <?= $this->Form->create($goodsReview) ?>
    <fieldset>
        <legend><?= __('Add Goods Review') ?></legend>
        <?php
            echo $this->Form->input('good_id', ['options' => $goods, 'empty' => true]);
            echo $this->Form->input('score');
            echo $this->Form->input('uid');
            echo $this->Form->input('member_id');
            echo $this->Form->input('ip_address');
            echo $this->Form->input('text');
            echo $this->Form->input('img_url');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
