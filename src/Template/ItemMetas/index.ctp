<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemMeta[]|\Cake\Collection\CollectionInterface $itemMetas
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Item Meta'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="itemMetas index large-9 medium-8 columns content">
    <h3><?= __('Item Metas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('item_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('meta_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($itemMetas as $itemMeta): ?>
            <tr>
                <td><?= $this->Number->format($itemMeta->id) ?></td>
                <td><?= $itemMeta->has('item') ? $this->Html->link($itemMeta->item->id, ['controller' => 'Items', 'action' => 'view', $itemMeta->item->id]) : '' ?></td>
                <td><?= h($itemMeta->meta_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $itemMeta->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $itemMeta->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $itemMeta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemMeta->id)]) ?>
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
