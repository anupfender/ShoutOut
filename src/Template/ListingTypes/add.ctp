<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ListingType $listingType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Listing Types'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Item Listings'), ['controller' => 'ItemListings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Listing'), ['controller' => 'ItemListings', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="listingTypes form large-9 medium-8 columns content">
    <?= $this->Form->create($listingType) ?>
    <fieldset>
        <legend><?= __('Add Listing Type') ?></legend>
        <?php
            echo $this->Form->control('listing_type');
            echo $this->Form->control('title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
