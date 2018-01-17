<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemListing $itemListing
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item Listing'), ['action' => 'edit', $itemListing->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item Listing'), ['action' => 'delete', $itemListing->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemListing->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Item Listings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item Listing'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List City Categories'), ['controller' => 'CityCategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New City Category'), ['controller' => 'CityCategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Listing Types'), ['controller' => 'ListingTypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Listing Type'), ['controller' => 'ListingTypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="itemListings view large-9 medium-8 columns content">
    <h3><?= h($itemListing->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= $itemListing->has('city') ? $this->Html->link($itemListing->city->name, ['controller' => 'Cities', 'action' => 'view', $itemListing->city->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City Category') ?></th>
            <td><?= $itemListing->has('city_category') ? $this->Html->link($itemListing->city_category->id, ['controller' => 'CityCategories', 'action' => 'view', $itemListing->city_category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Listing Type') ?></th>
            <td><?= $itemListing->has('listing_type') ? $this->Html->link($itemListing->listing_type->title, ['controller' => 'ListingTypes', 'action' => 'view', $itemListing->listing_type->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $itemListing->has('item') ? $this->Html->link($itemListing->item->id, ['controller' => 'Items', 'action' => 'view', $itemListing->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($itemListing->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Display Order') ?></th>
            <td><?= $this->Number->format($itemListing->display_order) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Modified') ?></th>
            <td><?= h($itemListing->last_modified) ?></td>
        </tr>
    </table>
</div>
