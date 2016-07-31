<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Url Mapping'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="urlMapping form large-9 medium-8 columns content">
    <?= $this->Form->create($urlMapping) ?>
    <fieldset>
        <legend><?= __('Add Url Mapping') ?></legend>
        <?php
            echo $this->Form->input('layer_id');
            echo $this->Form->input('name');
            echo $this->Form->input('retrun_id');
            echo $this->Form->input('type_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
