<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<div class="items view large-9 medium-8 columns content">
    <h3>Item Details</h3>
    <table class="vertical-table">
        <tr>
            <td style="text-align:left;"><b><?= __('Heading') ?></b><br /><?= h($item->heading) ?></td>
            <td style="text-align:left;"><b><?= __('Keywords') ?></b><br /><?= h($item->keywords) ?></td>
            <td style="text-align:left;"><b><?= __('Location') ?></b><br /><?= h($item->location) ?></td>
            <td style="text-align:left;"><b><?= __('Zip') ?></b><br /><?= h($item->zip) ?></td>
        </tr>
         <tr>
            <td style="text-align:left;"><b><?= __('Lat') ?></b><br /><?= h($item->lat) ?></td>
            <td style="text-align:left;"><b><?= __('Longt') ?></b><br /><?= h($item->longt) ?></td>
            <td style="text-align:left;"><b><?= __('Rating') ?></b><br /><?= h($item->rating) ?></td>
            <td style="text-align:left;"><b><?= __('Sponsered') ?></b><br /><?= ($item->sponsered)?"yes":"no" ?></td>
        </tr>
        <tr>
            <td colspan="3" style="text-align:left;"><b><?= __('Image') ?></b><br /><?= h($item->poster_image) ?></td>
            <td style="text-align:right;"><?= $this->Html->link(__('EDIT ITEM'), ['controller' => 'items', 'action' => 'edit', $item->id]) ?>
            &nbsp;|&nbsp;
            <?= $this->Form->postLink(__('DELETE'), ['controller' => 'items', 'action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete this item?'), 'style' =>'color:maroon;']) ?>
            </td>
        </tr>
    </table>

    <div class="related">
        <h3><?= __('Related Item Meta') ?>

        </h3>
        <?php if (!empty($item->item_metas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Meta Key') ?></th>
                <th scope="col" style="width:70%"><?= __('Meta Value') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ItemMetas as $itemMeta):?>
            <tr>
                <td><?= h($itemMeta->meta->meta_name) ?></td>
                <td ><?= h(substr($itemMeta->meta_value, 0, 100)) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ItemMetas', 'action' => 'edit', $itemMeta->id]) ?>
                    &nbsp;|&nbsp;
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ItemMetas', 'action' => 'delete', $itemMeta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemMeta->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <div style="float:right;font-size:14px;">
			<?= $this->Html->link(__('+ ADD META'), ['controller' => 'ItemMetas', 'action' => 'edit']) ?>
        </div>
    </div>
</div>
