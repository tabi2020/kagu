<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $categoryChild->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $categoryChild->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Category Children'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Goods'), ['controller' => 'Goods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Good'), ['controller' => 'Goods', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categoryChildren form large-9 medium-8 columns content">
    <?= $this->Form->create($categoryChild) ?>
    <fieldset>
        <legend><?= __('Edit Category Child') ?></legend>
        <?php
            echo $this->Form->input('category_id');
            echo $this->Form->input('category_child_name');
            echo $this->Form->input('category_child_name_en');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
