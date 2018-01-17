<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemMeta $itemMeta
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Item Meta'), ['action' => 'edit', $itemMeta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Item Meta'), ['action' => 'delete', $itemMeta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemMeta->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Item Metas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item Meta'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Items'), ['controller' => 'Items', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="itemMetas view large-9 medium-8 columns content">
    <h3><?= h($itemMeta->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Item') ?></th>
            <td><?= $itemMeta->has('item') ? $this->Html->link($itemMeta->item->id, ['controller' => 'Items', 'action' => 'view', $itemMeta->item->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Meta Id') ?></th>
            <td><?= h($itemMeta->meta_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($itemMeta->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Meta Value') ?></h4>
        <?= $this->Text->autoParagraph(h($itemMeta->meta_value)); ?>
    </div>
</div>
