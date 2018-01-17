<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City[]|\Cake\Collection\CollectionInterface $cities
 */
?>

<div class="cities index large-9 medium-8 columns content">
    <h3><?= __('Cities') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('full_state') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('updated') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cities as $city): ?>
            <tr>
                <td><?= $this->Number->format($city->id) ?></td>
                <td><?= h($city->name) ?></td>
                <td><?= h($city->state) ?></td>
                <td><?= h($city->full_state) ?></td>
                <td><?= h($city->created) ?></td>
                <td><?= h($city->updated) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $city->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $city->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $city->id], ['confirm' => __('Are you sure you want to delete # {0}?', $city->id)]) ?>
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
