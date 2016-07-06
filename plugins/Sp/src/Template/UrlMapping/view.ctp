<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Url Mapping'), ['action' => 'edit', $urlMapping->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Url Mapping'), ['action' => 'delete', $urlMapping->id], ['confirm' => __('Are you sure you want to delete # {0}?', $urlMapping->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Url Mapping'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Url Mapping'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="urlMapping view large-9 medium-8 columns content">
    <h3><?= h($urlMapping->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($urlMapping->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($urlMapping->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Layer Id') ?></th>
            <td><?= $this->Number->format($urlMapping->layer_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Retrun Id') ?></th>
            <td><?= $this->Number->format($urlMapping->retrun_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Type Id') ?></th>
            <td><?= $this->Number->format($urlMapping->type_id) ?></td>
        </tr>
    </table>
</div>
