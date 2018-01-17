<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__("Users"), ['controller' => 'Users', 'action' => 'cityWiseUsers']) ?></li>
        <li><a href="#" class="hide" data-toggle="#list" >Categories</a>
            <ul id=list>
                <?php foreach ($cityCategories as $key=>$cityCategory): ?>
                <li><?= $this->Html->link(__($cityCategory['heading']), ['controller' => 'Items', 'action' => 'index/'.$cityCategory['city_id'].'/'.$cityCategory["category_id"]]) ?></li>
                <?php endforeach; ?>
                <li><?= $this->Html->link(__('Add Category'), ['controller' => 'Categories', 'action' => 'add']) ?>
            </ul>
        </li>
        <li><li><?= $this->Html->link(__('Sponsers'), ['controller' => 'Sponsers','action' => 'index']) ?></li></li>
    </ul>
</nav>
<div class="users index large-9 medium-8 columns content">
    <h3><?= __('Users') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('dob') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address1') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address2') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_current_location') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $this->Number->format($user->id) ?></td>
                <td><?= h($user->role->name) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->password) ?></td>
                <td><?= h($user->first_name) ?></td>
                <td><?= h($user->last_name) ?></td>
                <td><?= h($user->dob) ?></td>
                <td><?= h($user->gender->name) ?></td>
                <td><?= h($user->address1) ?></td>
                <td><?= h($user->address2) ?></td>
                <td><?= h($user->zip) ?></td>
                <td><?= h($user->city->name) ?></td>
                <td><?= h($user->user_current_location) ?></td>
                <td><?= h($user->created_date) ?></td>
                <td><?= h($user->status->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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

<style>
    
    .large-3 {
        width: 15% !important;
    }

    .large-9 {
        width: 85%;
    }
</style>
