<ul>
<?php foreach ($recode as $item): ?>
  <li><?= $item->good_name ?></li>
<?php endforeach; ?>
</ul>
<div class="paging">
    <?= $this->Paginator->prev('<< ' . __('prev')); ?>
    <?= $this->Paginator->numbers(); ?>
    <?= $this->Paginator->next(__('next') . ' >>'); ?>
</div>
