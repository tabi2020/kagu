<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category Child'), ['action' => 'edit', $categoryChild->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category Child'), ['action' => 'delete', $categoryChild->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoryChild->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Category Children'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category Child'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Goods'), ['controller' => 'Goods', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Good'), ['controller' => 'Goods', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categoryChildren view large-9 medium-8 columns content">
    <h3><?= h($categoryChild->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Category Child Name') ?></th>
            <td><?= h($categoryChild->category_child_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Category Child Name En') ?></th>
            <td><?= h($categoryChild->category_child_name_en) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($categoryChild->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Category Id') ?></th>
            <td><?= $this->Number->format($categoryChild->category_id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Goods') ?></h4>
        <?php if (!empty($categoryChild->goods)): ?>
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
                <th><?= __('Page Url') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Showwebflag') ?></th>
                <th><?= __('Weight') ?></th>
                <th><?= __('Pricetype') ?></th>
                <th><?= __('Price Sale') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($categoryChild->goods as $goods): ?>
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
                <td><?= h($goods->page_url) ?></td>
                <td><?= h($goods->category_id) ?></td>
                <td><?= h($goods->showwebflag) ?></td>
                <td><?= h($goods->weight) ?></td>
                <td><?= h($goods->pricetype) ?></td>
                <td><?= h($goods->price_sale) ?></td>
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
