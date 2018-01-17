<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemListing $itemListing
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $itemListing->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $itemListing->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Item Listings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List City Categories'), ['controller' => 'CityCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City Category'), ['controller' => 'CityCategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Listing Types'), ['controller' => 'ListingTypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Listing Type'), ['controller' => 'ListingTypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="itemListings form large-9 medium-8 columns content">
    <?= $this->Form->create($itemListing) ?>
    <fieldset>
        <legend><?= __('Edit Item Listing') ?></legend>
        <?php
            echo $this->Form->control('city_id', ['options' => $cities, 'empty' => true]);
            echo $this->Form->control('city_category_id', ['options' => $cityCategories, 'empty' => true]);
            echo $this->Form->control('listing_type_id', ['options' => $listingTypes, 'empty' => true]);
            echo $this->Form->control('item_id', ['options' => $items, 'empty' => true]);
            echo $this->Form->control('display_order');
            echo $this->Form->control('last_modified', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
