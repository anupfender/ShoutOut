<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<div class="items form large-9 medium-8 columns content">
    <?= $this->Form->create($item) ?>
    <fieldset>
        <legend><?= __('Edit Item') ?></legend>
        <?php
            echo $this->Form->control('heading');
            echo $this->Form->control('sponsered');
            echo $this->Form->control('poster_image');
            echo $this->Form->control('keywords');
            echo $this->Form->control('location');
            echo $this->Form->control('tab');
            echo $this->Form->control('zip');
            echo $this->Form->control('lat');
            echo $this->Form->control('longt');
            echo $this->Form->control('rating');
        ?>
    </fieldset>
    <?= $this->Html->link(__('Cancel'), ['controller'=>'items', 'action' => 'view', $item_id]) ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
