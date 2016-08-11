<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Goods Review'), ['action' => 'edit', $goodsReview->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Goods Review'), ['action' => 'delete', $goodsReview->id], ['confirm' => __('Are you sure you want to delete # {0}?', $goodsReview->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Goods Reviews'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Goods Review'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Goods'), ['controller' => 'Goods', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Good'), ['controller' => 'Goods', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="goodsReviews view large-9 medium-8 columns content">
    <h3><?= h($goodsReview->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Good') ?></th>
            <td><?= $goodsReview->has('good') ? $this->Html->link($goodsReview->good->id, ['controller' => 'Goods', 'action' => 'view', $goodsReview->good->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Uid') ?></th>
            <td><?= h($goodsReview->uid) ?></td>
        </tr>
        <tr>
            <th><?= __('Ip Address') ?></th>
            <td><?= h($goodsReview->ip_address) ?></td>
        </tr>
        <tr>
            <th><?= __('Text') ?></th>
            <td><?= h($goodsReview->text) ?></td>
        </tr>
        <tr>
            <th><?= __('Img Url') ?></th>
            <td><?= h($goodsReview->img_url) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($goodsReview->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Score') ?></th>
            <td><?= $this->Number->format($goodsReview->score) ?></td>
        </tr>
        <tr>
            <th><?= __('Member Id') ?></th>
            <td><?= $this->Number->format($goodsReview->member_id) ?></td>
        </tr>
    </table>
</div>
