<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Good'), ['action' => 'edit', $good->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Good'), ['action' => 'delete', $good->id], ['confirm' => __('Are you sure you want to delete # {0}?', $good->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Goods'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Good'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Category Children'), ['controller' => 'CategoryChildren', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category Child'), ['controller' => 'CategoryChildren', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Brands'), ['controller' => 'Brands', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Brand'), ['controller' => 'Brands', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['controller' => 'Materials', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['controller' => 'Materials', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Goods Details'), ['controller' => 'GoodsDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Goods Detail'), ['controller' => 'GoodsDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="goods view large-9 medium-8 columns content">
    <h3><?= h($good->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Good Name') ?></th>
            <td><?= h($good->good_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Category Child') ?></th>
            <td><?= $good->has('category_child') ? $this->Html->link($good->category_child->id, ['controller' => 'CategoryChildren', 'action' => 'view', $good->category_child->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Brand') ?></th>
            <td><?= $good->has('brand') ? $this->Html->link($good->brand->id, ['controller' => 'Brands', 'action' => 'view', $good->brand->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Material') ?></th>
            <td><?= $good->has('material') ? $this->Html->link($good->material->id, ['controller' => 'Materials', 'action' => 'view', $good->material->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($good->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Price') ?></th>
            <td><?= $this->Number->format($good->price) ?></td>
        </tr>
        <tr>
            <th><?= __('Size W') ?></th>
            <td><?= $this->Number->format($good->size_w) ?></td>
        </tr>
        <tr>
            <th><?= __('Size H') ?></th>
            <td><?= $this->Number->format($good->size_h) ?></td>
        </tr>
        <tr>
            <th><?= __('Size L') ?></th>
            <td><?= $this->Number->format($good->size_l) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Goods Details') ?></h4>
        <?php if (!empty($good->goods_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Good Id') ?></th>
                <th><?= __('Color Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($good->goods_details as $goodsDetails): ?>
            <tr>
                <td><?= h($goodsDetails->id) ?></td>
                <td><?= h($goodsDetails->good_id) ?></td>
                <td><?= h($goodsDetails->color_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'GoodsDetails', 'action' => 'view', $goodsDetails->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'GoodsDetails', 'action' => 'edit', $goodsDetails->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'GoodsDetails', 'action' => 'delete', $goodsDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $goodsDetails->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
