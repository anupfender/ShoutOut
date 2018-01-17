<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CityCategory $cityCategory
 */
?>

<div class="cityCategories form large-9 medium-8 columns content">
    <?= $this->Form->create($cityCategory) ?>
    <fieldset>
        <legend><?= __('Add City Category') ?></legend>
        <?php
            echo $this->Form->hidden('city_id', ['value' => $city_id]);
            echo $this->Form->control('category_id', ['options' => $categories, 'empty' => true]);
            echo $this->Form->control('heading');
            echo $this->Form->control('image');
            echo $this->Form->control('short_description');
            echo $this->Form->control('status');
            echo $this->Form->control('display_order');
        ?>
    </fieldset>
   <?= $this->Html->link(__('Cancel'), ['controller'=>'cities', 'action' => 'view', $city_id]) ?>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
