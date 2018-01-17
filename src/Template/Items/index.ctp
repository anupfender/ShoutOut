<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item[]|\Cake\Collection\CollectionInterface $items
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Item Listings'), ['controller' => 'ItemListings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Listing'), ['controller' => 'ItemListings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Item Metas'), ['controller' => 'ItemMetas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Meta'), ['controller' => 'ItemMetas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="items index large-9 medium-8 columns content">
    <h3><?= __('Items') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('heading') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sponsered') ?></th>
                <th scope="col"><?= $this->Paginator->sort('poster_image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('keywords') ?></th>
                <th scope="col"><?= $this->Paginator->sort('location') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tab') ?></th>
                <th scope="col"><?= $this->Paginator->sort('zip') ?></th>
                <th scope="col"><?= $this->Paginator->sort('lat') ?></th>
                <th scope="col"><?= $this->Paginator->sort('longt') ?></th>
                <th scope="col"><?= $this->Paginator->sort('rating') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $item): ?>
            <tr>
                <td><?= $this->Number->format($item->id) ?></td>
                <td><?= h($item->heading) ?></td>
                <td><?= $this->Number->format($item->sponsered) ?></td>
                <td><?= h($item->poster_image) ?></td>
                <td><?= h($item->keywords) ?></td>
                <td><?= h($item->location) ?></td>
                <td><?= h($item->tab) ?></td>
                <td><?= h($item->zip) ?></td>
                <td><?= h($item->lat) ?></td>
                <td><?= h($item->longt) ?></td>
                <td><?= h($item->rating) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $item->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $item->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?>
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
