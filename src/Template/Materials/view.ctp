<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Material'), ['action' => 'edit', $material->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Material'), ['action' => 'delete', $material->id], ['confirm' => __('Are you sure you want to delete # {0}?', $material->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Materials'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Material'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Goods'), ['controller' => 'Goods', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Good'), ['controller' => 'Goods', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="materials view large-9 medium-8 columns content">
    <h3><?= h($material->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Material Name') ?></th>
            <td><?= h($material->material_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Material Name En') ?></th>
            <td><?= h($material->material_name_en) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($material->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Goods') ?></h4>
        <?php if (!empty($material->goods)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Good Name') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Category Child Id') ?></th>
                <th><?= __('Brand Id') ?></th>
                <th><?= __('Material Id') ?></th>
                <th><?= __('Size W') ?></th>
                <th><?= __('Size H') ?></th>
                <th><?= __('Size L') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($material->goods as $goods): ?>
            <tr>
                <td><?= h($goods->id) ?></td>
                <td><?= h($goods->good_name) ?></td>
                <td><?= h($goods->price) ?></td>
                <td><?= h($goods->category_child_id) ?></td>
                <td><?= h($goods->brand_id) ?></td>
                <td><?= h($goods->material_id) ?></td>
                <td><?= h($goods->size_w) ?></td>
                <td><?= h($goods->size_h) ?></td>
                <td><?= h($goods->size_l) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Goods', 'action' => 'view', $goods->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Goods', 'action' => 'edit', $goods->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Goods', 'action' => 'delete', $goods->id], ['confirm' => __('Are you sure you want to delete # {0}?', $goods->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
