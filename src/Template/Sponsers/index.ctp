<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sponser[]|\Cake\Collection\CollectionInterface $sponsers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__("Users"), ['controller' => 'Users', 'action' => 'cityWiseUsers']) ?></li>
        <li><a href="#" class="hide" data-toggle="#list" onclick="showHide()">Categories</a>
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
<div class="sponsers index large-9 medium-8 columns content">
    <h3><?= __('Sponsers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('bussiness_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('logo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created_date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sponsers as $sponser): ?>
            <tr>
                <td><?= $this->Number->format($sponser->id) ?></td>
                <td><?= h($sponser->city->name) ?></td>
                <td><?= h($sponser->user->first_name. " ".$sponser->user->last_name) ?></td>
                <td><?= h($sponser->bussiness_name) ?></td>
                <td><?= h($sponser->logo) ?></td>
                <td><?= h($sponser->created_date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sponser->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sponser->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sponser->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sponser->id)]) ?>
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
