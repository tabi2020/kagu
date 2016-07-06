<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $goodsDetail->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $goodsDetail->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Goods Details'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Goods'), ['controller' => 'Goods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Good'), ['controller' => 'Goods', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Colors'), ['controller' => 'Colors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Color'), ['controller' => 'Colors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="goodsDetails form large-9 medium-8 columns content">
    <?= $this->Form->create($goodsDetail) ?>
    <fieldset>
        <legend><?= __('Edit Goods Detail') ?></legend>
        <?php
            echo $this->Form->input('good_id', ['options' => $goods, 'empty' => true]);
            echo $this->Form->input('color_id', ['options' => $colors, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
