<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\City $city
 */
?>

<div class="cities form large-9 medium-8 columns content">
    <?= $this->Form->create($city) ?>
    <fieldset>
        <legend><?= __('Add City') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('state');
            echo $this->Form->control('full_state');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
