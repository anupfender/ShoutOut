<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 */
?>

<div class="cities view large-9 medium-8 columns content">
    <h3><?= h($city->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($city->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('State') ?></th>
            <td><?= h($city->state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Full State') ?></th>
            <td><?= h($city->full_state) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($city->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Updated') ?></th>
            <td><?= h($city->updated) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('City Categories') ?></h4>
        <?php if (!empty($city->city_categories)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Heading') ?></th>
                <th scope="col"><?= __('Short Description') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Display Order') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->city_categories as $cityCategories): ?>
            <tr>
                <td><?= h($cityCategories->id) ?></td>
                <td><?= h($cityCategories->heading) ?></td>
                <td>
					<div title="<?= h($cityCategories->short_description) ?>" style="cursor:pointer;color:#1798A5;">View description
					</div>

					</td>
                <td><?= ($cityCategories->status_id)?"Active":"Inactive" ?></td>
                <td><?= h($cityCategories->display_order) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'CityCategories', 'action' => 'view', $cityCategories->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'CityCategories', 'action' => 'delete', $cityCategories->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cityCategories->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Item Listings') ?></h4>
        <?php if (!empty($city->item_listings)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Category') ?></th>
                <th scope="col"><?= __('Listing Type') ?></th>
                <th scope="col"><?= __('Item') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($itemListings as $itemListing): ?>
            <tr>
                <td><?= $this->Number->format($itemListing->id) ?></td>
                <td><?= $itemListing['city_category']->heading ?></td>
                <td><?= $itemListing->listing_type->title ?></td>
                <td><?= $itemListing->item->heading ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $itemListing->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $itemListing->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $itemListing->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemListing->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Sponsers') ?></h4>
        <?php if (!empty($city->sponsers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Bussiness Name') ?></th>
                <th scope="col"><?= __('Logo') ?></th>
                <th scope="col"><?= __('Created Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->sponsers as $sponsers): ?>
            <tr>
                <td><?= h($sponsers->id) ?></td>
                <td><?= h($sponsers->city_id) ?></td>
                <td><?= h($sponsers->user_id) ?></td>
                <td><?= h($sponsers->bussiness_name) ?></td>
                <td><?= h($sponsers->logo) ?></td>
                <td><?= h($sponsers->created_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Sponsers', 'action' => 'view', $sponsers->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Sponsers', 'action' => 'edit', $sponsers->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sponsers', 'action' => 'delete', $sponsers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sponsers->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Users') ?></h4>
        <?php if (!empty($city->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Role Id') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Dob') ?></th>
                <th scope="col"><?= __('Gender Id') ?></th>
                <th scope="col"><?= __('Address1') ?></th>
                <th scope="col"><?= __('Address2') ?></th>
                <th scope="col"><?= __('Zip') ?></th>
                <th scope="col"><?= __('City Id') ?></th>
                <th scope="col"><?= __('User Current Location') ?></th>
                <th scope="col"><?= __('Created Date') ?></th>
                <th scope="col"><?= __('Status Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($city->users as $users): ?>
            <tr>
                <td><?= h($users->id) ?></td>
                <td><?= h($users->role_id) ?></td>
                <td><?= h($users->email) ?></td>
                <td><?= h($users->password) ?></td>
                <td><?= h($users->first_name) ?></td>
                <td><?= h($users->last_name) ?></td>
                <td><?= h($users->dob) ?></td>
                <td><?= h($users->gender_id) ?></td>
                <td><?= h($users->address1) ?></td>
                <td><?= h($users->address2) ?></td>
                <td><?= h($users->zip) ?></td>
                <td><?= h($users->city_id) ?></td>
                <td><?= h($users->user_current_location) ?></td>
                <td><?= h($users->created_date) ?></td>
                <td><?= h($users->status_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $users->id], ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
