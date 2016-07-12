<ul>
<?php foreach ($recode as $item): ?>
  <li><?= $item->name ?></li>
<?php endforeach; ?>
</ul>
    <?=$this->Form->create(null,[
        'type' => 'post',
        'url' => ['controller' => 'Search', 'action' => 'test']]
    ) ?>
    <?=$this->Form->text('text1') ?>
    <?=$this->Form->submit('OK') ?>
    <?=$this->Form->end() ?>