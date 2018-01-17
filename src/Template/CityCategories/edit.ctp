<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CityCategory $cityCategory
 */
?>

<div class="cityCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($cityCategory) ?>
    <fieldset>
        <legend><?= __('Edit City Category') ?></legend>
        <?php
            echo $this->Form->hidden('city_id', ['value' => $city_id]);
            echo $this->Form->control('category_id', ['options' => $categories, 'empty' => true]);
            echo $this->Form->control('heading');
            echo $this->Form->control('image');
            echo $this->Form->control('short_description');
            echo $this->Form->control('status_id', ['options' => $statuses, 'empty' => false]);
            echo $this->Form->control('display_order');
        ?>
    </fieldset>
   <?= $this->Html->link(__('Cancel'), ['controller'=>'city-categories', 'action' => 'view', $cityCategory->id]) ?>

    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
