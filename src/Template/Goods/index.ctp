<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Good'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Category Children'), ['controller' => 'CategoryChildren', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category Child'), ['controller' => 'CategoryChildren', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Brands'), ['controller' => 'Brands', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brands', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Goods Details'), ['controller' => 'GoodsDetails', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Goods Detail'), ['controller' => 'GoodsDetails', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="goods index large-9 medium-8 columns content">
    <h3><?= __('Goods') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('good_name') ?></th>
                <th><?= $this->Paginator->sort('price') ?></th>
                <th><?= $this->Paginator->sort('category_child_id') ?></th>
                <th><?= $this->Paginator->sort('brand_id') ?></th>
                <th><?= $this->Paginator->sort('material_id') ?></th>
                <th><?= $this->Paginator->sort('size_w') ?></th>
                <th><?= $this->Paginator->sort('size_h') ?></th>
                <th><?= $this->Paginator->sort('size_l') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($goods as $good): ?>
            <tr>
                <td><?= $this->Number->format($good->id) ?></td>
                <td><?= h($good->good_name) ?></td>
                <td><?= $this->Number->format($good->price) ?></td>
                <td><?= $good->has('category_child') ? $this->Html->link($good->category_child->id, ['controller' => 'CategoryChildren', 'action' => 'view', $good->category_child->id]) : '' ?></td>
                <td><?= $good->has('brand') ? $this->Html->link($good->brand->id, ['controller' => 'Brands', 'action' => 'view', $good->brand->id]) : '' ?></td>
                <td><?= $good->has('material') ? $this->Html->link($good->material->id, ['controller' => 'Materials', 'action' => 'view', $good->material->id]) : '' ?></td>
                <td><?= $this->Number->format($good->size_w) ?></td>
                <td><?= $this->Number->format($good->size_h) ?></td>
                <td><?= $this->Number->format($good->size_l) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $good->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $good->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $good->id], ['confirm' => __('Are you sure you want to delete # {0}?', $good->id)]) ?>
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
