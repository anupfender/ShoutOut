<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sponser $sponser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Item'), ['controller' => 'Items', 'action' => 'add', $sponser->id]) ?></li>
      
    </ul>
</nav>
<div class="sponsers view large-9 medium-8 columns content">
    <h3><?= h($sponser->bussiness_name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($sponser->city->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= h($sponser->user->first_name." ".$sponser->user->last_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Logo') ?></th>
            <td><?= h($sponser->logo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created Date') ?></th>
            <td><?= h($sponser->created_date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Items') ?></h4>
        <?php if (!empty($sponser->items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Heading') ?></th>
                <th scope="col"><?= __('Poster Image') ?></th>
                <th scope="col"><?= __('Keywords') ?></th>
                <th scope="col"><?= __('Location') ?></th>
                <th scope="col"><?= __('Zip') ?></th>
                <th scope="col"><?= __('Lat') ?></th>
                <th scope="col"><?= __('Longt') ?></th>
                <th scope="col"><?= __('Rating') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($sponser->items as $items): ?>
            <tr>
                <td><?= h($items->id) ?></td>
                <td><?= h($items->heading) ?></td>
                <td><?= h($items->poster_image) ?></td>
                <td><?= h($items->keywords) ?></td>
                <td><?= h($items->location) ?></td>
                <td><?= h($items->zip) ?></td>
                <td><?= h($items->lat) ?></td>
                <td><?= h($items->longt) ?></td>
                <td><?= h($items->rating) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Items', 'action' => 'view', $items->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Items', 'action' => 'edit', $items->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Items', 'action' => 'delete', $items->id], ['confirm' => __('Are you sure you want to delete # {0}?', $items->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
