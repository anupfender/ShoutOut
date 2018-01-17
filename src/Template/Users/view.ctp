<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="users view large-9 medium-8 columns content">
    <h3>ID# <?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= h($user->role->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('First Name') ?></th>
            <td><?= h($user->first_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Last Name') ?></th>
            <td><?= h($user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Gender') ?></th>
            <td><?= h($user->gender->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address1') ?></th>
            <td><?= h($user->address1) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Address2') ?></th>
            <td><?= h($user->address2) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Zip') ?></th>
            <td><?= h($user->zip) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($user->city->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Current Location') ?></th>
            <td><?= h($user->user_current_location) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($user->status->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Dob') ?></th>
            <td><?= h($user->dob) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created Date') ?></th>
            <td><?= h($user->created_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Sponsers') ?></h4>
        <?php if (!empty($user->sponsers)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Bussiness Name') ?></th>
                <th scope="col"><?= __('Logo') ?></th>
                <th scope="col"><?= __('Created Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->sponsers as $sponsers): ?>
            <tr>
                <td><?= h($sponsers->id) ?></td>
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
</div>
