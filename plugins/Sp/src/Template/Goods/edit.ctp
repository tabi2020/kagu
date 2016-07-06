<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $good->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $good->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Goods'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Category Children'), ['controller' => 'CategoryChildren', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category Child'), ['controller' => 'CategoryChildren', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Brands'), ['controller' => 'Brands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brands', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Goods Details'), ['controller' => 'GoodsDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Goods Detail'), ['controller' => 'GoodsDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="goods form large-9 medium-8 columns content">
    <?= $this->Form->create($good) ?>
    <fieldset>
        <legend><?= __('Edit Good') ?></legend>
        <?php
            echo $this->Form->input('good_name');
            echo $this->Form->input('price');
            echo $this->Form->input('category_child_id', ['options' => $categoryChildren, 'empty' => true]);
            echo $this->Form->input('brand_id', ['options' => $brands, 'empty' => true]);
            echo $this->Form->input('material_id', ['options' => $materials, 'empty' => true]);
            echo $this->Form->input('size_w');
            echo $this->Form->input('size_h');
            echo $this->Form->input('size_l');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
