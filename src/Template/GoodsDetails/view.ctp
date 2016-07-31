<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Goods Detail'), ['action' => 'edit', $goodsDetail->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Goods Detail'), ['action' => 'delete', $goodsDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $goodsDetail->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Goods Details'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Goods Detail'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Goods'), ['controller' => 'Goods', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Good'), ['controller' => 'Goods', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Colors'), ['controller' => 'Colors', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Color'), ['controller' => 'Colors', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="goodsDetails view large-9 medium-8 columns content">
    <h3><?= h($goodsDetail->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Good') ?></th>
            <td><?= $goodsDetail->has('good') ? $this->Html->link($goodsDetail->good->id, ['controller' => 'Goods', 'action' => 'view', $goodsDetail->good->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Color') ?></th>
            <td><?= $goodsDetail->has('color') ? $this->Html->link($goodsDetail->color->id, ['controller' => 'Colors', 'action' => 'view', $goodsDetail->color->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($goodsDetail->id) ?></td>
        </tr>
    </table>
</div>
