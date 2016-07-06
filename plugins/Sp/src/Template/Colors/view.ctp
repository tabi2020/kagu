<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Color'), ['action' => 'edit', $color->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Color'), ['action' => 'delete', $color->id], ['confirm' => __('Are you sure you want to delete # {0}?', $color->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Colors'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Color'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Goods Details'), ['controller' => 'GoodsDetails', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Goods Detail'), ['controller' => 'GoodsDetails', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="colors view large-9 medium-8 columns content">
    <h3><?= h($color->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Color Name') ?></th>
            <td><?= h($color->color_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Color Name En') ?></th>
            <td><?= h($color->color_name_en) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($color->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Goods Details') ?></h4>
        <?php if (!empty($color->goods_details)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Good Id') ?></th>
                <th><?= __('Color Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($color->goods_details as $goodsDetails): ?>
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
