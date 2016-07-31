<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Colors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Goods Details'), ['controller' => 'GoodsDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Goods Detail'), ['controller' => 'GoodsDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="colors form large-9 medium-8 columns content">
    <?= $this->Form->create($color) ?>
    <fieldset>
        <legend><?= __('Add Color') ?></legend>
        <?php
            echo $this->Form->input('color_name');
            echo $this->Form->input('color_name_en');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
