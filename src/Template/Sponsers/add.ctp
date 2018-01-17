<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sponser $sponser
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
    </ul>
</nav>
<div class="sponsers form large-9 medium-8 columns content">
    <?= $this->Form->create($sponser) ?>
    <fieldset>
        <legend><?= __('Add Sponser') ?></legend>
        <?php
            echo $this->Form->control('city_id', ['options' => $cities, 'empty' => true]);
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true, 'value' =>$user_id]);
            echo $this->Form->control('bussiness_name');
            echo $this->Form->control('logo');
            echo $this->Form->control('created_date', ['empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
