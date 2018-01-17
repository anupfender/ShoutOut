<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('Home'), ['controller' => 'cities', 'action' => 'view',  $this->request->Session()->read('Config.city_id')]) ?></li>
<li style="padding:0.4375rem 0.875rem"><?= __('Categories') ?></li>
<ul style="padding-left: 15px;">
<?php
foreach($navCityCategory as $k=>$v): ?>
	<li><?= $this->Html->link(__($v['category']['name']), ['controller' => 'cityCategories', 'action' => 'listing', $v['id']]) ?></li>
<?php
endforeach;
?>
	<li><?= $this->Html->link(__('+ New Category'), ['controller' => 'cityCategories', 'action' => 'add']) ?></li>
</ul>
<li><?= $this->Html->link(__('Users'), ['controller' => 'users', 'action' => 'index']) ?></li>
