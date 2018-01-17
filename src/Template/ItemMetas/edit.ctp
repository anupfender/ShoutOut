<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemMeta $itemMeta
 */
?>
<div class="itemMetas form large-9 medium-8 columns content">
    <?= $this->Form->create($itemMeta)?>
    <fieldset>
        <legend><?= __('Edit Item Meta') ?></legend>
        <?php
            echo $this->Form->hidden('item_id', ['options' => $items, 'empty' => true]);
            echo $this->Form->control('meta_id',['options' => $metas, 'empty' => true]);
            echo $this->Form->control('meta_value');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
