<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Color'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Goods Details'), ['controller' => 'GoodsDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Goods Detail'), ['controller' => 'GoodsDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="colors index large-9 medium-8 columns content">
    <h3><?= __('Colors') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('color_name') ?></th>
                <th><?= $this->Paginator->sort('color_name_en') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($colors as $color): ?>
            <tr>
                <td><?= $this->Number->format($color->id) ?></td>
                <td><?= h($color->color_name) ?></td>
                <td><?= h($color->color_name_en) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $color->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $color->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $color->id], ['confirm' => __('Are you sure you want to delete # {0}?', $color->id)]) ?>
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
