<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Good Detail'), ['action' => 'edit', $goodDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Good Detail'), ['action' => 'delete', $goodDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $goodDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Good Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Good Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Goods'), ['controller' => 'Goods', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Good'), ['controller' => 'Goods', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Colors'), ['controller' => 'Colors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Color'), ['controller' => 'Colors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="goodDetails view large-9 medium-8 columns content">
    <h3><?= h($goodDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Good') ?></th>
            <td><?= $goodDetail->has('good') ? $this->Html->link($goodDetail->good->good_name, ['controller' => 'Goods', 'action' => 'view', $goodDetail->good->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Color') ?></th>
            <td><?= $goodDetail->has('color') ? $this->Html->link($goodDetail->color->id, ['controller' => 'Colors', 'action' => 'view', $goodDetail->color->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($goodDetail->id) ?></td>
        </tr>
    </table>
</div>
