<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Goods Review'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Goods'), ['controller' => 'Goods', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Good'), ['controller' => 'Goods', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="goodsReviews index large-9 medium-8 columns content">
    <h3><?= __('Goods Reviews') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('good_id') ?></th>
                <th><?= $this->Paginator->sort('score') ?></th>
                <th><?= $this->Paginator->sort('uid') ?></th>
                <th><?= $this->Paginator->sort('member_id') ?></th>
                <th><?= $this->Paginator->sort('ip_address') ?></th>
                <th><?= $this->Paginator->sort('text') ?></th>
                <th><?= $this->Paginator->sort('img_url') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($goodsReviews as $goodsReview): ?>
            <tr>
                <td><?= $this->Number->format($goodsReview->id) ?></td>
                <td><?= $goodsReview->has('good') ? $this->Html->link($goodsReview->good->id, ['controller' => 'Goods', 'action' => 'view', $goodsReview->good->id]) : '' ?></td>
                <td><?= $this->Number->format($goodsReview->score) ?></td>
                <td><?= h($goodsReview->uid) ?></td>
                <td><?= $this->Number->format($goodsReview->member_id) ?></td>
                <td><?= h($goodsReview->ip_address) ?></td>
                <td><?= h($goodsReview->text) ?></td>
                <td><?= h($goodsReview->img_url) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $goodsReview->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $goodsReview->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $goodsReview->id], ['confirm' => __('Are you sure you want to delete # {0}?', $goodsReview->id)]) ?>
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
