<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ListingType $listingType
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Listing Type'), ['action' => 'edit', $listingType->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Listing Type'), ['action' => 'delete', $listingType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $listingType->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Listing Types'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Listing Type'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Item Listings'), ['controller' => 'ItemListings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item Listing'), ['controller' => 'ItemListings', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="listingTypes view large-9 medium-8 columns content">
    <h3><?= h($listingType->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Listing Type') ?></th>
            <td><?= h($listingType->listing_type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($listingType->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($listingType->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Item Listings') ?></h4>
        <?php if (!empty($listingType->item_listings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('City Category Id') ?></th>
                <th scope="col"><?= __('Listing Type Id') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('Display Order') ?></th>
                <th scope="col"><?= __('Last Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($listingType->item_listings as $itemListings): ?>
            <tr>
                <td><?= h($itemListings->id) ?></td>
                <td><?= h($itemListings->city_id) ?></td>
                <td><?= h($itemListings->city_category_id) ?></td>
                <td><?= h($itemListings->listing_type_id) ?></td>
                <td><?= h($itemListings->item_id) ?></td>
                <td><?= h($itemListings->display_order) ?></td>
                <td><?= h($itemListings->last_modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ItemListings', 'action' => 'view', $itemListings->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ItemListings', 'action' => 'edit', $itemListings->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ItemListings', 'action' => 'delete', $itemListings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemListings->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
