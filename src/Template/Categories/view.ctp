<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>

<div class="categories view large-9 medium-8 columns content">
    <h3><?= h($category->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Slug') ?></th>
            <td><?= h($category->slug) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($category->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($category->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related City Categories') ?></h4>
        <?php if (!empty($category->city_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Heading') ?></th>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col"><?= __('Short Description') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Display Order') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->city_categories as $cityCategories): ?>
            <tr>
                <td><?= h($cityCategories->id) ?></td>
                <td><?= h($cityCategories->city_id) ?></td>
                <td><?= h($cityCategories->category_id) ?></td>
                <td><?= h($cityCategories->heading) ?></td>
                <td><?= h($cityCategories->image) ?></td>
                <td><?= h($cityCategories->short_description) ?></td>
                <td><?= h($cityCategories->status) ?></td>
                <td><?= h($cityCategories->display_order) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CityCategories', 'action' => 'view', $cityCategories->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'CityCategories', 'action' => 'edit', $cityCategories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CityCategories', 'action' => 'delete', $cityCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cityCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>

    <div class="related">
        <h4><?= __('Related Item Listings') ?></h4>
        <?php if (!empty($category->item_listings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('Listing Type Id') ?></th>
                <th scope="col"><?= __('Item Id') ?></th>
                <th scope="col"><?= __('Display Order') ?></th>
                <th scope="col"><?= __('Last Modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($category->item_listings as $itemListings): ?>
            <tr>
                <td><?= h($itemListings->id) ?></td>
                <td><?= h($itemListings->city_id) ?></td>
                <td><?= h($itemListings->category_id) ?></td>
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
