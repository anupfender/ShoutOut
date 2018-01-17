<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Item Listings'), ['controller' => 'ItemListings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Listing'), ['controller' => 'ItemListings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Item Metas'), ['controller' => 'ItemMetas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Meta'), ['controller' => 'ItemMetas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="items form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Add Item') ?></legend>
        <?php
            echo $this->Form->control('heading');
            echo $this->Form->control('sponsered');
            echo $this->Form->control('poster_image');
            echo $this->Form->control('keywords');
            echo $this->Form->control('location');
            echo $this->Form->control('tab');
            echo $this->Form->control('zip');
            echo $this->Form->control('lat');
            echo $this->Form->control('longt');
            echo $this->Form->control('rating');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
