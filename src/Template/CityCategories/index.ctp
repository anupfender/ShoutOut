<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CityCategory[]|\Cake\Collection\CollectionInterface $cityCategories
 */
?>

<div class="cityCategories index large-9 medium-8 columns content">
    <h3><?= __('City Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('city_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('category_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('heading') ?></th>
                <th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('display_order') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cityCategories as $cityCategory): ?>
            <tr>
                <td><?= $this->Number->format($cityCategory->id) ?></td>
                <td><?= $cityCategory->has('city') ? $this->Html->link($cityCategory->city->name, ['controller' => 'Cities', 'action' => 'view', $cityCategory->city->id]) : '' ?></td>
                <td><?= $cityCategory->has('category') ? $this->Html->link($cityCategory->category->name, ['controller' => 'Categories', 'action' => 'view', $cityCategory->category->id]) : '' ?></td>
                <td><?= h($cityCategory->heading) ?></td>
                <td><?= h($cityCategory->image) ?></td>
                <td><?= $this->Number->format($cityCategory->status) ?></td>
                <td><?= $this->Number->format($cityCategory->display_order) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cityCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cityCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cityCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cityCategory->id)]) ?>
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
