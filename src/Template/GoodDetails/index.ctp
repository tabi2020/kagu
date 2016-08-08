<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Good Detail'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Goods'), ['controller' => 'Goods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Good'), ['controller' => 'Goods', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Colors'), ['controller' => 'Colors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Color'), ['controller' => 'Colors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="goodDetails index large-9 medium-8 columns content">
    <h3><?= __('Good Details') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('goods_id') ?></th>
                <th><?= $this->Paginator->sort('color_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($goodDetails as $goodDetail): ?>
            <tr>
                <td><?= $this->Number->format($goodDetail->id) ?></td>
                <td><?= $goodDetail->has('good') ? $this->Html->link($goodDetail->good->good_name, ['controller' => 'Goods', 'action' => 'view', $goodDetail->good->id]) : '' ?></td>
                <td><?= $goodDetail->has('color') ? $this->Html->link($goodDetail->color->id, ['controller' => 'Colors', 'action' => 'view', $goodDetail->color->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $goodDetail->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $goodDetail->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $goodDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $goodDetail->id)]) ?>
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
