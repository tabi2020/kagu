<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categorys'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Category Children'), ['controller' => 'CategoryChildren', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category Child'), ['controller' => 'CategoryChildren', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categorys view large-9 medium-8 columns content">
    <h3><?= h($category->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Category Name') ?></th>
            <td><?= h($category->category_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Category Name En') ?></th>
            <td><?= h($category->category_name_en) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Category Children') ?></h4>
        <?php if (!empty($category->category_children)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Category Id') ?></th>
                <th><?= __('Category Child Name') ?></th>
                <th><?= __('Category Child Name En') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->category_children as $categoryChildren): ?>
            <tr>
                <td><?= h($categoryChildren->id) ?></td>
                <td><?= h($categoryChildren->category_id) ?></td>
                <td><?= h($categoryChildren->category_child_name) ?></td>
                <td><?= h($categoryChildren->category_child_name_en) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CategoryChildren', 'action' => 'view', $categoryChildren->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CategoryChildren', 'action' => 'edit', $categoryChildren->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CategoryChildren', 'action' => 'delete', $categoryChildren->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoryChildren->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
