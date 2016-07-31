<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Goods'), ['controller' => 'Goods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Good'), ['controller' => 'Goods', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="materials form large-9 medium-8 columns content">
    <?= $this->Form->create($material) ?>
    <fieldset>
        <legend><?= __('Add Material') ?></legend>
        <?php
            echo $this->Form->input('material_name');
            echo $this->Form->input('material_name_en');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
