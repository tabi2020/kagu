<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Categorys'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Category Children'), ['controller' => 'CategoryChildren', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category Child'), ['controller' => 'CategoryChildren', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categorys form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <fieldset>
        <legend><?= __('Add Category') ?></legend>
        <?php
            echo $this->Form->input('category_name');
            echo $this->Form->input('category_name_en');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
