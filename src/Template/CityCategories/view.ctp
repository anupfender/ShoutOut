<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CityCategory $cityCategory
 */
?>

<div class="cityCategories view large-9 medium-8 columns content">
    <h3>#<?= h($cityCategory->id) ?>
     <div style="float:right">
    <span style="font-size:15px;">
		<?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $cityCategory->id]) ?>
		&nbsp;&nbsp;
		<?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $cityCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cityCategory->id)]) ?>
    </span>
    </div>
    </h3>

        <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= $cityCategory->city->name ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $cityCategory->category->name ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Heading') ?></th>
            <td><?= h($cityCategory->heading) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Image') ?></th>
            <td><?= h($cityCategory->image) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= ($cityCategory->status_id)?"Active":"Inactive" ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Display Order') ?></th>
            <td><?= $this->Number->format($cityCategory->display_order) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Short Description') ?></h4>
        <?= $this->Text->autoParagraph(h($cityCategory->short_description)); ?>
    </div>
</div>
