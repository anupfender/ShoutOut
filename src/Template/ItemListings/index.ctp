<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemListing[]|\Cake\Collection\CollectionInterface $itemListings
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Item Listing'), ['action' => 'add']) ?></li>
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
<div class="itemListings index large-9 medium-8 columns content">
    <h3><?= __('Item Listings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city_category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('listing_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('display_order') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($itemListings as $itemListing): ?>
            <tr>
                <td><?= $this->Number->format($itemListing->id) ?></td>
                <td><?= $itemListing->has('city') ? $this->Html->link($itemListing->city->name, ['controller' => 'Cities', 'action' => 'view', $itemListing->city->id]) : '' ?></td>
                <td><?= $itemListing->has('city_category') ? $this->Html->link($itemListing->city_category->id, ['controller' => 'CityCategories', 'action' => 'view', $itemListing->city_category->id]) : '' ?></td>
                <td><?= $itemListing->has('listing_type') ? $this->Html->link($itemListing->listing_type->title, ['controller' => 'ListingTypes', 'action' => 'view', $itemListing->listing_type->id]) : '' ?></td>
                <td><?= $itemListing->has('item') ? $this->Html->link($itemListing->item->id, ['controller' => 'Items', 'action' => 'view', $itemListing->item->id]) : '' ?></td>
                <td><?= $this->Number->format($itemListing->display_order) ?></td>
                <td><?= h($itemListing->last_modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $itemListing->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $itemListing->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $itemListing->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemListing->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
