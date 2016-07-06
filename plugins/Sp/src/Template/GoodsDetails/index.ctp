<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Goods Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Goods'), ['controller' => 'Goods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Good'), ['controller' => 'Goods', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Colors'), ['controller' => 'Colors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Color'), ['controller' => 'Colors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="goodsDetails index large-9 medium-8 columns content">
    <h3><?= __('Goods Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('good_id') ?></th>
                <th><?= $this->Paginator->sort('color_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($goodsDetails as $goodsDetail): ?>
            <tr>
                <td><?= $this->Number->format($goodsDetail->id) ?></td>
                <td><?= $goodsDetail->has('good') ? $this->Html->link($goodsDetail->good->id, ['controller' => 'Goods', 'action' => 'view', $goodsDetail->good->id]) : '' ?></td>
                <td><?= $goodsDetail->has('color') ? $this->Html->link($goodsDetail->color->id, ['controller' => 'Colors', 'action' => 'view', $goodsDetail->color->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $goodsDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $goodsDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $goodsDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $goodsDetail->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
