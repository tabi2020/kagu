<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Url Mapping'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="urlMapping index large-9 medium-8 columns content">
    <h3><?= __('Url Mapping') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('layer_id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('retrun_id') ?></th>
                <th><?= $this->Paginator->sort('type_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($urlMapping as $urlMapping): ?>
            <tr>
                <td><?= $this->Number->format($urlMapping->id) ?></td>
                <td><?= $this->Number->format($urlMapping->layer_id) ?></td>
                <td><?= h($urlMapping->name) ?></td>
                <td><?= $this->Number->format($urlMapping->retrun_id) ?></td>
                <td><?= $this->Number->format($urlMapping->type_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $urlMapping->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $urlMapping->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $urlMapping->id], ['confirm' => __('Are you sure you want to delete # {0}?', $urlMapping->id)]) ?>
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
